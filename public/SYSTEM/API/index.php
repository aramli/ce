<?php
header('Access-Control-Allow-Origin: *');

ini_set('display_errors',0);
error_reporting(0);
// error_reporting(E_ALL); 
// ini_set('display_errors', 1); 

date_default_timezone_set("Asia/Bangkok");

$db = @new mysqli('localhost', 'root', 'root', 'DISMI_FINAL');
if (mysqli_connect_errno()) {
	die ('Could not open a mysql connection: '.mysqli_connect_error().'('.mysqli_connect_errno().')');
}
// require('phpmailer/PHPMailerAutoload.php');


// $hig_media_server = "http://192.168.1.2/development_site/hig/public/media";
// $hig_media_server = "https://heberthendrik.com/development_site/prototype_hig/public/media";
// $hig_media_server = "http://192.168.43.251/development_site/hig/public/media";
// $hig_media_server = "http://localhost/development_site/hig/public/media";
// $hig_media_server = "http://192.168.2.103/development_site/hig/public/media";
// $hig_media_server = "http://hig.co.id/media";

// $hig_root_server = "http://192.168.1.2/development_site/hig/public";
// $hig_root_server = "http://192.168.43.251/development_site/hig/public";
// $hig_root_server = "http://localhost/development_site/hig/public";
// $hig_root_server = "http://hig.co.id";
// $hig_root_server = "http://192.168.2.103/development_site/hig/public";

if( $_POST['module'] == "GetActualKWH_EventPanel" ){

	$id_event = $_POST['eid'];
	$id_room = $_POST['rid'];

	// GET EVENT TIMELINE INFO
	$query_timeline = "select * from d3s3m_event where eve_ID = '".$id_event."' ";
	$result_timeline = $db->query($query_timeline);
	$row_timeline = $result_timeline->fetch_assoc();
	$actual_start_event = $row_timeline['eve_DATE_START'];
	// END GET EVENT TIMELINE INFO

	// GET ALL KWH ADDRESS
	$query_get_kwh_address = "select roo_KWH_ADDRESS from d3s3m_room where roo_ID = '".$id_room."' ";
	$result_get_kwh_address = $db->query($query_get_kwh_address);
	$row_get_kwh_address = $result_get_kwh_address->fetch_assoc();
	$kwh_address = $row_get_kwh_address['roo_KWH_ADDRESS'];
	$array_kwh_address = explode(",", $kwh_address);
	// END GET ALL KWH ADDRESS

	// CALCULATE ACTUAL KWH FOR EACH ADDRESS
	for( $i=0;$i<count($array_kwh_address);$i++ ){

		// GET SUM ENERGY LOG
		$query_energy_log = "
		select
			max(ene_KWH) as LATEST_KWH,
			min(ene_KWH) as START_KWH,
			( max(ene_KWH) - min(ene_KWH) ) as ACTUAL_KWH
		from d3s3m_energy
		where 
			ene_KWH_ADDRESS = '".$array_kwh_address[$i]."'
			and ene_DATE_CREATED >= '".$actual_start_event."'
			and ene_DATE_CREATED <= '".date('Y-m-d H:i:s')."'
		";
		$result_energy_log = $db->query($query_energy_log);
		$row_energy_log = $result_energy_log->fetch_assoc();

		$current_kwh_address = $array_kwh_address[$i];
		$current_latest_kwh = $row_energy_log['LATEST_KWH'];
		$current_start_kwh = $row_energy_log['START_KWH'];
		$current_actual_kwh = $row_energy_log['ACTUAL_KWH'];

		$json['DATA']['KWH_ADDRESS'][$i] = $current_kwh_address;
		$json['DATA']['LATEST_KWH'][$i] = $current_latest_kwh;
		$json['DATA']['START_KWH'][$i] = $current_start_kwh;
		$json['DATA']['ACTUAL_KWH'][$i] = $current_actual_kwh;
		// END GET SUM ENERGY LOG

	}
	$json['DATA']['TOTAL_ACTUAL_KWH'] = array_sum($json['DATA']['ACTUAL_KWH']);
	// END CALCULATE ACTUAL KWH FOR EACH ADDRESS

	$json['RESULT'] = 1;
	$json['MESSAGE'] = 'KWH data has been retrieved successfully.';
	
	echo json_encode($json);
}




























function SendSystemMail($email_parameter){

	//SEND EMAIL TO CUSTOMER
	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'sistem.email.hig@gmail.com';                 // SMTP username
	$mail->Password = 'N4t4Cr34t1v3';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to
	
	$mail->From = 'sistem.email.hig@gmail.com';
	$mail->FromName = '[NO-REPLY] HIG Mailer System';
	$mail->addAddress($email_parameter['RECIPIENT_EMAIL'], $email_parameter['RECIPIENT_NAME'] );     // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	//$mail->addReplyTo('info@example.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');
	
	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = $email_parameter['SUBJECT'];
	$mail->Body    = $email_parameter['CONTENT'];
	
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	$mail->send();
	
	/*
	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}
	*/

}


?>

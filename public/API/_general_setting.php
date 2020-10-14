<?php
header('Access-Control-Allow-Origin: *');
date_default_timezone_set("Asia/Bangkok");


ini_set('display_errors',0);
error_reporting(0);
// error_reporting(E_ALL); 
// ini_set('display_errors', 1); 



$db = @new mysqli('localhost', 'root', 'root', 'DISMI_FINAL');
if (mysqli_connect_errno()) {
	die ('Could not open a mysql connection: '.mysqli_connect_error().'('.mysqli_connect_errno().')');
}




// $jalangih_media_server = "http://192.168.1.2/development_site/hig/public/media";
// $hig_media_server = "https://heberthendrik.com/development_site/prototype_hig/public/media";
// $hig_media_server = "http://192.168.43.251/development_site/hig/public/media";
/* $jalangih_media_server = "http://localhost/development_site/JalanGihWeb/public/MEDIA/"; */
// $hig_media_server = "http://192.168.2.103/development_site/hig/public/media";
// $hig_media_server = "http://hig.co.id/media";

// $hig_root_server = "http://192.168.1.2/development_site/hig/public";
// $hig_root_server = "http://192.168.43.251/development_site/hig/public";
// $hig_root_server = "http://hig.co.id";
// $hig_root_server = "http://192.168.2.103/development_site/hig/public";
// $jalangih_root_server = "http://localhost/development_site/hig/public";
?>

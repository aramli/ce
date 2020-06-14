<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class UAC extends Controller
{
    public function login(){
    	return view('UAC.login');
    }

    public function logout(){

        Session::flush();

        return redirect('/login');
    }

    public function VerifyLogin(Request $request){

        $check = DB::table('d3s3m_user')->where('EMAIL', $request->email)->where('PASSWORD', md5($request->password))->count('ID');
        if( $check == 1 ){

            $user = DB::table('d3s3m_user')->where('EMAIL', $request->email)->where('PASSWORD', md5($request->password))->get();
            foreach( $user as $this_user ){
                $this_user = $this_user;
            }

            Session::put('ID', $this_user->ID);
            Session::put('FULLNAME', $this_user->FULLNAME);
            Session::put('EMAIL', $this_user->EMAIL);
            Session::put('ID_COMPANY', $this_user->ID_COMPANY);
            Session::put('ID_DIVISION', $this_user->ID_DIVISION);
            Session::put('ID_ROLE', $this_user->ID_ROLE);


            // Session::put('ROOT_URL', 'http://localhost/development_site/rules');
            // Session::put('CURL_URL', 'http://13.251.212.5:8083');

            Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Login Success');
            Session::put('popup_message', 'Welcome back, '.$this_user->FULLNAME);

            // UPDATE LAST LOGIN
            DB::table('d3s3m_user')->where('ID', $this_user->ID)->update([
                "LAST_LOGIN" => date('Y-m-d H:i:s')
            ]);

            return redirect('/dashboard');
        } else {

            Session::put('popup_status', 1);
            Session::put('popup_type', 'error');
            Session::put('popup_title', 'Invalid Login');
            Session::put('popup_message', 'Incorrect username or password');

            return redirect('/login');
        }
    }
    
    public function index(){

        $user = DB::table('d3s3m_user')->get();

        $user = DB::select(DB::raw('
        	select
        		t1.ID as ID,
        		t1.FULLNAME as FULLNAME,
        		t1.EMAIL as EMAIL,
        		t1.ID_DIVISION as ID_DIVISION,
        		t1.ID_COMPANY as ID_COMPANY,
        		t2.NAME as ROLE_NAME,
        		t1.LAST_LOGIN as LAST_LOGIN,
        		t1.IS_ACTIVE as IS_ACTIVE,
        		t1.DATE_CREATED as DATE_CREATED
        	from d3s3m_user t1
        		left join d3s3m_role t2 on t2.ID = t1.ID_ROLE
        	'));

        /*
        $total_user = DB::table('mdb_user')->count('ID');
        $total_administrator = DB::table('mdb_user')->where('ID_ROLE', 1)->count('ID');
        $total_analyst = DB::table('mdb_user')->where('ID_ROLE', 2)->count('ID');
        $total_guest = DB::table('mdb_user')->where('ID_ROLE', 3)->count('ID');

        return view('user.index', compact('user', 'total_user', 'total_administrator', 'total_analyst', 'total_guest'));
        */
        return view('UAC.index', compact('user'));
    }

    public function add(){

    	$company = DB::table('d3s3m_company')->get();
    	$division = DB::table('d3s3m_division')->get();
    	$role = DB::table('d3s3m_role')->get();

    	return view('UAC.add', compact('company', 'division', 'role'));
    }

    public function SaveNewUser(Request $request){

        $check = DB::table('d3s3m_user')->where('EMAIL', $request->inputEmail)->count('ID');
        $otp = rand(123456,654321);

        if( $check == 0 ){
            DB::table('d3s3m_user')->insert([
                "FULLNAME" => $request->inputFullname,
                "EMAIL" => $request->inputEmail,
                "ID_COMPANY" => $request->selectCompany,
                "ID_DIVISION" => $request->selectDivision,
                "ID_ROLE" => $request->selectRole,
                "IS_ACTIVE" => $request->checkboxIsActive,
                "PASSWORD" => md5($otp)
            ]);
            $new_id = DB::getPdo()->lastInsertId();

	        if( $request->selectRole == 2 ){
		        DB::table('d3s3m_training_target')->insert([
		        	"ID_USER" => $new_id,
		        	"TRAINING_TARGET" => $request->numberTargetTraining
		        ]);
	        }



            // SEND OTP
            $to_name = $request->inputFullname;
            $to_email = $request->inputEmail;
            $message_subheader = 'Welcome to DISMI System';
            $message_title = 'Your New Account Has Been Made';
            $message_caption = 'Please use this OTP below in order to gain access for your account. Please do not forget to change your password after login.';
            $parameter_CTA_text = $otp;
            $parameter_CTA_url = '#';

            $data = array('name'=> $to_name , 'message_subheader' => $message_subheader, 'message_title' => $message_title, 'message_caption' => $message_caption, "parameter_CTA_text" => $parameter_CTA_text, 'parameter_CTA_url' => $parameter_CTA_url);
            Mail::send("emails.reset_password.index", $data, function($message) use ($to_name, $to_email, $message_title) {
            $message->to($to_email, $to_name)
            ->subject("[NO-REPLY] Your user credential for DISMI system");
            $message->from("dismi.mailer@gmail.com","DISMI Mailer");
            });
            // END SEND OTP



            Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Success');
            Session::put('popup_message', 'Your new user has been successfully registered to the system.');

            return redirect('/user/detail/'.$new_id);
        } else {
            Session::put('popup_status', 1);
            Session::put('popup_type', 'error');
            Session::put('popup_title', 'Registration Failed');
            Session::put('popup_message', 'Please try again with another email because &nbsp; <strong>'.$request->inputEmail.'</strong> &nbsp; is already registered.');

            return redirect('/user/add');
        }
    }

    public function detail($id){

    	$company = DB::table('d3s3m_company')->get();
    	$division = DB::table('d3s3m_division')->get();
    	$role = DB::table('d3s3m_role')->get();
    	// $user = DB::table('d3s3m_user')->where('ID', $id)->get();

    	$user = DB::select(DB::raw('
    		select
    			t1.ID as ID,
    			t1.FULLNAME as FULLNAME,
    			t1.EMAIL as EMAIL,
    			t1.ID_COMPANY as ID_COMPANY,
    			t1.ID_DIVISION as ID_DIVISION,
    			t1.ID_ROLE as ID_ROLE,
    			t1.IS_ACTIVE as IS_ACTIVE,
    			t2.TRAINING_TARGET as TRAINING_TARGET
    		from d3s3m_user t1
    			left join d3s3m_training_target t2 on t1.ID = t2.ID_USER
    		where
    			t1.ID = "'.$id.'"
    		'));

    	return view('UAC.detail', compact('user', 'company', 'division', 'role'));
    }

    public function UpdateUserDetail(Request $request){

    	if( $request->currentEmail == $request->inputEmail ){

    		DB::table('d3s3m_user')->where('ID', $request->currentID)->update([
                "FULLNAME" => $request->inputFullname,
                "EMAIL" => $request->inputEmail,
                "ID_COMPANY" => $request->selectCompany,
                "ID_DIVISION" => $request->selectDivision,
                "ID_ROLE" => $request->selectRole,
                "IS_ACTIVE" => $request->checkboxIsActive,
                "DATE_MODIFIED" => date('Y-m-d H:i:s')
            ]);

            if( $request->selectRole == 2 ){

            	DB::table('d3s3m_training_target')->where('ID_USER', $request->currentID)->delete();

		        DB::table('d3s3m_training_target')->insert([
		        	"ID_USER" => $request->currentID,
		        	"TRAINING_TARGET" => $request->numberTargetTraining
		        ]);
	        }

	        Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Success');
            Session::put('popup_message', 'Your new user has been successfully registered to the system.');

    	} else {

    		$check_email = DB::table('d3s3m_user')->where('EMAIL', $request->inputEmail)->count('ID');

    		if( $check_email > 0 ){
    			Session::put('popup_status', 1);
	            Session::put('popup_type', 'error');
	            Session::put('popup_title', 'Registration Failed');
	            Session::put('popup_message', 'Please try again with another email because &nbsp; <strong>'.$request->inputEmail.'</strong> &nbsp; is already registered.');

    		} else {
    			DB::table('d3s3m_user')->where('ID', $request->currentID)->update([
	                "FULLNAME" => $request->inputFullname,
	                "EMAIL" => $request->inputEmail,
	                "ID_COMPANY" => $request->selectCompany,
	                "ID_DIVISION" => $request->selectDivision,
	                "ID_ROLE" => $request->selectRole,
	                "IS_ACTIVE" => $request->checkboxIsActive,
	                "DATE_MODIFIED" => date('Y-m-d H:i:s')
	            ]);

	            if( $request->selectRole == 2 ){

			        DB::table('d3s3m_training_target')->where('ID_USER', $request->currentID)->delete();

			        DB::table('d3s3m_training_target')->insert([
			        	"ID_USER" => $request->currentID,
			        	"TRAINING_TARGET" => $request->numberTargetTraining
			        ]);
		        }

		        Session::put('popup_status', 1);
	            Session::put('popup_type', 'success');
	            Session::put('popup_title', 'Success');
	            Session::put('popup_message', 'Your new user has been successfully registered to the system.');
    		}

    	}

    	return redirect('/user/detail/'.$request->currentID);
    }

    public function DeleteUser($id){

        DB::table('d3s3m_user')->where('ID', $id)->delete();
        DB::table('d3s3m_training_target')->where('ID_USER', $id)->delete();

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Delete Success');
        Session::put('popup_message', 'User has been erased from the system');

        return redirect('/user/all');
    }

    public function UploadUserCSV(Request $request){

    	if( $file = $request->file('csvfile') ){
		
			$file = $request->file('csvfile');
			$tujuan_upload = 'UPLOAD/user';
			$nama_file = $file->getClientOriginalName();
            $nama_file = str_replace(" ", "", $nama_file);
			$file->move($tujuan_upload,$nama_file);



			// PROSES FILE
			$file = fopen(asset('UPLOAD/user/'.$nama_file), 'r');
			$success_query = 0;
			$failed_query = 0;
			while (($line = fgetcsv($file,0, ';')) != FALSE) {

				
				//$line is an array of the csv elements
				//echo '<br><br>';
				//print_r($line);
			  
				$user_parameter['FULLNAME'] = $line[0];
			  	$user_parameter['EMAIL'] = $line[1];
				$user_parameter['ID_COMPANY'] = $line[2];
				$user_parameter['ID_DIVISION'] = $line[3];
				$user_parameter['ID_ROLE'] = $line[4];
				$user_parameter['IS_ACTIVE'] = $line[5];
				$user_parameter['PASSWORD'] = 'password';
				$user_parameter['CONFIRM_PASSWORD'] = 'password';
				$user_parameter['TARGET_TRAINING'] = 0;
				
				if( $user_parameter['FULLNAME'] != "FULLNAME" ){
					
					$check = DB::table('d3s3m_user')->where('EMAIL', $user_parameter['EMAIL'])->count('ID');

			        if( $check == 0 ){
			            DB::table('d3s3m_user')->insert([
			                "FULLNAME" => $user_parameter['FULLNAME'],
			                "EMAIL" => $user_parameter['EMAIL'],
			                "ID_COMPANY" => $user_parameter['ID_COMPANY'],
			                "ID_DIVISION" => $user_parameter['ID_DIVISION'],
			                "ID_ROLE" => $user_parameter['ID_ROLE'],
			                "IS_ACTIVE" => $user_parameter['IS_ACTIVE'],
			                "PASSWORD" => md5('password')
			            ]);
			            $new_id = DB::getPdo()->lastInsertId();

				        if( $request->selectRole == 2 ){
					        DB::table('d3s3m_training_target')->insert([
					        	"ID_USER" => $new_id,
					        	"TRAINING_TARGET" => 0
					        ]);
				        }

				        if( $new_id > 0 ){
				        	$success_query++;
				        }

			        } else {
			        	$failed_query++;
			        }

				}
				
			}
			unlink($_SERVER['DOCUMENT_ROOT'].'/development_site/DISMI/public/UPLOAD/user/'.$nama_file);
			fclose($file);
			
			
			Session::put('popup_status', 1);
	        Session::put('popup_type', 'success');
	        Session::put('popup_title', 'Delete Success');
	        Session::put('popup_message', $success_query.' data imported. '.$failed_query.' data failed.');
						
		}



		return redirect('/user/all');
    }

    public function myprofile(){

        $profile = DB::table('d3s3m_user')->where('ID', Session::get('ID'))->get();

        $counter_event_created = DB::table('d3s3m_event')->where('ID_USER', Session::get('ID'))->where('STATUS', 2)->count('ID');
        $counter_event_attend = DB::table('d3s3m_attendee')->where('ID_USER', Session::get('ID'))->where('IS_ATTEND', 1)->count('ID');

        $counter_event_absence = DB::select(DB::raw("
            select
                count(t1.ID) as TOTAL_ROW
            from d3s3m_attendee t1 
                left join d3s3m_event t2 on t2.ID = t1.ID_EVENT
            where
                date(t2.EVENT_FINISH) < '".date('Y-m-d')."'
                and t2.STATUS = 4
            "));
        foreach( $counter_event_absence as $this_counter_event_absence ) {
            $counter_event_absence = $this_counter_event_absence->TOTAL_ROW;
        }

        $counter_energy_consumption = DB::select(DB::raw("
            select
                sum(t2.KWH_CONSUMPTION) as KWH_CONSUMPTION
            from d3s3m_event t1
                left join d3s3m_energy_log t2 on t2.ID_EVENT = t1.ID
            where
                date(t1.EVENT_FINISH) < '".date('Y-m-d')."'
                and t1.STATUS = 4
            "));
        foreach( $counter_energy_consumption as $this_counter_energy_consumption ){ 
            $counter_energy_consumption = $this_counter_energy_consumption->KWH_CONSUMPTION;
        }





        $training_target = DB::table('d3s3m_training_target')->where('ID_USER', Session::get('ID'))->get();
        if( count($training_target) > 0 ){

            foreach( $training_target as $this_training_target ){
                $display_training_target = $this_training_target->TRAINING_TARGET;
            }

        } else {
            $display_training_target = 0;
        }
        $counter_event_this_month = DB::select(DB::raw("
            select
                count(ID) as TOTAL_ROW
            from d3s3m_event
            where
                STATUS = 4
                and MONTH(EVENT_START) = '".date('m')."'
                and YEAR(EVENT_START) = '".date('Y')."'
            "));
        foreach( $counter_event_this_month as $this_counter_event_this_month){
            $counter_event_this_month = $this_counter_event_this_month->TOTAL_ROW;
        }

        if( $counter_event_this_month > $display_training_target ){
            $kpi_percentage = 100;
        } else {
            $kpi_percentage = number_format($counter_event_this_month / $display_training_target,2);
        }



        for( $i=0;$i<12;$i++ ){
            $event_per_month = DB::select(DB::raw("
                select
                    count(ID) as TOTAL_ROW
                from d3s3m_event
                where 
                    MONTH(EVENT_START) = '".($i+1)."'
                    and YEAR(EVENT_START) = '".date('Y')."'
                    and STATUS = 4
                    and ID_USER = '".Session::get('ID')."'
                "));
            foreach( $event_per_month as $this_event_per_month ){
                $array_event_per_month[$i] = $this_event_per_month->TOTAL_ROW;
            }
        }
        $implode_array_event_per_month = implode(",", $array_event_per_month);




        
        return view('UAC.myprofile', compact('profile', 'counter_event_created', 'counter_event_attend', 'counter_event_absence', 'counter_energy_consumption', 'display_training_target', 'counter_event_this_month', 'kpi_percentage', 'implode_array_event_per_month'));
    }

    public function UpdateMyProfile(Request $request){

        if( $request->inputEmail == Session::get('EMAIL') ){
            DB::table('d3s3m_user')->where('ID', Session::get('ID'))->update([
                "FULLNAME" => $request->inputFullname,
                "DATE_MODIFIED" => date('Y-m-d H:i:s')
            ]);

            Session::put('FULLNAME', $request->inputFullname);

            Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Success');
            Session::put('popup_message', 'Your user profile has been updated.');
        }   else {

            $check = DB::table('d3s3m_user')->where('EMAIL', $request->inputEmail)->count('ID');

            if( $check > 0 ){

                Session::put('popup_status', 1);
                Session::put('popup_type', 'error');
                Session::put('popup_title', 'Error');
                Session::put('popup_message', 'Email '.$request->inputEmail.' is already exist. Please use another email');

            } else {

                DB::table('d3s3m_user')->where('ID', Session::get('ID'))->update([
                    "FULLNAME" => $request->inputFullname,
                    "EMAIL" => $request->inputEmail,
                    "DATE_MODIFIED" => date('Y-m-d H:i:s')
                ]);

                Session::put('FULLNAME', $request->inputFullname);
                Session::put('EMAIL', $request->inputEmail);

                Session::put('popup_status', 1);
                Session::put('popup_type', 'success');
                Session::put('popup_title', 'Success');
                Session::put('popup_message', 'Your user profile has been updated.');


            }

        }

        return redirect('/myprofile');
    }

    public function forgot_password(){
        return view('UAC.forgot_password');
    }

    public function ResetMyPassword(Request $request){

        $check = DB::table('d3s3m_user')->where('EMAIL', $request->email)->count('ID');

        $otp = rand(123456,654321);

        if( $check > 0 ){

            DB::table('d3s3m_user')->where('EMAIL', $request->email)->update([
                "PASSWORD" => md5($otp)
            ]);

            $user = DB::table('d3s3m_user')->where('EMAIL', $request->email)->get();
            foreach( $user as $this_user ){
                $this_user = $this_user;
            }

            $to_name = $this_user->FULLNAME;
            $to_email = $this_user->EMAIL;
            $message_subheader = 'One Time Password';
            $message_title = 'Reset Your Account Password';
            $message_caption = 'Please use this OTP below in order to gain access for your account. Please do not forget to change your password after login.';
            $parameter_CTA_text = $otp;
            $parameter_CTA_url = '#';

            $data = array('name'=> $to_name , 'message_subheader' => $message_subheader, 'message_title' => $message_title, 'message_caption' => $message_caption, "parameter_CTA_text" => $parameter_CTA_text, 'parameter_CTA_url' => $parameter_CTA_url);
            Mail::send("emails.reset_password.index", $data, function($message) use ($to_name, $to_email, $message_title) {
            $message->to($to_email, $to_name)
            ->subject("[NO-REPLY] Your one time password for your account");
            $message->from("dismi.mailer@gmail.com","DISMI Mailer");
            });




            Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Success');
            Session::put('popup_message', 'Your OTP has been sent to your email.');

        } else {

            Session::put('popup_status', 1);
            Session::put('popup_type', 'error');
            Session::put('popup_title', 'Error');
            Session::put('popup_message', 'Email '.$request->email.' is not exist in this system.');

        }

        return redirect('/login');
    }

    public function ChangeMyPassword(Request $request){

        if( $request->NewPassword != $request->ConfirmPassword ){

            Session::put('popup_status', 1);
            Session::put('popup_type', 'error');
            Session::put('popup_title', 'Error');
            Session::put('popup_message', 'Your new password does not match.');

        } else {

            $check = DB::table('d3s3m_user')->where('ID', Session::get('ID'))->where('PASSWORD', md5($request->CurrentPassword))->count('ID');

            if( $check == 0 ){

                Session::put('popup_status', 1);
                Session::put('popup_type', 'error');
                Session::put('popup_title', 'Error');
                Session::put('popup_message', 'Your current password is not correct.');

            } else {

                DB::table('d3s3m_user')->where('ID', Session::get('ID'))->update([
                    "PASSWORD" => md5($request->NewPassword),
                    "DATE_MODIFIED" => date('Y-m-d H:i:s')
                ]);

                Session::put('popup_status', 1);
                Session::put('popup_type', 'success');
                Session::put('popup_title', 'Success');
                Session::put('popup_message', 'Your password has been changed.');

            }

        }

        return redirect('/myprofile');
    }

    public function test(){
        return view('emails.reset_password.index');
    }

}

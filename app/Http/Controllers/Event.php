<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class Event extends Controller
{

    public function SetupNewEvent(){

    	// CREATE TEMPORARY EVENT
    	DB::table('d3s3m_event')->insert([
    		"eve_d3s3m_user_use_ID" => Session::get('ID'),
    		"eve_STATUS" => 0
    	]);
		$new_id = DB::getPdo()->lastInsertId();

		// AUTOMATIC ADD ATTENDEE
		DB::table('d3s3m_attendee')->insert([
			"att_d3s3m_event_eve_ID" => $new_id,
			"att_d3s3m_user_use_ID" => Session::get('ID'),
            "att_COMMAND_SIGNAL" => 'StartEvent'
		]);
		
		// DELETE YESTERDAY BLANK EVENT
		// DB::table('d3s3m_event')->where('STATUS', 0)->where('DATE(DATE_CREATED)', '<', date('Y-m-d'))->delete();
		/*
		$query_delete = "delete from d3s3m_event where STATUS = 0 and DATE(DATE_CREATED) < '".date('Y-m-d')."' ";
		$result_delete = $db->query($query_delete);
        */
        
        DB::select(DB::raw("delete from d3s3m_event where eve_STATUS = 0 and DATE(eve_DATE_CREATED) < '".date('Y-m-d')."' "));

		return redirect('/event/add/'.$new_id.'/basic');
    }

    public function add_basic($id){

        $id = $id;

    	$category = DB::table('d3s3m_category')->get();
    	// $room = DB::table('d3s3m_room')->where('roo_IS_ACTIVE', 1)->get();
		$room = DB::table('d3s3m_room')->where('roo_IS_ACTIVE', 1)->where('roo_IS_SCHEDULED', '!=', 1)->get();
		//print_r($room);exit;

        $basic_info = DB::table('d3s3m_event')->where('eve_ID', $id)->get();

    	// $attendee = DB::table('d3s3m_user')->where('IS_ACTIVE', 1)->get();
        /*
    	$attendee = DB::select(DB::raw("
    		select
    			t1.ID as ID,
    			t1.FULLNAME as FULLNAME,
    			t1.EMAIL as EMAIL,
    			t2.NAME as COMPANY_NAME,
    			t3.NAME as DIVISION_NAME
    		from d3s3m_user t1
    			left join d3s3m_company t2 on t2.ID = t1.ID_COMPANY
    			left join d3s3m_division t3 on t3.ID = t1.ID_COMPANY
    		where
    			t1.IS_ACTIVE = 1
    		"));
        */

    	return view('event.add_basic', compact('category', 'room', 'id', 'basic_info'));
    }

    public function add_attendee($id){

        $id = $id;



        /*
        $attendee = DB::select(DB::raw("
            select
                t4.ID as ID,
                t4.FULLNAME as FULLNAME,
                t4.EMAIL as EMAIL,
                t2.NAME as COMPANY_NAME,
                t3.NAME as DIVISION_NAME
            from d3s3m_attendee t1
                left join d3s3m_user t4 on t4.ID = t1.ID_USER
                left join d3s3m_company t2 on t2.ID = t4.ID_COMPANY
                left join d3s3m_division t3 on t3.ID = t4.ID_COMPANY
            where
                t1.ID_EVENT = ".$id."
            "));
        */
        $attendee = DB::table('d3s3m_attendee')
                    ->leftJoin('d3s3m_user', 'use_ID', '=', 'att_d3s3m_user_use_ID')
                    ->leftJoin('d3s3m_company', 'com_ID', '=', 'use_d3s3m_company_com_ID')
                    ->leftJoin('d3s3m_division', 'div_ID', '=', 'use_d3s3m_division_div_ID')
                    ->where('att_d3s3m_event_eve_ID', $id)
                    ->get();
        if( count($attendee) > 0 ){
            $json_table['ATTENDEE_LIST'] = json_encode($attendee);
        } else {
            $json_table['ATTENDEE_LIST'] = '{}';
        }

		$array_existing_attendee = array();
        foreach( $attendee as $this_attendee ){
            $array_existing_attendee[] = $this_attendee->att_d3s3m_user_use_ID;
        }








        /*
        $user_list = DB::select(DB::raw("
            select
                t1.ID as ID,
                t1.FULLNAME as FULLNAME,
                t1.EMAIL as EMAIL,
                t2.NAME as COMPANY_NAME,
                t3.NAME as DIVISION_NAME
            from d3s3m_user t1
                left join d3s3m_company t2 on t2.ID = t1.ID_COMPANY
                left join d3s3m_division t3 on t3.ID = t1.ID_COMPANY
            where
                t1.IS_ACTIVE = 1
            "));
        */
        if( count($array_existing_attendee) > 0 ){
            $query_user_list = "
                select
                    *
                from d3s3m_user
                    left join d3s3m_company on com_ID = use_d3s3m_company_com_ID
                    left join d3s3m_division on div_ID = use_d3s3m_division_div_ID
                where
                    use_IS_ACTIVE = 1
            ";

            for( $i=0;$i<count($array_existing_attendee);$i++ ){
                $extended_query[] = "use_ID != ".$array_existing_attendee[$i];
            }
            $implode_extended_query = implode(" and ", $extended_query);
            $query_user_list .= " and (".$implode_extended_query.")";

            $user_list = DB::select(DB::raw($query_user_list));

        } else {
            $user_list = DB::table('d3s3m_user')
                    ->leftJoin('d3s3m_company', 'com_ID', '=', 'use_d3s3m_company_com_ID')
                    ->leftJoin('d3s3m_division', 'div_ID', '=', 'use_d3s3m_division_div_ID')
                    ->where('use_IS_ACTIVE', 1)
                    ->get();
        }
        
        if( count($user_list) > 0 ){
            $json_table['USER_LIST'] = json_encode($user_list);
        } else {
            $json_table['USER_LIST'] = '{}';
        }

        return view('event.add_attendee', compact('id', 'json_table', 'array_existing_attendee'));
    }

    public function SaveNewEvent(Request $request){


        $event_start_schedule = $request->EVENT_START_DATE.' '.str_replace(" ","",$request->EVENT_START_TIME).':00';
        $event_finish_schedule = $request->EVENT_START_DATE.' '.str_replace(" ","",$request->EVENT_FINISH_TIME).':00';

        $convert_datetime_to_second = strtotime($event_start_schedule);
        $minus_preparation_time = $convert_datetime_to_second - ( $request->EVENT_PREPARATION * 60 );
        $event_initiation = date("Y-m-d H:i", $minus_preparation_time);

        DB::table('d3s3m_event')->where('eve_ID', $request->currentID)->update([
            "eve_TITLE" => $request->TITLE,
            "eve_d3s3m_category_cat_ID" => $request->ID_CATEGORY,
            "eve_EVENT_PREPARATION" => $request->EVENT_PREPARATION,
            "eve_EVENT_INITIATION" =>$event_initiation,
            "eve_EVENT_START" => $event_start_schedule,
            "eve_EVENT_FINISH" => $event_finish_schedule,
            "eve_d3s3m_room_roo_ID" => $request->ID_ROOM,
            "eve_SUMMARY" => $request->SUMMARY,
            "eve_DESCRIPTION" => $request->DESCRIPTION,
            "eve_DATE_MODIFIED" => date('Y-m-d H:i:s')
        ]);

        /*
        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Login Success');
        Session::put('popup_message', 'Your draft event has been saved.');
        */

        return redirect('/event/add/'.$request->currentID.'/attendee');
    }

    public function register_attendee($id, $id_attendee){

        DB::table('d3s3m_attendee')->insert([
            "att_d3s3m_event_eve_ID" => $id,
            "att_d3s3m_user_use_ID" => $id_attendee,
            "att_COMMAND_SIGNAL" => "AttendEvent",
            "att_IS_ATTEND" => 0
        ]);

        // CHECK FOR VIP
        /*
        $vip_status = DB::table('d3s3m_user')->where('use_ID', $id_attendee)->get();
        foreach( $vip_status as $this_vip_status ){
            $this_vip_status = $this_vip_status;

            if( $this_vip_status->use_IS_ACTIVE == 1 ){
                DB::table('d3s3m_event')->where('eve_ID', $id)->update([
                    "eve_IS_EXTENDED" => 1
                ]);
            }
        }
        */
        // END CHECK FOR VIP

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Login Success');
        Session::put('popup_message', 'Attendee has been registered.');

        return redirect('/event/add/'.$id.'/attendee');
    }

    public function remove_attendee($id, $id_attendee){

        DB::table('d3s3m_attendee')->where('att_d3s3m_event_eve_ID', $id)->where('att_d3s3m_user_use_ID', $id_attendee)->delete();

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Login Success');
        Session::put('popup_message', 'Attendee has been removed.');

        return redirect('/event/add/'.$id.'/attendee');
    }

    public function SubmitForReview($id){

        DB::table('d3s3m_event')->where('ID', $id)->update([
            "STATUS" => 1,
            "DATE_MODIFIED" => date('Y-m-d H:i:s')
        ]);

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Event Creation Success');
        Session::put('popup_message', 'Your event registration has been sent for review.');

        return redirect('/event/all');
    }

    public function SubmitForReviewGet($id){

        DB::table('d3s3m_event')->where('eve_ID', $id)->update([
            "eve_STATUS" => 1,
            "eve_DATE_MODIFIED" => date('Y-m-d H:i:s')
        ]);

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Event Creation Success');
        Session::put('popup_message', 'Your event registration has been sent for review.');

        return redirect('/event/all');
    }

    public function all(){

        // $event = DB::table('d3s3m_event')->where('STATUS', 1)->orderBy('DATE_CREATED', 'DESC')->get();
        /*
        $event = DB::select(DB::raw(
            "
            select
                t1.ID as ID,
                t1.TITLE as TITLE,
                t4.NAME as CATEGORY_NAME,
                t1.EVENT_START as EVENT_START,
                t3.NAME as ROOM_NAME,
                t2.FULLNAME as ORGANIZER_NAME,
                t1.STATUS as STATUS
            from d3s3m_event t1
                left join d3s3m_user t2 on t2.ID = t1.ID_USER
                left join d3s3m_room t3 on t3.ID = t1.ID_ROOM
                left join d3s3m_category t4 on t4.ID = t1.ID_CATEGORY
            where
                t1.STATUS > 0
            "
        ));
        */

        $event = DB::table('d3s3m_event')
                    ->leftJoin('d3s3m_user', 'use_ID', '=', 'eve_d3s3m_user_use_ID')
                    ->leftJoin('d3s3m_room', 'roo_ID', '=', 'eve_d3s3m_room_roo_ID')
                    ->leftJoin('d3s3m_category', 'cat_ID', '=', 'eve_d3s3m_category_cat_ID')
                    ->where('eve_STATUS', '>', 0)
                    ->get();
        if( count($event) > 0 ){
            $json_table['ALL_REGISTERED_EVENTS'] = json_encode($event);
        } else {
            $json_table['ALL_REGISTERED_EVENTS'] = '{}';
        }
        // print_r($event);exit;

        // return view('event.view_all', compact('json_table'));
        return view('event.index', compact('json_table'));
    }

    public function today(){

        // $event = DB::table('d3s3m_event')->where('STATUS', 1)->orderBy('DATE_CREATED', 'DESC')->get();
        $event = DB::select(DB::raw(
            "
            select
                t1.ID as ID,
                t1.TITLE as TITLE,
                t4.NAME as CATEGORY_NAME,
                t1.EVENT_START as EVENT_START,
                t3.NAME as ROOM_NAME,
                t2.FULLNAME as ORGANIZER_NAME,
                t1.STATUS as STATUS
            from d3s3m_event t1
                left join d3s3m_user t2 on t2.ID = t1.ID_USER
                left join d3s3m_room t3 on t3.ID = t1.ID_ROOM
                left join d3s3m_category t4 on t4.ID = t1.ID_CATEGORY
            where
                t1.STATUS > 0
                and DATE(t1.EVENT_START) = '".date('Y-m-d')."'
            "
        ));
        // print_r($event);exit;

        return view('event.view_today', compact('event'));
    }

    public function detail($id){

        /*
        $basic_info = DB::select(DB::raw(
            "
            select
                t1.ID as ID,
                t1.TITLE as TITLE,
                t4.NAME as CATEGORY_NAME,
                t1.EVENT_START as EVENT_START,
                t1.EVENT_FINISH as EVENT_FINISH,
                t1.EVENT_PREPARATION as EVENT_PREPARATION,
                t1.EVENT_INITIATION as EVENT_INITIATION,
                t3.NAME as ROOM_NAME,
                t2.FULLNAME as ORGANIZER_NAME,
                t1.STATUS as STATUS,
                t1.SUMMARY as SUMMARY,
                t1.DESCRIPTION as DESCRIPTION,
                t1.DATE_CREATED as DATE_CREATED
            from d3s3m_event t1
                left join d3s3m_user t2 on t2.ID = t1.ID_USER
                left join d3s3m_room t3 on t3.ID = t1.ID_ROOM
                left join d3s3m_category t4 on t4.ID = t1.ID_CATEGORY
            where
                t1.STATUS > 0
                and t1.ID = '".$id."'
            "
        ));
        */
        $basic_info = DB::table('d3s3m_event')
                        ->leftJoin('d3s3m_user', 'use_ID', '=', 'eve_d3s3m_user_use_ID')
                        ->leftJoin('d3s3m_room', 'roo_ID', '=', 'eve_d3s3m_room_roo_ID')
                        ->leftJoin('d3s3m_category', 'cat_ID', '=', 'eve_d3s3m_category_cat_ID')
                        ->where('eve_STATUS', '>', '0')
                        ->where('eve_ID', $id)
                        ->get();

        /*
        $attendee = DB::select(DB::raw("
            select
                t4.ID as ID,
                t4.FULLNAME as FULLNAME,
                t4.EMAIL as EMAIL,
                t2.NAME as COMPANY_NAME,
                t3.NAME as DIVISION_NAME
            from d3s3m_attendee t1
                left join d3s3m_user t4 on t4.ID = t1.ID_USER
                left join d3s3m_company t2 on t2.ID = t4.ID_COMPANY
                left join d3s3m_division t3 on t3.ID = t4.ID_COMPANY
            where
                t1.ID_EVENT = ".$id."
            "));
        */
        $attendee = DB::table('d3s3m_attendee')
                    ->leftJoin('d3s3m_user', 'att_d3s3m_user_use_ID', '=', 'use_ID')
                    ->leftJoin('d3s3m_company', 'use_d3s3m_company_com_ID', '=', 'com_ID')
                    ->leftJoin('d3s3m_division', 'use_d3s3m_division_div_ID', '=', 'div_ID')
                    ->where('att_d3s3m_event_eve_ID', $id)
                    ->get();

        return view('event.detail', compact('basic_info', 'attendee'));
    }

    public function DeleteEvent_old($id){


        DB::table('d3s3m_event')->where('ID', $id)->delete();
        DB::table('d3s3m_attendee')->where('ID_EVENT', $id)->delete();

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Event Deletion Success');
        Session::put('popup_message', 'Your event has been removed.');

        return redirect('/event/all');
    }

    public function RejectEvent($id){

        DB::table('d3s3m_event')->where('eve_ID', $id)->update([
            "eve_STATUS" => 5,
            "eve_DATE_MODIFIED" => date('Y-m-d H:i:s')
        ]);


        // SEND EMAIL
        /*
        $event_detail = DB::select(DB::raw("
            select
                t1.TITLE as TITLE,
                t1.EVENT_START as EVENT_START,
                t2.NAME as ROOM_NAME,
                t3.FULLNAME as CREATOR_NAME,
                t3.EMAIL as CREATOR_EMAIL
            from d3s3m_event t1
                left join d3s3m_room t2 on t2.ID = t1.ID_ROOM
                left join d3s3m_user t3 on t3.ID = t1.ID_USER
            where
                t1.ID = '".$id."'
            "));
        */
        $event_detail = DB::table('d3s3m_event')
                            ->leftJoin('d3s3m_room', 'roo_ID', '=', 'eve_d3s3m_room_roo_ID')
                            ->leftJoin('d3s3m_user', 'use_ID', '=', 'eve_d3s3m_user_use_ID')
                            ->where('eve_ID', $id)
                            ->get();
        foreach( $event_detail as $this_event_detail ){
            $this_event_detail = $this_event_detail;
        }

        $to_name = $this_event_detail->use_FULLNAME;
        $to_email = $this_event_detail->use_EMAIL;
        $message_subheader = $this_event_detail->eve_TITLE;
        $message_title = 'Your event has been rejected';
        $message_caption = 'We are sorry to inform you that your event has been reviewed by trainer and rejected. You can login to your account and submit a new event.';
        $data = array('name'=> $to_name , 'message_subheader' => $message_subheader, 'message_title' => $message_title, 'message_caption' => $message_caption);

        Mail::send("emails.event_rejection.index", $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject("[NO-REPLY] Your event has been rejected by trainier.");
            $message->from("dismi.mailer@gmail.com","DISMI Mailer");
        });
        // END SEND EMAIL

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Event Rejection Success');
        Session::put('popup_message', 'Event has been rejected.');

        return redirect('/event/detail/'.$id);
    }

    public function ApproveEvent($id){

        DB::table('d3s3m_event')->where('eve_ID', $id)->update([
            "eve_STATUS" => 2,
            "eve_DATE_MODIFIED" => date('Y-m-d H:i:s')
        ]);


        // SEND EMAIL
        /*
        $event_detail = DB::select(DB::raw("
            select
                t1.TITLE as TITLE,
                t1.EVENT_START as EVENT_START,
                t2.NAME as ROOM_NAME,
                t3.FULLNAME as CREATOR_NAME,
                t3.EMAIL as CREATOR_EMAIL
            from d3s3m_event t1
                left join d3s3m_room t2 on t2.ID = t1.ID_ROOM
                left join d3s3m_user t3 on t3.ID = t1.ID_USER
            where
                t1.ID = '".$id."'
            "));
        */
        $event_detail = DB::table('d3s3m_event')
                            ->leftJoin('d3s3m_room', 'roo_ID', '=', 'eve_d3s3m_room_roo_ID')
                            ->leftJoin('d3s3m_user', 'use_ID', '=', 'eve_d3s3m_user_use_ID')
                            ->where('eve_ID', $id)
                            ->get();
        foreach( $event_detail as $this_event_detail ){
            $this_event_detail = $this_event_detail;
        }

        $to_name = $this_event_detail->use_FULLNAME;
        $to_email = $this_event_detail->use_EMAIL;
        $message_subheader = $this_event_detail->eve_TITLE;
        $message_title = 'Your event has been approved';
        $message_caption = 'Your event has been reviewed by trainer and approved. You can now login to your account, and send your event invitation to all participants.';
        $data = array('name'=> $to_name , 'message_subheader' => $message_subheader, 'message_title' => $message_title, 'message_caption' => $message_caption);
        
        Mail::send("emails.event_approval.index", $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject("[NO-REPLY] Your event has been approved by trainier.");
            $message->from("dismi.mailer@gmail.com","DISMI Mailer");
        });
        // END SEND EMAIL

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Event Approval Success');
        Session::put('popup_message', 'Event has been approved.');

        return redirect('/event/detail/'.$id);
    }

    public function BlastInvitation($id){

        $blast_indicator = 0;
        /*
        $event_detail = DB::select(DB::raw("
            select
                t1.ID as ID,
                t1.TITLE as TITLE,
                t1.EVENT_START as EVENT_START,
                t1.EVENT_FINISH as EVENT_FINISH,
                t2.NAME as ROOM_NAME,
                t1.SUMMARY as SUMMARY,
                t1.DESCRIPTION as DESCRIPTION,

                t4.FULLNAME as ATTENDEE_NAME,
                t4.EMAIL as ATTENDEE_EMAIL,
                t4.ID as ID_ATTENDEE,

                t3.COMMAND_SIGNAL as COMMAND_SIGNAL
            from d3s3m_event t1
                left join d3s3m_room t2 on t2.ID = t1.ID_ROOM
                left join d3s3m_attendee t3 on t3.ID_EVENT = t1.ID
                left join d3s3m_user t4 on t4.ID = t3.ID_USER
            where
                t1.ID = '".$id."'
            "));
        */
        $event_detail = DB::table('d3s3m_event')
                        ->leftJoin('d3s3m_room', 'roo_ID', '=', 'eve_d3s3m_room_roo_ID')
                        ->leftJoin('d3s3m_attendee', 'att_d3s3m_event_eve_ID', '=', 'eve_ID')
                        ->leftJoin('d3s3m_user', 'use_ID', '=', 'att_d3s3m_user_use_ID')
                        ->where('eve_ID', $id)
                        ->get();
        //print_r($event_detail);exit;


        foreach( $event_detail as $this_event_detail ){

            $to_name = $this_event_detail->use_FULLNAME;
            $to_email = $this_event_detail->use_EMAIL;
            $message_subheader = 'Event e-Invitation';
            $message_title = $this_event_detail->eve_TITLE;
            $message_caption = '
            <div style="text-align:left;margin-bottom:20px;">
            You are invited to this event. Please find the information below regarding the event detail.
            </div>
            <div style="text-align:left;margin-bottom:20px;">
                <table>
                    <tr>
                        <td>Event Start</td>
                        <td>: '.$this_event_detail->eve_EVENT_START.'</td>
                    </tr>
                    <tr>
                        <td>Event Finish</td>
                        <td>: '.$this_event_detail->eve_EVENT_FINISH.'</td>
                    </tr>
                    <tr>
                        <td>Room Name</td>
                        <td>: '.$this_event_detail->roo_NAME.'</td>
                    </tr>
                    <tr>
                        <td>SUMMARY</td>
                        <td>: '.$this_event_detail->eve_SUMMARY.'</td>
                    </tr>
                </table>
            </div>
            <div style="text-align:left;">
                Please click the button below to generate your QR code. Scan it before you enter the room, in order to start and/or attend the event. Please turn off your NIGHT MODE on your Android phone, to ensure the QRCODE scanner works properly.
            </div>
            ';
            $parameter_CTA_text = 'Click here to generate your QR code';
            $parameter_CTA_url = 'https://192.168.3.240/public/LIBRARY/qrcode/QRG.php?action='.base64_encode($this_event_detail->att_COMMAND_SIGNAL).'&eid='.base64_encode($this_event_detail->eve_ID).'&uid='.base64_encode($this_event_detail->use_ID);
            $parameter_CTA_url = 'https://192.168.3.240/public/GenerateQRCode/'.base64_encode($this_event_detail->att_COMMAND_SIGNAL).'/'.base64_encode($this_event_detail->eve_ID).'/'.base64_encode($this_event_detail->use_ID);
            $parameter_CTA_url = 'https://dismi-denso.com/QRCODE/public/GenerateQRCode/'.base64_encode($this_event_detail->att_COMMAND_SIGNAL).'/'.base64_encode($this_event_detail->eve_ID).'/'.base64_encode($this_event_detail->use_ID);

            $data = array('name'=> $to_name , 'message_subheader' => $message_subheader, 'message_title' => $message_title, 'message_caption' => $message_caption, "parameter_CTA_text" => $parameter_CTA_text, 'parameter_CTA_url' => $parameter_CTA_url);
            
            Mail::send("emails.invitation.index", $data, function($message) use ($to_name, $to_email, $message_title) {
                $message->to($to_email, $to_name)
                ->subject("[NO-REPLY] Your e-invitation for event: ".$message_title);

                // GET ALL SUPERADMINISTRATOR EMAIL FOR CC
                $superadmin = DB::table('d3s3m_user')->where('use_d3s3m_role_rol_ID', 1)->get();
                foreach( $superadmin as $this_superadmin ){
                    $message->cc($this_superadmin->use_EMAIL);    
                }
                // $message->cc('hebert.hendrik@gmail.com');
                // $message->cc('hebert.hendrik@jalangih.id');
                $message->from("dismi.mailer@gmail.com","DISMI Mailer");
            });

            $blast_indicator = 1;


        }

        if( $blast_indicator == 1 ){
            DB::table('d3s3m_event')->where('eve_ID', $id)->update([
                "eve_IS_BLAST" => 1
            ]);
        }



        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Blast e-Invitation Success');
        Session::put('popup_message', 'e-invitation has been blasted to all participants.');

        return redirect('/event/detail/'.$this_event_detail->eve_ID);

    }
	
	public function DeleteEvent($id){
		
		
		DB::table('d3s3m_attendee')->where('att_d3s3m_event_eve_ID', $id)->delete();
		DB::table('d3s3m_event')->where('eve_ID', $id)->delete();
		
		Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Delete Event Success');
        Session::put('popup_message', 'Event and participants has been removed from the system.');

        return redirect('/event/all');
	}

    public function EventPanel($id){

        $basic_info = DB::table('d3s3m_event')
                        ->leftJoin('d3s3m_user', 'use_ID', '=', 'eve_d3s3m_user_use_ID')
                        ->leftJoin('d3s3m_room', 'roo_ID', '=', 'eve_d3s3m_room_roo_ID')
                        ->leftJoin('d3s3m_category', 'cat_ID', '=', 'eve_d3s3m_category_cat_ID')
                        ->where('eve_STATUS', '>', '0')
                        ->where('eve_ID', $id)
                        ->get();
                        
        $attendee = DB::table('d3s3m_attendee')
                    ->leftJoin('d3s3m_user', 'att_d3s3m_user_use_ID', '=', 'use_ID')
                    ->leftJoin('d3s3m_company', 'use_d3s3m_company_com_ID', '=', 'com_ID')
                    ->leftJoin('d3s3m_division', 'use_d3s3m_division_div_ID', '=', 'div_ID')
                    ->leftJoin('d3s3m_role', 'use_d3s3m_role_rol_ID', '=', 'rol_ID')
                    ->where('att_d3s3m_event_eve_ID', $id)
                    ->get();
            
        // GET KWH ESTIMATION
        foreach( $basic_info as $this_basic_info ){
            $this_basic_info = $this_basic_info;
        }

        //$to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $this_basic_info->eve_EVENT_FINISH);
        //$from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $this_basic_info->eve_EVENT_START);
        //$diff_in_minutes = $to->diffInMinutes($from);
        //$diff_in_hours = $diff_in_minutes/60;
		
		
		$datetime1 = strtotime($this_basic_info->eve_EVENT_START);
		$datetime2 = strtotime($this_basic_info->eve_EVENT_FINISH);
		$interval  = abs($datetime2 - $datetime1);
		$minutes   = round($interval / 60);
		$diff_in_minutes = $minutes;
		$diff_in_hours = $diff_in_minutes/60;



		
        $kwh_estimation = $diff_in_hours * $this_basic_info->roo_KWH_STANDARD;
        // END GET KWH ESTIMATION
		
		//echo $this_basic_info->roo_KWH_STANDARD;exit;


        return view('event.event_panel', compact('basic_info', 'attendee', 'kwh_estimation'));
    }








    public function Panel_StartEvent($id){

        DB::table('d3s3m_event')->where('eve_ID', $id)->update([
            "eve_STATUS" => 2,
            "eve_IS_START" => 1
        ]);

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Start event success');
        Session::put('popup_message', 'Your event is now started. You can now turn on electricity.');

        return redirect('/event/panel/'.$id);
    }

    public function Panel_StartEvent__Auto_Nodejs($implode_id){

        $array_explode_id = explode(',', $implode_id);

        for( $i=0;$i<count($array_explode_id);$i++ ){

            $id = $array_explode_id[$i];

            DB::table('d3s3m_event')->where('eve_ID', $id)->update([
                "eve_STATUS" => 6,
                "eve_IS_START" => 1,
                "eve_DATE_START" => date('Y-m-d H:i:s')
            ]);

        }

    }

    public function Panel_StopEvent($id){


        // GET EVENT INFO
        $event = DB::table('d3s3m_event')
                        ->leftJoin('d3s3m_user', 'use_ID', '=', 'eve_d3s3m_user_use_ID')
                        ->leftJoin('d3s3m_room', 'roo_ID', '=', 'eve_d3s3m_room_roo_ID')
                        ->leftJoin('d3s3m_category', 'cat_ID', '=', 'eve_d3s3m_category_cat_ID')
                        ->where('eve_STATUS', '>', '0')
                        ->where('eve_ID', $id)
                        ->get();
        foreach( $event as $this_event ){
            $this_event = $this_event;
        }
        $event_start = $this_event->eve_DATE_START;
        $event_stop = $this_event->eve_DATE_FINISH;
        $address_kwh_listrik = intval($this_event->roo_KWH_ADDRESS);
        $address_kwh_ac = intval($this_event->roo_KWH_ADDRESS_AC);
        // print_r($this_event);exit;
        // END GET EVENT INFO


        // GET KWH USAGE START
        $energy_logger_start = DB::table('d3s3m_energy_logger')
        ->where('elog_DATE_CREATED', '>=', $event_start)
        ->orderBy('elog_DATE_CREATED', 'ASC')
        ->take(1)
        ->get();
        foreach( $energy_logger_start as $this_energy_logger_start ){
            $this_energy_logger_start = $this_energy_logger_start;
        }
        $array_energy_log_start = explode(',',$this_energy_logger_start->elog_KWH_STREAM);
        for( $i=0;$i<count($array_energy_log_start);$i++ ){
            $index_energy_start = $this_energy_logger_start->elog_KWH_ADDRESS_START + $i;
            $final_array_energy_log_start[$index_energy_start] = $array_energy_log_start[$i];
        }

        if( isset($final_array_energy_log_start[$address_kwh_listrik]) ){
			$hex_address_plus_satu = dechex($final_array_energy_log_start[$address_kwh_listrik+1]);			
			$hex_address_plus_nol = dechex($final_array_energy_log_start[$address_kwh_listrik]);
			$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
			$final_kwh_listrik_start = hexdec($hex_final);
			
            // $kwh_listrik_start = $final_array_energy_log_start[$address_kwh_listrik];
			$kwh_listrik_start = $final_kwh_listrik_start;
        } else {
            $kwh_listrik_start = 0;
        }

        if( isset($final_array_energy_log_start[$address_kwh_ac]) ){
			$hex_address_plus_satu = dechex($final_array_energy_log_start[$address_kwh_ac+1]);			
			$hex_address_plus_nol = dechex($final_array_energy_log_start[$address_kwh_ac]);
			$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
			$final_kwh_ac_start = hexdec($hex_final);
			
            // $kwh_ac_start = $final_array_energy_log_start[$address_kwh_ac];
			$kwh_ac_start = $final_kwh_ac_start;
        } else {
            $kwh_ac_start = 0;
        }
        // END GET KWH USAGE START


        // GET KWH USAGE END
        $energy_logger_end = DB::table('d3s3m_energy_logger')
        ->where('elog_DATE_CREATED', '<=', date('Y-m-d H:i:s'))
        ->orderBy('elog_DATE_CREATED', 'DESC')
        ->take(1)
        ->get();
        // print_r($energy_logger_end);exit;
        // $query_energy_logger_end = "select * from d3s3m_energy_logger where elog_DATE_CREATED <= '".date('Y-m-d H:i:s')."' order by elog_DATE_CREATED DESC limit 0,1 ";
        // $energy_logger_end = DB::select(DB::raw($query_energy_logger_end));
        // echo $query_energy_logger_end;exit;
        foreach( $energy_logger_end as $this_energy_logger_end ){
            $this_energy_logger_end = $this_energy_logger_end;
        }
        $array_energy_log_end = explode(',',$this_energy_logger_end->elog_KWH_STREAM);
        for( $i=0;$i<count($array_energy_log_end);$i++ ){
            $index_energy_end = $this_energy_logger_end->elog_KWH_ADDRESS_START + $i;
            $final_array_energy_log_end[$index_energy_end] = $array_energy_log_end[$i];
        }
        

        if( isset($final_array_energy_log_end[$address_kwh_listrik]) ){
			$hex_address_plus_satu = dechex($final_array_energy_log_end[$address_kwh_listrik+1]);			
			$hex_address_plus_nol = dechex($final_array_energy_log_end[$address_kwh_listrik]);
			$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
			$final_kwh_listrik_end = hexdec($hex_final);
			
            // $kwh_listrik_end = $final_array_energy_log_end[$address_kwh_listrik];
			$kwh_listrik_end = $final_kwh_listrik_end;
        } else {
            $kwh_listrik_end = 0;
        }

        if( isset($final_array_energy_log_end[$address_kwh_ac]) ){
			$hex_address_plus_satu = dechex($final_array_energy_log_end[$address_kwh_ac+1]);			
			$hex_address_plus_nol = dechex($final_array_energy_log_end[$address_kwh_ac]);
			$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
			$final_kwh_ac_end = hexdec($hex_final);
			
			$kwh_ac_end = $final_kwh_ac_end;
			//echo $kwh_ac_end;exit;
        } else {
            $kwh_ac_end = 0;
        }
        // END GET KWH USAGE END



        // CALCULATE TOTAL ACTUAL KWH
        $actual_kwh_listrik = $kwh_listrik_end - $kwh_listrik_start;
        $actual_kwh_ac = $kwh_ac_end - $kwh_ac_start;
        $total_actual_kwh = $actual_kwh_listrik + $actual_kwh_ac;
        // END CALCULATE TOTAL ACTUAL KWH



        // UPDATE ACTUAL KWH TO DATABASE
        DB::table('d3s3m_event')->where('eve_ID', $id)->update([
            "eve_ENERGY_CONSUMPTION" => $total_actual_kwh/1000,
            "eve_STATUS" => 4,
			"eve_KWH_LISTRIK_START" => $kwh_listrik_start/1000,
			"eve_KWH_LISTRIK_END" => $kwh_listrik_end/1000,
			"eve_KWH_AC_START" => $kwh_ac_start/1000,
			"eve_KWH_AC_END" => $kwh_ac_end/1000
        ]);
        // END UPDATE ACTUAL KWH TO DATABASE




        



        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Start event success');
        Session::put('popup_message', 'Your event is now stopped. All electricity has been turned off by system.');

        return redirect('/event/all');
    }

    public function Panel_StopEvent__Auto_Nodejs($implode_id){

        $array_explode_id = explode(',', $implode_id);

        for( $i=0;$i<count($array_explode_id);$i++ ){

            $id = $array_explode_id[$i];
			// $id = $array_explode_id[0];

            // UPDATE ACTUAL KWH TO DATABASE
            DB::table('d3s3m_event')->where('eve_ID', $id)->update([
                "eve_STATUS" => 4,
                "eve_IS_FINISH" => 1,
                "eve_DATE_FINISH" => date('Y-m-d H:i:s')
                ]);
            // END UPDATE ACTUAL KWH TO DATABASE




            
            // GET EVENT INFO
                    $event = DB::table('d3s3m_event')
                    ->leftJoin('d3s3m_user', 'use_ID', '=', 'eve_d3s3m_user_use_ID')
                    ->leftJoin('d3s3m_room', 'roo_ID', '=', 'eve_d3s3m_room_roo_ID')
                    ->leftJoin('d3s3m_category', 'cat_ID', '=', 'eve_d3s3m_category_cat_ID')
                    ->where('eve_STATUS', '>', '0')
                    ->where('eve_ID', $id)
                    ->get();
            foreach( $event as $this_event ){
            $this_event = $this_event;
            }
            $event_start = $this_event->eve_DATE_START;
            $event_stop = $this_event->eve_DATE_FINISH;
            $address_kwh_listrik = intval($this_event->roo_KWH_ADDRESS);
            $address_kwh_ac = intval($this_event->roo_KWH_ADDRESS_AC);
            // print_r($this_event);exit;
            // END GET EVENT INFO


            // GET KWH USAGE START
            $energy_logger_start = DB::table('d3s3m_energy_logger')
            ->where('elog_DATE_CREATED', '>=', $event_start)
            ->orderBy('elog_DATE_CREATED', 'ASC')
            ->take(1)
            ->get();
            foreach( $energy_logger_start as $this_energy_logger_start ){
            $this_energy_logger_start = $this_energy_logger_start;
            }
            $array_energy_log_start = explode(',',$this_energy_logger_start->elog_KWH_STREAM);
            for( $i=0;$i<count($array_energy_log_start);$i++ ){
            $index_energy_start = $this_energy_logger_start->elog_KWH_ADDRESS_START + $i;
            $final_array_energy_log_start[$index_energy_start] = $array_energy_log_start[$i];
            }

            if( isset($final_array_energy_log_start[$address_kwh_listrik]) ){
            $kwh_listrik_start = $final_array_energy_log_start[$address_kwh_listrik];
            } else {
            $kwh_listrik_start = 0;
            }

            if( isset($final_array_energy_log_start[$address_kwh_ac]) ){
            $kwh_ac_start = $final_array_energy_log_start[$address_kwh_ac];
            } else {
            $kwh_ac_start = 0;
            }
            // END GET KWH USAGE START


            // GET KWH USAGE END
            $energy_logger_end = DB::table('d3s3m_energy_logger')
            ->where('elog_DATE_CREATED', '<=', 'eve_DATE_FINISH')
            ->orderBy('elog_DATE_CREATED', 'DESC')
            ->take(1)
            ->get();
            // print_r($energy_logger_end);exit;
            // $query_energy_logger_end = "select * from d3s3m_energy_logger where elog_DATE_CREATED <= '".date('Y-m-d H:i:s')."' order by elog_DATE_CREATED DESC limit 0,1 ";
            // $energy_logger_end = DB::select(DB::raw($query_energy_logger_end));
            // echo $query_energy_logger_end;exit;
            foreach( $energy_logger_end as $this_energy_logger_end ){
            $this_energy_logger_end = $this_energy_logger_end;
            }
            $array_energy_log_end = explode(',',$this_energy_logger_end->elog_KWH_STREAM);
            for( $i=0;$i<count($array_energy_log_end);$i++ ){
            $index_energy_end = $this_energy_logger_end->elog_KWH_ADDRESS_START + $i;
            $final_array_energy_log_end[$index_energy_end] = $array_energy_log_end[$i];
            }


            if( isset($final_array_energy_log_end[$address_kwh_listrik]) ){
            $kwh_listrik_end = $final_array_energy_log_end[$address_kwh_listrik];
            } else {
            $kwh_listrik_end = 0;
            }

            if( isset($final_array_energy_log_end[$address_kwh_ac]) ){
            $kwh_ac_end = $final_array_energy_log_end[$address_kwh_ac];
            } else {
            $kwh_ac_end = 0;
            }
            // END GET KWH USAGE END



            // CALCULATE TOTAL ACTUAL KWH
            $actual_kwh_listrik = $kwh_listrik_end - $kwh_listrik_start;
            $actual_kwh_ac = $kwh_ac_end - $kwh_ac_start;
            $total_actual_kwh = $actual_kwh_listrik + $actual_kwh_ac;
            // END CALCULATE TOTAL ACTUAL KWH



            // UPDATE ACTUAL KWH TO DATABASE
            /*
            DB::table('d3s3m_event')->where('eve_ID', $id)->update([
            "eve_ENERGY_CONSUMPTION" => $total_actual_kwh
            ]);
            */
            // END UPDATE ACTUAL KWH TO DATABASE

            // UPDATE ACTUAL KWH TO DATABASE
            DB::table('d3s3m_event')->where('eve_ID', $id)->update([
                "eve_ENERGY_CONSUMPTION" => $total_actual_kwh/1000,
                "eve_STATUS" => 4,
                "eve_KWH_LISTRIK_START" => $kwh_listrik_start/1000,
                "eve_KWH_LISTRIK_END" => $kwh_listrik_end/1000,
                "eve_KWH_AC_START" => $kwh_ac_start/1000,
                "eve_KWH_AC_END" => $kwh_ac_end/1000
            ]);
            // END UPDATE ACTUAL KWH TO DATABASE

        }

    }

    public function Panel_ExtendEvent($id){

        DB::table('d3s3m_event')->where('eve_ID', $id)->update([
            "eve_IS_EXTENDED" => 1
        ]);

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Start event success');
        Session::put('popup_message', 'Your event is now bypassed by you. Do not forget to click on stop button after you have finished.');

        return redirect('/event/panel/'.$id);
    }

    public function Panel_OverrideAttend($id, $id_user_attendee){

        DB::table('d3s3m_attendee')
            ->where('att_d3s3m_event_eve_ID', $id)
            ->where('att_d3s3m_user_use_ID', $id_user_attendee)
            ->update([
                "att_IS_ATTEND" => 1,
                "att_DATE_ATTEND" => date('Y-m-d H:i:s')
        ]);

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'User attend success');
        Session::put('popup_message', 'User has been marked for attendance for this event.');

        return redirect('/event/panel/'.$id);
    }


}

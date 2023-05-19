<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class Room extends Controller
{
    public function index(){
        $room = DB::table('d3s3m_room')->get();
        if( count($room) > 0 ){
            $json_table['ALL_REGISTERED_ROOM'] = json_encode($room);
        } else {
            $json_table['ALL_REGISTERED_ROOM'] = '{}';
        }

        $query__chart_data__event_creation = "
        select
            roo_NAME as ROOM_NAME,
            count(eve_ID) as TOTAL_EVENT_CREATED
        from d3s3m_event
            left join d3s3m_room on eve_d3s3m_room_roo_ID = roo_ID
        where
            eve_STATUS = 4
        group by
            eve_d3s3m_room_roo_ID,
			roo_NAME
        order by
            roo_NAME ASC
        ";
        $chart_data__event_creation = DB::select(DB::raw($query__chart_data__event_creation));
		
		if( count($chart_data__event_creation) > 0 ){
			$chart_data__event_creation = $chart_data__event_creation;
		} else {
			$chart_data__event_creation = '';
		}

        return view('room.index', compact('json_table', 'chart_data__event_creation'));
    }

    public function add(){

        return view('room.add');
    }

    public function SaveNewRoom(Request $request){

        $check = DB::table('d3s3m_room')->where('roo_NAME', $request->NAME)->count('roo_ID');

        if( $check == 0 ){
            DB::table('d3s3m_room')->insert([
                "roo_NAME" => $request->NAME,
                "roo_PIN" => rand(123456,987654),
                "roo_CAPACITY" => $request->CAPACITY,
                "roo_KWH_STANDARD" => $request->KWH_STANDARD,
                "roo_IS_ACTIVE" => $request->IS_ACTIVE
            ]);
            $new_id = DB::getPdo()->lastInsertId();

            Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Success');
            Session::put('popup_message', 'New room has been successfully registered to the system.');

            return redirect('/room/detail/'.$new_id);
        } else {
            Session::put('popup_status', 1);
            Session::put('popup_type', 'error');
            Session::put('popup_title', 'Registration Failed');
            Session::put('popup_message', 'Please try again with another name because &nbsp; <strong>'.$request->roo_NAME.'</strong> &nbsp; is already registered.');

            return redirect('/room/add');
        }

        

    }

    public function detail($id){

        $room = DB::table('d3s3m_room')->where('roo_ID', $id)->get();

        return view('room.detail', compact('room'));
    }

    public function UpdateRoomDetail(Request $request){

        if( $request->currentName == $request->NAME ){

            DB::table('d3s3m_room')->where('roo_ID', $request->currentID)->update([
                "roo_CAPACITY" => $request->CAPACITY,
                "roo_KWH_STANDARD" => $request->KWH_STANDARD,
                "roo_IS_ACTIVE" => $request->IS_ACTIVE,
                "roo_IS_SCHEDULED" => $request->IS_SCHEDULED,
                "roo_DATE_MODIFIED" => date('Y-m-d H:i:s'),

                "roo_START_MONDAY" => $request->roo_START_MONDAY,
                "roo_START_TUESDAY" => $request->roo_START_TUESDAY,
                "roo_START_WEDNESDAY" => $request->roo_START_WEDNESDAY,
                "roo_START_THURSDAY" => $request->roo_START_THURSDAY,
                "roo_START_FRIDAY" => $request->roo_START_FRIDAY,
                "roo_START_SATURDAY" => $request->roo_START_SATURDAY,
                "roo_START_SUNDAY" => $request->roo_START_SUNDAY,

                "roo_STOP_MONDAY" => $request->roo_STOP_MONDAY,
                "roo_STOP_TUESDAY" => $request->roo_STOP_TUESDAY,
                "roo_STOP_WEDNESDAY" => $request->roo_STOP_WEDNESDAY,
                "roo_STOP_THURSDAY" => $request->roo_STOP_THURSDAY,
                "roo_STOP_FRIDAY" => $request->roo_STOP_FRIDAY,
                "roo_STOP_SATURDAY" => $request->roo_STOP_SATURDAY,
                "roo_STOP_SUNDAY" => $request->roo_STOP_SUNDAY,

                "roo_KWH_ADDRESS" => $request->roo_KWH_ADDRESS,
                "roo_POWER_ADDRESS" => $request->roo_POWER_ADDRESS,
                "roo_KWH_ADDRESS_AC" => $request->roo_KWH_ADDRESS_AC,
                "roo_POWER_ADDRESS_AC" => $request->roo_POWER_ADDRESS_AC,
                "roo_BLINKING_ADDRESS" => $request->roo_BLINKING_ADDRESS

            ]);

            Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Success');
            Session::put('popup_message', 'Room has been successfully updated.');

        } else {

           $check_name = DB::table('d3s3m_room')->where('roo_NAME', $request->NAME)->count('roo_ID');

            if( $check_name > 0 ){
                Session::put('popup_status', 1);
                Session::put('popup_type', 'error');
                Session::put('popup_title', 'Registration Failed');
                Session::put('popup_message', 'Please try again with another name because &nbsp; <strong>'.$request->roo_NAME.'</strong> &nbsp; is already registered.');

            } else {
                DB::table('d3s3m_room')->where('roo_ID', $request->currentID)->update([
                    "roo_NAME" => $request->NAME,
                    "roo_CAPACITY" => $request->CAPACITY,
                    "roo_KWH_STANDARD" => $request->KWH_STANDARD,
                    "roo_IS_ACTIVE" => $request->IS_ACTIVE,
                    "roo_DATE_MODIFIED" => date('Y-m-d H:i:s')
                ]);

                Session::put('popup_status', 1);
                Session::put('popup_type', 'success');
                Session::put('popup_title', 'Success');
                Session::put('popup_message', 'Room has been successfully updated.');
            } 

        }

        

    

        return redirect('/room/detail/'.$request->currentID);

    }

    public function DeleteRoom($id){

        DB::table('d3s3m_room')->where('roo_ID', $id)->delete();

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Delete Success');
        Session::put('popup_message', 'Room has been erased.');

        return redirect('/room/all');

    }

    public function force_on($id){

        $power_address = DB::table('d3s3m_room')->where('roo_ID', $id)->get();
        foreach( $power_address as $this_power_address ){
            
            DB::table('d3s3m_reset_command')->insert([
                "rc_roo_ID" => $id,
                "rc_POWER_ADDRESS" => $this_power_address->roo_POWER_ADDRESS,
                "rc_INT_COMMAND" => 1
            ]);
            DB::table('d3s3m_reset_command')->insert([
                "rc_roo_ID" => $id,
                "rc_POWER_ADDRESS" => $this_power_address->roo_POWER_ADDRESS_AC,
                "rc_INT_COMMAND" => 1
            ]);
            /*
            DB::table('d3s3m_reset_command')->insert([
                "rc_roo_ID" => $id,
                "rc_POWER_ADDRESS" => $this_power_address->roo_BLINKING_ADDRESS,
                "rc_INT_COMMAND" => 1
            ]);
            */

        }

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Reset Success');
        Session::put('popup_message', 'Room electricity, ac has been forced to turned on.');

        return redirect('/room/detail/'.$id);

    }

    public function force_off($id){

        $power_address = DB::table('d3s3m_room')->where('roo_ID', $id)->get();
        foreach( $power_address as $this_power_address ){
            
            DB::table('d3s3m_reset_command')->insert([
                "rc_roo_ID" => $id,
                "rc_POWER_ADDRESS" => $this_power_address->roo_POWER_ADDRESS,
                "rc_INT_COMMAND" => 0
            ]);
            DB::table('d3s3m_reset_command')->insert([
                "rc_roo_ID" => $id,
                "rc_POWER_ADDRESS" => $this_power_address->roo_POWER_ADDRESS_AC,
                "rc_INT_COMMAND" => 0
            ]);
            /*
            DB::table('d3s3m_reset_command')->insert([
                "rc_roo_ID" => $id,
                "rc_POWER_ADDRESS" => $this_power_address->roo_BLINKING_ADDRESS,
                "rc_INT_COMMAND" => 0
            ]);
            */

        }

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Reset Success');
        Session::put('popup_message', 'Room electricity, ac has been forced to turned off.');

        return redirect('/room/detail/'.$id);

    }
}

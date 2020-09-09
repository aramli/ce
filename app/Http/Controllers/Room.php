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

        return view('room.index', compact('json_table'));
    }

    public function add(){

        return view('room.add');
    }

    public function SaveNewRoom(Request $request){

        $check = DB::table('d3s3m_room')->where('roo_NAME', $request->NAME)->count('roo_ID');

        if( $check == 0 ){
            DB::table('d3s3m_room')->insert([
                "roo_NAME" => $request->NAME,
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
                "roo_DATE_MODIFIED" => date('Y-m-d H:i:s')
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
}

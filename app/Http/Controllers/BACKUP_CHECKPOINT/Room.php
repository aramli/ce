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

        $room = DB::select(DB::raw('
            select
                t1.ID as ID,
                t1.NAME as NAME,
                (select count(ID) from d3s3m_user where ID_COMPANY = t1.ID) as TOTAL_USER,
                (select count(ID) from d3s3m_user where ID_COMPANY = t1.ID and IS_ACTIVE = 1) as ACTIVE_USER
            from d3s3m_room t1
            '));

        return view('room.index', compact('room'));
    }

    public function add(){

        return view('room.add');
    }

    public function SaveNewRoom(Request $request){

        $check = DB::table('d3s3m_room')->where('NAME', $request->NAME)->count('ID');

        if( $check == 0 ){
            DB::table('d3s3m_room')->insert([
                "NAME" => $request->NAME,
                "CAPACITY" => $request->CAPACITY,
                "KWH_STANDARD" => $request->KWH_STANDARD,
                "IS_ACTIVE" => $request->IS_ACTIVE
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
            Session::put('popup_message', 'Please try again with another name because &nbsp; <strong>'.$request->NAME.'</strong> &nbsp; is already registered.');

            return redirect('/room/add');
        }

        

    }

    public function detail($id){

        $room = DB::table('d3s3m_room')->where('ID', $id)->get();

        return view('room.detail', compact('room'));
    }

    public function UpdateRoomDetail(Request $request){

        if( $request->currentName == $request->NAME ){

            DB::table('d3s3m_room')->where('ID', $request->currentID)->update([
                "CAPACITY" => $request->CAPACITY,
                "KWH_STANDARD" => $request->KWH_STANDARD,
                "IS_ACTIVE" => $request->IS_ACTIVE,
                "DATE_MODIFIED" => date('Y-m-d H:i:s')
            ]);

            Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Success');
            Session::put('popup_message', 'Room has been successfully updated.');

        } else {

           $check_name = DB::table('d3s3m_room')->where('NAME', $request->NAME)->count('ID');

            if( $check_name > 0 ){
                Session::put('popup_status', 1);
                Session::put('popup_type', 'error');
                Session::put('popup_title', 'Registration Failed');
                Session::put('popup_message', 'Please try again with another name because &nbsp; <strong>'.$request->NAME.'</strong> &nbsp; is already registered.');

            } else {
                DB::table('d3s3m_room')->where('ID', $request->currentID)->update([
                    "NAME" => $request->NAME,
                    "CAPACITY" => $request->CAPACITY,
                    "KWH_STANDARD" => $request->KWH_STANDARD,
                    "IS_ACTIVE" => $request->IS_ACTIVE,
                    "DATE_MODIFIED" => date('Y-m-d H:i:s')
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

        DB::table('d3s3m_room')->where('ID', $id)->delete();

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Delete Success');
        Session::put('popup_message', 'Room has been erased.');

        return redirect('/room/all');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class Division extends Controller
{
    public function index(){
    	$division = DB::table('d3s3m_division')->get();
        if( count($division) > 0 ){
            $json_table['ALL_REGISTERED_DIVISION'] = json_encode($division);
        } else {
            $json_table['ALL_REGISTERED_DIVISION'] = '{}';
        }

        /*
    	$division = DB::select(DB::raw('
    		select
    			t1.ID as ID,
    			t1.NAME as NAME,
    			(select count(ID) from d3s3m_user where ID_COMPANY = t1.ID) as TOTAL_USER,
    			(select count(ID) from d3s3m_user where ID_COMPANY = t1.ID and IS_ACTIVE = 1) as ACTIVE_USER
    		from d3s3m_division t1
            '));
        */

    	return view('division.index', compact('json_table'));
    }

    public function add(){

    	return view('division.add');
    }

    public function SaveNewDivision(Request $request){

        $check = DB::table('d3s3m_division')->where('div_NAME', $request->NAME)->count('div_ID');

        if( $check == 0 ){
            DB::table('d3s3m_division')->insert([
                "div_NAME" => $request->NAME
            ]);
            $new_id = DB::getPdo()->lastInsertId();

            Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Success');
            Session::put('popup_message', 'New division has been successfully registered to the system.');

            return redirect('/division/detail/'.$new_id);
        } else {
            Session::put('popup_status', 1);
            Session::put('popup_type', 'error');
            Session::put('popup_title', 'Registration Failed');
            Session::put('popup_message', 'Please try again with another name because &nbsp; <strong>'.$request->div_NAME.'</strong> &nbsp; is already registered.');

            return redirect('/division/add');
        }

        

    }

    public function detail($id){

    	$division = DB::table('d3s3m_division')->where('div_ID', $id)->get();

    	return view('division.detail', compact('division'));
    }

    public function UpdateDivisionDetail(Request $request){

		$check_name = DB::table('d3s3m_division')->where('div_NAME', $request->NAME)->count('div_ID');

		if( $check_name > 0 ){
			Session::put('popup_status', 1);
            Session::put('popup_type', 'error');
            Session::put('popup_title', 'Registration Failed');
            Session::put('popup_message', 'Please try again with another name because &nbsp; <strong>'.$request->div_NAME.'</strong> &nbsp; is already registered.');

		} else {
			DB::table('d3s3m_division')->where('div_ID', $request->currentID)->update([
                "div_NAME" => $request->NAME,
                "div_DATE_MODIFIED" => date('Y-m-d H:i:s')
            ]);

	        Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Success');
            Session::put('popup_message', 'Division has been successfully updated.');
		}

	

    	return redirect('/division/detail/'.$request->currentID);

    }

    public function DeleteDivision($id){

        DB::table('d3s3m_division')->where('div_ID', $id)->delete();

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Delete Success');
        Session::put('popup_message', 'Division has been erased.');

        return redirect('/division/all');

    }
}

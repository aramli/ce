<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class Category extends Controller
{
    public function index(){
    	$category = DB::table('d3s3m_category')->get();
        if( count($category) > 0 ){
            $json_table['ALL_REGISTERED_CATEGORY'] = json_encode($category);
        } else {
            $json_table['ALL_REGISTERED_CATEGORY'] = '{}';
        }

    	return view('category.index', compact('json_table'));
    }

    public function add(){

    	return view('category.add');
    }

    public function SaveNewCategory(Request $request){

        $check = DB::table('d3s3m_category')->where('cat_NAME', $request->NAME)->count('cat_ID');

        if( $check == 0 ){
            DB::table('d3s3m_category')->insert([
                "cat_NAME" => $request->NAME,
                "cat_TYPE" => $request->TYPE
            ]);
            $new_id = DB::getPdo()->lastInsertId();

            Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Success');
            Session::put('popup_message', 'New category has been successfully registered to the system.');

            return redirect('/category/detail/'.$new_id);
        } else {
            Session::put('popup_status', 1);
            Session::put('popup_type', 'error');
            Session::put('popup_title', 'Registration Failed');
            Session::put('popup_message', 'Please try again with another name because &nbsp; <strong>'.$request->cat_NAME.'</strong> &nbsp; is already registered.');

            return redirect('/category/add');
        }

        

    }

    public function detail($id){

    	$category = DB::table('d3s3m_category')->where('cat_ID', $id)->get();

    	return view('category.detail', compact('category'));
    }

    public function UpdateCategoryDetail(Request $request){

    	if( $request->currentName == $request->NAME ){
    		DB::table('d3s3m_category')->where('cat_ID', $request->currentID)->update([
                "cat_TYPE" => $request->TYPE,
                "cat_DATE_MODIFIED" => date('Y-m-d H:i:s')
            ]);

            Session::put('popup_status', 1);
            Session::put('popup_type', 'success');
            Session::put('popup_title', 'Success');
            Session::put('popup_message', 'Category has been successfully updated.');

    	} else {
    		$check_name = DB::table('d3s3m_category')->where('cat_NAME', $request->NAME)->count('cat_ID');

			if( $check_name > 0 ){
				Session::put('popup_status', 1);
	            Session::put('popup_type', 'error');
	            Session::put('popup_title', 'Registration Failed');
	            Session::put('popup_message', 'Please try again with another name because &nbsp; <strong>'.$request->cat_NAME.'</strong> &nbsp; is already registered.');

			} else {
				DB::table('d3s3m_category')->where('cat_ID', $request->currentID)->update([
	                "cat_NAME" => $request->NAME,
	                "cat_TYPE" => $request->TYPE,
	                "cat_DATE_MODIFIED" => date('Y-m-d H:i:s')
	            ]);

		        Session::put('popup_status', 1);
	            Session::put('popup_type', 'success');
	            Session::put('popup_title', 'Success');
	            Session::put('popup_message', 'Category has been successfully updated.');
			}
    	}

    	return redirect('/category/detail/'.$request->currentID);

    }

    public function DeleteCategory($id){

        DB::table('d3s3m_category')->where('cat_ID', $id)->delete();

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Delete Success');
        Session::put('popup_message', 'Category has been erased.');

        return redirect('/category/all');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class SystemSetting extends Controller
{
    public function index(){

        $system_setting = DB::table('d3s3m_system_setting')->get();
        foreach( $system_setting as $this_system_setting ){
            $array_system_setting[$this_system_setting->set_META_NAME] = $this_system_setting->set_META_VALUE;
        }

        return view('system_setting.index', compact('array_system_setting'));

    }

    public function UpdateSystemSetting(Request $request){

        DB::table('d3s3m_system_setting')->where('set_META_NAME', 'kwh_address_start')->update([
            "set_META_VALUE" => $request->kwh_address_start
        ]);
        DB::table('d3s3m_system_setting')->where('set_META_NAME', 'kwh_address_long')->update([
            "set_META_VALUE" => $request->kwh_address_long
        ]);
        DB::table('d3s3m_system_setting')->where('set_META_NAME', 'blinker_buffer_time')->update([
            "set_META_VALUE" => $request->blinker_buffer_time
        ]);
        DB::table('d3s3m_system_setting')->where('set_META_NAME', 'plc__ip')->update([
            "set_META_VALUE" => $request->plc__ip
        ]);
        DB::table('d3s3m_system_setting')->where('set_META_NAME', 'plc__port')->update([
            "set_META_VALUE" => $request->plc__port
        ]);

        Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Update Setting Success');
        Session::put('popup_message', 'Your system has been updated. Do not forget to restart reader module.');

        return redirect('/system_setting');


    }

}

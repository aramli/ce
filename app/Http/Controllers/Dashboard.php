<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class Dashboard extends Controller
{
    public function index(){

    	// EVENT CREATION
    	$report_data = DB::select(DB::raw("
    		select
    			t2.FULLNAME as 'ORGANIZER',
    			t3.NAME as 'COMPANY',
    			t4.NAME as 'DIVISION',
    			t5.NAME as 'CATEGORY',
    			t6.NAME as 'ROOM'
    		from d3s3m_event t1
    			left join d3s3m_user t2 on t2.ID = t1.ID_USER
    			left join d3s3m_company t3 on t3.ID = t2.ID_COMPANY
    			left join d3s3m_division t4 on t4.ID = t2.ID_DIVISION
    			left join d3s3m_category t5 on t5.ID = t1.ID_CATEGORY
    			left join d3s3m_room t6 on t6.ID = t1.ID_ROOM
    		where
    			t1.STATUS > 0
    		"));

    	$json_report = json_encode($report_data);

    	file_put_contents(base_path('public/SYSTEM/reporting/event__event_creation.json'), stripslashes($json_report));
    	// END EVENT CREATION


    	// OVER TARGET DURATION
    	$report_data = DB::select(DB::raw("
    		select
    			t2.FULLNAME as 'ORGANIZER',
    			t3.NAME as 'COMPANY',
    			t4.NAME as 'DIVISION',
    			t5.NAME as 'CATEGORY',
    			t6.NAME as 'ROOM',
    			t1.TITLE as 'EVENT TITLE',
    			t1.EVENT_START as 'EVENT_START',
    			t1.EVENT_FINISH as 'SCHEDULED FINISH',
    			t1.DATE_FINISH as 'ACTUAL FINISH',
    			TIMESTAMPDIFF(MINUTE, t1.EVENT_FINISH, t1.DATE_FINISH) as 'OVERTIME DURATION (Minute)'
    		from d3s3m_event t1
    			left join d3s3m_user t2 on t2.ID = t1.ID_USER
    			left join d3s3m_company t3 on t3.ID = t2.ID_COMPANY
    			left join d3s3m_division t4 on t4.ID = t2.ID_DIVISION
    			left join d3s3m_category t5 on t5.ID = t1.ID_CATEGORY
    			left join d3s3m_room t6 on t6.ID = t1.ID_ROOM
    		where
    			t1.STATUS = 4
    		"));

    	$json_report = json_encode($report_data);

    	file_put_contents(base_path('public/SYSTEM/reporting/event__over_target_duration.json'), stripslashes($json_report));
    	// END OVER TARGET DURATION


    	// ENERGY CONSUMPTION
    	$report_data = DB::select(DB::raw("
            select
                t2.FULLNAME as 'ORGANIZER',
                t3.NAME as 'COMPANY',
                t4.NAME as 'DIVISION',
                t5.NAME as 'CATEGORY',
                t6.NAME as 'ROOM',
                t1.TITLE as 'EVENT TITLE',
                t1.EVENT_START as 'EVENT_START',
                t1.EVENT_FINISH as 'SCHEDULED FINISH',
                t1.DATE_FINISH as 'ACTUAL FINISH',
                t7.KWH_CONSUMPTION as 'ENERGY CONSUMPTION (kWh)'
            from d3s3m_event t1
                left join d3s3m_user t2 on t2.ID = t1.ID_USER
                left join d3s3m_company t3 on t3.ID = t2.ID_COMPANY
                left join d3s3m_division t4 on t4.ID = t2.ID_DIVISION
                left join d3s3m_category t5 on t5.ID = t1.ID_CATEGORY
                left join d3s3m_room t6 on t6.ID = t1.ID_ROOM
                left join d3s3m_energy_log t7 on t1.ID = t7.ID_EVENT
            where
                (
                t1.STATUS = 2
                or t1.STATUS = 4
                )
            "));

        $json_report = json_encode($report_data);

        file_put_contents(base_path('public/SYSTEM/reporting/energy__energy_consumption_rank.json'), stripslashes($json_report));
    	// END ENERGY CONSUMPTION

    	return view('dashboard.index');
    }
}

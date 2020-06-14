<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;
use Storage;

class Report extends Controller
{
    public function event_creation(){

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

    	file_put_contents(base_path('/public/SYSTEM/reporting/event__event_creation.json'), stripslashes($json_report));

    	return view('report.event__event_creation');

    }

    public function over_target_duration(){

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

    	file_put_contents(base_path('/public/SYSTEM/reporting/event__over_target_duration.json'), stripslashes($json_report));

    	return view('report.event__over_target_duration');

    }

    public function today_energy_consumption(){

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
                and DATE(t1.EVENT_START) = '".date('Y-m-d')."'
            "));

        $json_report = json_encode($report_data);

        file_put_contents(base_path('/public/SYSTEM/reporting/energy__today_energy_consumption.json'), stripslashes($json_report));

        return view('report.energy__today_energy_consumption');

    }

    public function energy_consumption_rank(){

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

        file_put_contents(base_path('/public/SYSTEM/reporting/energy__energy_consumption_rank.json'), stripslashes($json_report));

        return view('report.energy__energy_consumption_rank');

    }

    public function over_consumption_event(){

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
                FORMAT(t7.KWH_CONSUMPTION/1000,2) as 'ENERGY CONSUMPTION (kWh)',
                (
                    TIMESTAMPDIFF(HOUR, t1.EVENT_INITIATION, t1.EVENT_FINISH) * t6.KWH_STANDARD
                ) as 'FORECAST CONSUMPTION (kWh)'
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
                    OR t1.STATUS = 4
                )
                AND DATE(t1.EVENT_START) = '".date('Y-m-d')."'
                AND 'ENERGY CONSUMPTION (kWh)' > 'FORECAST CONSUMPTION (kWh)'
            "));

        $json_report = json_encode($report_data);

        file_put_contents(base_path('/public/SYSTEM/reporting/energy__over_consumption_event.json'), stripslashes($json_report));

        return view('report.energy__over_consumption_event');        

    }
}

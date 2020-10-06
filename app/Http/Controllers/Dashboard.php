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
				use_FULLNAME as 'ORGANIZER',
    			com_NAME as 'COMPANY',
    			div_NAME as 'DIVISION',
    			cat_NAME as 'TRAINING PACKAGE',
				roo_NAME as 'ROOM',
				eve_EVENT_START as 'DATE'
    		from d3s3m_event
    			left join d3s3m_user on use_ID = eve_d3s3m_user_use_ID
    			left join d3s3m_company on com_ID = use_d3s3m_company_com_ID
    			left join d3s3m_division on div_ID = use_d3s3m_division_div_ID
    			left join d3s3m_category on cat_ID = eve_d3s3m_category_cat_ID
    			left join d3s3m_room on roo_ID = eve_d3s3m_room_roo_ID
    		where
				eve_STATUS = 4
			"));
		$json_report = json_encode($report_data);
		$json_event_creation = json_encode($report_data);

    	file_put_contents(base_path('public/SYSTEM/reporting/event__event_creation.json'), stripslashes($json_report));
    	// END EVENT CREATION


    	// OVER TARGET DURATION
    	$report_data = DB::select(DB::raw("
    		select
				use_FULLNAME as 'ORGANIZER',
				com_NAME as 'COMPANY',
				div_NAME as 'DIVISION',
				cat_NAME as 'CATEGORY',
				roo_NAME as 'ROOM',
    			eve_TITLE as 'EVENT TITLE',
    			eve_EVENT_START as 'EVENT_START',
    			eve_EVENT_FINISH as 'SCHEDULED FINISH',
    			eve_DATE_FINISH as 'ACTUAL FINISH',
    			TIMESTAMPDIFF(MINUTE, eve_EVENT_FINISH, eve_DATE_FINISH) as 'OVERTIME DURATION (Minute)'
    		from d3s3m_event
				left join d3s3m_user on use_ID = eve_d3s3m_user_use_ID
				left join d3s3m_company on com_ID = use_d3s3m_company_com_ID
				left join d3s3m_division on div_ID = use_d3s3m_division_div_ID
				left join d3s3m_category on cat_ID = eve_d3s3m_category_cat_ID
				left join d3s3m_room on roo_ID = eve_d3s3m_room_roo_ID
			where
				eve_STATUS = 4
    		"));

    	$json_report = json_encode($report_data);

    	file_put_contents(base_path('public/SYSTEM/reporting/event__over_target_duration.json'), stripslashes($json_report));
    	// END OVER TARGET DURATION


		// ENERGY CONSUMPTION
    	$report_data = DB::select(DB::raw("
            select
				use_FULLNAME as 'ORGANIZER',
				com_NAME as 'COMPANY',
				div_NAME as 'DIVISION',
				cat_NAME as 'CATEGORY',
                roo_NAME as 'ROOM',
                eve_TITLE as 'EVENT TITLE',
                eve_EVENT_START as 'EVENT_START',
                eve_EVENT_FINISH as 'SCHEDULED FINISH',
                eve_DATE_FINISH as 'ACTUAL FINISH',
                (RAND()*10) as 'ENERGY CONSUMPTION (kWh)'
            from d3s3m_event
				left join d3s3m_user on use_ID = eve_d3s3m_user_use_ID
				left join d3s3m_company on com_ID = use_d3s3m_company_com_ID
				left join d3s3m_division on div_ID = use_d3s3m_division_div_ID
				left join d3s3m_category on cat_ID = eve_d3s3m_category_cat_ID
				left join d3s3m_room on roo_ID = eve_d3s3m_room_roo_ID
            where
                eve_STATUS = 4
            "));

		$json_report = json_encode($report_data);
		
		// $json_report = json_encode('{}');

        file_put_contents(base_path('public/SYSTEM/reporting/energy__energy_consumption_rank.json'), stripslashes($json_report));
		// END ENERGY CONSUMPTION
		
		$json_table[''] = '{}';

    	return view('dashboard.index', compact('json_event_creation'));
    }
}

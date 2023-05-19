<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class Dashboard extends Controller
{
    public function index(){

		/*
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
		*/

		return redirect('/dashboard/category');

	}
	
	public function TemplateGenerator($dashboard_name){

		$dashboard_name = $dashboard_name;

		if( $dashboard_name == 'category' ){
			$query_dashboard = "
			select
				cat_NAME as 'CATEGORY NAME',

				eve_TITLE as 'EVENT TITLE',
				eve_EVENT_PREPARATION as 'EVENT PREPARATION IN MINUTE',
				eve_EVENT_INITIATION as 'EVENT INITIATION',
				eve_EVENT_START as 'EVENT START',
				eve_EVENT_FINISH as 'EVENT FINISH',
				eve_DATE_START as 'ACTUAL START TIME',
				eve_DATE_FINISH as 'ACTUAL FINISH TIME',
				TIME_TO_SEC((TIMEDIFF(eve_DATE_FINISH, eve_DATE_START)))/60 as 'EVENT DURATION IN MINUTE',
				eve_ENERGY_CONSUMPTION as 'ENERGY CONSUMPTION IN KWH',
				
				use_FULLNAME as 'ORGANIZER',

				roo_NAME as 'ROOM NAME'

			from d3s3m_category
				left join d3s3m_event on eve_d3s3m_category_cat_ID = cat_ID
				left join d3s3m_user on eve_d3s3m_user_use_ID = use_ID
				left join d3s3m_room on eve_d3s3m_room_roo_ID = roo_ID
			where
				eve_STATUS = 4
			";
		} else if( $dashboard_name == 'event' ){
			$query_dashboard = "
			select

				eve_TITLE as 'EVENT TITLE',
				eve_EVENT_PREPARATION as 'EVENT PREPARATION IN MINUTE',
				eve_EVENT_INITIATION as 'EVENT INITIATION',
				eve_EVENT_START as 'EVENT START',
				eve_EVENT_FINISH as 'EVENT FINISH',
				eve_DATE_START as 'ACTUAL START TIME',
				eve_DATE_FINISH as 'ACTUAL FINISH TIME',
				TIME_TO_SEC((TIMEDIFF(eve_DATE_FINISH, eve_DATE_START)))/60 as 'EVENT DURATION IN MINUTE',
				eve_ENERGY_CONSUMPTION as 'ENERGY CONSUMPTION IN KWH',

				use_FULLNAME as 'ORGANIZER NAME',
				use_EMAIL as 'ORGANIZER EMAIL',

				cat_NAME as 'CATEGORY NAME',

				roo_NAME as 'ROOM NAME'

			from d3s3m_event
				left join d3s3m_category on eve_d3s3m_category_cat_ID = cat_ID
				left join d3s3m_user on eve_d3s3m_user_use_ID = use_ID
				left join d3s3m_room on eve_d3s3m_room_roo_ID = roo_ID
			where
				eve_STATUS = 4
			";
		} else if( $dashboard_name == 'room' ){
			$query_dashboard = "
			select

				roo_NAME as 'ROOM NAME',
				roo_CAPACITY as 'ROOM CAPACITY IN PERSON',
				roo_KWH_STANDARD as 'KWH STANDARD',

				eve_TITLE as 'EVENT TITLE',
				eve_EVENT_PREPARATION as 'EVENT PREPARATION IN MINUTE',
				eve_EVENT_INITIATION as 'EVENT INITIATION',
				eve_EVENT_START as 'EVENT START',
				eve_EVENT_FINISH as 'EVENT FINISH',
				eve_DATE_START as 'ACTUAL START TIME',
				eve_DATE_FINISH as 'ACTUAL FINISH TIME',
				TIME_TO_SEC((TIMEDIFF(eve_DATE_FINISH, eve_DATE_START)))/60 as 'EVENT DURATION IN MINUTE',
				eve_ENERGY_CONSUMPTION as 'ENERGY CONSUMPTION IN KWH',

				use_FULLNAME as 'ORGANIZER NAME',
				use_EMAIL as 'ORGANIZER EMAIL',

				cat_NAME as 'CATEGORY NAME'

			from d3s3m_room
				left join d3s3m_event on eve_d3s3m_room_roo_ID = roo_ID
				left join d3s3m_user on use_ID = eve_d3s3m_user_use_ID
				left join d3s3m_category on eve_d3s3m_category_cat_ID = cat_ID
			where
				eve_STATUS = 4
			";
		} else if( $dashboard_name == 'user' ){
			$query_dashboard = "
			select

				use_FULLNAME as 'USER NAME',
				use_EMAIL as 'USER EMAIL',
				rol_NAME as 'ROLE',
				use_TRAINING_TARGET as 'TRAINING TARGET MONTHLY',

				eve_TITLE as 'EVENT TITLE',
				eve_EVENT_PREPARATION as 'EVENT PREPARATION IN MINUTE',
				eve_EVENT_INITIATION as 'EVENT INITIATION',
				eve_EVENT_START as 'EVENT START',
				eve_EVENT_FINISH as 'EVENT FINISH',
				eve_DATE_START as 'ACTUAL START TIME',
				eve_DATE_FINISH as 'ACTUAL FINISH TIME',
				TIME_TO_SEC((TIMEDIFF(eve_DATE_FINISH, eve_DATE_START)))/60 as 'EVENT DURATION IN MINUTE',
				eve_ENERGY_CONSUMPTION as 'ENERGY CONSUMPTION IN KWH',

				cat_NAME as 'CATEGORY NAME',

				roo_NAME as 'ROOM NAME'

			from d3s3m_user
				left join d3s3m_role on use_d3s3m_role_rol_ID = rol_ID
				left join d3s3m_event on eve_d3s3m_user_use_ID = use_ID
				left join d3s3m_category on eve_d3s3m_category_cat_ID = cat_ID
				left join d3s3m_room on eve_d3s3m_room_roo_ID = roo_ID
			where
				eve_STATUS = 4
			";
		}

		$result_dashboard = DB::select(DB::raw($query_dashboard));
		$json_report = json_encode($result_dashboard);

		// print_r($json_report);exit;

		return view('dashboard._template_generator', compact('dashboard_name', 'json_report'));

	}

	public function AddNewDashboardItem(Request $request){

		if( $file = $request->file('json_file') ){
			
			$file = $request->file('json_file');
			$tujuan_upload = 'UPLOAD/dashboard_json_file';
			$file->move($tujuan_upload,$file->getClientOriginalName());

			/*
			$path = asset('UPLOAD/dashboard_json_file/'.$file->getClientOriginalName());
			// echo $path;exit;
			
			$arrContextOptions=array(
				"ssl"=>array(
					"cafile" => "C:/xampp/htdocs/DISMI/public/MBS/myCA.pem",
					"verify_peer"=>false,
					"verify_peer_name"=>false,
				),
			);  
			// $json = json_decode(file_get_contents($path), true);
			// $json = json_decode( file_get_contents($path), false, stream_context_create($arrContextOptions) );
			
			$ch = curl_init();
			$timeout = 5;
			curl_setopt($ch,CURLOPT_URL,$path);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
			$data = curl_exec($ch);
			curl_close($ch);
			// print_r($data);exit;
			// return $data;exit;
			$json = json_decode($data);
			*/
			
			$path = "C:/xampp/htdocs/DISMI/public/UPLOAD/dashboard_json_file/".$file->getClientOriginalName(); // ie: /var/www/laravel/app/storage/json/filename.json
			$json = json_decode(file_get_contents($path), true); 
			//print_r($json);exit;
			  
			
			$slice_configuration = $json['slice'];
			//print_r($slice_configuration);exit;
			$final_slice_content = json_encode($slice_configuration);
			

			$data_source = $request->select_data_source;
			$dashboard_title = $request->dashboard_title;

			DB::table('d3s3m_dashboard_setting')->insert([
				"dc_TYPE" => $data_source,
				"dc_TITLE" => $dashboard_title,
				"dc_JSON" => $final_slice_content,
				"dc_DATE_CREATED" => date('Y-m-d H:i:s')
			]);

		}

		return redirect('/dashboard/'.$data_source);

	}

	public function DisplayDashboardByType($dashboard_name){

		$dashboard_name = $dashboard_name;

		if( $dashboard_name == 'category' ){
			$query_dashboard = "
			select
				cat_NAME as 'CATEGORY NAME',

				eve_TITLE as 'EVENT TITLE',
				eve_EVENT_PREPARATION as 'EVENT PREPARATION IN MINUTE',
				eve_EVENT_INITIATION as 'EVENT INITIATION',
				eve_EVENT_START as 'EVENT START',
				eve_EVENT_FINISH as 'EVENT FINISH',
				eve_DATE_START as 'ACTUAL START TIME',
				eve_DATE_FINISH as 'ACTUAL FINISH TIME',
				TIME_TO_SEC((TIMEDIFF(eve_DATE_FINISH, eve_DATE_START)))/60 as 'EVENT DURATION IN MINUTE',
				eve_ENERGY_CONSUMPTION as 'ENERGY CONSUMPTION IN KWH',
				
				use_FULLNAME as 'ORGANIZER',

				roo_NAME as 'ROOM NAME'

			from d3s3m_category
				left join d3s3m_event on eve_d3s3m_category_cat_ID = cat_ID
				left join d3s3m_user on eve_d3s3m_user_use_ID = use_ID
				left join d3s3m_room on eve_d3s3m_room_roo_ID = roo_ID
			where
				eve_STATUS = 4
			";
		} else if( $dashboard_name == 'event' ){
			$query_dashboard = "
			select

				eve_TITLE as 'EVENT TITLE',
				eve_EVENT_PREPARATION as 'EVENT PREPARATION IN MINUTE',
				eve_EVENT_INITIATION as 'EVENT INITIATION',
				eve_EVENT_START as 'EVENT START',
				eve_EVENT_FINISH as 'EVENT FINISH',
				eve_DATE_START as 'ACTUAL START TIME',
				eve_DATE_FINISH as 'ACTUAL FINISH TIME',
				TIME_TO_SEC((TIMEDIFF(eve_DATE_FINISH, eve_DATE_START)))/60 as 'EVENT DURATION IN MINUTE',
				eve_ENERGY_CONSUMPTION as 'ENERGY CONSUMPTION IN KWH',

				use_FULLNAME as 'ORGANIZER NAME',
				use_EMAIL as 'ORGANIZER EMAIL',

				cat_NAME as 'CATEGORY NAME',

				roo_NAME as 'ROOM NAME'

			from d3s3m_event
				left join d3s3m_category on eve_d3s3m_category_cat_ID = cat_ID
				left join d3s3m_user on eve_d3s3m_user_use_ID = use_ID
				left join d3s3m_room on eve_d3s3m_room_roo_ID = roo_ID
			where
				eve_STATUS = 4
			";
		} else if( $dashboard_name == 'room' ){
			$query_dashboard = "
			select

				roo_NAME as 'ROOM NAME',
				roo_CAPACITY as 'ROOM CAPACITY IN PERSON',
				roo_KWH_STANDARD as 'KWH STANDARD',

				eve_TITLE as 'EVENT TITLE',
				eve_EVENT_PREPARATION as 'EVENT PREPARATION IN MINUTE',
				eve_EVENT_INITIATION as 'EVENT INITIATION',
				eve_EVENT_START as 'EVENT START',
				eve_EVENT_FINISH as 'EVENT FINISH',
				eve_DATE_START as 'ACTUAL START TIME',
				eve_DATE_FINISH as 'ACTUAL FINISH TIME',
				TIME_TO_SEC((TIMEDIFF(eve_DATE_FINISH, eve_DATE_START)))/60 as 'EVENT DURATION IN MINUTE',
				eve_ENERGY_CONSUMPTION as 'ENERGY CONSUMPTION IN KWH',

				use_FULLNAME as 'ORGANIZER NAME',
				use_EMAIL as 'ORGANIZER EMAIL',

				cat_NAME as 'CATEGORY NAME'

			from d3s3m_room
				left join d3s3m_event on eve_d3s3m_room_roo_ID = roo_ID
				left join d3s3m_user on use_ID = eve_d3s3m_user_use_ID
				left join d3s3m_category on eve_d3s3m_category_cat_ID = cat_ID
			where
				eve_STATUS = 4
			";
		} else if( $dashboard_name == 'user' ){
			$query_dashboard = "
			select

				use_FULLNAME as 'USER NAME',
				use_EMAIL as 'USER EMAIL',
				rol_NAME as 'ROLE',
				use_TRAINING_TARGET as 'TRAINING TARGET MONTHLY',

				eve_TITLE as 'EVENT TITLE',
				eve_EVENT_PREPARATION as 'EVENT PREPARATION IN MINUTE',
				eve_EVENT_INITIATION as 'EVENT INITIATION',
				eve_EVENT_START as 'EVENT START',
				eve_EVENT_FINISH as 'EVENT FINISH',
				eve_DATE_START as 'ACTUAL START TIME',
				eve_DATE_FINISH as 'ACTUAL FINISH TIME',
				TIME_TO_SEC((TIMEDIFF(eve_DATE_FINISH, eve_DATE_START)))/60 as 'EVENT DURATION IN MINUTE',
				eve_ENERGY_CONSUMPTION as 'ENERGY CONSUMPTION IN KWH',

				cat_NAME as 'CATEGORY NAME',

				roo_NAME as 'ROOM NAME'

			from d3s3m_user
				left join d3s3m_role on use_d3s3m_role_rol_ID = rol_ID
				left join d3s3m_event on eve_d3s3m_user_use_ID = use_ID
				left join d3s3m_category on eve_d3s3m_category_cat_ID = cat_ID
				left join d3s3m_room on eve_d3s3m_room_roo_ID = roo_ID
			where
				eve_STATUS = 4
			";
		}

		$result_dashboard = DB::select(DB::raw($query_dashboard));
		$json_report = json_encode($result_dashboard);

		// print_r($json_report);exit;

		$dashboard_list = DB::table('d3s3m_dashboard_setting')->where('dc_TYPE', $dashboard_name)->get();

		return view('dashboard.index', compact('dashboard_name', 'json_report', 'dashboard_list'));

	}
	
	public function DeleteDashboard($id, $dashboard_name){
		
		DB::table('d3s3m_dashboard_setting')->where('dc_ID', $id)->delete();
		
		Session::put('popup_status', 1);
        Session::put('popup_type', 'success');
        Session::put('popup_title', 'Dashboard Widget Delete Success');
        Session::put('popup_message', 'Dashboard widget has been successfully removed.');
		
		return redirect('/dashboard/'.$dashboard_name);
		
	}

}

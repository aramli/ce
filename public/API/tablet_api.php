<?php
include('_general_setting.php');

if( $_POST['module'] == "RetrieveEventInfo" ){

	$event_parameter['ID_ROOM'] = $_POST['idroom'];
	// $event_parameter['CURRENT_DATE_TIME'] = $_POST['curdatetime'];
	$event_parameter['CURRENT_DATE_TIME'] = date('Y-m-d H:i:s');

	/*
	*
	* EVENT OVERVIEW 
	*
	*/
	// GET OVERALL INFO
	$function_GetEventByDatetimeAndIDRoom = GetEventByDatetimeAndIDRoom($event_parameter);
	$json['ID'] = $function_GetEventByDatetimeAndIDRoom['ID'][0];
	$json['TITLE'] = $function_GetEventByDatetimeAndIDRoom['TITLE'][0];
	$json['EVENT_START'] = $function_GetEventByDatetimeAndIDRoom['EVENT_START'][0];
	
	// DISPLAY EVENT START
	$timestamp = $function_GetEventByDatetimeAndIDRoom['EVENT_START'][0];
	$json['DISPLAY_EVENT_START'] = date("F jS, Y", strtotime($timestamp)).' '.substr($function_GetEventByDatetimeAndIDRoom['EVENT_START'][0],11,5).' - '.substr($function_GetEventByDatetimeAndIDRoom['EVENT_FINISH'][0],11,5);
	$json['COUNTER_EVENT_START'] = date("F jS, Y", strtotime($timestamp)).' '.substr($function_GetEventByDatetimeAndIDRoom['EVENT_START'][0],11,5);
	$json['COUNTER_EVENT_FINISH'] = date("F jS, Y", strtotime($timestamp)).' '.substr($function_GetEventByDatetimeAndIDRoom['EVENT_FINISH'][0],11,5);




	$json['EVENT_FINISH'] = $function_GetEventByDatetimeAndIDRoom['EVENT_FINISH'][0];
	$json['IS_EXTENDED'] = $function_GetEventByDatetimeAndIDRoom['IS_EXTENDED'][0];
	
	// DISPLAY SUMMARY AND DESCRIPTION
	$json['SUMMARY'] = $function_GetEventByDatetimeAndIDRoom['SUMMARY'][0];
	$json['DESCRIPTION'] = $function_GetEventByDatetimeAndIDRoom['DESCRIPTION'][0];

	// GET CATEGORY
	$category_parameter['ID'] = $function_GetEventByDatetimeAndIDRoom['ID_CATEGORY'][0];
	$function_GetCategoryByID = GetCategoryByID($category_parameter);
	$json['CATEGORY'] = $function_GetCategoryByID['NAME'][0];
	
	// GET ORGANIZER
	$user_parameter['ID'] = $function_GetEventByDatetimeAndIDRoom['ID_USER'][0];
	$function_GetUserByID = GetUserByID($user_parameter);
	$json['ORGANIZER'] = $function_GetUserByID['FULLNAME'][0];

	//GET ENERGY CONSUMPTION
	$energy_parameter['ID'] = $function_GetEventByDatetimeAndIDRoom['ID'][0];
	$function_GetActualEnergyConsumptionByEventID = GetActualEnergyConsumptionByEventID($energy_parameter);
	$json['TOTAL_ACTUAL_ENERGY_CONSUMPTION'] = number_format($function_GetActualEnergyConsumptionByEventID['TOTAL_ACTUAL_ENERGY_CONSUMPTION'],2,".",","); 
	
	$datetime1 = new DateTime($json['EVENT_START']);
	$datetime2 = new DateTime(date('Y-m-d H:i:s'));
	$interval = $datetime1->diff($datetime2);
	$json['DURATION'] = $interval->format('%h')." Hr ".$interval->format('%i')." min";
	
	$function_GetForecastEnergyConsumptionByEventID = GetForecastEnergyConsumptionByEventID($energy_parameter);
	$json['TOTAL_FORECAST_ENERGY_CONSUMPTION'] = number_format($function_GetForecastEnergyConsumptionByEventID['TOTAL_FORECAST_ENERGY_CONSUMPTION'],0,"",".");
	
	// echo json_encode($json);
	
	// PIE CHART RADIUS
	if( $function_GetActualEnergyConsumptionByEventID['TOTAL_ACTUAL_ENERGY_CONSUMPTION'] < $function_GetForecastEnergyConsumptionByEventID['TOTAL_FORECAST_ENERGY_CONSUMPTION'] ){
		
		if( $function_GetActualEnergyConsumptionByEventID['TOTAL_ACTUAL_ENERGY_CONSUMPTION'] == 0 || $function_GetForecastEnergyConsumptionByEventID['TOTAL_FORECAST_ENERGY_CONSUMPTION'] == 0  ){
			$json['RADIUS_ACTUAL_PERCENTAGE'] = 0;
		} else {
			$json['RADIUS_ACTUAL_PERCENTAGE'] = $function_GetActualEnergyConsumptionByEventID['TOTAL_ACTUAL_ENERGY_CONSUMPTION'] / $function_GetForecastEnergyConsumptionByEventID['TOTAL_FORECAST_ENERGY_CONSUMPTION']*100;
		}
		
		$json['RADIUS_FORECAST_PERCENTAGE'] = 100 - $json['RADIUS_ACTUAL_PERCENTAGE'];
		$json['DISPLAY_PIE_CHART_TOTAL_PERCENTAGE'] = number_format($function_GetActualEnergyConsumptionByEventID['TOTAL_ACTUAL_ENERGY_CONSUMPTION'] / $function_GetForecastEnergyConsumptionByEventID['TOTAL_FORECAST_ENERGY_CONSUMPTION']*100,0,"",".").'%';
	} else {
		$json['RADIUS_ACTUAL_PERCENTAGE'] = 100;
		$json['RADIUS_FORECAST_PERCENTAGE'] = 0;
		$json['DISPLAY_PIE_CHART_TOTAL_PERCENTAGE'] = 'OVER';
	}
	
	
	// GET ATTENDEES LIST
	$attendee_parameter['ID_EVENT'] = $function_GetEventByDatetimeAndIDRoom['ID'][0];
	$function_GetAllAttendeeByEventID = GetAllAttendeeByEventID($attendee_parameter);
	
	for( $i=0;$i<$function_GetAllAttendeeByEventID['TOTAL_ROW'];$i++ ){
		
		$user_parameter['ID'] = $function_GetAllAttendeeByEventID['ID_USER'][$i];
		$function_GetUserByID = GetUserByID($user_parameter);
		
		$company_parameter['ID'] = $function_GetUserByID['ID_COMPANY'][0];
		$function_GetCompanyByID = GetCompanyByID($company_parameter);
		
		$division_parameter['ID'] = $function_GetUserByID['ID_DIVISION'][0];
		$function_GetDivisionByID = GetDivisionByID($division_parameter);
		
		if( $function_GetAllAttendeeByEventID['IS_ATTEND'][$i] == 1 ){
			$display_status = "Attend";
			$display_checkin_date = $function_GetAllAttendeeByEventID['DATE_ATTEND'][$i];
		} else {
			$display_status = "Waiting";
			$display_checkin_date = '-';
		}
		
		$json['ATTENDEE_LIST'] .=
		'
		<tr>
			<th scope="row">'.($i+1).'</th>
			<td>'.$function_GetUserByID['FULLNAME'][0].'</td>
			<!--<td>'.$function_GetUserByID['EMAIL'][0].'</td>-->
			<td>'.$function_GetDivisionByID['NAME'][0].'</td>
			<td>'.$function_GetCompanyByID['NAME'][0].'</td>
			<td>'.$display_status.'</td>
			<td>'.$display_checkin_date.'</td>
		</tr>
		';

		$json['NUMBER_OF_ATTENDEE'] += $function_GetAllAttendeeByEventID['IS_ATTEND'][$i];
		
	}
	$json['NUMBER_OF_PARTICIPANT'] = $function_GetAllAttendeeByEventID['TOTAL_ROW'];
	
	
	
	
	
	
	
	
	// ROOM OVERVIEW
	
	$room_parameter['ID'] = $event_parameter['ID_ROOM'];
	$function_GetRoomByID = GetRoomByID($room_parameter);
	
	$json['MEETING_ROOM_NAME'] = $function_GetRoomByID['NAME'][0];
	$json['ROOM_CAPACITY'] = number_format($function_GetRoomByID['CAPACITY'][0],0,"",".");
	$json['STANDARD_KWH'] = number_format($function_GetRoomByID['KWH_STANDARD'][0],0,"",".");
	
	$function_GetNextEventByDatetimeAndIDRoom = GetNextEventByDatetimeAndIDRoom($event_parameter);
	
	if( $function_GetNextEventByDatetimeAndIDRoom['EVENT_START'][0] != '' ){
		$timestamp = $function_GetNextEventByDatetimeAndIDRoom['EVENT_START'][0];
		$json['NEXT_MEETING_SCHEDULE'] = date("F jS, Y", strtotime($timestamp)).' '.substr($function_GetNextEventByDatetimeAndIDRoom['EVENT_START'][0],11,5);	
	} else {
		$json['NEXT_MEETING_SCHEDULE'] = "Unscheduled";
	}
	
	
	
	$json['NEXT_MEETING_TITLE'] = $function_GetNextEventByDatetimeAndIDRoom['TITLE'][0];

	$next_organizer_parameter['ID'] = $function_GetNextEventByDatetimeAndIDRoom['ID_USER'][0];
	$function_GetUserByID = GetUserByID($next_organizer_parameter);
	$json['NEXT_MEETING_ORGANIZER'] = $function_GetUserByID['FULLNAME'][0];
	
	
	


	/*
	*
	* FINAL RESULT 
	*
	*/
	if( $function_GetEventByDatetimeAndIDRoom['TOTAL_ROW'] > 0 ){
		$json['IS_IDLE'] = 0;	
	} else {
		$json['IS_IDLE'] = 1;	
	}
	
	
		
	
	/*
	*
	* FINAL RESULT 
	*
	*/
	$json['result'] = 1;
	$json['message'] = 'connected';
	
	echo json_encode($json);

}

?>

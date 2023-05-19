<?php
include('_general_setting.php');
header('Access-Control-Allow-Origin: *');
if( $_POST['module'] == "GetUserRecentEvent" ){

	$id_user = $_POST['ID_USER'];
	
	$query = "select * from d3s3m_event where eve_d3s3m_user_use_ID = '".$id_user."' and (eve_STATUS = 2 OR eve_STATUS = 4) order by eve_EVENT_START DESC ";
	$result = $db->query($query);
	$num = $result->num_rows;
	
	$json['DISPLAY_RECENT_EVENT'] = '';
	for( $i=0;$i<$num;$i++ ){
		
		$row = $result->fetch_assoc();
		
		$json['DISPLAY_RECENT_EVENT'] .= '
		<!--begin::Item-->
		<div class="d-flex align-items-center bg-light-warning rounded p-5 gutter-b">
			<span class="svg-icon svg-icon-warning mr-5">
				<span class="svg-icon svg-icon-lg">
					<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
							<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
						</g>
					</svg>
					<!--end::Svg Icon-->
				</span>
			</span>
			<div class="d-flex flex-column flex-grow-1 mr-2">
				<a  class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">'.$row['eve_TITLE'].'</a>
				<span class="text-muted font-size-sm">Event Date: '.$row['eve_EVENT_START'].'</span>
			</div>
		</div>
		<!--end::Item-->
		';
	}


	echo json_encode($json);
	
}

if( $_POST['module'] == "GetAllUpcomingEvent" ){

	$query = "
	select 
		* 
	from d3s3m_event 
	where 
		eve_STATUS = 4 
		and eve_EVENT_START >= '".date('Y-m-d H:i:s')."' 
		order by eve_EVENT_START DESC 
	";
	$result = $db->query($query);
	$num = $result->num_rows;
	
	$json['DISPLAY_UPCOMING_EVENT'] = '';

	if( $num > 0 ){
		
		for( $i=0;$i<$num;$i++ ){
			
			$row = $result->fetch_assoc();
			
			$json['DISPLAY_UPCOMING_EVENT'] .= '

			<!--begin::Item-->
			<div class="d-flex align-items-center mb-10">
				<!--begin::Symbol-->
				<div class="symbol symbol-40 symbol-light-primary mr-5">
					<span class="symbol-label">
						<span class="svg-icon svg-icon-lg svg-icon-primary">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
									<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Text-->
				<div class="d-flex flex-column font-weight-bold">
					<a  class="text-dark text-hover-primary mb-1 font-size-lg">'.$row['eve_TITLE'].'</a>
					<span class="text-muted">'.$row['eve_EVENT_START'].'</span>
				</div>
				<!--end::Text-->
			</div>
			<!--end::Item-->
			';
		}
	} else {
		$json['DISPLAY_UPCOMING_EVENT'] = 'There are no upcoming events.';
	}


	echo json_encode($json);

}

if( $_POST['module'] == "GetOngoingEvent" ){

	$id_user = $_POST['ID_USER'];

	$query = "
		select 
			* 
		from d3s3m_event 
		where 
			eve_d3s3m_user_use_ID = '".$id_user."' 
			and 
			(
				eve_STATUS = 2
				and eve_EVENT_START <= '".date('Y-m-d H:i:s')."'
				and eve_EVENT_FINISH >= '".date('Y-m-d H:i:s')."'
				and eve_IS_FINISH is null
			)
			OR
			(
				eve_STATUS = 6
				and eve_EVENT_START <= '".date('Y-m-d H:i:s')."'
				and eve_IS_FINISH is null
			)
	";
	$result = $db->query($query);
	$num = $result->num_rows;

	$array_event_id = array();
	$array_event_title = array();

	if( $num > 0 ){
		$json['RESULT'] = 1;

		for( $i=0;$i<$num;$i++ ){
			$row = $result->fetch_assoc();
	
			$array_event_id[] = $row['eve_ID'];
			$array_event_title[] = $row['eve_TITLE'];
		}
	} else {
		$json['RESULT'] = 2;
	}

	$json['NUMBER_OF_EVENT'] = $num;
	$json['ARRAY_EVENT_ID'] = $array_event_id;
	$json['ARRAY_EVENT_TITLE'] = $array_event_title;
	
	echo json_encode($json);

}

if( $_POST['module'] == "StreamEventPanelInfo" ){
	
	$address_kwh_listrik = $_POST['ADDRESS_KWH_LISTRIK'];
	$address_kwh_ac = $_POST['ADDRESS_KWH_AC'];
	$datetime_event_start = $_POST['DATETIME_EVENT_START'];
	$json['IS_IDLE'] = 1;

	if( $_POST['module_tablet'] == "RetrieveEventInfoFromTablet" ){
		$id_room = $_POST['idroom'];
		// $current_date_time = $_POST['curdatetime'];
		// $current_date_time = date('Y-m-d H:i:s');
		
		$query_get_room_info = "select * from d3s3m_room where roo_ID = '".$id_room."' ";
		$result_get_room_info = $db->query($query_get_room_info);
		$row_get_room_info = $result_get_room_info->fetch_assoc();
		
		$address_kwh_listrik = $row_get_room_info['roo_KWH_ADDRESS'];
		$address_kwh_ac = $row_get_room_info['roo_KWH_ADDRESS_AC'];
		
		
		
		$query_get_ongoing_event = "
		select * from d3s3m_event 
		where 
			eve_EVENT_INITIATION <= NOW() 
			and DATE(eve_EVENT_START) = '".date('Y-m-d')."' 
			and ( eve_STATUS = 6 || eve_STATUS = 2) 
			and eve_d3s3m_room_roo_ID  = '".$id_room."' 
			order by eve_EVENT_START DESC
		limit 0,1
		";
		// echo $query_get_ongoing_event;exit;
		// $json['TROUBLESHOOT'] = $query_get_ongoing_event;
		$result_get_ongoing_event = $db->query($query_get_ongoing_event);
		$num_get_ongoing_event = $result_get_ongoing_event->num_rows;
		if( $num_get_ongoing_event > 0 ){
			$row_get_ongoing_event = $result_get_ongoing_event->fetch_assoc();
			$datetime_event_start = $row_get_ongoing_event['eve_DATE_START'];
			$id_event = $row_get_ongoing_event['eve_ID'];
			$json['EVE_STATUS'] = $row_get_ongoing_event['eve_STATUS'];
			$json['ID_EVENT'] = $row_get_ongoing_event['eve_ID'];
			
			
			$query_get_attendee_info = "select * from d3s3m_attendee where att_d3s3m_event_eve_ID = '".$id_event."' and att_IS_ATTEND = 1 and att_COMMAND_SIGNAL = 'AttendEvent' ";
			$result_get_attendee_info = $db->query($query_get_attendee_info);
			$num_get_attendee_info = $result_get_attendee_info->num_rows;
			$json['NUMBER_OF_ATTENDEE'] = $num_get_attendee_info;
			
			$query_get_participant_info = "select * 
			from d3s3m_attendee 
			left join d3s3m_user on use_ID  = att_d3s3m_user_use_ID
			left join d3s3m_division on div_ID = use_d3s3m_division_div_ID 
			left join d3s3m_company on com_ID = use_d3s3m_company_com_ID 
			where att_d3s3m_event_eve_ID = '".$id_event."' ";
			$result_get_participant_info = $db->query($query_get_participant_info);
			$num_get_participant_info = $result_get_participant_info->num_rows;
			$json['NUMBER_OF_PARTICIPANT'] = $num_get_participant_info;
			$json['NUMBER_OF_PARTICIPANT__MINUS_CREATOR'] = $json['NUMBER_OF_PARTICIPANT'] - 1;
			for( $x=0;$x<$num_get_participant_info;$x++ ){
				$row_get_participant_info = $result_get_participant_info->fetch_assoc();

				if( $row_get_participant_info['att_COMMAND_SIGNAL'] == 'StartEvent' ){
					$display_role = 'Event Creator';
				} else if( $row_get_participant_info['att_COMMAND_SIGNAL'] == 'AttendEvent' ){
					$display_role = 'Attendee';
				}

				$json['ATTENDEE_LIST'] .= '<tr>';
				$json['ATTENDEE_LIST'] .= '<td style="text-align:center;">'.$display_role.'</td>';
				$json['ATTENDEE_LIST'] .= '<td>'.$row_get_participant_info['use_FULLNAME'].'</td>';
				$json['ATTENDEE_LIST'] .= '<td>'.$row_get_participant_info['div_NAME'].'</td>';
				$json['ATTENDEE_LIST'] .= '<td>'.$row_get_participant_info['com_NAME'].'</td>';
				
				if( $row_get_participant_info['att_IS_ATTEND'] == 1 ){
					$json['ATTENDEE_LIST'] .= '<td>Attend</td>';
					$json['ATTENDEE_LIST'] .= '<td>'.$row_get_participant_info['att_DATE_ATTEND'].'</td>';
				}
				
				else {
					$json['ATTENDEE_LIST'] .= '<td>Waiting</td>';
					$json['ATTENDEE_LIST'] .= '<td>-</td>';
				}
				
				$json['ATTENDEE_LIST'] .= '</tr>';
			}
			
			
			$json['TITLE'] = $row_get_ongoing_event['eve_TITLE'];
			$json['COUNTER_EVENT_START'] = $row_get_ongoing_event['eve_EVENT_START'];
			$json['COUNTER_EVENT_FINISH'] = $row_get_ongoing_event['eve_EVENT_FINISH'];
			
			if( $json['NUMBER_OF_PARTICIPANT'] > 0 ){
				$json['PIE_CHART_PERCENTAGE'] = $json['NUMBER_OF_ATTENDEE'] / $json['NUMBER_OF_PARTICIPANT__MINUS_CREATOR'];
				$json['PIE_CHART_PERCENTAGE'] = number_format($json['PIE_CHART_PERCENTAGE'],2,".",",");
			} else {
				$json['PIE_CHART_PERCENTAGE'] = 0;
				$json['PIE_CHART_PERCENTAGE'] = 0;
			}
			
			
			//$json['PARTICIPANT_LIST'] = '';
			$json['IS_IDLE'] = 0;
		}
		
	}
	
	// DELETE 2 DAYS AGO ENERGY LOGGER
	$query_clean = "delete from d3s3m_energy_logger where DATE(elog_DATE_CREATED) <= DATE_SUB('".date('Y-m-d')."', INTERVAL 1 DAY) ";
	//echo $query_clean;exit;
	$result_clean = $db->query($query_clean);
	
	
	if( isset($datetime_event_start) ){
		//$query_stream_kwh_start = "select * from d3s3m_energy_logger where elog_DATE_CREATED between '".$datetime_event_start."' and '".date('Y-m-d H:i:s')."' order by elog_DATE_CREATED ASC limit 0,1 ";
		$query_stream_kwh_start = "select * from d3s3m_energy_logger where elog_DATE_CREATED >= '".$datetime_event_start."' order by elog_DATE_CREATED ASC limit 0,1 ";
		//echo $query_stream_kwh_start;exit;
		$result_stream_kwh_start = $db->query($query_stream_kwh_start);
		$row_stream_kwh_start = $result_stream_kwh_start->fetch_assoc();
		$start__elog_KWH_ADDRESS_START = $row_stream_kwh_start['elog_KWH_ADDRESS_START'];
		$start__elog_KWH_LONG = $row_stream_kwh_start['elog_KWH_LONG'];
		$start__elog_KWH_STREAM = explode(',',$row_stream_kwh_start['elog_KWH_STREAM']);
		for( $i=0;$i<$start__elog_KWH_LONG;$i++ ){
			$start__array_index = $start__elog_KWH_ADDRESS_START + $i;
			$start__array_data[$start__array_index] = $start__elog_KWH_STREAM[$i];
		}
	}
	
	//$query_stream_kwh_end = "select * from d3s3m_energy_logger where elog_DATE_CREATED between '".$datetime_event_start."' and '".date('Y-m-d H:i:s')."' order by elog_DATE_CREATED DESC limit 0,1 ";
	$query_stream_kwh_end = "select * from d3s3m_energy_logger where elog_DATE_CREATED >= '".$datetime_event_start."' and elog_DATE_CREATED <= '".date('Y-m-d H:i:s')."' order by elog_DATE_CREATED DESC limit 0,1 ";
	// echo $query_stream_kwh_end;exit;
	$result_stream_kwh_end = $db->query($query_stream_kwh_end);
	$row_stream_kwh_end = $result_stream_kwh_end->fetch_assoc();
	$end__elog_KWH_ADDRESS_START = $row_stream_kwh_end['elog_KWH_ADDRESS_START'];
	$end__elog_KWH_LONG = $row_stream_kwh_end['elog_KWH_LONG'];
	$end__elog_KWH_STREAM = explode(',',$row_stream_kwh_end['elog_KWH_STREAM']);
	for( $i=0;$i<$end__elog_KWH_LONG;$i++ ){
		$end__array_index = $end__elog_KWH_ADDRESS_START + $i;
		$end__array_data[$end__array_index] = $end__elog_KWH_STREAM[$i];
	}


	// $json['query_stream_kwh_start'] = $query_stream_kwh_start;
	// $json['start__elog_KWH_ADDRESS_START'] = $start__elog_KWH_ADDRESS_START;
	// $json['start__elog_KWH_LONG'] = $start__elog_KWH_LONG;
	// $json['start__array_data'] = $start__array_data;

	// $json['query_stream_kwh_end'] = $query_stream_kwh_end;
	// $json['end__elog_KWH_ADDRESS_START'] = $end__elog_KWH_ADDRESS_START;
	// $json['end__elog_KWH_LONG'] = $end__elog_KWH_LONG;
	// $json['end__array_data'] = $end__array_data;

	
	// KALKULASI KWH START LISTRIK
	$hex_address_plus_satu = dechex($start__elog_KWH_STREAM[$address_kwh_listrik-$start__elog_KWH_ADDRESS_START+1]);			
	$hex_address_plus_nol = dechex($start__elog_KWH_STREAM[$address_kwh_listrik-$start__elog_KWH_ADDRESS_START]);
	$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
	$final_kwh_listrik_start = hexdec($hex_final);
	
	// KALKULASI KWH START AC
	$hex_address_plus_satu = dechex($start__elog_KWH_STREAM[$address_kwh_ac-$start__elog_KWH_ADDRESS_START+1]);			
	$hex_address_plus_nol = dechex($start__elog_KWH_STREAM[$address_kwh_ac-$start__elog_KWH_ADDRESS_START]);
	$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
	$final_kwh_ac_start = hexdec($hex_final);
	
	
	
	
	// KALKULASI KWH END LISTRIK
	$hex_address_plus_satu = dechex($end__elog_KWH_STREAM[$address_kwh_listrik-$end__elog_KWH_ADDRESS_START+1]);			
	$hex_address_plus_nol = dechex($end__elog_KWH_STREAM[$address_kwh_listrik-$end__elog_KWH_ADDRESS_START]);
	$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
	$final_kwh_listrik_end = hexdec($hex_final);
	
	// KALKULASI KWH END AC
	$hex_address_plus_satu = dechex($end__elog_KWH_STREAM[$address_kwh_ac-$end__elog_KWH_ADDRESS_START+1]);			
	$hex_address_plus_nol = dechex($end__elog_KWH_STREAM[$address_kwh_ac-$end__elog_KWH_ADDRESS_START]);
	$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
	$final_kwh_ac_end = hexdec($hex_final);
	
	
	$final_energy_consumption = ($final_kwh_listrik_end - $final_kwh_listrik_start) + ($final_kwh_ac_end - $final_kwh_ac_start);
	
			
			
	$json['FINAL_ENERGY_CONSUMPTION'] = number_format($final_energy_consumption/1000,2);
	$json['TOTAL_ACTUAL_ENERGY_CONSUMPTION'] = number_format($final_energy_consumption/1000,2);
	$json['RESULT'] = 1;
	$json['MESSAGE'] = "Streaming kwh";

	echo json_encode($json);

}

if( $_POST['module'] == "CheckRoomCode" ){

	$room_code = $_POST['roomcode'];

	$query = " select * from d3s3m_room where roo_PIN = '".$room_code."' ";
	$result = $db->query($query);
	$num = $result->num_rows;

	if( $num > 0 ){
		$row = $result->fetch_assoc();
		$new_room_id = $row['roo_ID'];
		$json['RESULT'] = 2;
		$json['MESSAGE'] = "Room ID assigned to: ".$new_room_id;
		$json['ID_ROOM'] = $new_room_id;
		$json['ROOM_NAME'] = $row['roo_NAME'];
	} else {
		$json['RESULT'] = 1;
		$json['MESSAGE'] = "Room ID not found";
	}

	echo json_encode($json);

}

if( $_POST['module'] == "StartEvent" || $_POST['module'] == "STARTEVENT" ){
	
	$id_event = $_POST['event_id'];
	$id_user = $_POST['user_id'];
	$id_room = $_POST['id_room'];
	
	$query_get_info = "
	select * from d3s3m_event 
	where 
	eve_ID = '".$id_event."' 
	and eve_EVENT_INITIATION <= '".date('Y-m-d H:i:s')."' 
	and eve_d3s3m_room_roo_ID  = '".$id_room."'
	";
	$result_get_info = $db->query($query_get_info);
	$num_get_info = $result_get_info->num_rows;
	
	if( $num_get_info > 0 ){
		$row_get_info = $result_get_info->fetch_assoc();
	
		if( $row_get_info['eve_IS_START'] != 1 ){
			$query_update = "update d3s3m_event set eve_IS_START = 1 where  eve_ID = '".$id_event."' ";
			$result_update = $db->query($query_update);
			
			$query_attend = "update d3s3m_attendee set att_IS_ATTEND = 1, att_DATE_ATTEND = NOW() where att_d3s3m_event_eve_ID  = '".$id_event."' and att_d3s3m_user_use_ID  = '".$id_user."' ";
			$result_attend = $db->query($query_attend);
			
			$json['RESULT'] = 1;
			$json['MESSAGE'] = 'Your event is now initiated. Electricity and AC permission has been turned on. Energy consumption 
			recording is now begin. Please do not forget to click on <br/><strong>"STOP EVENT"</strong> button on this device by the time you are about to leave this room.';

		} else {
			$json['RESULT'] = 0;
			$json['MESSAGE'] = "Your event is already initiated. You can't initiate the same event twice.";
		}
		
		
	} else {
		$json['RESULT'] = 0;
		$json['MESSAGE'] = 'Invalid event initiation.';
	}
	
	$query_get_total_attendee = "select count(att_ID ) as TOTAL_ATTENDEE from d3s3m_attendee where att_d3s3m_event_eve_ID = '".$id_event."' and att_IS_ATTEND = 1 ";
	$result_get_total_attendee = $db->query($query_get_total_attendee);
	$row_get_total_attendee = $result_get_total_attendee->fetch_assoc();
	$_total_attendee = $row_get_total_attendee['TOTAL_ATTENDEE'];
	
	$query_get_total_participant = "select count(att_ID ) as TOTAL_PARTICIPANT from d3s3m_attendee where att_d3s3m_event_eve_ID = '".$id_event."' ";
	$result_get_total_participant = $db->query($query_get_total_participant);
	$row_get_total_participant = $result_get_total_participant->fetch_assoc();
	$_total_participant = $row_get_total_participant['TOTAL_PARTICIPANT'];
	
	$pie_percentage = $_total_attendee / $_total_participant * 1;
	$pie_percentage = number_format($pie_percentage,0);
	
	$json['PIE_PERCENTAGE'] = $pie_percentage;
	
	echo json_encode($json);
}

if( $_POST['module'] == "StopEvent" || $_POST['module'] == "STOPEVENT" ){

	$id_event = $_POST['event_id'];
	$id_user = $_POST['user_id'];
	// echo $id_event;exit;
	
	$query_get_total_attendee = "select count(att_ID ) as TOTAL_ATTENDEE from d3s3m_attendee where att_d3s3m_event_eve_ID = '".$id_event."' and att_IS_ATTEND = 1 ";
	$result_get_total_attendee = $db->query($query_get_total_attendee);
	$row_get_total_attendee = $result_get_total_attendee->fetch_assoc();
	$_total_attendee = $row_get_total_attendee['TOTAL_ATTENDEE'];
	
	$query_get_total_participant = "select count(att_ID ) as TOTAL_PARTICIPANT from d3s3m_attendee where att_d3s3m_event_eve_ID = '".$id_event."' ";
	$result_get_total_participant = $db->query($query_get_total_participant);
	$row_get_total_participant = $result_get_total_participant->fetch_assoc();
	$_total_participant = $row_get_total_participant['TOTAL_PARTICIPANT'];
	
	$pie_percentage = $_total_attendee / $_total_participant * 1;
	$pie_percentage = number_format($pie_percentage,0);
	
	$json['PIE_PERCENTAGE'] = $pie_percentage;
	
	
	
	
	
	
	
	
	
	/*
	*
	*
	* PART FOR CALCULATE ENERGY CONSUMPTION
	*
	*
	*/
		// GET EVENT INFO
		$query_get_event_info = "
		select * from d3s3m_event
		left join d3s3m_user on use_ID = eve_d3s3m_user_use_ID
		left join d3s3m_room on roo_ID = eve_d3s3m_room_roo_ID
		left join d3s3m_category on cat_ID = eve_d3s3m_category_cat_ID
		where eve_STATUS > 0
		and eve_ID = '".$id_event."'
		";
		// echo $query_get_event_info;exit;
		$result_get_event_info = $db->query($query_get_event_info);
		$row_get_event_info = $result_get_event_info->fetch_assoc();
		
        $event_start = $row_get_event_info['eve_DATE_START'];
        $event_stop = $row_get_event_info['eve_DATE_FINISH'];
        $address_kwh_listrik = intval($row_get_event_info['roo_KWH_ADDRESS']);
        $address_kwh_ac = intval($row_get_event_info['roo_KWH_ADDRESS_AC']);
        // print_r($this_event);exit;
        // END GET EVENT INFO
		
		
		// GET KWH USAGE START
		$query_energy_logger_start = "
		select * from d3s3m_energy_logger
		where elog_DATE_CREATED >= '".$event_start."'
		order by elog_DATE_CREATED DESC
		limit 0,1
		";
		// echo $query_energy_logger_start;exit;
		$result_energy_logger_start = $db->query($query_energy_logger_start);
		$row_energy_logger_start = $result_energy_logger_start->fetch_assoc();
		
        $array_energy_log_start = explode(',',$row_energy_logger_start['elog_KWH_STREAM']);
        for( $i=0;$i<count($array_energy_log_start);$i++ ){
            $index_energy_start = $row_energy_logger_start['elog_KWH_ADDRESS_START'] + $i;
            $final_array_energy_log_start[$index_energy_start] = $array_energy_log_start[$i];
        }
		
		if( isset($final_array_energy_log_start[$address_kwh_listrik]) ){
			$hex_address_plus_satu = dechex($final_array_energy_log_start[$address_kwh_listrik+1]);			
			$hex_address_plus_nol = dechex($final_array_energy_log_start[$address_kwh_listrik]);
			$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
			$final_kwh_listrik_start = hexdec($hex_final);
			
            // $kwh_listrik_start = $final_array_energy_log_start[$address_kwh_listrik];
			$kwh_listrik_start = $final_kwh_listrik_start;
        } else {
            $kwh_listrik_start = 0;
        }

        if( isset($final_array_energy_log_start[$address_kwh_ac]) ){
			$hex_address_plus_satu = dechex($final_array_energy_log_start[$address_kwh_ac+1]);			
			$hex_address_plus_nol = dechex($final_array_energy_log_start[$address_kwh_ac]);
			$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
			$final_kwh_ac_start = hexdec($hex_final);
			
            // $kwh_ac_start = $final_array_energy_log_start[$address_kwh_ac];
			$kwh_ac_start = $final_kwh_ac_start;
        } else {
            $kwh_ac_start = 0;
        }
        // END GET KWH USAGE START

		
        // GET KWH USAGE END
		$query_energy_logger_end = "
		select * from d3s3m_energy_logger
		where elog_DATE_CREATED <= '".date('Y-m-d H:i:s')."'
		order by elog_DATE_CREATED DESC
		limit 0,1
		";
		$result_energy_logger_end = $db->query($query_energy_logger_end);
		$row_energy_logger_end = $result_energy_logger_end->fetch_assoc();
		
        $array_energy_log_end = explode(',',$row_energy_logger_end['elog_KWH_STREAM']);
        for( $i=0;$i<count($array_energy_log_end);$i++ ){
            $index_energy_end = $row_energy_logger_end['elog_KWH_ADDRESS_START'] + $i;
            $final_array_energy_log_end[$index_energy_end] = $array_energy_log_end[$i];
        }
        

        if( isset($final_array_energy_log_end[$address_kwh_listrik]) ){
			$hex_address_plus_satu = dechex($final_array_energy_log_end[$address_kwh_listrik+1]);			
			$hex_address_plus_nol = dechex($final_array_energy_log_end[$address_kwh_listrik]);
			$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
			$final_kwh_listrik_end = hexdec($hex_final);
			
            // $kwh_listrik_end = $final_array_energy_log_end[$address_kwh_listrik];
			$kwh_listrik_end = $final_kwh_listrik_end;
        } else {
            $kwh_listrik_end = 0;
        }

        if( isset($final_array_energy_log_end[$address_kwh_ac]) ){
			$hex_address_plus_satu = dechex($final_array_energy_log_end[$address_kwh_ac+1]);			
			$hex_address_plus_nol = dechex($final_array_energy_log_end[$address_kwh_ac]);
			$hex_final = $hex_address_plus_satu.$hex_address_plus_nol;
			$final_kwh_ac_end = hexdec($hex_final);
			
			$kwh_ac_end = $final_kwh_ac_end;
			//echo $kwh_ac_end;exit;
        } else {
            $kwh_ac_end = 0;
        }
        // END GET KWH USAGE END


		
        // CALCULATE TOTAL ACTUAL KWH
        $actual_kwh_listrik = $kwh_listrik_end - $kwh_listrik_start;
        $actual_kwh_ac = $kwh_ac_end - $kwh_ac_start;
        $total_actual_kwh = $actual_kwh_listrik + $actual_kwh_ac;
        // END CALCULATE TOTAL ACTUAL KWH



        // UPDATE ACTUAL KWH TO DATABASE
		$query_update_actual_kwh = "
		update d3s3m_event set
			eve_ENERGY_CONSUMPTION = '".($total_actual_kwh/1000)."',
			eve_STATUS = 4,
			eve_KWH_LISTRIK_START = '".($total_actual_kwh/1000)."',
			eve_KWH_LISTRIK_END = '".($kwh_listrik_end/1000)."',
			eve_KWH_AC_START = '".($kwh_ac_start/1000)."',
			eve_KWH_AC_END = '".($kwh_ac_end/1000)."'
		where eve_ID = '".$id_event."'
		";
		// echo $query_update_actual_kwh;exit;
		$result_update_actual_kwh = $db->query($query_update_actual_kwh);
        // END UPDATE ACTUAL KWH TO DATABASE
		
		if( $result_update_actual_kwh ){
			$json['RESULT'] = 2;
			$json['MESSAGE'] = "Event is now finished. Electricity, AC, and alarm has been turned off.";
		} else {
			$json['RESULT'] = 0;
			$json['MESSAGE'] = "Event termination failed. Please contact our administrator.";
		}
	
	
	
	
	
	
	
	

	echo json_encode($json);
	
}

if( $_POST['module'] == "ExtendEvent" || $_POST['module'] == "EXTENDEVENT" ){

	$id_event = $_POST['event_id'];
	$id_user = $_POST['user_id'];
	
	$query_update = "update d3s3m_event set eve_IS_EXTENDED = 1 where eve_ID = '".$id_event."' ";
	$result_update = $db->query($query_update);
	
	$json['RESULT'] = 3;
	$json['MESSAGE'] = "This event has been successfully extended. Please make sure to click on stop button to power down the room.";
	//$json['MESSAGE'] = $query_update;
	
	$query_get_total_attendee = "select count(att_ID ) as TOTAL_ATTENDEE from d3s3m_attendee where att_d3s3m_event_eve_ID = '".$id_event."' and att_IS_ATTEND = 1 ";
	$result_get_total_attendee = $db->query($query_get_total_attendee);
	$row_get_total_attendee = $result_get_total_attendee->fetch_assoc();
	$_total_attendee = $row_get_total_attendee['TOTAL_ATTENDEE'];
	
	$query_get_total_participant = "select count(att_ID ) as TOTAL_PARTICIPANT from d3s3m_attendee where att_d3s3m_event_eve_ID = '".$id_event."' ";
	$result_get_total_participant = $db->query($query_get_total_participant);
	$row_get_total_participant = $result_get_total_participant->fetch_assoc();
	$_total_participant = $row_get_total_participant['TOTAL_PARTICIPANT'];
	
	$pie_percentage = $_total_attendee / $_total_participant * 1;
	$pie_percentage = number_format($pie_percentage,0);
	
	$json['PIE_PERCENTAGE'] = $pie_percentage;
	
	
	echo json_encode($json);
}

if( $_POST['module'] == "AttendEvent" || $_POST['module'] == "ATTENDEVENT" ){

	$id_event = $_POST['event_id'];
	$id_user = $_POST['user_id'];
	$id_room = $_POST['id_room'];
	
	$query_get_info = "
	select * from d3s3m_event 
	left join d3s3m_attendee on eve_ID = att_d3s3m_event_eve_ID 
	where eve_ID = '".$id_event."' and ( eve_STATUS = 2 || eve_STATUS = 6 ) 
	and att_d3s3m_user_use_ID = '".$id_user."'  
	and eve_d3s3m_room_roo_ID  = '".$id_room."'
	";
	$result_get_info = $db->query($query_get_info);
	$num_get_info = $result_get_info->num_rows;
	
	if( $num_get_info > 0 ){
		
		$query_update = "update d3s3m_attendee set att_IS_ATTEND = 1, att_DATE_ATTEND = NOW() where att_d3s3m_event_eve_ID = '".$id_event."' and att_d3s3m_user_use_ID = '".$id_user."' ";
		$result_update = $db->query($query_update);
		
		if( $result_update ){
			$json['RESULT'] = 1;
			$json['MESSAGE'] = "Welcome to this event. Have a great day!";
		} else {
			$json['RESULT'] = 0;
			$json['MESSAGE'] = "Failed to attend. Please contact our administrator.";
		}
		
	} else {
		$json['RESULT'] = 0;
		$json['MESSAGE'] = "You are not in this event attendee list.";
	}
	
	$query_get_total_attendee = "select count(att_ID ) as TOTAL_ATTENDEE from d3s3m_attendee where att_d3s3m_event_eve_ID = '".$id_event."' and att_IS_ATTEND = 1 ";
	$result_get_total_attendee = $db->query($query_get_total_attendee);
	$row_get_total_attendee = $result_get_total_attendee->fetch_assoc();
	$_total_attendee = $row_get_total_attendee['TOTAL_ATTENDEE'];
	
	$query_get_total_participant = "select count(att_ID ) as TOTAL_PARTICIPANT from d3s3m_attendee where att_d3s3m_event_eve_ID = '".$id_event."' ";
	$result_get_total_participant = $db->query($query_get_total_participant);
	$row_get_total_participant = $result_get_total_participant->fetch_assoc();
	$_total_participant = $row_get_total_participant['TOTAL_PARTICIPANT'];
	
	$pie_percentage = $_total_attendee / $_total_participant * 1;
	$pie_percentage = number_format($pie_percentage,2,".",",");
	
	$json['PIE_PERCENTAGE'] = $pie_percentage;
	
	echo json_encode($json);

}



?>

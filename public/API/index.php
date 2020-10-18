<?php
include('_general_setting.php');


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
			eve_d3s3m_user_use_ID = '".$id_user."' and eve_STATUS = '2' 
			and eve_EVENT_START <= '".date('Y-m-d H:i:s')."'
			and eve_IS_FINISH is null
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



	$query_stream_kwh_start = "select * from d3s3m_energy_logger where elog_DATE_CREATED between '".$datetime_event_start."' and '".date('Y-m-d H:i:s')."' order by elog_DATE_CREATED ASC limit 0,1 ";
	$result_stream_kwh_start = $db->query($query_stream_kwh_start);
	$row_stream_kwh_start = $result_stream_kwh_start->fetch_assoc();
	$start__elog_KWH_ADDRESS_START = $row_stream_kwh_start['elog_KWH_ADDRESS_START'];
	$start__elog_KWH_LONG = $row_stream_kwh_start['elog_KWH_LONG'];
	$start__elog_KWH_STREAM = explode(',',$row_stream_kwh_start['elog_KWH_STREAM']);
	for( $i=0;$i<$start__elog_KWH_LONG;$i++ ){
		$start__array_index = $start__elog_KWH_ADDRESS_START + $i;
		$start__array_data[$start__array_index] = $start__elog_KWH_STREAM[$i];
	}


	$query_stream_kwh_end = "select * from d3s3m_energy_logger where elog_DATE_CREATED between '".$datetime_event_start."' and '".date('Y-m-d H:i:s')."' order by elog_DATE_CREATED DESC limit 0,1 ";
	$result_stream_kwh_end = $db->query($query_stream_kwh_end);
	$row_stream_kwh_end = $result_stream_kwh_end->fetch_assoc();
	$end__elog_KWH_ADDRESS_START = $row_stream_kwh_end['elog_KWH_ADDRESS_START'];
	$end__elog_KWH_LONG = $row_stream_kwh_end['elog_KWH_LONG'];
	$end__elog_KWH_STREAM = explode(',',$row_stream_kwh_end['elog_KWH_STREAM']);
	for( $i=0;$i<$end__elog_KWH_LONG;$i++ ){
		$end__array_index = $end__elog_KWH_ADDRESS_START + $i;
		$end__array_data[$end__array_index] = $end__elog_KWH_STREAM[$i];
	}

	$json['query_stream_kwh_start'] = $query_stream_kwh_start;
	$json['start__elog_KWH_ADDRESS_START'] = $start__elog_KWH_ADDRESS_START;
	$json['start__elog_KWH_LONG'] = $start__elog_KWH_LONG;
	$json['start__array_data'] = $start__array_data;

	$json['query_stream_kwh_end'] = $query_stream_kwh_end;
	$json['end__elog_KWH_ADDRESS_START'] = $end__elog_KWH_ADDRESS_START;
	$json['end__elog_KWH_LONG'] = $end__elog_KWH_LONG;
	$json['end__array_data'] = $end__array_data;

	$json['RESULT'] = 1;
	$json['MESSAGE'] = "Streaming kwh";

	echo json_encode($json);

}



?>

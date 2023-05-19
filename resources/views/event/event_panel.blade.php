@extends('master_template_new')
@section('content')

<?php
foreach( $basic_info as $this_basic_info ){
	$this_basic_info = $this_basic_info;
}
?>			
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Event Panel</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Event ID #{{ $this_basic_info->eve_ID }}</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center" style="display:none!important;">
									<!--begin::Actions-->
									<a class="btn btn-primary font-weight-bold btn-sm " style="margin-left:5px;">
										Start Event
									</a>
									<a class="btn btn-primary font-weight-bold btn-sm " style="margin-left:5px;">
										Extend Event
									</a>
									<a class="btn btn-primary font-weight-bold btn-sm " style="margin-left:5px;">
										Stop Event
									</a>
									<!--end::Actions-->
								</div>
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container-fluid">
								<!--begin::Card-->
								<div class="card card-custom gutter-b">
									<div class="card-body">

										<div class="d-flex">
											<!--begin: Info-->
											<div class="flex-grow-1">
												<!--begin: Title-->
												<div class="d-flex align-items-center justify-content-between flex-wrap">
													<div class="mr-3">
														<!--begin::Name-->
														<a  class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $this_basic_info->eve_TITLE }}
														<i class="flaticon2-correct text-success icon-md ml-2"></i></a>
														<!--end::Name-->
														<!--begin::Contacts-->
														<div class="d-flex flex-wrap my-2">
															<a  class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
															<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																		<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>{{ $this_basic_info->use_FULLNAME }}</a>
															<a  class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
															<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
																<!--begin::Svg Icon | path:assets/media/svg/icons/General/Lock.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>{{ $this_basic_info->cat_NAME }}</a>
															<a  class="text-muted text-hover-primary font-weight-bold">
															<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>{{ $this_basic_info->roo_NAME }}</a>
														</div>
														<!--end::Contacts-->
													</div>
													<div class="my-lg-0 my-1">
														@if( $this_basic_info->eve_IS_START != 1 )
															<a href="../../../../public/event/panel/{{ $this_basic_info->eve_ID }}/Panel_StartEvent" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Start Event</a>
														@endif
														@if( $this_basic_info->eve_IS_START == 1 && $this_basic_info->eve_IS_FINISH != 1 )
															<a href="../../../../public/event/panel/{{ $this_basic_info->eve_ID }}/Panel_StopEvent" class="btn btn-sm btn-info font-weight-bolder text-uppercase mr-3">Stop Event</a>
															@if( $this_basic_info->eve_IS_EXTENDED != 1 )
															<a href="../../../../public/event/panel/{{ $this_basic_info->eve_ID }}/Panel_ExtendEvent" class="btn btn-sm btn-warning font-weight-bolder text-uppercase">Extend Event</a>
															@endif
														@endif
													</div>
												</div>
												<!--end: Title-->
												<!--begin: Content-->
												<div class="d-flex align-items-center flex-wrap justify-content-between">
													<div class="d-flex flex-wrap align-items-center py-2">
														<div class="d-flex align-items-center mr-10">
															<div class="mr-6">
																<div class="font-weight-bold mb-2">Start Date</div>
																<span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{ $this_basic_info->eve_EVENT_START }}</span>
															</div>
															<div class="">
																<div class="font-weight-bold mb-2">Due Date</div>
																<span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{ $this_basic_info->eve_EVENT_FINISH }}</span>
															</div>
														</div>
													</div>
												</div>
												<!--end: Content-->
											</div>
											<!--end: Info-->
										</div>
										<div class="separator separator-solid my-7"></div>
										<!--begin: Items-->
										<div class="d-flex align-items-center flex-wrap">
											<!--begin: Item-->
											<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
												</span>
												<div class="d-flex flex-column text-dark-75">
													<span class="font-weight-bolder font-size-sm">Actual kWh</span>
													<span class="font-weight-bolder font-size-h5" id="display_total_actual_kwh">0</span>
												</div>
											</div>
											<!--end: Item-->
											<!--begin: Item-->
											<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
												</span>
												<div class="d-flex flex-column text-dark-75">
													<span class="font-weight-bolder font-size-sm">Estimation kWh</span>
													<span class="font-weight-bolder font-size-h5" id="display_estimation_kwh">{{ number_format($kwh_estimation,2) }}</span>
												</div>
											</div>
											<!--end: Item-->
											<!--begin: Item-->
											<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
												</span>
												<div class="d-flex flex-column text-dark-75">
													<span class="font-weight-bolder font-size-sm">Ratio</span>
													<span class="font-weight-bolder font-size-h5"><span id="display_ratio">0</span>%</span>
												</div>
											</div>
											<!--end: Item-->
											<!--begin: Item-->
											<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-network icon-2x text-muted font-weight-bold"></i>
												</span>
												<div class="d-flex flex-column text-dark-75">
													<span class="font-weight-bolder font-size-sm">Attendees</span>
													<span class="font-weight-bolder font-size-h5">
													{{ count($attendee) }} person</span>
												</div>
											</div>
											<!--end: Item-->
										</div>
										<!--begin: Items-->
									</div>
								</div>
								<!--end::Card-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-lg-12">
										<!--begin::Advance Table Widget 3-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Attendee List</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">All registered participants</span>
												</h3>
												<div class="card-toolbar" style="display:none;">
													<a href="../../../../public/event/panel/{{ $this_basic_info->eve_ID }}/Panel_ExtendEvent" class="btn btn-success font-weight-bolder font-size-sm">
													<span class="svg-icon svg-icon-md svg-icon-white">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>Add New Member</a>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0 pb-3">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
														<thead>
															<tr class="text-uppercase">
																<th style="min-width: 100px">User ID</th>
																<th style="min-width: 200px" class="pl-7">
																	<span class="text-dark-75">Name</span>
																</th>
																<th style="min-width: 100px">Division</th>
																<th style="min-width: 100px">Role</th>
																<!-- <th style="min-width: 150px">agent</th> -->
																<th style="min-width: 130px">status</th>
																<th style="min-width: 120px"></th>
															</tr>
														</thead>
														<tbody>
															<?php
															foreach( $attendee as $this_attendee ){
																?>
																<tr>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $this_attendee->use_ID }}</span>
																		<span class="text-muted font-weight-bold"></span>
																	</td>
																	<td class="pl-0 py-8">
																		<div class="d-flex align-items-center">
																			<div>
																				<a  class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $this_attendee->use_FULLNAME }}</a>
																				<span class="text-muted font-weight-bold d-block">{{ $this_attendee->use_EMAIL }}</span>
																			</div>
																		</div>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $this_attendee->div_NAME }}</span>
																		<span class="text-muted font-weight-bold"></span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $this_attendee->rol_NAME }}</span>
																		<span class="text-muted font-weight-bold"></span>
																	</td>
																	<td style="display:none;">
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Zoey McGee</span>
																		<span class="text-muted font-weight-bold">Ruby Developer</span>
																	</td>
																	<td>
																		@if( $this_attendee->att_IS_ATTEND != 1 )
																		<span class="label label-lg label-light-warning label-inline" style="width:100%;">Waiting</span>
																		@endif
																		@if( $this_attendee->att_IS_ATTEND == 1 )
																		<span class="label label-lg label-light-success label-inline" style="width:100%;">Attend</span>
																		@endif
																	</td>
																	<td class="text-right pr-0">
																		@if( $this_attendee->att_IS_ATTEND != 1 )
																		<a href="../../../../public/event/panel/{{ $this_basic_info->eve_ID }}/Panel_OverrideAttend/{{ $this_attendee->use_ID }}" class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3">
																			<span class="svg-icon svg-icon-md svg-icon-primary">
																				<!--begin::Svg Icon | path:assets/media/svg/icons/General/Bookmark.svg-->
																				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																						<rect x="0" y="0" width="24" height="24" />
																						<path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000" />
																					</g>
																				</svg>
																				<!--end::Svg Icon-->
																			</span>
																		</a>
																		@endif
																	</td>
																</tr>
																<?php
															}
															?>
														</tbody>
													</table>
												</div>
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Advance Table Widget 3-->
									</div>
								</div>
								<!--end::Row-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					@include('include_new.footer')
				</div>
				<!--end::Wrapper-->
				@include('include_new.aside_secondary')
				
@endsection

@section('additional_bottom_script')
<script>

	// StreakKWH();
	function StreakKWH(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var jsonData = JSON.parse(this.responseText);
				
				var RESULT = jsonData.RESULT;
				var MESSAGE = jsonData.MESSAGE;

				// console.log("----");
				// console.log(jsonData.query_stream_kwh_start);
				// console.log(jsonData.start__array_data[115]);
				// console.log(jsonData.end__array_data[115]);

				/*
				var int_kwh_listrik = parseInt("<?php echo $this_basic_info->roo_KWH_ADDRESS; ?>");
				var int_kwh_ac = parseInt("<?php echo $this_basic_info->roo_KWH_ADDRESS_AC; ?>");

				var value_kwh_listrik_plus_satu = parseInt("<?php echo ($this_basic_info->roo_KWH_ADDRESS)+1; ?>");

				if( jsonData.start__array_data[int_kwh_listrik] ){					
					var kwh_listrik_start = parseInt(jsonData.start__array_data[int_kwh_listrik]);
				} else {
					var kwh_listrik_start = 0;
				}
				if( jsonData.end__array_data[int_kwh_listrik] ){
					var kwh_listrik_end = parseInt(jsonData.end__array_data[int_kwh_listrik]);
				} else {
					var kwh_listrik_end = 0;
				}
				var total_kwh_listrik = kwh_listrik_end - kwh_listrik_start;


				
				
				if( jsonData.start__array_data[int_kwh_ac] ){
					var kwh_ac_start = parseInt(jsonData.start__array_data[int_kwh_ac]);	
				} else {
					var kwh_ac_start = 0;
				}
				if( jsonData.end__array_data[int_kwh_ac] ){
					var kwh_ac_end = parseInt(jsonData.end__array_data[int_kwh_ac]);	
				} else {
					var kwh_ac_end = 0;
				}
				var total_kwh_ac = kwh_ac_end - kwh_ac_start;


				
				var kwh_total_actual = total_kwh_listrik + total_kwh_ac;
				*/
				
				var kwh_total_actual = jsonData.FINAL_ENERGY_CONSUMPTION;
				console.log(kwh_total_actual);
				// alert(kwh_total_actual);
				document.getElementById('display_total_actual_kwh').innerHTML = kwh_total_actual;



				var kwh_estimation = <?php echo $kwh_estimation; ?>;
				var ratio = kwh_total_actual / kwh_estimation * 100;
				document.getElementById('display_ratio').innerHTML = Number(ratio.toFixed(2));


			}
		};
		xhttp.open("POST", "<?php echo env('MASTER_API_URL'); ?>", true);
		xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhttp.send("module=StreamEventPanelInfo&ADDRESS_KWH_LISTRIK=<?php echo $this_basic_info->roo_KWH_ADDRESS; ?>&ADDRESS_KWH_AC=<?php echo $this_basic_info->roo_KWH_ADDRESS_AC; ?>&DATETIME_EVENT_START=<?php echo $this_basic_info->eve_DATE_START;?>");
	}

	setInterval(StreakKWH, 1000);
</script>
@endsection
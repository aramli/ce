@extends('master_template_new')
@section('content')

<?php
foreach( $basic_info as $this_basic_info ){
	$this_basic_info = $this_basic_info;
}
?>

<style>
	td{
		font-size:13px;
	}
</style>
			
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Details-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Event Detail</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $this_basic_info->eve_TITLE }}</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Details-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Button-->
									<a href="{{ route('view_all_event') }}" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>

									@if( $this_basic_info->eve_STATUS == 1 )
									<a href="#" class="btn btn-danger font-weight-bold btn-sm px-3 font-size-base ml-2" style="color:#fff;" data-toggle="modal" data-target="#modalRejectEvent">
										Reject
									</a>
									<div class="modal fade" id="modalRejectEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">Reject Confirmation</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													Are you sure you want to reject this event? <br/><span style="font-style: italic;color:grey;">Please note that this action will not be undone.</span>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
													<a href="../../../../public/event/detail/{{ $this_basic_info->eve_ID }}/RejectEvent" type="button" class="btn btn-danger">Yes, Reject Event</a>
												</div>
											</div>
										</div>
									</div>
									@endif


									@if( $this_basic_info->eve_STATUS == 1 )
									<a href="#" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base ml-2" style="color:#fff;" data-toggle="modal" data-target="#modalApproveEvent">
										Approve
									</a>
									<div class="modal fade" id="modalApproveEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle">Approve Confirmation</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
												</div>
												<div class="modal-body">
														Are you sure you want to approve this event? <br/><span style="font-style: italic;color:grey;">Please note that this action will not be undone.</span>
												</div>
												<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
														<a href="../../../../public/event/detail/{{ $this_basic_info->eve_ID }}/ApproveEvent" type="button" class="btn btn-primary">Yes, Approve Event</a>
												</div>
											</div>
										</div>
									</div>
									@endif


									@if( $this_basic_info->eve_STATUS == 2 )
									<a href="#" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base ml-2" style="color:#fff;" data-toggle="modal" data-target="#modalBlastInvitation">
										Blast Invitation
									</a>
									<div class="modal fade" id="modalBlastInvitation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle">Blast Invitation</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
												</div>
												<div class="modal-body">
														Are you sure you want to blast this event invitation to all participants? <br/><span style="font-style: italic;color:grey;">Please note that this action will not be undone.</span>
												</div>
												<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
														<a href="../../../../public/event/detail/{{ $this_basic_info->eve_ID }}/BlastInvitation" type="button" class="btn btn-primary">Yes, Send Now</a>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									<!--end::Button-->
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
								<div class="card card-custom card-transparent">
									<div class="card-body p-0">
										<!--begin::Wizard-->
										<div class="wizard wizard-4">
											<!--begin::Card-->
											<div class="card card-custom card-shadowless rounded-top-0">
												<!--begin::Body-->
												<div class="card-body p-0">
													<div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
														<div class="col-xl-12 col-xxl-10">
															<!--begin::Wizard Form-->

																<div class="row justify-content-center">
																	<div class="col-xl-12">
																		<!--begin::Wizard Step 1-->
																		<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
																			<h5 class="text-dark font-weight-bold mb-10">BASIC INFORMATION</h5>
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Organizer</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" type="text" value="{{ $this_basic_info->use_FULLNAME }}" disabled />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Event Title</label>
																				<div class="col-lg-9 col-xl-9">
																				<input class="form-control form-control-solid form-control-lg" type="text" value="{{ $this_basic_info->eve_TITLE }}" disabled />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Training Package</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" type="text" value="{{ $this_basic_info->cat_NAME }}" disabled />
																				</div>
																			</div>
																			<!--end::Group-->






																			<h5 class="text-dark font-weight-bold mb-10 mt-10" style="margin-top:50px!important;">DATE AND TIME</h5>
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Event Date</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" type="text" value="{{  date('F jS, Y', strtotime(substr($this_basic_info->eve_EVENT_START,0,10))) }}" disabled />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Time</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="EVENT_START_TIME" disabled type="text" value="{{ substr($this_basic_info->eve_EVENT_START,11,5) }} - {{ substr($this_basic_info->eve_EVENT_FINISH,11,5) }}" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			
																			<?php
																			$d1 = new DateTime($this_basic_info->eve_EVENT_START);
																			$d2 = new DateTime($this_basic_info->eve_EVENT_FINISH);
																			$interval = $d2->diff($d1);
																			
																			// echo $interval->format('%H hours, %I minutes');
																			?>
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Event Duration</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="EVENT_FINISH_TIME" disabled type="text" value="{{ $interval->format('%H hours, %I minutes') }}" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Preparation Time (minute)</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="EVENT_PREPARATION" disabled type="text" value="{{ $this_basic_info->eve_EVENT_PREPARATION }}" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Event Initiation</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="EVENT_PREPARATION" disabled type="text" value="{{ date('F jS, Y', strtotime(substr($this_basic_info->eve_EVENT_INITIATION,0,10))) }} at {{ substr($this_basic_info->eve_EVENT_INITIATION,11,5) }}" />
																				</div>
																			</div>
																			<!--end::Group-->






																			<h5 class="text-dark font-weight-bold mb-10 mt-10" style="margin-top:50px!important;">VENUE</h5>
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Room</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="EVENT_PREPARATION" disabled type="text" value="{{ $this_basic_info->roo_NAME }}" />
																				</div>
																			</div>
																			<!--end::Group-->






																			<h5 class="text-dark font-weight-bold mb-10 mt-10" style="margin-top:50px!important;">SUMMARY</h5>
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Summary</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="EVENT_PREPARATION" disabled type="text" value="{{ $this_basic_info->eve_SUMMARY }}" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Event Description</label>
																				<div class="col-lg-9 col-xl-9">
																					<textarea class="form-control form-control-solid form-control-lg" name="DESCRIPTION" disabled style="min-height:200px;">{{ $this_basic_info->eve_DESCRIPTION }}</textarea>
																				</div>
																			</div>
																			<!--end::Group-->






																			<h5 class="text-dark font-weight-bold mb-10 mt-10" style="margin-top:50px!important;">ATTENDEES</h5>
																			<div class="form-group row">
																				<div class="col-lg-12">
																					<table class="table">
																						<thead>
																							<tr>
																								<th>Name</th>
																								<th>Email</th>
																								<th>Division</th>
																								<th>Company</th>
																							</tr>
																						</thead>
																						<tbody>
																							@foreach( $attendee as $this_attendee )
																								<tr>
																									<td>{{ $this_attendee->use_FULLNAME }}</td>
																									<td>{{ $this_attendee->use_EMAIL }}</td>
																									<td>{{ $this_attendee->div_NAME }}</td>
																									<td>{{ $this_attendee->com_NAME }}</td>
																								</tr>
																							@endforeach
																						<tbody>
																					</table>
																				</div>
																			</div>







																		</div>
																		<!--end::Wizard Step 1-->
																	</div>
																</div>

															<!--end::Wizard Form-->
														</div>
													</div>
												</div>
												<!--end::Body-->
											</div>
											<!--end::Card-->
										</div>
										<!--end::Wizard-->
									</div>
								</div>
								<!--end::Card-->
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

<script>
	function SubmitNewUser(){
		var form = document.getElementById('kt_form');
		if( form.checkValidity() ){
			form.submit();
		} else {
			alert('Please fill all disabled fields.');
		}
	}
</script>




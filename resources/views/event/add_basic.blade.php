@extends('master_template_new')
@section('content')
			
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Add New Event</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Basic Info (1 of 2)</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Details-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Button-->
									<a href="{{ route('view_all_event') }}" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>
									<!--end::Button-->
									<!--begin::Dropdown-->
									<div class="btn-group ml-2">
										
										<button type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base" onclick="SubmitNewUser();">Continue</button>
									</div>
									<!--end::Dropdown-->
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
															<form class="form" id="kt_form" method="post" action="../../../../public/event/add/{{ $id }}/SaveNewEvent">
																{{ csrf_field() }}
																<div class="row justify-content-center">
																	<div class="col-xl-9">
																		<!--begin::Wizard Step 1-->
																		<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
																			<h5 class="text-dark font-weight-bold mb-10">BASIC INFORMATION</h5>
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Organizer</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" type="text" value="{{ Session::get('FULLNAME') }}" disabled />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Event Title</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="TITLE" type="text" value="" required placeholder="Enter event name" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Training Package</label>
																				<div class="col-lg-9 col-xl-9">
																					<select class="form-control form-control-solid form-control-lg m-input" name="ID_CATEGORY" style="color:#333;" required>
																						<option value="">--Choose Training Package--</option>
																						@foreach( $category as $this_category )
																							<option value="{{ $this_category->cat_ID }}" >{{ $this_category->cat_NAME }}</option>
																						@endforeach
																					</select>
																				</div>
																			</div>
																			<!--end::Group-->






																			<h5 class="text-dark font-weight-bold mb-10 mt-10" style="margin-top:50px!important;">DATE AND TIME</h5>
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Event Date</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="EVENT_START_DATE" required type="date" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Event Start Time (format 24h)</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="EVENT_START_TIME" required type="time" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Event Finish Time (format 24h)</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="EVENT_FINISH_TIME" required type="time" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Preparation Time (minute)</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="EVENT_PREPARATION" required type="number" value="0" />
																				</div>
																			</div>
																			<!--end::Group-->






																			<h5 class="text-dark font-weight-bold mb-10 mt-10" style="margin-top:50px!important;">VENUE</h5>
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Room</label>
																				<div class="col-lg-9 col-xl-9">
																					<select class="form-control form-control-solid form-control-lg m-input" name="ID_ROOM" style="color:#333;" required>
																						<option value="">--Choose Room--</option>
																						@foreach( $room as $this_room )
																							<option value="{{ $this_room->roo_ID }}" >{{ $this_room->roo_NAME }}</option>
																						@endforeach
																					</select>
																				</div>
																			</div>
																			<!--end::Group-->






																			<h5 class="text-dark font-weight-bold mb-10 mt-10" style="margin-top:50px!important;">SUMMARY</h5>
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Summary</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="SUMMARY" required type="text" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Event Description</label>
																				<div class="col-lg-9 col-xl-9">
																					<textarea class="form-control form-control-solid form-control-lg" name="DESCRIPTION" required style="min-height:200px;"></textarea>
																				</div>
																			</div>
																			<!--end::Group-->







																		</div>
																		<!--end::Wizard Step 1-->
																	</div>
																</div>
																<input type="hidden" name="currentID" value="{{ $id }}" />
															</form>
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
			alert('Please fill all required fields.');
		}
	}
</script>




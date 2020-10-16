<?php
foreach( $room as $this_room ){
	$this_room = $this_room;
}
?>
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Edit Room</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $this_room->roo_NAME }}</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Details-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Button-->
									<a href="{{ route('view_all_room') }}" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>
							
									@if( in_array('FT-023', Session::get('ARRAY_UAC')) )
									<a class="btn btn-danger font-weight-bold btn-sm px-3 font-size-base ml-2" data-toggle="modal" data-target="#modalDelete" style="color:#fff;">
										Delete
									</a>
									<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">Delete Confirmation</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													Are you sure you want to delete this data? Please note that this action <strong>can not be undone</strong>. 
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
													<a href="../../../../public/room/detail/{{ $this_room->roo_ID }}/delete" class="btn btn-danger" style="color:#fff;">Yes, Delete</a>
												</div>
											</div>
										</div>
									</div>
									@endif
									<!--end::Button-->

									@if( in_array('FT-022', Session::get('ARRAY_UAC')) )
									<!--begin::Dropdown-->
									<div class="btn-group ml-2">
										<button type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base" onclick="UpdateExistingRoom();">Submit</button>
									</div>
									<!--end::Dropdown-->
									@endif

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
															<form class="form" id="kt_form" method="post" action="../../../../public/room/UpdateRoomDetail">
																{{ csrf_field() }}
																<div class="row justify-content-center">
																	<div class="col-xl-9">
																		<!--begin::Wizard Step 1-->
																		<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
																			<h5 class="text-dark font-weight-bold mb-10">Room's Profile Details:</h5>
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Name</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="NAME" placeholder="Ex: Sample Room 1" type="text" value="{{ $this_room->roo_NAME }}" required />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Capacity (Person)</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" type="number" placeholder="Ex: 50"  value="{{ $this_room->roo_CAPACITY }}" name="CAPACITY" required />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> kWh Standard (per hour)</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" type="number" placeholder="Ex: 15" value="{{ $this_room->roo_KWH_STANDARD }}" name="KWH_STANDARD" required />
																				</div>
																			</div>
																			<!--end::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Active Status</label>
																				<div class="col-lg-9 col-xl-9">
																					<select class="form-control form-control-solid form-control-lg m-input" name="IS_ACTIVE" style="color:#333;">
																						<option value="1" <?php if( $this_room->roo_IS_ACTIVE == 1 ){ echo ' selected ';} ?> >Active</option>
																						<option value="0" <?php if( $this_room->roo_IS_ACTIVE == 0 ){ echo ' selected ';} ?> >Not Active</option>
																					</select>
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--end::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Schedule Status</label>
																				<div class="col-lg-9 col-xl-9">
																					<select class="form-control form-control-solid form-control-lg m-input" name="IS_SCHEDULED" style="color:#333;">
																						<option value="1" <?php if( $this_room->roo_IS_SCHEDULED == 1 ){ echo ' selected ';} ?> >Active</option>
																						<option value="0" <?php if( $this_room->roo_IS_SCHEDULED == 0 ){ echo ' selected ';} ?> >Not Active</option>
																					</select>
																				</div>
																			</div>
																			<!--end::Group-->




																		</div>
																		<!--end::Wizard Step 1-->
																	</div>
																</div>

																<div class="row justify-content-center">
																	<div class="col-xl-9">
																		<!--begin::Wizard Step 1-->
																		<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">



																			<div class="alert alert-custom alert-default" role="alert" style="margin-top:25px!important;margin-bottom:25px;">
																				<div class="alert-icon">
																					<span class="svg-icon svg-icon-primary svg-icon-xl">
																						<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
																						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																								<rect x="0" y="0" width="24" height="24" />
																								<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
																								<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
																							</g>
																						</svg>
																						<!--end::Svg Icon-->
																					</span>
																				</div>
																				<div class="alert-text">Only fill routine schedule blow if you choose <strong>Schedule Status</strong> above to <strong>Active</strong>.</div>
																										
																			</div>

																			<h5 class="text-dark font-weight-bold mb-10">Routine Schedule:</h5>

																			<div>
																				<table class="table">
																					<thead>
																						<tr>
																							<th>Day</th>
																							<th>Switch On (24H)</th>
																							<th>Switch Off (24H)</th>
																						</tr>
																					</thead>
																					<tbody>
																						<tr>
																							<td>Monday</td>
																							<td><input class="form-control" type="time" name="roo_START_MONDAY" value="{{ $this_room->roo_START_MONDAY }}" /></td>
																							<td><input class="form-control" type="time" name="roo_STOP_MONDAY" value="{{ $this_room->roo_STOP_MONDAY }}" /></td>
																						</tr>
																						<tr>
																							<td>Tuesday</td>
																							<td><input class="form-control" type="time" name="roo_START_TUESDAY" value="{{ $this_room->roo_START_TUESDAY }}" /></td>
																							<td><input class="form-control" type="time" name="roo_STOP_TUESDAY" value="{{ $this_room->roo_STOP_TUESDAY }}" /></td>
																						</tr>
																						<tr>
																							<td>Wednesday</td>
																							<td><input class="form-control" type="time" name="roo_START_WEDNESDAY" value="{{ $this_room->roo_START_WEDNESDAY }}" /></td>
																							<td><input class="form-control" type="time" name="roo_STOP_WEDNESDAY" value="{{ $this_room->roo_STOP_WEDNESDAY }}" /></td>
																						</tr>
																						<tr>
																							<td>Thursday</td>
																							<td><input class="form-control" type="time" name="roo_START_THURSDAY" value="{{ $this_room->roo_START_THURSDAY }}" /></td>
																							<td><input class="form-control" type="time" name="roo_STOP_THURSDAY" value="{{ $this_room->roo_STOP_THURSDAY }}" /></td>
																						</tr>
																						<tr>
																							<td>Friday</td>
																							<td><input class="form-control" type="time" name="roo_START_FRIDAY" value="{{ $this_room->roo_START_FRIDAY }}" /></td>
																							<td><input class="form-control" type="time" name="roo_STOP_FRIDAY" value="{{ $this_room->roo_STOP_FRIDAY }}" /></td>
																						</tr>
																						<tr>
																							<td>Saturday</td>
																							<td><input class="form-control" type="time" name="roo_START_SATURDAY" value="{{ $this_room->roo_START_SATURDAY }}" /></td>
																							<td><input class="form-control" type="time" name="roo_STOP_SATURDAY" value="{{ $this_room->roo_STOP_SATURDAY }}" /></td>
																						</tr>
																						<tr>
																							<td>Sunday</td>
																							<td><input class="form-control" type="time" name="roo_START_SUNDAY" value="{{ $this_room->roo_START_SUNDAY }}" /></td>
																							<td><input class="form-control" type="time" name="roo_STOP_SUNDAY" value="{{ $this_room->roo_STOP_SUNDAY }}" /></td>
																						</tr>
																					</tbody>
																				</table>
																			</div>




																		</div>
																		<!--end::Wizard Step 1-->
																	</div>



																</div>
																
																<input type="hidden" name="currentID" value="{{ $this_room->roo_ID }}" />
																<input type="hidden" name="currentName" value="{{ $this_room->roo_NAME }}" />
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
	function UpdateExistingRoom(){
		var form = document.getElementById('kt_form');
		if( form.checkValidity() ){
			form.submit();
		} else {
			alert('Please fill all required fields.');
		}
	}
</script>
<?php
foreach( $user as $this_user ){
	$this_user = $this_user;
}

$this_user_uac = $this_user->use_ACCESS_CODE;
$array_this_user_uac = array();
if( strlen($this_user_uac) > 0 ){
	$explode_this_user_uac = explode(',', $this_user_uac);
	$array_this_user_uac = $explode_this_user_uac;
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Edit User</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $this_user->use_FULLNAME }}</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Details-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Button-->
									<a href="{{ route('view_all_user') }}" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>
									
									@if( in_array('FT-019', Session::get('ARRAY_UAC')) )
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
													<a href="../../../../public/user/detail/{{ $this_user->use_ID }}/delete" class="btn btn-danger" style="color:#fff;">Yes, Delete</a>
												</div>
											</div>
										</div>
									</div>
									@endif

									<!--end::Button-->
									@if( in_array('FT-020', Session::get('ARRAY_UAC')) )
									<!--begin::Dropdown-->
									<div class="btn-group ml-2">
										
										<button type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base" onclick="UpdateExistingUser();">Submit</button>
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
															<form class="form" id="kt_form" method="post" action="../../../../public/user/UpdateUserDetail">
																{{ csrf_field() }}
																<div class="row justify-content-center">
																	<div class="col-xl-9">
																		<!--begin::Wizard Step 1-->
																		<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
																			<h5 class="text-dark font-weight-bold mb-10">User's Profile Details:</h5>
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Full Name</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="inputFullname" type="text" value="{{ $this_user->use_FULLNAME }}" required />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Email Address</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="inputEmail" type="email" value="{{ $this_user->use_EMAIL }}" required />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Company</label>
																				<div class="col-lg-9 col-xl-9">
																					<select class="form-control form-control-solid form-control-lg m-input" name="selectCompany" style="color:#333;" required>
																						<option value="">--Choose Company--</option>
																						@foreach( $company as $this_company )
																							<?php
																								if( $this_user->use_d3s3m_company_com_ID == $this_company->com_ID ){
																									$selected_indicator = ' selected ';
																								} else {
																									$selected_indicator = '';
																								}
																							?>
																							<option value="{{ $this_company->com_ID }}" {{ $selected_indicator }}>{{ $this_company->com_NAME }}</option>
																						@endforeach
																					</select>
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Division</label>
																				<div class="col-lg-9 col-xl-9">
																					<select class="form-control form-control-solid form-control-lg m-input" name="selectDivision" style="color:#333;">
																						<option value="0">--Choose Division--</option>
																						@foreach( $division as $this_division )
																							<?php
																								if( $this_user->use_d3s3m_division_div_ID == $this_division->div_ID ){
																									$selected_indicator = ' selected ';
																								} else {
																									$selected_indicator = '';
																								}
																							?>
																							<option value="{{ $this_division->div_ID }}" {{ $selected_indicator }}>{{ $this_division->div_NAME }}</option>
																						@endforeach
																					</select>
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label"><span style="color:red;">*</span> Role</label>
																				<div class="col-lg-9 col-xl-9">
																					<select class="form-control form-control-solid form-control-lg m-input" name="selectRole" required style="color:#333;" >
																						<option value="">--Choose Role--</option>
																						@foreach( $role as $this_role )
																							<?php
																								if( $this_user->use_d3s3m_role_rol_ID == $this_role->rol_ID ){
																									$selected_indicator = ' selected ';
																								} else {
																									$selected_indicator = '';
																								}
																							?>
																							<option value="{{ $this_role->rol_ID }}" {{ $selected_indicator }}>{{ $this_role->rol_NAME }}</option>
																						@endforeach
																					</select>
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Active Status</label>
																				<div class="col-lg-9 col-xl-9">
																					<select class="form-control form-control-solid form-control-lg m-input" name="checkboxIsActive" style="color:#333;">
																						<option value="1" <?php if( $this_user->use_IS_ACTIVE == 1 ){ echo ' selected ';} ?> >Active</option>
																						<option value="0" <?php if( $this_user->use_IS_ACTIVE == 0 ){ echo ' selected ';} ?> >Not Active</option>
																					</select>
																				</div>
																			</div>
																			<!--end::Group-->


																			<div class="alert alert-custom alert-default" role="alert" style="margin-top:50px!important;">
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
																				<div class="alert-text">Only fill the training target value below if you are choosing <strong>TRAINER</strong> as the role for the person you are about to submit.</div>
																			</div>





																			<h5 class="text-dark font-weight-bold mb-10 mt-10">Training Target (per Month):</h5>
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Training Target</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="numberTargetTraining" type="text" value="{{ $this_user->use_TRAINING_TARGET }}" />
																				</div>
																			</div>
																			<!--end::Group-->




																			
																			<h5 class="text-dark font-weight-bold mb-10 mt-10" style="margin-top:100px!important;width:100%;clear:both;">User Access Control (UAC):</h5>
																			<!--begin::Group-->
																			<div class="form-group">
																				<label style="font-weight:bold;">Main Menu</label>
																				<div class="checkbox-inline" style="margin-top:10px;">

																					<div class="row">
																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="MM-001" <?php if( in_array('MM-001', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Dashboard</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="MM-002" <?php if( in_array('MM-002', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Event</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="MM-003" <?php if( in_array('MM-003', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>User</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="MM-004" <?php if( in_array('MM-004', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Room</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="MM-005" <?php if( in_array('MM-005', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Company</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="MM-006" <?php if( in_array('MM-006', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Division</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="MM-007" <?php if( in_array('MM-007', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Training Package</label>
																						</div>
																					</div>

																				</div>
																			</div>
																			<!--end::Group-->


																			<!--begin::Group-->
																			<div class="form-group">
																				<label style="font-weight:bold;">Dashboard</label>
																				<div class="checkbox-inline" style="margin-top:10px;">

																					<div class="row">
																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="SM-008" <?php if( in_array('SM-008', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Dashboard per training package</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="SM-009" <?php if( in_array('SM-009', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Dashboard per event</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="SM-010" <?php if( in_array('SM-010', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Dashboard per room</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="SM-011" <?php if( in_array('SM-011', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Dashboard per user</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-012" <?php if( in_array('FT-012', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Dashboard generator</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-013" <?php if( in_array('FT-013', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Add New Dashboard Item</label>
																						</div>

																					</div>

																				</div>
																			</div>
																			<!--end::Group-->


																			<!--begin::Group-->
																			<div class="form-group">
																				<label style="font-weight:bold;">Event</label>
																				<div class="checkbox-inline" style="margin-top:10px;">

																					<div class="row">

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-014" <?php if( in_array('FT-014', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Add New Event</label>
																						</div>
																					
																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-015" <?php if( in_array('FT-015', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Approve or Reject Event</label>
																						</div>
																					
																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-016" <?php if( in_array('FT-016', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Blast Invitation</label>
																						</div>

																					</div>

																				</div>
																			</div>
																			<!--end::Group-->


																			<!--begin::Group-->
																			<div class="form-group">
																				<label style="font-weight:bold;">User</label>
																				<div class="checkbox-inline" style="margin-top:10px;">

																					<div class="row">

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-017" <?php if( in_array('FT-017', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Add New User</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-018" <?php if( in_array('FT-018', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Upload and Download User CSV</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-019" <?php if( in_array('FT-019', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Delete user</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-020" <?php if( in_array('FT-020', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Update user</label>
																						</div>

																					</div>

																				</div>
																			</div>
																			<!--end::Group-->


																			<!--begin::Group-->
																			<div class="form-group">
																				<label style="font-weight:bold;">Room</label>
																				<div class="checkbox-inline" style="margin-top:10px;">

																					<div class="row">

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-021" <?php if( in_array('FT-021', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Add Room</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-022" <?php if( in_array('FT-022', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Update Room</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-023" <?php if( in_array('FT-023', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Delete Room</label>
																						</div>

																					</div>

																				</div>
																			</div>
																			<!--end::Group-->


																			<!--begin::Group-->
																			<div class="form-group">
																				<label style="font-weight:bold;">Company</label>
																				<div class="checkbox-inline" style="margin-top:10px;">

																					<div class="row">

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-024" <?php if( in_array('FT-024', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Add Company</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-025" <?php if( in_array('FT-025', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Update Company</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-026" <?php if( in_array('FT-026', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Delete Company</label>
																						</div>

																					</div>

																				</div>
																			</div>
																			<!--end::Group-->


																			<!--begin::Group-->
																			<div class="form-group">
																				<label style="font-weight:bold;">Division</label>
																				<div class="checkbox-inline" style="margin-top:10px;">

																					<div class="row">

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-027" <?php if( in_array('FT-027', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Add Division</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-028" <?php if( in_array('FT-028', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Update Division</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-029" <?php if( in_array('FT-029', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Delete Division</label>
																						</div>

																					</div>

																				</div>
																			</div>
																			<!--end::Group-->


																			<!--begin::Group-->
																			<div class="form-group">
																				<label style="font-weight:bold;">Training Package</label>
																				<div class="checkbox-inline" style="margin-top:10px;">

																					<div class="row">

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-030" <?php if( in_array('FT-030', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Add Training Package</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-031" <?php if( in_array('FT-031', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Update Training Package</label>
																						</div>

																						<div class="col-md-6" style="margin-bottom:15px;">
																							<label class="checkbox checkbox-lg">
																							<input type="checkbox" name="array_uac[]" value="FT-032" <?php if( in_array('FT-032', $array_this_user_uac) ){ echo ' checked '; } ?> />
																							<span></span>Delete Training Package</label>
																						</div>

																					</div>

																				</div>
																			</div>
																			<!--end::Group-->




																		</div>
																		<!--end::Wizard Step 1-->
																	</div>
																</div>
																
																<input type="hidden" name="currentID" value="{{ $this_user->use_ID }}" />
																<input type="hidden" name="currentEmail" value="{{ $this_user->use_EMAIL }}" />
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
	function UpdateExistingUser(){
		var form = document.getElementById('kt_form');
		if( form.checkValidity() ){
			form.submit();
		} else {
			alert('Please fill all required fields.');
		}
	}
</script>
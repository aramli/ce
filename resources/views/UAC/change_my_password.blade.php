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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Change My Password</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ Session::get('NAME') }}</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Details-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center" style="display:none!important;">
									<!--begin::Button-->
									<a href="{{ route('view_all_user') }}" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>
							
									<a class="btn btn-danger font-weight-bold btn-sm px-3 font-size-base ml-2" data-toggle="modal" data-target="#modalDelete" style="color:#fff;">
										Delete
									</a>

									<!--end::Button-->
									<!--begin::Dropdown-->
									<div class="btn-group ml-2">
										
										<button type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base" onclick="UpdateExistingUser();">Submit</button>
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
															<form class="form" id="kt_form" method="post" action="../../../../public/ChangeMyPassword">
																{{ csrf_field() }}
																<div class="row justify-content-center">
																	<div class="col-xl-9">
																		<!--begin::Wizard Step 1-->
																		<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
																			<!--begin::Row-->
																			<div class="row mb-5">
																				<label class="col-3"></label>
																				<div class="col-9">
																					<div class="alert alert-custom alert-light-danger fade show py-4" role="alert">
																						<div class="alert-icon">
																							<i class="flaticon-warning"></i>
																						</div>
																						<div class="alert-text font-weight-bold">Please don't share your password to anyone.
																						<br />Change your password periodically to prevent unauthorized access.</div>
																						<div class="alert-close">
																							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																								<span aria-hidden="true">
																									<i class="la la-close"></i>
																								</span>
																							</button>
																						</div>
																					</div>
																				</div>
																			</div>
																			<!--end::Row-->
																			<!--begin::Row-->
																			<div class="row">
																				<label class="col-3"></label>
																				<div class="col-9">
																					<h6 class="text-dark font-weight-bold mb-10">Change Your Password Here:</h6>
																				</div>
																			</div>
																			<!--end::Row-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-form-label col-3 text-lg-right text-left">Current Password</label>
																				<div class="col-9">
																					<input class="form-control form-control-lg form-control-solid mb-1" type="password"  name="CurrentPassword" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-form-label col-3 text-lg-right text-left">New Password</label>
																				<div class="col-9">
																					<input class="form-control form-control-lg form-control-solid" type="password"  name="NewPassword" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-form-label col-3 text-lg-right text-left">Confirm Password</label>
																				<div class="col-9">
																					<input class="form-control form-control-lg form-control-solid" type="password"  name="ConfirmPassword" />
																				</div>
																			</div>
																			<!--end::Group-->

																			<div class="form-group row">
																				<label class="col-form-label col-3 text-lg-right text-left"></label>
																				<div class="col-9">
																					<input type="submit" value="Update" class="btn btn-primary btn-full" style="width:100%;" />
																				</div>
																			</div>



																		</div>
																		<!--end::Wizard Step 1-->
																	</div>
																</div>
																
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
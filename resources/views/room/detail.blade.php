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

									<!--end::Button-->
									<!--begin::Dropdown-->
									<div class="btn-group ml-2">
										
										<button type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base" onclick="UpdateExistingRoom();">Submit</button>
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
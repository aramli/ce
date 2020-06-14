<?php
foreach( $user as $this_user ){
	$this_user = $this_user;
}
?>
@extends('master_template')
@section('content')
	<style>
	select{
		color:#000;
	}
	</style>

			<form action="../UpdateUserDetail" method="post" class="forms-sample">
				{{ csrf_field() }}
				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">User Detail</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<a href="{{ route('view_all_user') }}" class="btn btn-outline-light btn-icon-text mr-2 mb-2 mb-md-0" style="color:#000;">
								<i class="btn-icon-prepend" data-feather="arrow-left"></i>
								Back
							</a>
							<a class="btn btn-danger btn-icon-text mr-2 mb-2 mb-md-0" data-toggle="modal" data-target="#modalDelete" style="color:#fff;">
								<i class="btn-icon-prepend" data-feather="trash"></i>
								Delete
							</a>
							<button type="submit" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
								<i class="btn-icon-prepend" data-feather="save"></i>
								Save
							</button>
						</div>
					</div>

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
									<a href="{{ $this_user->ID }}/delete" class="btn btn-danger" style="color:#fff;">Yes, Delete</a>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">User Detail Information</h6>
										
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Full Name:</label>
										<input type="text" class="form-control m-input" placeholder="Enter full name" value="{{ $this_user->FULLNAME }}" name="inputFullname" required>
									</div>
									<div class="form-group m-form__group">
										<label><span style="color:red;">*</span> Email address:</label>
										<input type="email" class="form-control m-input" placeholder="Enter email" value="{{ $this_user->EMAIL }}" name="inputEmail" required >
									</div>
									<div class="form-group m-form__group">
										<label><span style="color:red;">*</span> Company:</label>
										<select class="form-control m-input" name="selectCompany" style="color:#333;">
											<option value="">--Choose Company--</option>
											@foreach( $company as $this_company )
												<?php
													if( $this_user->ID_COMPANY == $this_company->ID ){
														$selected_indicator = ' selected ';
													} else {
														$selected_indicator = '';
													}
												?>
												<option value="{{ $this_company->ID }}" {{ $selected_indicator }}>{{ $this_company->NAME }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group m-form__group">
										<label>Division:</label>
										<select class="form-control m-input" name="selectDivision" style="color:#333;">
											<option value="0">--Choose Division--</option>
											@foreach( $division as $this_division )
												<?php
													if( $this_user->ID_DIVISION == $this_division->ID ){
														$selected_indicator = ' selected ';
													} else {
														$selected_indicator = '';
													}
												?>
												<option value="{{ $this_division->ID }}" {{ $selected_indicator }}>{{ $this_division->NAME }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group m-form__group">
										<label><span style="color:red;">*</span> Role:</label>
										<select class="form-control m-input" name="selectRole" required  id="div_choose_role" onchange="RefreshTargetDiv();" style="color:#333;" >
											<option value="">--Choose Role--</option>
											@foreach( $role as $this_role )
												<?php
													if( $this_user->ID_ROLE == $this_role->ID ){
														$selected_indicator = ' selected ';
													} else {
														$selected_indicator = '';
													}
												?>
												<option value="{{ $this_role->ID }}" {{ $selected_indicator }}>{{ $this_role->NAME }}</option>
											@endforeach
										</select>
									</div>
									<?php
									if( $this_user->ID_ROLE == 2 ){
										$training_target_style = "display:block;";
									} else {
										$training_target_style = "display:none;";
									}
									?>
									<div class="form-group m-form__group" id="div_set_target" style="{{ $training_target_style }}">
										<label>Training Target (per Month):</label>
										<input type="number" class="form-control m-input" placeholder="0" value="{{ $this_user->TRAINING_TARGET }}" name="numberTargetTraining" >
									</div>
									<div class="form-group m-form__group">
										<label>Active Status:</label>
										<select class="form-control m-input" name="checkboxIsActive" style="color:#333;" >
											<option value="1" <?php if( $this_user->IS_ACTIVE == 1 ){ echo ' selected ';} ?> >Active</option>
											<option value="0" <?php if( $this_user->IS_ACTIVE == 0 ){ echo ' selected ';} ?> >Not Active</option>
										</select>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" name="currentID" value="{{ $this_user->ID }}" />
				<input type="hidden" name="currentEmail" value="{{ $this_user->EMAIL }}" />
			</form>
@endsection

<script>
	
	// RefreshTargetDiv();		
	function RefreshTargetDiv(){
		if( document.getElementById('div_choose_role').value == 2 ){
			document.getElementById('div_set_target').style.display = "block";
		} else {
			document.getElementById('div_set_target').style.display = "none";
		}	
	}
	RefreshTargetDiv();
	
</script>
<?php
foreach( $category as $this_category ){
	$this_category = $this_category;
}
?>
@extends('master_template')
@section('content')
	<style>
	select{
		color:#000;
	}
	</style>

			<form action="../UpdateCategoryDetail" method="post" class="forms-sample">
				{{ csrf_field() }}
				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">Event Category Detail</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<a href="{{ route('view_all_category') }}" class="btn btn-outline-light btn-icon-text mr-2 mb-2 mb-md-0" style="color:#000;">
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
									<a href="{{ $this_category->ID }}/delete" class="btn btn-danger" style="color:#fff;">Yes, Delete</a>
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
										<input type="text" class="form-control m-input" placeholder="Enter full name" value="{{ $this_category->NAME }}" name="NAME" required>
									</div>
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Type:</label>
										<select name="TYPE" required class="form-control m-input" required style="color:#000;">
											<option value="">--Choose Type--</option>
											<option value="1" <?php if($this_category->TYPE == 1){ echo ' selected '; } ?> >Training</option>
											<option value="2" <?php if($this_category->TYPE == 2){ echo ' selected '; } ?> >Meeting</option>
										</select>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" name="currentID" value="{{ $this_category->ID }}" />
				<input type="hidden" name="currentName" value="{{ $this_category->NAME }}" />
			</form>
@endsection
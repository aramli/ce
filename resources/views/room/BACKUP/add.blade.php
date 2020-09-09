@extends('master_template')
@section('content')
			<form action="SaveNewRoom" method="post" class="forms-sample">
				{{ csrf_field() }}
				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">Add New Room</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<a href="{{ route('view_all_room') }}" class="btn btn-outline-light btn-icon-text mr-2 mb-2 mb-md-0" style="color:#000;">
								<i class="btn-icon-prepend" data-feather="arrow-left"></i>
								Back
							</a>
							<button type="submit" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
								<i class="btn-icon-prepend" data-feather="save"></i>
								Save
							</button>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">Room Detail Information</h6>
										
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Name:</label>
										<input type="text" class="form-control m-input" placeholder="Ex: Sample Room 1" value="" name="NAME" required >
									</div>
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Capacity (Person):</label>
										<input type="number" class="form-control m-input" placeholder="Ex: 50" value="" name="CAPACITY" required >
									</div>
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> kWh Standard (per hour):</label>
										<input type="number" class="form-control m-input" placeholder="Ex: 15" value="" name="KWH_STANDARD" required >
									</div>
									<div class="form-group m-form__group">
										<label>Active Status:</label>
										<select class="form-control m-input" name="IS_ACTIVE" style="color:#333;">
											<option value="1">Active</option>
											<option value="0">Not Active</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
@endsection
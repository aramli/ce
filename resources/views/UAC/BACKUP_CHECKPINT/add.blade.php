@extends('master_template')
@section('content')
			<form action="SaveNewUser" method="post" class="forms-sample">
				{{ csrf_field() }}
				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">Add New User</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<a href="{{ route('view_all_user') }}" class="btn btn-outline-light btn-icon-text mr-2 mb-2 mb-md-0" style="color:#000;">
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
									<h6 class="card-title">User Detail Information</h6>
										
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Full Name:</label>
										<input type="text" class="form-control m-input" placeholder="Enter full name" value="" name="inputFullname" required >
									</div>
									<div class="form-group m-form__group">
										<label><span style="color:red;">*</span> Email address:</label>
										<input type="email" class="form-control m-input" placeholder="Enter email" value="" name="inputEmail" required >
									</div>
									<div class="form-group m-form__group">
										<label><span style="color:red;">*</span> Company:</label>
										<select class="form-control m-input" name="selectCompany" style="color:#333;">
											<option value="">--Choose Company--</option>
											@foreach( $company as $this_company )
												<option value="{{ $this_company->com_ID }}">{{ $this_company->com_NAME }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group m-form__group">
										<label>Division:</label>
										<select class="form-control m-input" name="selectDivision" style="color:#333;">
											<option value="0">--Choose Division--</option>
											@foreach( $division as $this_division )
												<option value="{{ $this_division->div_ID }}">{{ $this_division->div_NAME }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group m-form__group">
										<label><span style="color:red;">*</span> Role:</label>
										<select class="form-control m-input" name="selectRole" required  id="div_choose_role" onchange="RefreshTargetDiv();" style="color:#333;" >
											<option value="">--Choose Role--</option>
											@foreach( $role as $this_role )
												<option value="{{ $this_role->rol_ID }}">{{ $this_role->rol_NAME }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group m-form__group" id="div_set_target" style="display:none;">
										<label>Training Target (per Month):</label>
										<input type="number" class="form-control m-input" placeholder="0" value="" name="numberTargetTraining" >
									</div>
									<div class="form-group m-form__group">
										<label>Active Status:</label>
										<select class="form-control m-input" name="checkboxIsActive" style="color:#333;">
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

<script>
			
	function RefreshTargetDiv(){
		if( document.getElementById('div_choose_role').value == 2 ){
			document.getElementById('div_set_target').style.display = "block";
		} else {
			document.getElementById('div_set_target').style.display = "none";
		}	
	}
	RefreshTargetDiv();
	
</script>
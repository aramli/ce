@extends('master_template')
@section('content')
<?php
foreach( $basic_info as $this_basic_info ){
	$this_basic_info = $this_basic_info;
}
?>
			<form action="SaveNewEvent" method="post" class="forms-sample">
				{{ csrf_field() }}
				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">Add New Event - Basic (1/2)</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<a href="{{ route('view_all_event') }}" class="btn btn-outline-light btn-icon-text mr-2 mb-2 mb-md-0" style="color:#000;">
								<i class="btn-icon-prepend" data-feather="arrow-left"></i>
								Back
							</a>
							<button type="submit" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
								<i class="btn-icon-prepend" data-feather="user"></i>
								Continue
							</button>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">Basic Information</h6>
									
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Organizer:</label>
										<input type="text" class="form-control m-input" value="{{ Session::get('FULLNAME') }}" disabled >
									</div>
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Event Title:</label>
										<input type="text" class="form-control m-input" placeholder="Enter event name" value="{{ $this_basic_info->TITLE }}" name="TITLE" required >
									</div>
									<div class="form-group m-form__group">
										<label><span style="color:red;">*</span> Category:</label>
										<select class="form-control m-input" name="ID_CATEGORY" style="color:#333;">
											<option value="">--Choose Category--</option>
											@foreach( $category as $this_category )
												<?php
												if( $this_basic_info->ID_CATEGORY == $this_category->ID ){
													$selected_category = ' selected ';
												} else {
													$selected_category = '';
												}
												?>
												<option value="{{ $this_category->ID }}" {{ $selected_category }} >{{ $this_category->NAME }}</option>
											@endforeach
										</select>
									</div>


								</div>
							</div>
						</div>
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">Date and Time</h6>
										
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Event Date:</label>
										<input type="date" class="form-control m-input" placeholder="Choose event date" value="{{ substr($this_basic_info->EVENT_START,0,10) }}" name="EVENT_START_DATE" required >
									</div>
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Event Start Time (format 24h):</label>
										<input type="time" class="form-control m-input" placeholder="Ex: 13.00" value="{{ substr($this_basic_info->EVENT_START,11,5) }}" name="EVENT_START_TIME" required >
									</div>
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Event Finish Time (format 24h):</label>
										<input type="time" class="form-control m-input" placeholder="Ex: 15.00" value="{{ substr($this_basic_info->EVENT_FINISH,11,5) }}" name="EVENT_FINISH_TIME" required >
									</div>
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Preparation Time (minute):</label>
										<input type="number" class="form-control m-input" placeholder="Ex: 15" value="{{ $this_basic_info->EVENT_PREPARATION }}" name="EVENT_PREPARATION" required >
									</div>


								</div>
							</div>
						</div>
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">Venue</h6>
										
									<div class="form-group m-form__group">
										<label><span style="color:red;">*</span> Room:</label>
										<select class="form-control m-input" name="ID_ROOM" style="color:#333;">
											<option value="">--Choose Room--</option>
											@foreach( $room as $this_room )
												<?php
												if( $this_basic_info->ID_ROOM == $this_room->ID ){
													$selected_room = ' selected ';
												} else {
													$selected_room = '';
												}
												?>
												<option value="{{ $this_room->ID }}" {{ $selected_room }} >{{ $this_room->NAME }}</option>
											@endforeach
										</select>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">Summary</h6>
										
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Summary:</label>
										<input type="text" class="form-control m-input" placeholder="Choose event date" value="{{ $this_basic_info->SUMMARY }}" name="SUMMARY" required >
									</div>
									<div class="form-group m-form__group">
										<label for="example_input_full_name"><span style="color:red;">*</span> Event Description:</label>
										<textarea class="form-control m-input" name="DESCRIPTION" required>{{ $this_basic_info->DESCRIPTION }}</textarea>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" name="currentID" value="{{ $id }}" />
			</form>
@endsection
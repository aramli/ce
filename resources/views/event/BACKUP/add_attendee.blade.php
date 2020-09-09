@extends('master_template')
@section('content')

			<form action="SubmitForReview" method="post" class="forms-sample">
				{{ csrf_field() }}
				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">Add New Event - Attendee (2/2)</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<a href="basic" class="btn btn-outline-light btn-icon-text mr-2 mb-2 mb-md-0" style="color:#000;">
								<i class="btn-icon-prepend" data-feather="arrow-left"></i>
								Back
							</a>
							<button type="submit" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
								<i class="btn-icon-prepend" data-feather="save"></i>
								Submit for Review
							</button>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">List of User Available</h6>
										
									<table id="dataTableExample" class="table">
										<thead>
											<tr>
												<th>System ID</th>
												<th>Name</th>
												<th>Email</th>
												<th>Division</th>
												<th>Company</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach( $user_list as $this_user_list )
												<?php
												if( in_array($this_user_list->ID, $array_existing_attendee) ){

												} else {
													?>
													<tr>
														<td>{{ $this_user_list->ID }}</td>
														<td>{{ $this_user_list->FULLNAME }}</td>
														<td>{{ $this_user_list->EMAIL }}</td>
														<td>{{ $this_user_list->DIVISION_NAME }}</td>
														<td>{{ $this_user_list->COMPANY_NAME }}</td>
														<td>
															<a href="attendee/{{ $this_user_list->ID }}/register" class="btn btn-primary" style="width:100%;color:#fff;">Add</a>
															<!-- <button class="btn btn-danger" style="width:50%;">Remove</button> -->
														</td>
													</tr>
													<?php
												}
												?>
											@endforeach
										<tbody>
									</table>

								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">Attendees</h6>
										
									<table class="table">
										<thead>
											<tr>
												<th>System ID</th>
												<th>Name</th>
												<th>Email</th>
												<th>Division</th>
												<th>Company</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach( $attendee as $this_attendee )
												<tr>
													<td>{{ $this_attendee->ID }}</td>
													<td>{{ $this_attendee->FULLNAME }}</td>
													<td>{{ $this_attendee->EMAIL }}</td>
													<td>{{ $this_attendee->DIVISION_NAME }}</td>
													<td>{{ $this_attendee->COMPANY_NAME }}</td>
													<td>
														<?php
														if( $this_attendee->ID != Session::get('ID') ){
															?>
															<a href="attendee/{{ $this_attendee->ID }}/remove" class="btn btn-danger" style="width:100%;color:#fff">Remove</a>
															<?php
														}
														?>
													</td>
												</tr>
											@endforeach
										<tbody>
									</table>

								</div>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" name="currentID" value="{{ $id }}" />
			</form>
@endsection
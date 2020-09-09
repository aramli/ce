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
							<h4 class="mb-3 mb-md-0">
								@if( $this_basic_info->STATUS == 1 )
									<span style="font-weight: bold;">[NEW]</span>
								@endif
								@if( $this_basic_info->STATUS == 2 )
									<span style="font-weight: bold;">[APPROVED]</span>
								@endif
								@if( $this_basic_info->STATUS == 3 )
									<span style="font-weight: bold;">[CANCELED]</span>
								@endif
								@if( $this_basic_info->STATUS == 4 )
									<span style="font-weight: bold;">[FINISH]</span>
								@endif
								@if( $this_basic_info->STATUS == 5 )
									<span style="font-weight: bold;">[REJECT]</span>
								@endif
								Event Detail - {{ $this_basic_info->TITLE }}
							</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<a href="{{ route('view_all_event') }}" class="btn btn-outline-light btn-icon-text mr-2 mb-2 mb-md-0" style="color:#000;">
								<i class="btn-icon-prepend" data-feather="arrow-left"></i>
								Back
							</a>

							<!--
							<a href="#" class="btn btn-outline-light btn-icon-text mr-2 mb-2 mb-md-0" style="color:#000;" data-toggle="modal" data-target="#modalDeleteEvent">
								<i class="btn-icon-prepend" data-feather="trash"></i>
								Delete
							</a>
              				<div class="modal fade" id="modalDeleteEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                				<div class="modal-dialog modal-dialog-centered" role="document">
                  					<div class="modal-content">
                    					<div class="modal-header">
                      						<h5 class="modal-title" id="exampleModalCenterTitle">Delete Confirmation</h5>
                      						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        						<span aria-hidden="true">&times;</span>
                      						</button>
                    					</div>
                    					<div class="modal-body">
                      						Are you sure you want to delete this event? <br/><span style="font-style: italic;color:grey;">Please note that data deletion will not be undone.</span>
                    					</div>
                    					<div class="modal-footer">
                      						<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                      						<a href="{{ $this_basic_info->ID }}/DeleteEvent" type="button" class="btn btn-primary">Yes, Delete Event</a>
                    					</div>
                  					</div>
                				</div>
              				</div>
	              			-->

	              			@if( $this_basic_info->STATUS == 1 )
							<a href="#" class="btn btn-danger btn-icon-text mr-2 mb-2 mb-md-0" style="color:#fff;" data-toggle="modal" data-target="#modalRejectEvent">
								<i class="btn-icon-prepend" data-feather="slash"></i>
								Reject
							</a>
              				<div class="modal fade" id="modalRejectEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                				<div class="modal-dialog modal-dialog-centered" role="document">
                  					<div class="modal-content">
                    					<div class="modal-header">
                      						<h5 class="modal-title" id="exampleModalCenterTitle">Reject Confirmation</h5>
                      						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        						<span aria-hidden="true">&times;</span>
                      						</button>
                    					</div>
                    					<div class="modal-body">
                      						Are you sure you want to reject this event? <br/><span style="font-style: italic;color:grey;">Please note that this action will not be undone.</span>
                    					</div>
                    					<div class="modal-footer">
                      						<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                      						<a href="{{ $this_basic_info->ID }}/RejectEvent" type="button" class="btn btn-danger">Yes, Reject Event</a>
                    					</div>
                  					</div>
                				</div>
              				</div>
              				@endif


              				@if( $this_basic_info->STATUS == 1 )
							<a href="#" class="btn btn-primary btn-icon-text mb-2 mb-md-0" style="color:#fff;" data-toggle="modal" data-target="#modalApproveEvent">
								<i class="btn-icon-prepend" data-feather="check"></i>
								Approve
							</a>
              				<div class="modal fade" id="modalApproveEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                				<div class="modal-dialog modal-dialog-centered" role="document">
                  					<div class="modal-content">
                    					<div class="modal-header">
                      						<h5 class="modal-title" id="exampleModalCenterTitle">Approve Confirmation</h5>
                      						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        						<span aria-hidden="true">&times;</span>
                      						</button>
                    					</div>
                    					<div class="modal-body">
                      						Are you sure you want to approve this event? <br/><span style="font-style: italic;color:grey;">Please note that this action will not be undone.</span>
                    					</div>
                    					<div class="modal-footer">
                      						<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                      						<a href="{{ $this_basic_info->ID }}/ApproveEvent" type="button" class="btn btn-primary">Yes, Approve Event</a>
                    					</div>
                  					</div>
                				</div>
              				</div>
              				@endif


              				@if( $this_basic_info->STATUS == 2 )
							<a href="#" class="btn btn-primary btn-icon-text mb-2 mb-md-0" style="color:#fff;" data-toggle="modal" data-target="#modalBlastInvitation">
								<i class="btn-icon-prepend" data-feather="mail"></i>
								Blast Invitation
							</a>
              				<div class="modal fade" id="modalBlastInvitation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                				<div class="modal-dialog modal-dialog-centered" role="document">
                  					<div class="modal-content">
                    					<div class="modal-header">
                      						<h5 class="modal-title" id="exampleModalCenterTitle">Blast Invitation</h5>
                      						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        						<span aria-hidden="true">&times;</span>
                      						</button>
                    					</div>
                    					<div class="modal-body">
                      						Are you sure you want to blast this event invitation to all participants? <br/><span style="font-style: italic;color:grey;">Please note that this action will not be undone.</span>
                    					</div>
                    					<div class="modal-footer">
                      						<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                      						<a href="{{ $this_basic_info->ID }}/BlastInvitation" type="button" class="btn btn-primary">Yes, Send Now</a>
                    					</div>
                  					</div>
                				</div>
              				</div>
              				@endif

						</div>
					</div>

					<div class="row">
						<div class="col-md-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">Basic Information</h6>
									
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Event Title</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email" value="{{ $this_basic_info->TITLE }}" disabled style="background:#fff;">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Organizer</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email" value="{{ $this_basic_info->ORGANIZER_NAME }}" disabled style="background:#fff;">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Training Package</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email" value="{{ $this_basic_info->CATEGORY_NAME }}" disabled style="background:#fff;">
										</div>
									</div>
										
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Room</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email" value="{{ $this_basic_info->ROOM_NAME }}" disabled style="background:#fff;">
										</div>
									</div>
										
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Creation Date</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email" value="{{ $this_basic_info->DATE_CREATED }}" disabled style="background:#fff;">
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="col-md-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">Date and Time</h6>
									
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Event Date</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email" value="{{  date('F jS, Y', strtotime(substr($this_basic_info->EVENT_START,0,10))) }}" disabled style="background:#fff;">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Time</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email" value="{{ substr($this_basic_info->EVENT_START,11,5) }} - {{ substr($this_basic_info->EVENT_FINISH,11,5) }}" disabled style="background:#fff;">
										</div>
									</div>
									
									<?php
									$d1 = new DateTime($this_basic_info->EVENT_START);
									$d2 = new DateTime($this_basic_info->EVENT_FINISH);
									$interval = $d2->diff($d1);
									
									// echo $interval->format('%H hours, %I minutes');
									?>
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Event Duration</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email" value="{{ $interval->format('%H hours, %I minutes') }}" disabled style="background:#fff;">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Preparation Time (Minutes)</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email" value="{{ $this_basic_info->EVENT_PREPARATION }}" disabled style="background:#fff;">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Event Initiation</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email" value="{{ date('F jS, Y', strtotime(substr($this_basic_info->EVENT_INITIATION,0,10))) }} at {{ substr($this_basic_info->EVENT_INITIATION,11,5) }}" disabled style="background:#fff;">
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">Summary</h6>

									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Summary</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email" value="{{ $this_basic_info->SUMMARY }}" disabled style="background:#fff;">
										</div>
									</div>

									<div class="form-group row">
										<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Event Description</label>
										<div class="col-sm-9">
											<textarea class="form-control" disabled style="background:#fff;height:100px;">{{ $this_basic_info->DESCRIPTION }}</textarea>
										</div>
									</div>

								</div>
							</div>
						</div>

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
												</tr>
											@endforeach
										<tbody>
									</table>

								</div>
							</div>
						</div>



					</div>
				</div>
			</form>
@endsection
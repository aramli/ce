@extends('master_template')
@section('content')

				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">All Registered Events</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<a href="{{ route('create_temp_event') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0" style="color:#fff;">
								<i class="btn-icon-prepend" data-feather="plus"></i>
								Add New Event
							</a>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">List of All Events</h6>
										
									<table id="dataTableExample" class="table">
										<thead>
											<tr>
												<th>System ID</th>
												<th>Title</th>
												<th>Training Package</th>
												<th>Event Start</th>
												<th>Room</th>
												<th>Organizer</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach( $event as $this_event )
												<tr>
													<td>{{ $this_event->ID }}</td>
													<td>{{ $this_event->TITLE }}</td>
													<td>{{ $this_event->CATEGORY_NAME }}</td>
													<td>{{ $this_event->EVENT_START }}</td>
													<td>{{ $this_event->ROOM_NAME }}</td>
													<td>{{ $this_event->ORGANIZER_NAME }}</td>
													<td>
														@if( $this_event->STATUS == 1 )
															<span class="badge badge-warning" style="width:100%;">New</span>
														@endif
														@if( $this_event->STATUS == 2 )
															<span class="badge badge-success" style="width:100%;">Approve</span>
														@endif
														@if( $this_event->STATUS == 3 )
															<span class="badge badge-danger" style="width:100%;">Cancel</span>
														@endif
														@if( $this_event->STATUS == 4 )
															<span class="badge badge-primary" style="width:100%;">Finished</span>
														@endif
														@if( $this_event->STATUS == 5 )
															<span class="badge badge-danger" style="width:100%;">Rejected</span>
														@endif
													</td>
													<td>
														<a href="detail/{{ $this_event->ID }}"><i data-feather="edit"></i></a>
														<!-- <button class="btn btn-danger" style="width:50%;">Remove</button> -->
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
			
@endsection
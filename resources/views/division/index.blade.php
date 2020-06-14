@extends('master_template')
@section('content')
			
				{{ csrf_field() }}
				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">Division Management</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<a href="{{ route('add_new_division') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
								<i class="btn-icon-prepend" data-feather="plus"></i>
								Add Division
							</a>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title">Master Data</h6>
									<div class="table-responsive">
										<table id="dataTableExample" class="table">
											<thead>
												<tr>
													<th>System ID</th>
													<th>Name</th>
													<th>Registered User</th>
													<th>Active User</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach( $division as $this_division )
												<tr>
													<td>{{ $this_division->ID }}</td>
													<td>{{ $this_division->NAME }}</td>
													<td>{{ $this_division->TOTAL_USER }}</td>
													<td>{{ $this_division->ACTIVE_USER }}</td>
													<td>
														<a href="detail/{{ $this_division->ID }}"><i data-feather="edit" style="height:15px;"></i></a>
														<a href="#" data-toggle="modal" data-target="#modalDelete_{{ $this_division->ID }}"><i data-feather="trash" style="height:15px;"></i></a>
													</td>
												</tr>
												<div class="modal fade" id="modalDelete_{{ $this_division->ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
																<a href="detail/{{ $this_division->ID }}/delete" class="btn btn-danger" style="color:#fff;">Yes, Delete</a>
															</div>
														</div>
													</div>
												</div>
												@endforeach
											<tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
@endsection
@extends('master_template')
@section('content')
			
				{{ csrf_field() }}
				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">User Access Management</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<a href="#" class="btn btn-outline-primary btn-icon-text mr-2 d-none d-md-block" data-toggle="modal" data-target="#modalUploadCSV">
								<i class="btn-icon-prepend" data-feather="upload"></i>
								Upload .csv
							</a>
							<a href="{{ asset('SYSTEM/sample_csv.csv') }}" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
								<i class="btn-icon-prepend" data-feather="download"></i>
								Download .csv sample
							</a>
							<a href="{{ route('add_new_user') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
								<i class="btn-icon-prepend" data-feather="plus"></i>
								Add User
							</a>
						</div>
					</div>

					<div class="modal fade" id="modalUploadCSV" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<form action="UploadUserCSV" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalCenterTitle">Upload CSV file</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<input type="file" name="csvfile" class="file-upload-default" required>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary" style="color:#fff;">Upload</button>
									</div>
								</div>
							</div>
						</form>
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
													<th>Email</th>
													<!-- <th>Division</th> -->
													<!-- <th>Company</th> -->
													<th>Role</th>
													<!-- <th>Registration Date</th> -->
													<th>Last Login</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach( $user as $this_user )
												<tr>
													<td>{{ $this_user->ID }}</td>
													<td>{{ $this_user->FULLNAME }}</td>
													<td>{{ $this_user->EMAIL }}</td>
													<!-- <td>{{ $this_user->ID_DIVISION }}</td> -->
													<!-- <td>{{ $this_user->ID_COMPANY }}</td> -->
													<td>{{ $this_user->ROLE_NAME }}</td>
													<!-- <td>{{ $this_user->DATE_CREATED }}</td> -->
													<td>{{ $this_user->LAST_LOGIN }}</td>
													<td>
														@if($this_user->IS_ACTIVE == 1)
														<span class="badge badge-success" style="width:100%;">Active</span>
														@endif
														@if($this_user->IS_ACTIVE == 0)
														<span class="badge badge-danger" style="width:100%;">Not Active</span>
														@endif
													</td>
													<td>
														<a href="detail/{{ $this_user->ID }}"><i data-feather="edit" style="height:15px;"></i></a>
														<a href="#" data-toggle="modal" data-target="#modalDelete_{{ $this_user->ID }}"><i data-feather="trash" style="height:15px;"></i></a>
													</td>
												</tr>
												<div class="modal fade" id="modalDelete_{{ $this_user->ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
																<a href="detail/{{ $this_user->ID }}/delete" class="btn btn-danger" style="color:#fff;">Yes, Delete</a>
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
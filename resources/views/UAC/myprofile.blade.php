@extends('master_template')
@section('content')
				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">My Profile and Statistic</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<a href="#" class="btn btn-primary btn-icon-text mr-2 mb-2 mb-md-0" style="color:#fff;" data-toggle="modal" data-target="#modalChangePassword">
								<i class="btn-icon-prepend" data-feather="lock"></i>
								Change Password
							</a>
              				<div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                				<div class="modal-dialog modal-dialog-centered" role="document">

                					
                  					<div class="modal-content">
                  						<form action="ChangeMyPassword" method="post">
                  							{{ csrf_field() }}
	                    					<div class="modal-header">
	                      						<h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
	                      						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        						<span aria-hidden="true">&times;</span>
	                      						</button>
	                    					</div>
	                    					<div class="modal-body">
                    							<div class="row">
													<div class="col-md-12 grid-margin stretch-card">
														<div class="card">
															<div class="card-body">
																	
																<div class="form-group m-form__group">
																	<label for="example_input_full_name"><span style="color:red;">*</span> Current Password:</label>
																	<input type="password" class="form-control m-input" placeholder="Enter full name" value="" name="CurrentPassword" required >
																</div>
																<div class="form-group m-form__group">
																	<label for="example_input_full_name"><span style="color:red;">*</span> New Password:</label>
																	<input type="password" class="form-control m-input" placeholder="Enter full name" value="" name="NewPassword" required >
																</div>
																<div class="form-group m-form__group">
																	<label for="example_input_full_name"><span style="color:red;">*</span> Confirm Password:</label>
																	<input type="password" class="form-control m-input" placeholder="Enter full name" value="" name="ConfirmPassword" required >
																</div>
															</div>
														</div>
													</div>
												</div>
	                    					</div>
	                    					<div class="modal-footer">
	                      						<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
	                      						<button type="submit" class="btn btn-primary">Update</button>
	                    					</div>
	                    				</form>
                  					</div>

                				</div>
              				</div>



							<a href="#" class="btn btn-primary btn-icon-text mr-2 mb-2 mb-md-0" style="color:#fff;" data-toggle="modal" data-target="#modalUpdateProfile">
								<i class="btn-icon-prepend" data-feather="edit"></i>
								Update Profile
							</a>
              				<div class="modal fade" id="modalUpdateProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                				<div class="modal-dialog modal-dialog-centered" role="document">

                					
                  					<div class="modal-content">
                  						<form action="UpdateMyProfile" method="post">
                  							{{ csrf_field() }}
	                    					<div class="modal-header">
	                      						<h5 class="modal-title" id="exampleModalCenterTitle">Update My Profile</h5>
	                      						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        						<span aria-hidden="true">&times;</span>
	                      						</button>
	                    					</div>
	                    					<div class="modal-body">
                    						
                    							<?php
                    							foreach( $profile as $this_profile ){
                    								$this_profile = $this_profile;
                    							}
                    							?>
                    							<div class="row">
													<div class="col-md-12 grid-margin stretch-card">
														<div class="card">
															<div class="card-body">
																<h6 class="card-title">User Detail Information</h6>
																	
																<div class="form-group m-form__group">
																	<label for="example_input_full_name"><span style="color:red;">*</span> Full Name:</label>
																	<input type="text" class="form-control m-input" placeholder="Enter full name" value="{{ $this_profile->FULLNAME }}" name="inputFullname" required >
																</div>
																<div class="form-group m-form__group">
																	<label><span style="color:red;">*</span> Email address:</label>
																	<input type="email" class="form-control m-input" placeholder="Enter email" value="{{ $this_profile->EMAIL }}" name="inputEmail" required >
																</div>
															</div>
														</div>
													</div>
												</div>
	                    					</div>
	                    					<div class="modal-footer">
	                      						<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
	                      						<button type="submit" class="btn btn-primary">Update</button>
	                    					</div>
	                    				</form>
                  					</div>

                				</div>
              				</div>



						</div>
					</div>
					<div class="row">
						<div class="col-12 col-xl-12 stretch-card">
							<div class="row flex-grow">

								<div class="col-md-3 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-between align-items-baseline">
												<h6 class="card-title mb-0">Event Created</h6>
											</div>
											<div class="row" style="margin-top:10px;">
												<div class="col-12 col-md-12 col-xl-12">
													<h3>{{ $counter_event_created }}</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-between align-items-baseline">
												<h6 class="card-title mb-0">Attend</h6>
											</div>
											<div class="row" style="margin-top:10px;">
												<div class="col-12 col-md-12 col-xl-12">
													<h3>{{ $counter_event_attend }}</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-between align-items-baseline">
												<h6 class="card-title mb-0">Absence</h6>
											</div>
											<div class="row" style="margin-top:10px;">
												<div class="col-12 col-md-12 col-xl-12">
													<h3>{{ $counter_event_absence }}</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-between align-items-baseline">
												<h6 class="card-title mb-0">Energy (kWh)</h6>
											</div>
											<div class="row" style="margin-top:10px;">
												<div class="col-12 col-md-12 col-xl-12">
													<h3>{{ number_format($counter_energy_consumption/1000,2,".",",") }}</h3>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<!-- row -->
					<div class="row">
						<div class="col-lg-7 col-xl-8 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-baseline mb-2">
										<h6 class="card-title mb-0">Your Monthly Event Statistcs</h6>
									</div>
									<p class="text-muted mb-4" style="display:none;">Sales are activities related to selling or the number of goods or services sold in a given time period.</p>
									<div class="monthly-sales-chart-wrapper" style="margin-top:40px;">
										<canvas id="monthly-sales-chart"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5 col-xl-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-baseline mb-2">
										<h6 class="card-title mb-0">Training Target This Month</h6>
									</div>
									<div id="KPIBar" class="mx-auto" style="margin-top:20px;"></div>
									<div class="row mt-4 mb-3">
										<div class="col-6 d-flex justify-content-end">
											<div>
												<label class="d-flex align-items-center justify-content-end tx-10 text-uppercase font-weight-medium">Target this month <span class="p-1 ml-1 rounded-circle bg-primary-muted"></span></label>
												<h5 class="font-weight-bold mb-0 text-right">
													{{ $display_training_target }}
												<h5>
											</div>
										</div>
										<div class="col-6">
											<div>
												<label class="d-flex align-items-center tx-10 text-uppercase font-weight-medium"><span class="p-1 mr-1 rounded-circle bg-primary"></span> Event Created</label>
												<h5 class="font-weight-bold mb-0">
													{{ $counter_event_this_month }}
												</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>



					<!-- row -->
					<div class="row" style="display:none;">
						<div class="col-12 col-xl-12 grid-margin stretch-card">
							<div class="card overflow-hidden">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
										<h6 class="card-title mb-0">Monthly Energy Consumption</h6>
										<div class="dropdown">
											<button class="btn p-0" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton3">
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
											</div>
										</div>
									</div>
									<div class="row align-items-start mb-2">
										<div class="col-md-7">
											<p class="text-muted tx-13 mb-3 mb-md-0">Revenue is the income that a business has from its normal business activities, usually from the sale of goods and services to customers.</p>
										</div>
										<div class="col-md-5 d-flex justify-content-md-end">
											<div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
												<button type="button" class="btn btn-outline-primary">Today</button>
												<button type="button" class="btn btn-outline-primary d-none d-md-block">Week</button>
												<button type="button" class="btn btn-primary">Month</button>
												<button type="button" class="btn btn-outline-primary">Year</button>
											</div>
										</div>
									</div>
									<div class="flot-wrapper">
										<div id="flotChart1" class="flot-chart"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- row -->
					<div class="row" style="display:none;">
						<div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-baseline mb-2">
										<h6 class="card-title mb-0">Inbox</h6>
										<div class="dropdown mb-2">
											<button class="btn p-0" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6">
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
											</div>
										</div>
									</div>
									<div class="d-flex flex-column">
										<a href="#" class="d-flex align-items-center border-bottom pb-3">
											<div class="mr-3">
												<img src="../assets/images/faces/face2.jpg" class="rounded-circle wd-35" alt="user">
											</div>
											<div class="w-100">
												<div class="d-flex justify-content-between">
													<h6 class="text-body mb-2">Leonardo Payne</h6>
													<p class="text-muted tx-12">12.30 PM</p>
												</div>
												<p class="text-muted tx-13">Hey! there I'm available...</p>
											</div>
										</a>
										<a href="#" class="d-flex align-items-center border-bottom py-3">
											<div class="mr-3">
												<img src="../assets/images/faces/face3.jpg" class="rounded-circle wd-35" alt="user">
											</div>
											<div class="w-100">
												<div class="d-flex justify-content-between">
													<h6 class="text-body mb-2">Carl Henson</h6>
													<p class="text-muted tx-12">02.14 AM</p>
												</div>
												<p class="text-muted tx-13">I've finished it! See you so..</p>
											</div>
										</a>
										<a href="#" class="d-flex align-items-center border-bottom py-3">
											<div class="mr-3">
												<img src="../assets/images/faces/face4.jpg" class="rounded-circle wd-35" alt="user">
											</div>
											<div class="w-100">
												<div class="d-flex justify-content-between">
													<h6 class="text-body mb-2">Jensen Combs</h6>
													<p class="text-muted tx-12">08.22 PM</p>
												</div>
												<p class="text-muted tx-13">This template is awesome!</p>
											</div>
										</a>
										<a href="#" class="d-flex align-items-center border-bottom py-3">
											<div class="mr-3">
												<img src="../assets/images/faces/face5.jpg" class="rounded-circle wd-35" alt="user">
											</div>
											<div class="w-100">
												<div class="d-flex justify-content-between">
													<h6 class="text-body mb-2">Amiah Burton</h6>
													<p class="text-muted tx-12">05.49 AM</p>
												</div>
												<p class="text-muted tx-13">Nice to meet you</p>
											</div>
										</a>
										<a href="#" class="d-flex align-items-center border-bottom py-3">
											<div class="mr-3">
												<img src="../assets/images/faces/face6.jpg" class="rounded-circle wd-35" alt="user">
											</div>
											<div class="w-100">
												<div class="d-flex justify-content-between">
													<h6 class="text-body mb-2">Yaretzi Mayo</h6>
													<p class="text-muted tx-12">01.19 AM</p>
												</div>
												<p class="text-muted tx-13">Hey! there I'm available...</p>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7 col-xl-8 stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-baseline mb-2">
										<h6 class="card-title mb-0">Projects</h6>
										<div class="dropdown mb-2">
											<button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton7">
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table table-hover mb-0">
											<thead>
												<tr>
													<th class="pt-0">#</th>
													<th class="pt-0">Project Name</th>
													<th class="pt-0">Start Date</th>
													<th class="pt-0">Due Date</th>
													<th class="pt-0">Status</th>
													<th class="pt-0">Assign</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>NobleUI jQuery</td>
													<td>01/01/2020</td>
													<td>26/04/2020</td>
													<td><span class="badge badge-danger">Released</span></td>
													<td>Leonardo Payne</td>
												</tr>
												<tr>
													<td>2</td>
													<td>NobleUI Angular</td>
													<td>01/01/2020</td>
													<td>26/04/2020</td>
													<td><span class="badge badge-success">Review</span></td>
													<td>Carl Henson</td>
												</tr>
												<tr>
													<td>3</td>
													<td>NobleUI ReactJs</td>
													<td>01/05/2020</td>
													<td>10/09/2020</td>
													<td><span class="badge badge-info-muted">Pending</span></td>
													<td>Jensen Combs</td>
												</tr>
												<tr>
													<td>4</td>
													<td>NobleUI VueJs</td>
													<td>01/01/2020</td>
													<td>31/11/2020</td>
													<td><span class="badge badge-warning">Work in Progress</span>
													</td>
													<td>Amiah Burton</td>
												</tr>
												<tr>
													<td>5</td>
													<td>NobleUI Laravel</td>
													<td>01/01/2020</td>
													<td>31/12/2020</td>
													<td><span class="badge badge-danger-muted text-white">Coming soon</span></td>
													<td>Yaretzi Mayo</td>
												</tr>
												<tr>
													<td>6</td>
													<td>NobleUI NodeJs</td>
													<td>01/01/2020</td>
													<td>31/12/2020</td>
													<td><span class="badge badge-primary">Coming soon</span></td>
													<td>Carl Henson</td>
												</tr>
												<tr>
													<td class="border-bottom">3</td>
													<td class="border-bottom">NobleUI EmberJs</td>
													<td class="border-bottom">01/05/2020</td>
													<td class="border-bottom">10/11/2020</td>
													<td class="border-bottom"><span class="badge badge-info-muted">Pending</span></td>
													<td class="border-bottom">Jensen Combs</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- row -->
				</div>
@endsection

@section('additional_bottom_script')
<script>
	$(function() {
  'use strict'

  var gridLineColor = 'rgba(77, 138, 240, .1)';

  var colors = {
    primary:         "#727cf5",
    secondary:       "#7987a1",
    success:         "#42b72a",
    info:            "#68afff",
    warning:         "#fbbc06",
    danger:          "#ff3366",
    light:           "#ececec",
    dark:            "#282f3a",
    muted:           "#686868"
  }

  var flotChart1Data = [
    [0,49.331065063219285],
    [1,48.79814898366035],
    [2,50.61793547911337],
    [3,53.31696317779434],
    [4,54.78560952831719],
    [5,53.84293992505776],
    [6,54.682958355082874],
    [7,56.742547193381654],
    [8,56.99677491680908],
    [9,56.144488388681445],
    [10,56.567122269843885],
    [11,60.355022877262684],
    [12,58.7457726121753],
    [13,61.445407102315514],
    [14,61.112870581452086],
    [15,58.57202276349258],
    [16,54.72497594269612],
    [17,52.070341498681124],
    [18,51.09867716530438],
    [19,47.48185519192089],
    [20,48.57861168097493],
    [21,48.99789250679436],
    [22,53.582491800119456],
    [23,50.28407438696142],
    [24,46.24606628705599],
    [25,48.614330310543856],
    [26,51.75313497797672],
    [27,51.34463925296746],
    [28,50.217320673443936],
    [29,54.657281647073304],
    [30,52.445057217757245],
    [31,53.063914668561345],
    [32,57.07494250387825],
    [33,52.970403392565515],
    [34,48.723854145068756],
    [35,52.69064629353968],
    [36,53.590890118378205],
    [37,58.52332126105745],
    [38,55.1037709679581],
    [39,58.05347017020425],
    [40,61.350810521199946],
    [41,57.746188675088575],
    [42,60.276910973029786],
    [43,61.00841651851749],
    [44,57.786733623457636],
    [45,56.805721677811356],
    [46,58.90301959619822],
    [47,62.45091969566289],
    [48,58.75007922945926],
    [49,58.405842466185355],
    [50,56.746633122658444],
    [51,52.76631598845634],
    [52,52.3020769891715],
    [53,50.56370473325533],
    [54,55.407205992344544],
    [55,50.49825590435839],
    [56,52.4975614755482],
    [57,48.79614749316488],
    [58,47.46776704767111],
    [59,43.317880548036456],
    [60,38.96296121124144],
    [61,34.73218432559628],
    [62,31.033700732272116],
    [63,32.637987000382296],
    [64,36.89513637594264],
    [65,35.89701755609185],
    [66,32.742284578187544],
    [67,33.20516407297906],
    [68,30.82094321791933],
    [69,28.64770271525896],
    [70,28.44679026902145],
    [71,27.737654438195236],
    [72,27.755190738237744],
    [73,25.96228929938593],
    [74,24.38197394166947],
    [75,21.95038772723346],
    [76,22.08944448751686],
    [77,23.54611335622507],
    [78,27.309610481106425],
    [79,30.276849322378055],
    [80,27.25409223418214],
    [81,29.920374921780102],
    [82,25.143447932376702],
    [83,23.09444253479626],
    [84,23.79459089729409],
    [85,23.46775072519832],
    [86,27.9908486073969],
    [87,23.218855925354447],
    [88,23.9163141686872],
    [89,19.217667423877607],
    [90,15.135179958932145],
    [91,15.08666008920407],
    [92,11.006269617032526],
    [93,9.201671310476282],
    [94,7.475865090236113],
    [95,11.645754524211824],
    [96,15.76161040821357],
    [97,13.995208323029495],
    [98,12.59338056489445],
    [99,13.536707176236195],
    [100,15.01308268888571],
    [101,13.957161242832626],
    [102,13.237091619700053],
    [103,18.10178875669874],
    [104,20.634765519499563],
    [105,21.064946755449817],
    [106,25.370593801826132],
    [107,25.321453557866203],
    [108,20.947464543531186],
    [109,18.750516645477425],
    [110,15.382042945356737],
    [111,14.569147793065632],
    [112,17.949159188821604],
    [113,15.965876707018058],
    [114,16.359355082317443],
    [115,14.163139419453657],
    [116,12.106761506858124],
    [117,14.843319717588216],
    [118,17.24291158460492],
    [119,17.799018581487058],
    [120,14.038359368301329],
    [121,18.658227817264983],
    [122,18.463689935573676],
    [123,22.687619584142652],
    [124,25.088957744790036],
    [125,28.184893996099582],
    [126,28.03276492115397],
    [127,24.11167758305713],
    [128,24.28007484247854],
    [129,28.23487421795626],
    [130,26.246971673504287],
    [131,29.330939820784877],
    [132,26.07749855928238],
    [133,23.921786397788168],
    [134,28.825012181053275],
    [135,25.140449169947626],
    [136,21.79048000172746],
    [137,23.05414699421924],
    [138,20.712904460250886],
    [139,29.727388210287337],
    [140,30.219713454550508],
    [141,32.567062865467058],
    [142,31.46105146001275],
    [143,33.699736621958863],
    [144,30.05510726036824],
    [145,34.200669070105356],
    [146,36.938945414022744],
    [147,35.50411643355061],
    [148,34.788500646665874],
    [149,36.97330575970296]
  ];

  // Dashbaord date start
  if($('#dashboardDate').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#dashboardDate').datepicker({
      format: "dd-MM-yyyy",
      todayHighlight: true,
      autoclose: true
    });
    $('#dashboardDate').datepicker('setDate', today);
  }
  // Dashbaord date end

  // Apex chart1 start
  if($('#apexChart1').length) {
    var options1 = {
      chart: {
        type: "line",
        height: 60,
        sparkline: {
          enabled: !0
        }
      },
      series: [{
          data: [3844, 3855, 3841, 3867, 3822, 3843, 3821, 3841, 3856, 3827, 3843]
      }],
      stroke: {
        width: 2,
        curve: "smooth"
      },
      markers: {
        size: 0
      },
      colors: ["#727cf5"],
      tooltip: {
        fixed: {
          enabled: !1
        },
        x: {
          show: !1
        },
        y: {
          title: {
            formatter: function(e) {
              return ""
            }
          }
        },
        marker: {
          show: !1
        }
      }
    };
    new ApexCharts(document.querySelector("#apexChart1"),options1).render();
  }
  // Apex chart1 end

  // Apex chart2 start
  if($('#apexChart2').length) {
    var options2 = {
      chart: {
        type: "bar",
        height: 60,
        sparkline: {
          enabled: !0
        }
      },
      plotOptions: {
        bar: {
          columnWidth: "60%"
        }
      },
      colors: ["#727cf5"],
      series: [{
        data: [36, 77, 52, 90, 74, 35, 55, 23, 47, 10, 63]
      }],
      labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
      xaxis: {
        crosshairs: {
          width: 1
        }
      },
      tooltip: {
        fixed: {
          enabled: !1
        },
        x: {
          show: !1
        },
        y: {
          title: {
            formatter: function(e) {
              return ""
            }
          }
        },
        marker: {
          show: !1
        }
      }
    };
    new ApexCharts(document.querySelector("#apexChart2"),options2).render();
  }
  // Apex chart2 end

  // Apex chart3 start
  if($('#apexChart3').length) {
    var options3 = {
      chart: {
        type: "line",
        height: 60,
        sparkline: {
          enabled: !0
        }
      },
      series: [{
          data: [41, 45, 44, 46, 52, 54, 43, 74, 82, 82, 89]
      }],
      stroke: {
        width: 2,
        curve: "smooth"
      },
      markers: {
        size: 0
      },
      colors: ["#727cf5"],
      tooltip: {
        fixed: {
          enabled: !1
        },
        x: {
          show: !1
        },
        y: {
          title: {
            formatter: function(e) {
              return ""
            }
          }
        },
        marker: {
          show: !1
        }
      }
    };
    new ApexCharts(document.querySelector("#apexChart3"),options3).render();
  }
  // Apex chart3 end

  // Progressgar1 start
  if($('#KPIBar').length) {
    var bar = new ProgressBar.Circle(KPIBar, {
      color: colors.primary,
      trailColor: gridLineColor,
      // This has to be the same size as the maximum width to
      // prevent clipping
      strokeWidth: 4,
      trailWidth: 1,
      easing: 'easeInOut',
      duration: 1400,
      text: {
        autoStyleContainer: false
      },
      from: { color: colors.primary, width: 1 },
      to: { color: colors.primary, width: 4 },
      // Set default step function for all animate calls
      step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);
    
        //var value = Math.round(circle.value() * 100);
        var value = <?php echo $kpi_percentage; ?> * 100;
        if (value === 0) {
          circle.setText('');
        } else {
          circle.setText(value + '%');
        }
    
      }
    });
    bar.text.style.fontFamily = "'Overpass', sans-serif;";
    bar.text.style.fontSize = '3rem';
    
    bar.animate(<?php echo $kpi_percentage; ?>);
  }
  // Progressgar1 start

  // Monthly sales chart start
  if($('#monthly-sales-chart').length) {
    var monthlySalesChart = document.getElementById('monthly-sales-chart').getContext('2d');
      new Chart(monthlySalesChart, {
        type: 'bar',
        data: {
          labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
          datasets: [{
            label: '# of Events',
            data: [<?php echo $implode_array_event_per_month; ?>],
            backgroundColor: colors.primary
          }]
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false,
              labels: {
                display: false
              }
          },
          scales: {
            xAxes: [{
              display: true,
              barPercentage: .3,
              categoryPercentage: .6,
              gridLines: {
                display: false
              },
              ticks: {
                fontColor: '#8392a5',
                fontSize: 10
              }
            }],
            yAxes: [{
              gridLines: {
                color: gridLineColor
              },
              ticks: {
                fontColor: '#8392a5',
                fontSize: 10,
                min: 0,
                max: 30
              }
            }]
          }
        }
      }
    );
  }
  // Monthly sales chart end

});
</script>
@endsection
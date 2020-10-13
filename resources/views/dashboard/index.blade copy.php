@extends('master_template_new')
@section('content')


<!-- WebDataRocks Dark Theme -->
<link rel="stylesheet" type="text/css" href="https://cdn.webdatarocks.com/latest/webdatarocks.min.css" />
<!-- WebDataRocks Scripts -->
<script src="https://cdn.webdatarocks.com/latest/webdatarocks.toolbar.min.js"></script>
<script src="https://cdn.webdatarocks.com/latest/webdatarocks.js"></script>
<!-- WebDataRocks Connector for FusionCharts -->
<script src="https://cdn.webdatarocks.com/_codepen/webdatarocks.fusioncharts.js"></script>
<!-- FusionCharts Script -->
<script src="https://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<!-- FusionCharts Theme -->
<script src="https://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fusion.js"></script>



			
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Header Wrapper-->
						<div class="header-wrapper rounded-top-xl d-flex flex-grow-1 align-items-center">
							<!--begin::Container-->
							<div class="container-fluid d-flex align-items-center justify-content-end justify-content-lg-between flex-wrap">
								<!--begin::Menu Wrapper-->
								<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
									<!--begin::Menu-->
									<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
										<!--begin::Nav-->
										<ul class="menu-nav">
											<li class="menu-item menu-item-submenu menu-item-rel">
												<a href="category" class="menu-link menu-toggle">
													<span class="menu-text">Category</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu menu-item-rel">
												<a href="category" class="menu-link menu-toggle">
													<span class="menu-text">Event</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu menu-item-rel">
												<a href="category" class="menu-link menu-toggle">
													<span class="menu-text">Room</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu menu-item-rel">
												<a href="category" class="menu-link menu-toggle">
													<span class="menu-text">User</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here" data-menu-toggle="click" aria-haspopup="true">
												<a href="javascript:;" class="menu-link menu-toggle">
													<span class="menu-text">Dashboard Generator</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="../../../../public/dashboard/template/category" class="menu-link" target="_blank">
																<span class="menu-text">Category</span>
																<span class="menu-desc"></span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="../../../../public/dashboard/template/event" class="menu-link" target="_blank">
																<span class="menu-text">Event</span>
																<span class="menu-desc"></span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="../../../../public/dashboard/template/room" class="menu-link" target="_blank">
																<span class="menu-text">Room</span>
																<span class="menu-desc"></span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="../../../../public/dashboard/template/user" class="menu-link" target="_blank">
																<span class="menu-text">User</span>
																<span class="menu-desc"></span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
										<!--end::Nav-->
									</div>
									<!--end::Menu-->
								</div>
								<!--end::Menu Wrapper-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center py-3 py-lg-2">
									<!-- Button trigger modal-->
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddDashboard">Launch demo modal</button>
														



								</div>
								<!--end::Toolbar-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Header Wrapper-->
					</div>
					<!--end::Header-->


					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard by <strong>{{ $dashboard_name }}</strong></h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Welcome back, {{ Session::get('FULLNAME') }}</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Info-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container-fluid">
								<!--begin::Card-->
								<div class="card card-custom" style="margin-bottom:50px;">
									<div class="card-body">
										<h1 style="text-align:center;">Event Creation</h1>
										<div id="wdr-component__Event_creation"></div>
										<div id="fusionchartContainer__Event_creation" style="margin-top:1px;"></div>
									</div>
								</div>
								<!--end::Card-->

								<!--begin::Card-->
								<div class="card card-custom" style="margin-bottom:50px;">
									<div class="card-body">
										<h1 style="text-align:center;">Energy Consumption</h1>
										<div id="wdr-component__Energy_consumption"></div>
										<div id="fusionchartContainer__Energy_consumption" style="margin-top:1px;"></div>
									</div>
								</div>
								<!--end::Card-->

							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					@include('include_new.footer')
				</div>
				<!--end::Wrapper-->
				@include('include_new.aside_secondary')

			<script>

				
				var pivot = new WebDataRocks({
					container: "#wdr-component__Event_creation",
					toolbar: true,
					height: 400,
					width: "100%",
					report: {
						dataSource: {
							filename: "<?php echo env('MASTER_JSON_FILE_URL');?>/event__event_creation.json"
						},
						"slice": {
							"rows": [
								{
									"uniqueName": "ORGANIZER"
								}
							],
							"columns": [
								{
									"uniqueName": "Measures"
								},
								{
									"uniqueName": "TRAINING PACKAGE"
								}
							],
							"measures": [
								{
									"uniqueName": "ORGANIZER",
									"aggregation": "count",
									"availableAggregations": [
										"count",
										"distinctcount"
									]
								}
							]
						}
					},
					reportcomplete: function() {
						pivot.off("reportcomplete");
						createFusionChart();
					}
				});

				function createFusionChart() {
					var chart = new FusionCharts({
						"type": "doughnut2d",
						"renderAt": "fusionchartContainer__Event_creation",
					"width": "100%",
					"height": 350
					});

					pivot.fusioncharts.getData({
						type: chart.chartType()
					}, function(data) {
						chart.setJSONData(data);
					chart.setChartAttribute("theme", "fusion"); // apply the FusionCharts theme
						chart.render();
					}, function(data) {
						chart.setJSONData(data);
					chart.setChartAttribute("theme", "fusion"); // apply the FusionCharts theme
					});
				}








				
				var pivot__energy_consumption = new WebDataRocks({
					container: "#wdr-component__Energy_consumption",
					toolbar: true,
					height: 400,
					width: "100%",
					report: {
						dataSource: {
							filename: "<?php echo env('MASTER_JSON_FILE_URL');?>/energy__energy_consumption_rank.json"
						},
						"slice": {
							"rows": [
								{
									"uniqueName": "EVENT_START.Month"
								}
							],
							"columns": [
								{
									"uniqueName": "Measures"
								}
							],
							"measures": [
								{
									"uniqueName": "EVENT TITLE",
									"aggregation": "count",
									"availableAggregations": [
										"count",
										"distinctcount"
									]
								},
								{
									"uniqueName": "ENERGY CONSUMPTION (kWh)",
									"aggregation": "sum"
								}
							]
						}
					},
					reportcomplete: function() {
						pivot__energy_consumption.off("reportcomplete");
						createFusionChart__Energy_consumption();
					}
				});

				function createFusionChart__Energy_consumption() {
					var chart = new FusionCharts({
						"type": "doughnut2d",
						"renderAt": "fusionchartContainer__Energy_consumption",
					"width": "100%",
					"height": 350
					});

					pivot__energy_consumption.fusioncharts.getData({
						type: chart.chartType()
					}, function(data) {
						chart.setJSONData(data);
					chart.setChartAttribute("theme", "fusion"); // apply the FusionCharts theme
						chart.render();
					}, function(data) {
						chart.setJSONData(data);
					chart.setChartAttribute("theme", "fusion"); // apply the FusionCharts theme
					});
				}



				
			</script>

			<!-- Modal-->
			<div class="modal fade" id="modalAddDashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<form action="../../../../public/dashboard/action/AddNewDashboardItem" method="post"  enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add New Dashboard Item</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<i aria-hidden="true" class="ki ki-close"></i>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Data Source</label>
									<select class="form-control" name="select_data_source" required >
										<option value="">--Choose Data Source--</option>
										<option value="category">Category</option>
										<option value="event">Event</option>
										<option value="room">Room</option>
										<option value="user">User</option>
									</select>
								</div>
								<div class="form-group">
									<label>Dashboard Title</label>
									<input type="text" name="dashboard_title" class="form-control" required />
								</div>
								<div class="form-group">
									<label>JSON file</label>
									<input type="file" class="form-control" name="json_file" required />
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Back</button>
								<button type="submit" class="btn btn-primary font-weight-bold">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
@endsection
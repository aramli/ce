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
									<!--begin::Dropdown-->
									<div class="dropdown mr-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
										<a href="#" class="btn btn-icon btn-light h-40px w-40px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon svg-icon-lg svg-icon-info">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Clipboard-check.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
														<path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000" />
														<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
										<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-md dropdown-menu-right">
											<!--begin::Navigation-->
											<ul class="navi navi-hover py-5">
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-drop"></i>
														</span>
														<span class="navi-text">New Group</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-list-3"></i>
														</span>
														<span class="navi-text">Contacts</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-rocket-1"></i>
														</span>
														<span class="navi-text">Groups</span>
														<span class="navi-link-badge">
															<span class="label label-light-primary label-inline font-weight-bold">new</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-bell-2"></i>
														</span>
														<span class="navi-text">Calls</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-gear"></i>
														</span>
														<span class="navi-text">Settings</span>
													</a>
												</li>
												<li class="navi-separator my-3"></li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-magnifier-tool"></i>
														</span>
														<span class="navi-text">Help</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-bell-2"></i>
														</span>
														<span class="navi-text">Privacy</span>
														<span class="navi-link-badge">
															<span class="label label-light-danger label-rounded font-weight-bold">5</span>
														</span>
													</a>
												</li>
											</ul>
											<!--end::Navigation-->
										</div>
									</div>
									<!--end::Dropdown-->
									<!--begin::Dropdown-->
									<div class="dropdown mr-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
										<a href="#" class="btn btn-icon btn-light h-40px w-40px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon svg-icon-lg svg-icon-success">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Files/DownloadedFile.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
										<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-md dropdown-menu-right">
											<!--begin::Navigation-->
											<ul class="navi navi-hover">
												<li class="navi-header font-weight-bold py-4">
													<span class="font-size-lg">Choose Label:</span>
													<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
												</li>
												<li class="navi-separator mb-3 opacity-70"></li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-success">Customer</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-danger">Partner</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-warning">Suplier</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-primary">Member</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-dark">Staff</span>
														</span>
													</a>
												</li>
												<li class="navi-separator mt-3 opacity-70"></li>
												<li class="navi-footer py-4">
													<a class="btn btn-clean font-weight-bold btn-sm" href="#">
													<i class="ki ki-plus icon-sm"></i>Add new</a>
												</li>
											</ul>
											<!--end::Navigation-->
										</div>
									</div>
									<!--end::Dropdown-->
									<!--begin::Dropdown-->
									<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
										<a href="#" class="btn btn-icon btn-light h-40px w-40px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon svg-icon-lg svg-icon-warning">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
														<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
										<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-md dropdown-menu-right">
											<!--begin::Naviigation-->
											<ul class="navi">
												<li class="navi-header font-weight-bold py-5">
													<span class="font-size-lg">Add New:</span>
													<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
												</li>
												<li class="navi-separator mb-3 opacity-70"></li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-shopping-cart-1"></i>
														</span>
														<span class="navi-text">Order</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="navi-icon flaticon2-calendar-8"></i>
														</span>
														<span class="navi-text">Members</span>
														<span class="navi-label">
															<span class="label label-light-danger label-rounded font-weight-bold">3</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="navi-icon flaticon2-telegram-logo"></i>
														</span>
														<span class="navi-text">Project</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="navi-icon flaticon2-new-email"></i>
														</span>
														<span class="navi-text">Record</span>
														<span class="navi-label">
															<span class="label label-light-success label-rounded font-weight-bold">5</span>
														</span>
													</a>
												</li>
												<li class="navi-separator mt-3 opacity-70"></li>
												<li class="navi-footer pt-5 pb-4">
													<a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More options</a>
													<a class="btn btn-clean font-weight-bold btn-sm d-none" href="#" data-toggle="tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
												</li>
											</ul>
											<!--end::Naviigation-->
										</div>
									</div>
									<!--end::Dropdown-->
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
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
@endsection
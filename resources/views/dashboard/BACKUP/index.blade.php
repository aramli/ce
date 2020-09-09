@extends('master_template')
@section('content')

				<link href="https://cdn.webdatarocks.com/latest/webdatarocks.min.css" rel="stylesheet"/>
				<script src="https://cdn.webdatarocks.com/latest/webdatarocks.toolbar.min.js"></script>
				<script src="https://cdn.webdatarocks.com/latest/webdatarocks.js"></script>
				<script src="https://cdn.webdatarocks.com/latest/webdatarocks.googlecharts.js"></script>
				<script src="https://www.gstatic.com/charts/loader.js"></script>



				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">Event Creation Dashboard</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap" style="display:none!important;">
							<div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
								<span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
								<input type="text" class="form-control">
							</div>
							<button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
							<i class="btn-icon-prepend" data-feather="download"></i>
							Import
							</button>
							<button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
							<i class="btn-icon-prepend" data-feather="printer"></i>
							Print
							</button>
							<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
							<i class="btn-icon-prepend" data-feather="download-cloud"></i>
							Download Report
							</button>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div id="wdr-component__event_creation"></div>
						</div>
						<div class="col-6">
							<div id="googlechart-container__event_creation" style="width:750px;height:550px;"></div>
						</div>


						<div class="col-12">
							
							<script>
							var pivot__event_creation = new WebDataRocks({
							    container: "#wdr-component__event_creation",
							    toolbar: true,
							    report: {
							        dataSource: {
							            filename: "<?php echo asset('SYSTEM/reporting/event__event_creation.json'); ?>"
							        },
							        formats: [{
							            maxDecimalPlaces: 2
							        }],
							        "slice": {
								        "rows": [
								            {
								                "uniqueName": "ORGANIZER"
								            },
								            {
								                "uniqueName": "COMPANY"
								            },
								            {
								                "uniqueName": "DIVISION"
								            },
								            {
								                "uniqueName": "CATEGORY"
								            },
								            {
								                "uniqueName": "ROOM"
								            }
								        ],
								        "columns": [
								            {
								                "uniqueName": "Measures"
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
							        pivot__event_creation.off("reportcomplete");
							        pivot__event_creationTableReportComplete = true;
							        createGoogleChart__event_creation();
							    }
							});

							var pivot__event_creationTableReportComplete = false;
							var googleChartsLoaded = false;

							google.charts.load('current', {
							    'packages': ['corechart']
							});
							google.charts.setOnLoadCallback(onGoogleChartsLoaded__event_creation);

							function onGoogleChartsLoaded__event_creation() {
							    googleChartsLoaded = true;
							    if (pivot__event_creationTableReportComplete) {
							        createGoogleChart__event_creation();
							    }
							}

							function createGoogleChart__event_creation() {
							    if (googleChartsLoaded) {
							        pivot__event_creation.googlecharts.getData({
							                type: "column"
							            },
							            drawChart__event_creation,
							            drawChart__event_creation
							        );
							    }
							}

							function drawChart__event_creation(_data) {
							    var data = google.visualization.arrayToDataTable(_data.data);

							    var options = {
							        title: "Event creation statistic",
							        legend: {
							            position: 'top'
							        },
							        is3D: true,
							        colors: ['#66ccff', '#e0440e']
							    };

							    var chart = new google.visualization.ColumnChart(document.getElementById('googlechart-container__event_creation'));
							    chart.draw(data, options);
							}
							</script>
						</div>
					</div>













					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin" style="margin-top:50px;">
						<div>
							<h4 class="mb-3 mb-md-0">Over Target Duration Dashboard</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap" style="display:none!important;">
							<div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
								<span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
								<input type="text" class="form-control">
							</div>
							<button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
							<i class="btn-icon-prepend" data-feather="download"></i>
							Import
							</button>
							<button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
							<i class="btn-icon-prepend" data-feather="printer"></i>
							Print
							</button>
							<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
							<i class="btn-icon-prepend" data-feather="download-cloud"></i>
							Download Report
							</button>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div id="wdr-component__over_target_duration"></div>
						</div>
						<div class="col-6">
							<div id="googlechart-container__over_target_duration" style="width:750px;height:550px;"></div>
						</div>


						<div class="col-12">
							
							<script>
							var pivot__over_target_duration = new WebDataRocks({
							    container: "#wdr-component__over_target_duration",
							    toolbar: true,
							    report: {
							        dataSource: {
							            filename: "<?php echo asset('SYSTEM/reporting/event__over_target_duration.json'); ?>"
							        },
							        formats: [{
							            maxDecimalPlaces: 2
							        }],
							        "slice": {
								        "rows": [
								            {
								                "uniqueName": "EVENT TITLE"
								            }
								        ],
								        "columns": [
								            {
								                "uniqueName": "Measures"
								            }
								        ],
								        "measures": [
								            {
								                "uniqueName": "OVERTIME DURATION (Minute)",
								                "aggregation": "sum"
								            },
								            {
								                "uniqueName": "EVENT TITLE",
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
							        pivot__over_target_duration.off("reportcomplete");
							        pivot__over_target_durationTableReportComplete = true;
							        createGoogleChart__over_target_duration();
							    }
							});

							var pivot__over_target_durationTableReportComplete = false;
							var googleChartsLoaded = false;

							google.charts.load('current', {
							    'packages': ['corechart']
							});
							google.charts.setOnLoadCallback(onGoogleChartsLoaded__over_target_duration);

							function onGoogleChartsLoaded__over_target_duration() {
							    googleChartsLoaded = true;
							    if (pivot__over_target_durationTableReportComplete) {
							        createGoogleChart__over_target_duration();
							    }
							}

							function createGoogleChart__over_target_duration() {
							    if (googleChartsLoaded) {
							        pivot__over_target_duration.googlecharts.getData({
							                type: "column"
							            },
							            drawChart__over_target_duration,
							            drawChart__over_target_duration
							        );
							    }
							}

							function drawChart__over_target_duration(_data) {
							    var data = google.visualization.arrayToDataTable(_data.data);

							    var options = {
							        title: "Over target duration event statistic",
							        legend: {
							            position: 'top'
							        },
							        is3D: true,
							        colors: ['#66ccff', '#e0440e']
							    };

							    var chart = new google.visualization.ColumnChart(document.getElementById('googlechart-container__over_target_duration'));
							    chart.draw(data, options);
							}
							</script>
						</div>
					</div>













					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin" style="margin-top:50px;">
						<div>
							<h4 class="mb-3 mb-md-0">Energy Consumption Dashboard</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap" style="display:none!important;">
							<div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
								<span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
								<input type="text" class="form-control">
							</div>
							<button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
							<i class="btn-icon-prepend" data-feather="download"></i>
							Import
							</button>
							<button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
							<i class="btn-icon-prepend" data-feather="printer"></i>
							Print
							</button>
							<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
							<i class="btn-icon-prepend" data-feather="download-cloud"></i>
							Download Report
							</button>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div id="wdr-component__energy_consumption"></div>
						</div>
						<div class="col-6">
							<div id="googlechart-container__energy_consumption" style="width:750px;height:550px;"></div>
						</div>


						<div class="col-12">
							
							<script>
							var pivot__energy_consumption = new WebDataRocks({
							    container: "#wdr-component__energy_consumption",
							    toolbar: true,
							    report: {
							        dataSource: {
							            filename: "<?php echo asset('SYSTEM/reporting/energy__energy_consumption_rank.json'); ?>"
							        },
							        formats: [{
							            maxDecimalPlaces: 2
							        }],
							        "slice": {
								        "rows": [
								            {
								                "uniqueName": "ORGANIZER"
								            },
								            {
								                "uniqueName": "COMPANY"
								            },
								            {
								                "uniqueName": "DIVISION"
								            },
								            {
								                "uniqueName": "CATEGORY"
								            }
								        ],
								        "columns": [
								            {
								                "uniqueName": "Measures"
								            }
								        ],
								        "measures": [
								            {
								                "uniqueName": "ENERGY CONSUMPTION (kWh)",
								                "aggregation": "sum"
								            }
								        ],
								    }
							    },
							    reportcomplete: function() {
							        pivot__energy_consumption.off("reportcomplete");
							        pivot__energy_consumptionTableReportComplete = true;
							        createGoogleChart__energy_consumption();
							    }
							});

							var pivot__energy_consumptionTableReportComplete = false;
							var googleChartsLoaded = false;

							google.charts.load('current', {
							    'packages': ['corechart']
							});
							google.charts.setOnLoadCallback(onGoogleChartsLoaded__energy_consumption);

							function onGoogleChartsLoaded__energy_consumption() {
							    googleChartsLoaded = true;
							    if (pivot__energy_consumptionTableReportComplete) {
							        createGoogleChart__energy_consumption();
							    }
							}

							function createGoogleChart__energy_consumption() {
							    if (googleChartsLoaded) {
							        pivot__energy_consumption.googlecharts.getData({
							                type: "column"
							            },
							            drawChart__energy_consumption,
							            drawChart__energy_consumption
							        );
							    }
							}

							function drawChart__energy_consumption(_data) {
							    var data = google.visualization.arrayToDataTable(_data.data);

							    var options = {
							        title: "Over target duration event statistic",
							        legend: {
							            position: 'top'
							        },
							        is3D: true,
							        colors: ['#66ccff', '#e0440e']
							    };

							    var chart = new google.visualization.ColumnChart(document.getElementById('googlechart-container__energy_consumption'));
							    chart.draw(data, options);
							}
							</script>
						</div>
					</div>



























					<div class="row" style="display:none;">
						<div class="col-12 col-xl-12 stretch-card" style="display:none;">
							<div class="row flex-grow">
								<div class="col-md-4 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-between align-items-baseline">
												<h6 class="card-title mb-0">New Customers</h6>
												<div class="dropdown mb-2">
													<button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
													</button>
													<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6 col-md-12 col-xl-5">
													<h3 class="mb-2">3,897</h3>
													<div class="d-flex align-items-baseline">
														<p class="text-success">
															<span>+3.3%</span>
															<i data-feather="arrow-up" class="icon-sm mb-1"></i>
														</p>
													</div>
												</div>
												<div class="col-6 col-md-12 col-xl-7">
													<div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-between align-items-baseline">
												<h6 class="card-title mb-0">New Orders</h6>
												<div class="dropdown mb-2">
													<button class="btn p-0" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
													</button>
													<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6 col-md-12 col-xl-5">
													<h3 class="mb-2">35,084</h3>
													<div class="d-flex align-items-baseline">
														<p class="text-danger">
															<span>-2.8%</span>
															<i data-feather="arrow-down" class="icon-sm mb-1"></i>
														</p>
													</div>
												</div>
												<div class="col-6 col-md-12 col-xl-7">
													<div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-between align-items-baseline">
												<h6 class="card-title mb-0">Growth</h6>
												<div class="dropdown mb-2">
													<button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
													</button>
													<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6 col-md-12 col-xl-5">
													<h3 class="mb-2">89.87%</h3>
													<div class="d-flex align-items-baseline">
														<p class="text-success">
															<span>+2.8%</span>
															<i data-feather="arrow-up" class="icon-sm mb-1"></i>
														</p>
													</div>
												</div>
												<div class="col-6 col-md-12 col-xl-7">
													<div id="apexChart3" class="mt-md-3 mt-xl-0"></div>
												</div>
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
										<h6 class="card-title mb-0">Revenue</h6>
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
						<div class="col-lg-7 col-xl-8 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-baseline mb-2">
										<h6 class="card-title mb-0">Monthly sales</h6>
										<div class="dropdown mb-2">
											<button class="btn p-0" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4">
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
											</div>
										</div>
									</div>
									<p class="text-muted mb-4">Sales are activities related to selling or the number of goods or services sold in a given time period.</p>
									<div class="monthly-sales-chart-wrapper">
										<canvas id="monthly-sales-chart"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5 col-xl-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-baseline mb-2">
										<h6 class="card-title mb-0">Cloud storage</h6>
										<div class="dropdown mb-2">
											<button class="btn p-0" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
												<a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
											</div>
										</div>
									</div>
									<div id="progressbar1" class="mx-auto"></div>
									<div class="row mt-4 mb-3">
										<div class="col-6 d-flex justify-content-end">
											<div>
												<label class="d-flex align-items-center justify-content-end tx-10 text-uppercase font-weight-medium">Total storage <span class="p-1 ml-1 rounded-circle bg-primary-muted"></span></label>
												<h5 class="font-weight-bold mb-0 text-right">8TB</h5>
											</div>
										</div>
										<div class="col-6">
											<div>
												<label class="d-flex align-items-center tx-10 text-uppercase font-weight-medium"><span class="p-1 mr-1 rounded-circle bg-primary"></span> Used storage</label>
												<h5 class="font-weight-bold mb-0">6TB</h5>
											</div>
										</div>
									</div>
									<button class="btn btn-primary btn-block">Upgrade storage</button>
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
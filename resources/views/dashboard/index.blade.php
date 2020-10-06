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
							filename: "http://localhost/development_site/DISMI/public/SYSTEM/reporting/event__event_creation.json"
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
							filename: "http://localhost/development_site/DISMI/public/SYSTEM/reporting/energy__energy_consumption_rank.json"
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
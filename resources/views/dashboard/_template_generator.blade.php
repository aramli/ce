<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

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


<h1 style="text-align:center;margin-top:25px;margin-bottom:25px;">Dashboard Template -- {{ strtoupper($dashboard_name) }}</h1>
<div class="row">
	<div class="col-md-12">
		<div id="wdr-component__Event_creation"></div>
	</div>
	<div class="col-md-6">
		<div id="fusionchartContainer__Event_creation" style="margin-top:1px;"></div>
	</div>
	<div class="col-md-6">
		<div id="fusionchartContainer__Event_creation_barchart" style="margin-top:1px;"></div>
	</div>
</div>



	

<script>

	var pivot = new WebDataRocks({
		container: "#wdr-component__Event_creation",
		toolbar: true,
		height: 400,
		width: "100%",
		report: {
			dataSource: {
				data: JSON.parse('<?php echo $json_report;?>')
				
			}
		},
		reportcomplete: function() {
			pivot.off("reportcomplete");
			createFusionChart();
			createFusionChartBarChart();
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





	function createFusionChartBarChart() {
		var chart = new FusionCharts({
			"type": "column2d",
			"renderAt": "fusionchartContainer__Event_creation_barchart",
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





</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
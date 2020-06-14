@extends('master_template_report')
@section('content')

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

	<link rel="stylesheet" type="text/css" href="{{ asset('LIBRARY/pivot/dist/pivot.css') }}">
    <script type="text/javascript" src="{{ asset('LIBRARY/pivot/dist/pivot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('LIBRARY/pivot/dist/c3_renderers.js') }}"></script>
    <script type="text/javascript" src="{{ asset('LIBRARY/pivot/examples/show_code.js') }}"></script>

    <style>
    	pre{
    		display:none;
    	}
    </style>
			

				<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">Report - Over Target Duration</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<!-- <h6 class="card-title">Master Data</h6> -->
									<div class="table-responsive">

										<script type="text/javascript">
									    // This example adds C3 chart renderers.

										    $(function(){

										        var derivers = $.pivotUtilities.derivers;
										        var renderers = $.extend($.pivotUtilities.renderers,
										            $.pivotUtilities.c3_renderers);

										        $.getJSON("<?php echo asset('SYSTEM/reporting/event__over_target_duration.json'); ?>", function(mps) {
										            $("#output").pivotUI(mps, {
										                renderers: renderers,
										                // cols: ["ORGANIZER", "COMPANY", "DIVISION", "CATEGORY"], 
										                rows: ["EVENT TITLE", "EVENT START", "SCHEDULED FINISH", "ACTUAL FINISH", "OVERTIME DURATION (Minute)"],
										                rendererName: "Heatmap",
										                rowOrder: "value_z_to_a", colOrder: "value_z_to_a",
										                rendererOptions: {
										                    c3: { data: {colors: {
										                        Liberal: '#dc3912', Conservative: '#3366cc', NDP: '#ff9900',
										                        Green:'#109618', 'Bloc Quebecois': '#990099'
										                    }}}
										                }
										            });
										        });
										     });
								        </script>

								        <div id="output" style="margin: 30px;"></div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

@endsection
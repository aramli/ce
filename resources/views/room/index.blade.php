@extends('master_template_new')
@section('content')
			
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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Room Management</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">All registered rooms</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Info-->
								@if( in_array('FT-021', Session::get('ARRAY_UAC')) )
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Actions-->
									<a href="{{ route('add_new_room') }}" class="btn btn-primary font-weight-bold btn-sm ">
										Add New Room
									</a>
									<!--end::Actions-->
								</div>
								<!--end::Toolbar-->
								@endif

							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container-fluid">


								<div class="row">
									<div class="col-md-12">
										<!--begin::Card-->
										<div class="card card-custom gutter-b">
											<div class="card-header" style="display:none;">
												<div class="card-title">
													<h3 class="card-label">Room Usage</h3>
												</div>
											</div>
											<div class="card-body">
												<!--begin::Chart-->
												<div id="chart_room_usage"></div>
												<!--end::Chart-->
											</div>
										</div>
										<!--end::Card-->
									</div>
								</div>
								
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-body">
										<!--begin: Search Form-->
										<!--begin::Search Form-->
										<div class="mb-7">
											<div class="row align-items-center">
												<div class="col-lg-10 col-xl-10">
													<div class="row align-items-center">
														<div class="col-md-12 my-2 my-md-0">
															<div class="input-icon">
																<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
																<span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-2 col-xl-2 mt-5 mt-lg-0">
													<a href="#" class="btn btn-light-primary px-6 font-weight-bold" style="width:100%;">Search</a>
												</div>
											</div>
										</div>
										<!--end::Search Form-->
										<!--end: Search Form-->
										<!--begin: Datatable-->
										<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
										<!--end: Datatable-->
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
				
@endsection

@section('additional_bottom_script')
<script>
	'use strict';
	// Class definition

	var KTDatatableDataLocalDemo = function() {
		// Private functions

		// demo initializer
		var demo = function() {
			var dataJSONArray = JSON.parse('<?php echo addslashes($json_table['ALL_REGISTERED_ROOM']);?>');

			var datatable = $('#kt_datatable').KTDatatable({
				// datasource definition
				data: {
					type: 'local',
					source: dataJSONArray,
					pageSize: 100,
				},

				// layout definition
				layout: {
					scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false, // display/hide footer
				},

				// column sorting
				sortable: true,

				pagination: true,

				search: {
					input: $('#kt_datatable_search_query'),
					key: 'generalSearch'
				},

				// columns definition
				columns: [
				{
					field: 'roo_ID',
					title: 'System ID',
				}, 
				{
					field: 'roo_NAME',
					title: 'Room Name',
				}, 
				{
					field: 'roo_CAPACITY',
					title: 'Capacity (person)',
				}, 
				{
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 125,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return '\
								<a href="../../../room/detail/'+row.roo_ID+'" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
									<span class="svg-icon svg-icon-md">\
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
												<rect x="0" y="0" width="24" height="24"/>\
												<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
												<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
											</g>\
										</svg>\
									</span>\
								</a>\
								<?php
								if( in_array('FT-023', Session::get('ARRAY_UAC')) ){
									?>
									<a class="btn btn-sm btn-clean btn-icon" title="Delete" data-toggle="modal" data-target="#modalDelete_'+row.roo_ID+'">\
										<span class="svg-icon svg-icon-md">\
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
													<rect x="0" y="0" width="24" height="24"/>\
													<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
													<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
												</g>\
											</svg>\
										</span>\
									</a>\
									<div class="modal fade" id="modalDelete_'+row.roo_ID+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">\
										<div class="modal-dialog modal-dialog-centered" role="document">\
											<div class="modal-content">\
												<div class="modal-header">\
													<h5 class="modal-title" id="exampleModalCenterTitle">Delete Confirmation</h5>\
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">\
													<span aria-hidden="true">&times;</span>\
													</button>\
												</div>\
												<div class="modal-body">\
													Are you sure you want to delete <strong>'+row.roo_NAME+' (System ID: '+row.roo_ID+')</strong> data? Please note that this action <strong>can not be undone</strong>. \
												</div>\
												<div class="modal-footer">\
													<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>\
													<a href="../../../../public/room/detail/'+row.roo_ID+'/delete" class="btn btn-danger" style="color:#fff;">Yes, Delete</a>\
												</div>\
											</div>\
										</div>\
									</div>\
									<?php
								}
								?>
							';
					},
				}],
			});

			$('#kt_datatable_search_status').on('change', function() {
				datatable.search($(this).val().toLowerCase(), 'Status');
			});

			$('#kt_datatable_search_type').on('change', function() {
				datatable.search($(this).val().toLowerCase(), 'Type');
			});

			$('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
		};

		return {
			// Public functions
			init: function() {
				// init dmeo
				demo();
			},
		};
	}();

	jQuery(document).ready(function() {
		KTDatatableDataLocalDemo.init();
	});
</script>



<script>
"use strict";

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

// Class definition
function generateBubbleData(baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
      var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
      var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
      var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;
  
      series.push([x, y, z]);
      baseval += 86400000;
      i++;
    }
    return series;
  }

function generateData(count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
        var x = 'w' + (i + 1).toString();
        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

        series.push({
            x: x,
            y: y
        });
        i++;
    }
    return series;
}

var KTApexChartsDemo = function () {
	// Private functions

	var _chart_room_usage = function () {
		const apexChart = "#chart_room_usage";
		var options = {
			series: [{
				name: 'Event Created in <?php echo date('Y');?>',
				<?php
				foreach( $chart_data__event_creation as $this_room ){
					$array_this_room_event_created[] = $this_room->TOTAL_EVENT_CREATED;
					$implode_room_event_created = implode(',',$array_this_room_event_created);
				}
				?>
				data: [<?php echo $implode_room_event_created; ?>]
			}
			],
			chart: {
				type: 'bar',
				height: 350
			},
			plotOptions: {
				bar: {
					horizontal: false,
					columnWidth: '55%',
					endingShape: 'rounded'
				},
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				show: true,
				width: 3,
				colors: ['transparent']
			},
			xaxis: {
				<?php
				foreach( $chart_data__event_creation as $this_room ){
					$array_this_room_name[] = "'".$this_room->ROOM_NAME."'";
					$implode_room_name = implode(',',$array_this_room_name);
				}
				?>
				categories: [<?php echo $implode_room_name;?>],
			},
			yaxis: {
				title: {
					text: 'Event Created'
				}
			},
			fill: {
				opacity: 1
			},
			tooltip: {
				y: {
					formatter: function (val) {
						// return "$ " + val + " thousands"
						return val;
					}
				}
			},
			colors: [primary, success, warning]
		};

		var chart = new ApexCharts(document.querySelector(apexChart), options);
		chart.render();
	}

	return {
		// public functions
		init: function () {	
			_chart_room_usage();
		}
	};
}();

jQuery(document).ready(function () {
	KTApexChartsDemo.init();
});
</script>
@endsection
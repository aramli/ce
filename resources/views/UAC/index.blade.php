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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">User Management</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">All registered users</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Actions-->
									<a class="btn btn-light font-weight-bold btn-sm mr-6" data-toggle="modal" data-target="#modalUploadCSV">Upload .csv</a>
									<div class="modal fade" id="modalUploadCSV" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<form action="../../../user/UploadUserCSV" method="post" enctype="multipart/form-data">
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

									
									<a href="{{ asset('SYSTEM/sample_csv_user.csv') }}" class="btn btn-light font-weight-bold btn-sm mr-6">Download .csv sample</a>
									<a href="{{ route('add_new_user') }}" class="btn btn-primary font-weight-bold btn-sm ">
										Add New User
									</a>
									<!--end::Actions-->
								</div>
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container-fluid">



								<div class="row">
									<div class="col-md-6">
										<div class="row">

											<div class="col-xl-6">
												<!--begin::Stats Widget 29-->
												<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
													<!--begin::Body-->
													<div class="card-body">
														<span class="svg-icon svg-icon-2x svg-icon-info">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24"/>
																	<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																	<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $total_user }}</span>
														<span class="font-weight-bold text-muted font-size-sm">Total User</span>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Stats Widget 29-->
											</div>
											<div class="col-xl-6">
												<!--begin::Stats Widget 29-->
												<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
													<!--begin::Body-->
													<div class="card-body">
														<span class="svg-icon svg-icon-2x svg-icon-info">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24"/>
																	<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																	<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $total_administrator }}</span>
														<span class="font-weight-bold text-muted font-size-sm">Total Administrator</span>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Stats Widget 29-->
											</div>
											<div class="col-xl-6">
												<!--begin::Stats Widget 29-->
												<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
													<!--begin::Body-->
													<div class="card-body">
														<span class="svg-icon svg-icon-2x svg-icon-info">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24"/>
																	<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																	<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $total_trainer }}</span>
														<span class="font-weight-bold text-muted font-size-sm">Total Trainer</span>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Stats Widget 29-->
											</div>
											<div class="col-xl-6">
												<!--begin::Stats Widget 29-->
												<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
													<!--begin::Body-->
													<div class="card-body">
														<span class="svg-icon svg-icon-2x svg-icon-info">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24"/>
																	<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																	<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $total_vip }}</span>
														<span class="font-weight-bold text-muted font-size-sm">Total VIP</span>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Stats Widget 29-->
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="col-lg-12" style="padding:0;">
											<!--begin::Card-->
											<div class="card card-custom gutter-b">
												<div class="card-body" style="padding:0;">
													<!--begin::Chart-->
													<div id="radial_chart_user"></div>
													<!--end::Chart-->
												</div>
											</div>
											<!--end::Card-->
										</div>
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
			var dataJSONArray = JSON.parse('<?php echo addslashes($json_table['ALL_REGISTERED_USER']);?>');

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
					field: 'use_FULLNAME',
					title: 'Name',
				}, 
				{
					field: 'use_EMAIL',
					title: 'Email',
				}, 
				{
					field: 'rol_NAME',
					title: 'Role',
				}, 
				{
					field: 'use_LAST_LOGIN',
					title: 'Last Login',
					type: 'date',
					format: 'YYYY-MM-DD ',
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
								<a href="../../../user/detail/'+row.use_ID+'" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
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
								<a class="btn btn-sm btn-clean btn-icon" title="Delete" data-toggle="modal" data-target="#modalDelete_'+row.use_ID+'">\
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
								<div class="modal fade" id="modalDelete_'+row.use_ID+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">\
									<div class="modal-dialog modal-dialog-centered" role="document">\
										<div class="modal-content">\
											<div class="modal-header">\
												<h5 class="modal-title" id="exampleModalCenterTitle">Delete Confirmation</h5>\
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">\
												<span aria-hidden="true">&times;</span>\
												</button>\
											</div>\
											<div class="modal-body">\
												Are you sure you want to delete <strong>'+row.use_FULLNAME+' ('+row.use_EMAIL+')</strong> data? Please note that this action <strong>can not be undone</strong>. \
											</div>\
											<div class="modal-footer">\
												<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>\
												<a href="../../../../public/user/detail/'+row.use_ID+'/delete" class="btn btn-danger" style="color:#fff;">Yes, Delete</a>\
											</div>\
										</div>\
									</div>\
								</div>\
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


var KTApexChartsDemo = function () {
	// Private functions
	
	var _radial_chart_user = function () {
		const apexChart = "#radial_chart_user";
		var options = {
			series: [<?php echo number_format($total_administrator/$total_user*100,2);?>, <?php echo number_format($total_trainer/$total_user*100,2);?>, <?php echo number_format($total_vip/$total_user*100,2);?>, <?php echo number_format($total_attendee/$total_user*100,2);?>],
			chart: {
				height: 350,
				type: 'radialBar',
			},
			plotOptions: {
				radialBar: {
					dataLabels: {
						name: {
							fontSize: '22px',
						},
						value: {
							fontSize: '16px',
						},
						total: {
							show: true,
							label: 'Total',
							formatter: function (w) {
								// By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
								return <?php echo $total_user;?>
							}
						}
					}
				}
			},
			labels: ['Administrator', 'Trainer', 'VIP', 'Attendee'],
			colors: [primary, success, warning, danger]
		};

		var chart = new ApexCharts(document.querySelector(apexChart), options);
		chart.render();
	}
	

	return {
		// public functions
		init: function () {
			_radial_chart_user();
		}
	};
}();

jQuery(document).ready(function () {
	KTApexChartsDemo.init();
});
</script>
@endsection
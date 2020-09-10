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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Event Management</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">All registered events</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Actions-->
									<a href="{{ route('create_temp_event') }}" class="btn btn-primary font-weight-bold btn-sm ">
										Add New Event
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
			var dataJSONArray = JSON.parse('<?php echo addslashes($json_table['ALL_REGISTERED_EVENTS']);?>');

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
					field: 'eve_TITLE',
					title: 'Title',
				}, 
				{
					field: 'eve_EVENT_START',
					title: 'Event Start',
				}, 
				{
					field: 'roo_NAME',
					title: 'Room',
				}, 
				{
					field: 'use_FULLNAME',
					title: 'Organizer',
				}, 
				{
					field: 'eve_STATUS',
					title: 'Status',
					template: function(row){
						var output = '';
						if( row.eve_STATUS == 1 ){
							return '<span class="badge badge-warning" style="width:100%;">New</span>';
						} else if( row.eve_STATUS == 2 ){
							return '<span class="badge badge-success" style="width:100%;">Approve</span>';
						} else if( row.eve_STATUS == 3 ){
							return '<span class="badge badge-danger" style="width:100%;">Cancel</span>';
						} else if( row.eve_STATUS == 4 ){
							return '<span class="badge badge-primary" style="width:100%;">Finished</span>';
						} else if( row.eve_STATUS == 5 ){
							return '<span class="badge badge-danger" style="width:100%;">Rejected</span>';
						}

					}
				}, 
				{
					field: 'cat_NAME',
					title: 'Package',
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
								<a href="../../../event/detail/'+row.eve_ID+'" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
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
@endsection
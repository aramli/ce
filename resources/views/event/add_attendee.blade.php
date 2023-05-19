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
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Add New Event</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Attendee (2 of 2)</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Button-->
									<a href="{{ route('view_all_event') }}" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>
									<!--end::Button-->
									<!--begin::Dropdown-->
									<div class="btn-group ml-2">
										<a href="../../../../public/event/add/{{ $id }}/SubmitForReviewGet" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base" >Submit for Review</a>
									</div>
									<!--end::Dropdown-->
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
										<div class="mb-5">
											<div class="row ">

												<div class="col-sm-6">
													<div class="card">
													  <div class="card-body">
														<h5 class="card-title">Add Attendee</h5>
														<div class="input-icon">
															<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
															<span>
																<i class="flaticon2-search-1 text-muted"></i>
															</span>
														</div>
														<a href="#" class="btn btn-light-primary  font-weight-bold" style="width:%;">Search</a>
														<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
													</div>
												</div>
											</div>


											<div class="col-sm-6">
												<div class="card">
													<div class="card-body">
														  <h5 class="card-title">Attendee List</h5>
														  <div class="input-icon">
															<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query_attendee" />
															<span>
																<i class="flaticon2-search-1 text-muted"></i>
															</span>
														</div>
														<a href="#" class="btn btn-light-primary  font-weight-bold" style="width:100%;">Search</a>
														<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_attendee"></div>
														
													  </div>
													</div>
												  </div>


											
										<!--end::Search Form-->
										<!--end: Search Form-->
										<!--begin: Datatable-->
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
				</div>
				@include('include_new.footer')
				<!--end::Wrapper-->
				{{-- @include('include_new.aside_secondary') --}}
				
@endsection

@section('additional_bottom_script')
<script>
	'use strict';
	// Class definition

	var KTDatatableDataLocalDemo = function() {
		// Private functions

		// demo initializer
		var demo = function() {
			var dataJSONArray = JSON.parse('<?php echo addslashes($json_table['USER_LIST']);?>');

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
					field: 'div_NAME',
					title: 'Division',
				}, 
				{
					field: 'com_NAME',
					title: 'Company',
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
								<a href="../../../event/add/<?php echo $id;?>/attendee/'+row.use_ID+'/register" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
									<span class="svg-icon svg-icon-md">\
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
												<rect x="0" y="0" width="24" height="24"/>\
												<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>\
												<path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>\
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

		// demo initializer
		var demo2 = function() {
			var dataJSONArray = JSON.parse('<?php echo addslashes($json_table['ATTENDEE_LIST']);?>');

			var datatable = $('#kt_datatable_attendee').KTDatatable({
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
					input: $('#kt_datatable_search_query_attendee'),
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
					field: 'div_NAME',
					title: 'Division',
				}, 
				{
					field: 'com_NAME',
					title: 'Company',
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
								<a href="../../../event/add/<?php echo $id;?>/attendee/'+row.use_ID+'/remove" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
									<span class="svg-icon svg-icon-md">\
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
												<rect x="0" y="0" width="24" height="24"/>\
												<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>\
												<rect fill="#000000" x="6" y="11" width="12" height="2" rx="1"/>\
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
				demo2();
			},
		};
	}();

	jQuery(document).ready(function() {
		KTDatatableDataLocalDemo.init();
	});
</script>
@endsection
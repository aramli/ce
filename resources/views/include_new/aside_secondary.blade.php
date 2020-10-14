<!--begin::Aside Secondary-->
<div class="sidebar sidebar-left d-flex flex-row-auto flex-column" id="kt_sidebar">
					<!--begin::Aside Secondary Header-->
					<div class="sidebar-header flex-column-auto pt-9 pb-5 px-5 px-lg-10">
						<!--begin::Toolbar-->
						<div class="d-flex">
							<!--begin::Desktop Search-->
							<div class="quick-search quick-search-inline flex-grow-1" id="kt_quick_search_inline">
								<!--begin::Form-->
								<form method="get" class="quick-search-form">
									<div class="input-group rounded" style="background-color: #EBDBCB;">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<span class="svg-icon svg-icon-lg svg-icon-primary">
													<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</span>
										</div>
										<input type="text" class="form-control form-control-primary h-40px" placeholder="Find your Event Title here..." />
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="quick-search-close ki ki-close icon-sm text-primary"></i>
											</span>
										</div>
									</div>
								</form>
								<!--end::Form-->
								<!--begin::Search Toggle-->
								<div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px"></div>
								<!--end::Search Toggle-->
								<!--begin::Dropdown-->
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-anim-up">
									<div class="quick-search-wrapper scroll" data-scroll="true" data-height="350" data-mobile-height="200"></div>
								</div>
								<!--end::Dropdown-->
							</div>
							<!--end::Desktop Search-->
						</div>
						<!--end::Toolbar-->
					</div>
					<!--end::Aside Secondary Header-->
					<!--begin::Aside Secondary Content-->
					<div class="sidebar-content flex-column-fluid pb-10 pt-9 px-5 px-lg-10">
						<!--begin::Stats Widget 13-->
						<a href="../../../event/panel/1" class="card card-custom bg-danger bg-hover-state-danger card-shadowless gutter-b">
							<!--begin::Body-->
							<div class="card-body">
								<span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"/>
											<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
											<path d="M12.4208204,17.1583592 L15.4572949,11.0854102 C15.6425368,10.7149263 15.4923686,10.2644215 15.1218847,10.0791796 C15.0177431,10.0271088 14.9029083,10 14.7864745,10 L12,10 L12,7.17705098 C12,6.76283742 11.6642136,6.42705098 11.25,6.42705098 C10.965921,6.42705098 10.7062236,6.58755277 10.5791796,6.84164079 L7.5427051,12.9145898 C7.35746316,13.2850737 7.50763142,13.7355785 7.87811529,13.9208204 C7.98225687,13.9728912 8.09709167,14 8.21352549,14 L11,14 L11,16.822949 C11,17.2371626 11.3357864,17.572949 11.75,17.572949 C12.034079,17.572949 12.2937764,17.4124472 12.4208204,17.1583592 Z" fill="#000000"/>
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
								<div class="text-inverse-danger font-weight-bolder font-size-h5 mb-2 mt-5">Event Title</div>
								<div class="font-weight-bold text-inverse-danger font-size-sm">Click here to see your ongoing event panel</div>
							</div>
							<!--end::Body-->
						</a>
						<!--end::Stats Widget 13-->
						<!--begin::List Widget 1-->
						<div class="card card-custom card-shadowless bg-white gutter-b">
							<!--begin::Header-->
							<div class="card-header border-0 pt-5">
								<h3 class="card-title align-items-start flex-column">
									<span class="card-label font-weight-bolder text-dark">Upcoming Event</span>
									<span class="text-muted mt-3 font-weight-bold font-size-sm">Upcoming approved events</span>
								</h3>
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body pt-8">
								<div id="div_upcoming_events">
									
								</div>	
							</div>
							<!--end::Body-->
						</div>
						<!--end::List Widget 1-->
						<!--begin::List Widget 9-->
						<div class="card card-custom card-shadowless bg-white" style="display:none;">
							<!--begin::Header-->
							<div class="card-header align-items-center border-0 mt-4">
								<h3 class="card-title align-items-start flex-column">
									<span class="font-weight-bolder text-dark">My Activity</span>
									<span class="text-muted mt-3 font-weight-bold font-size-sm">890,344 Sales</span>
								</h3>
								<div class="card-toolbar">
									<div class="dropdown dropdown-inline">
										<a  class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="ki ki-bold-more-hor"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
											<!--begin::Navigation-->
											<ul class="navi navi-hover">
												<li class="navi-header font-weight-bold py-4">
													<span class="font-size-lg">Choose Label:</span>
													<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
												</li>
												<li class="navi-separator mb-3 opacity-70"></li>
												<li class="navi-item">
													<a  class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-success">Customer</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a  class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-danger">Partner</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a  class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-warning">Suplier</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a  class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-primary">Member</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a  class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-dark">Staff</span>
														</span>
													</a>
												</li>
												<li class="navi-separator mt-3 opacity-70"></li>
												<li class="navi-footer py-4">
													<a class="btn btn-clean font-weight-bold btn-sm" >
													<i class="ki ki-plus icon-sm"></i>Add new</a>
												</li>
											</ul>
											<!--end::Navigation-->
										</div>
									</div>
								</div>
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body pt-4">
								<div class="timeline timeline-5 mt-3">
									<!--begin::Item-->
									<div class="timeline-item align-items-start">
										<!--begin::Label-->
										<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">08:42</div>
										<!--end::Label-->
										<!--begin::Badge-->
										<div class="timeline-badge">
											<i class="fa fa-genderless text-warning icon-xl"></i>
										</div>
										<!--end::Badge-->
										<!--begin::Text-->
										<div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">Outlines keep you honest. And keep structure</div>
										<!--end::Text-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="timeline-item align-items-start">
										<!--begin::Label-->
										<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">10:00</div>
										<!--end::Label-->
										<!--begin::Badge-->
										<div class="timeline-badge">
											<i class="fa fa-genderless text-success icon-xl"></i>
										</div>
										<!--end::Badge-->
										<!--begin::Content-->
										<div class="timeline-content d-flex">
											<span class="font-weight-bolder text-dark-75 pl-3 font-size-lg">AEOL meeting</span>
										</div>
										<!--end::Content-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="timeline-item align-items-start">
										<!--begin::Label-->
										<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">14:37</div>
										<!--end::Label-->
										<!--begin::Badge-->
										<div class="timeline-badge">
											<i class="fa fa-genderless text-danger icon-xl"></i>
										</div>
										<!--end::Badge-->
										<!--begin::Desc-->
										<div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">Make deposit
										<a  class="text-primary">USD 700</a>. to ESL</div>
										<!--end::Desc-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="timeline-item align-items-start">
										<!--begin::Label-->
										<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>
										<!--end::Label-->
										<!--begin::Badge-->
										<div class="timeline-badge">
											<i class="fa fa-genderless text-primary icon-xl"></i>
										</div>
										<!--end::Badge-->
										<!--begin::Text-->
										<div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving and keep structure keep great</div>
										<!--end::Text-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="timeline-item align-items-start">
										<!--begin::Label-->
										<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>
										<!--end::Label-->
										<!--begin::Badge-->
										<div class="timeline-badge">
											<i class="fa fa-genderless text-danger icon-xl"></i>
										</div>
										<!--end::Badge-->
										<!--begin::Desc-->
										<div class="timeline-content font-weight-bolder text-dark-75 pl-3 font-size-lg">New order placed
										<a  class="text-primary">#XF-2356</a>.</div>
										<!--end::Desc-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="timeline-item align-items-start">
										<!--begin::Label-->
										<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">23:07</div>
										<!--end::Label-->
										<!--begin::Badge-->
										<div class="timeline-badge">
											<i class="fa fa-genderless text-info icon-xl"></i>
										</div>
										<!--end::Badge-->
										<!--begin::Text-->
										<div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Outlines keep and you honest. Indulging in poorly driving</div>
										<!--end::Text-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="timeline-item align-items-start">
										<!--begin::Label-->
										<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>
										<!--end::Label-->
										<!--begin::Badge-->
										<div class="timeline-badge">
											<i class="fa fa-genderless text-primary icon-xl"></i>
										</div>
										<!--end::Badge-->
										<!--begin::Text-->
										<div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving and keep structure keep great</div>
										<!--end::Text-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="timeline-item align-items-start">
										<!--begin::Label-->
										<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>
										<!--end::Label-->
										<!--begin::Badge-->
										<div class="timeline-badge">
											<i class="fa fa-genderless text-danger icon-xl"></i>
										</div>
										<!--end::Badge-->
										<!--begin::Desc-->
										<div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">New order placed
										<a  class="text-primary">#XF-2356</a>.</div>
										<!--end::Desc-->
									</div>
									<!--end::Item-->
								</div>
								<!--end: Items-->
							</div>
							<!--end: Card Body-->
						</div>
						<!--end: Card-->
						<!--end: List Widget 9-->
					</div>
					<!--end::Aside Secondary Content-->
				</div>
				<!--end::Aside Secondary-->


				<script>
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var jsonData = JSON.parse(this.responseText);
						
						var RESULT = jsonData.RESULT;
						var MESSAGE = jsonData.MESSAGE;
						// var ALERT = jsonData.ALERT;
						// alert(MESSAGE);

						// alert(jsonData.DISPLAY_RECENT_EVENT);
						document.getElementById('div_upcoming_events').innerHTML = jsonData.DISPLAY_UPCOMING_EVENT;

						localStorage.setItem('div_upcoming_events', jsonData.DISPLAY_UPCOMING_EVENT);

					}
				};
				xhttp.open("POST", "<?php echo env('MASTER_API_URL'); ?>", true);
				xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xhttp.send("module=GetAllUpcomingEvent");
			</script>
<style>
	.horizontal-menu .bottom-navbar .page-navigation > .nav-item .submenu ul li a.active,
	.horizontal-menu .bottom-navbar .page-navigation > .nav-item.active > .nav-link .menu-title,
	.horizontal-menu .bottom-navbar .page-navigation > .nav-item.active > .nav-link .link-icon
	{
		color:#000!important;
	}
</style>
		<!-- partial:partials/_navbar.html -->
		<div class="horizontal-menu">
			<nav class="navbar top-navbar">
				<div class="container">
					<div class="navbar-content">
						<a href="#" class="navbar-brand">
							<img src="{{ asset('MEDIA/logo_denso.png') }}" style="height:50px;width:auto;" />
						</a>
						<form class="search-form">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i data-feather="search"></i>
									</div>
								</div>
								<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
							</div>
						</form>
						<ul class="navbar-nav">
							<li class="nav-item dropdown" style="display:none;">
								<a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="flag-icon flag-icon-us mt-1" title="us" id="us"></i> <span class="font-weight-medium ml-1 mr-1">English</span>
								</a>
								<div class="dropdown-menu" aria-labelledby="languageDropdown">
									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ml-1"> German </span></a>
									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a>
									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
								</div>
							</li>
							<li class="nav-item dropdown nav-apps" style="display:none;">
								<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i data-feather="grid"></i>
								</a>
								<div class="dropdown-menu" aria-labelledby="appsDropdown">
									<div class="dropdown-header d-flex align-items-center justify-content-between">
										<p class="mb-0 font-weight-medium">Web Apps</p>
										<a href="javascript:;" class="text-muted">Edit</a>
									</div>
									<div class="dropdown-body">
										<div class="d-flex align-items-center apps">
											<a href="pages/apps/chat.html"><i data-feather="message-square" class="icon-lg"></i><p>Chat</p></a>
											<a href="pages/apps/calendar.html"><i data-feather="calendar" class="icon-lg"></i><p>Calendar</p></a>
											<a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i><p>Email</p></a>
											<a href="pages/general/profile.html"><i data-feather="instagram" class="icon-lg"></i><p>Profile</p></a>
										</div>
									</div>
									<div class="dropdown-footer d-flex align-items-center justify-content-center">
										<a href="javascript:;">View all</a>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown nav-messages" style="display:none;">
								<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i data-feather="mail"></i>
								</a>
								<div class="dropdown-menu" aria-labelledby="messageDropdown">
									<div class="dropdown-header d-flex align-items-center justify-content-between">
										<p class="mb-0 font-weight-medium">9 New Messages</p>
										<a href="javascript:;" class="text-muted">Clear all</a>
									</div>
									<div class="dropdown-body">
										<a href="javascript:;" class="dropdown-item">
											<div class="figure">
												<img src="../assets/images/faces/face2.jpg" alt="userr">
											</div>
											<div class="content">
												<div class="d-flex justify-content-between align-items-center">
													<p>Leonardo Payne</p>
													<p class="sub-text text-muted">2 min ago</p>
												</div>	
												<p class="sub-text text-muted">Project status</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item">
											<div class="figure">
												<img src="../assets/images/faces/face3.jpg" alt="userr">
											</div>
											<div class="content">
												<div class="d-flex justify-content-between align-items-center">
													<p>Carl Henson</p>
													<p class="sub-text text-muted">30 min ago</p>
												</div>	
												<p class="sub-text text-muted">Client meeting</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item">
											<div class="figure">
												<img src="../assets/images/faces/face4.jpg" alt="userr">
											</div>
											<div class="content">
												<div class="d-flex justify-content-between align-items-center">
													<p>Jensen Combs</p>												
													<p class="sub-text text-muted">1 hrs ago</p>
												</div>	
												<p class="sub-text text-muted">Project updates</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item">
											<div class="figure">
												<img src="../assets/images/faces/face5.jpg" alt="userr">
											</div>
											<div class="content">
												<div class="d-flex justify-content-between align-items-center">
													<p>Amiah Burton</p>
													<p class="sub-text text-muted">2 hrs ago</p>
												</div>
												<p class="sub-text text-muted">Project deadline</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item">
											<div class="figure">
												<img src="../assets/images/faces/face6.jpg" alt="userr">
											</div>
											<div class="content">
												<div class="d-flex justify-content-between align-items-center">
													<p>Yaretzi Mayo</p>
													<p class="sub-text text-muted">5 hr ago</p>
												</div>
												<p class="sub-text text-muted">New record</p>
											</div>
										</a>
									</div>
									<div class="dropdown-footer d-flex align-items-center justify-content-center">
										<a href="javascript:;">View all</a>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown nav-notifications" style="display:none;">
								<a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i data-feather="bell"></i>
									<div class="indicator">
										<div class="circle"></div>
									</div>
								</a>
								<div class="dropdown-menu" aria-labelledby="notificationDropdown">
									<div class="dropdown-header d-flex align-items-center justify-content-between">
										<p class="mb-0 font-weight-medium">6 New Notifications</p>
										<a href="javascript:;" class="text-muted">Clear all</a>
									</div>
									<div class="dropdown-body">
										<a href="javascript:;" class="dropdown-item">
											<div class="icon">
												<i data-feather="user-plus"></i>
											</div>
											<div class="content">
												<p>New customer registered</p>
												<p class="sub-text text-muted">2 sec ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item">
											<div class="icon">
												<i data-feather="gift"></i>
											</div>
											<div class="content">
												<p>New Order Recieved</p>
												<p class="sub-text text-muted">30 min ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item">
											<div class="icon">
												<i data-feather="alert-circle"></i>
											</div>
											<div class="content">
												<p>Server Limit Reached!</p>
												<p class="sub-text text-muted">1 hrs ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item">
											<div class="icon">
												<i data-feather="layers"></i>
											</div>
											<div class="content">
												<p>Apps are ready for update</p>
												<p class="sub-text text-muted">5 hrs ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item">
											<div class="icon">
												<i data-feather="download"></i>
											</div>
											<div class="content">
												<p>Download completed</p>
												<p class="sub-text text-muted">6 hrs ago</p>
											</div>
										</a>
									</div>
									<div class="dropdown-footer d-flex align-items-center justify-content-center">
										<a href="javascript:;">View all</a>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown nav-profile">
								<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="{{ asset('MEDIA/avatar.png') }}" alt="profile">
								</a>
								<div class="dropdown-menu" aria-labelledby="profileDropdown">
									<div class="dropdown-header d-flex flex-column align-items-center">
										<div class="figure mb-3" style="display:none;">
											<img src="{{ asset('ASSET/assets/images/faces/face1.jpg') }}" alt="">
										</div>
										<div class="info text-center">
											<p class="name font-weight-bold mb-0">{{ Session::get('FULLNAME') }}</p>
											<p class="email text-muted mb-3">{{ Session::get('EMAIL') }}</p>
										</div>
									</div>
									<div class="dropdown-body">
										<ul class="profile-nav p-0 pt-3">
											<li class="nav-item">
												<a href="{{ route('my_profile') }}" class="nav-link">
													<i data-feather="user"></i>
													<span>My Profile</span>
												</a>
											</li>
											<li class="nav-item">
												<a href="{{ route('logout') }}" class="nav-link">
													<i data-feather="log-out"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</li>
						</ul>
						<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
							<i data-feather="menu"></i>					
						</button>
					</div>
				</div>
			</nav>
			<nav class="bottom-navbar">
				<div class="container">
					<ul class="nav page-navigation">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('dashboard') }}">
								<i class="link-icon" data-feather="box"></i>
								<span class="menu-title">Dashboard</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="link-icon" data-feather="mail"></i>
								<span class="menu-title">Event</span>
								<i class="link-arrow"></i>
							</a>
							<div class="submenu">
								<ul class="submenu-item">
									<li class="nav-item"><a class="nav-link" href="{{ route('create_temp_event') }}">Add New Event</a></li>
									<!-- <li class="nav-item"><a class="nav-link" href="#">Event Calendar</a></li> -->
									<li class="nav-item"><a class="nav-link" href="{{ route('view_today_event') }}">View Today Event</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ route('view_all_event') }}">All Registered Events</a></li>
									<!-- <li class="nav-item"><a class="nav-link" href="#">Start / Stop Override</a></li> -->
								</ul>
							</div>
						</li>
						<li class="nav-item mega-menu" style="display:none;">
							<a href="#" class="nav-link">
								<i class="link-icon" data-feather="feather"></i>
								<span class="menu-title">Room</span>
								<i class="link-arrow"></i>
							</a>
							<div class="submenu">
								<div class="col-group-wrapper row">
									<div class="col-group col-md-9">
										<div class="row">
											<div class="col-12">
												<p class="category-heading">Basic</p>
												<div class="submenu-item">
													<div class="row">
														<div class="col-md-4">
															<ul>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/alerts.html">Alerts</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/badges.html">Badges</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/breadcrumbs.html">Breadcrumbs</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/buttons.html">Buttons</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/button-group.html">Buttn Group</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/cards.html">Cards</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/carousel.html">Carousel</a></li>
															</ul>
														</div>
														<div class="col-md-4">
															<ul>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/collapse.html">Collapse</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/dropdowns.html">Dropdowns</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/list-group.html">List group</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/media-object.html">Media object</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/modal.html">Modal</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/navs.html">Navs</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/navbar.html">Navbar</a></li>
															</ul>
														</div>
														<div class="col-md-4">
															<ul>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/pagination.html">Pagination</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/popover.html">Popovers</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/progress.html">Progress</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/scrollbar.html">Scrollbar</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/scrollspy.html">Scrollspy</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/spinners.html">Spinners</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/ui-components/tooltips.html">Tooltips</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-group col-md-3">
										<div class="row">
											<div class="col-12">
												<p class="category-heading">Advanced</p>
												<div class="submenu-item">
													<div class="row">
														<div class="col-md-12">
															<ul>
																<li class="nav-item"><a class="nav-link" href="pages/advanced-ui/cropper.html">Cropper</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/advanced-ui/owl-carousel.html">Owl carousel</a></li>
																<li class="nav-item"><a class="nav-link" href="pages/advanced-ui/sweet-alert.html">Sweetalert</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item" style="display:none;">
							<a href="#" class="nav-link">
								<i class="link-icon" data-feather="pie-chart"></i>
								<span class="menu-title">Report</span>
								<i class="link-arrow"></i>
							</a>
							<div class="submenu">
								<ul class="submenu-item">
									<li class="nav-item"><a class="nav-link" href="pages/forms/basic-elements.html">Basic Elements</a></li>
									<li class="nav-item"><a class="nav-link" href="pages/forms/advanced-elements.html">Advanced Elements</a></li>
									<li class="nav-item"><a class="nav-link" href="pages/forms/editors.html">Editors</a></li>
									<li class="nav-item"><a class="nav-link" href="pages/forms/wizard.html">Wizard</a></li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="link-icon" data-feather="pie-chart"></i>
								<span class="menu-title">Report</span>
								<i class="link-arrow"></i>
							</a>
							<div class="submenu">
								<div class="row">
									<div class="col-md-6">
										<ul class="submenu-item pr-0">
											<li class="category-heading">Event</li>
											<li class="nav-item"><a class="nav-link" href="{{ route('reporting__event_creation') }}">Event Creation</a></li>
											<li class="nav-item"><a class="nav-link" href="{{ route('reporting__over_target_duration') }}">Over Target Duration</a></li>
											<!-- <li class="nav-item"><a class="nav-link" href="#">Event Frequency</a></li> -->
										</ul>
									</div>
									<div class="col-md-6">
										<ul class="submenu-item pl-0">
											<li class="category-heading">Energy Consumption</li>
											<li class="nav-item"><a class="nav-link" href="{{ route('reporting__today_energy_consumption') }}">Today Energy Consumption</a></li>
											<li class="nav-item"><a class="nav-link" href="{{ route('reporting__energy_consumption_rank') }}">Energy Consumption Rank</a></li>
											<!-- <li class="nav-item"><a class="nav-link" href="#">Top 5 Highest Consumption</a></li> -->
											<!-- <li class="nav-item"><a class="nav-link" href="#">Top 5 Lowest Consumption</a></li> -->
											<li class="nav-item"><a class="nav-link" href="{{ route('reporting__over_consumption_event') }}">Over Consumption Events</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="link-icon" data-feather="inbox"></i>
								<span class="menu-title">Master Data</span>
								<i class="link-arrow"></i>
							</a>
							<div class="submenu">
								<ul class="submenu-item">
									<li class="nav-item"><a class="nav-link" href="{{ route('view_all_room') }}">Room</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ route('view_all_company') }}">Company</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ route('view_all_division') }}">Division</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ route('view_all_category') }}">Event Category</a>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('view_all_user') }}">
								<i class="link-icon" data-feather="smile"></i>
								<span class="menu-title">User</span>
							</a>
						</li>
						<li class="nav-item" style="display:none;">
							<a href="#" class="nav-link">
								<i class="link-icon" data-feather="smile"></i>
								<span class="menu-title">User</span>
								<i class="link-arrow"></i>
							</a>
							<div class="submenu">
								<ul class="submenu-item">
									<li class="nav-item"><a class="nav-link" href="pages/icons/feather-icons.html">Feather Icons</a></li>
									<li class="nav-item"><a class="nav-link" href="pages/icons/flag-icons.html">Flag Icons</a></li>
									<li class="nav-item"><a class="nav-link" href="pages/icons/mdi-icons.html">Mdi Icons</a></li>
								</ul>
							</div>
						</li>
						<li class="nav-item mega-menu" style="display:none;">
							<a href="#" class="nav-link">
								<i class="link-icon" data-feather="book"></i>
								<span class="menu-title">Sample Pages</span>
								<i class="link-arrow"></i>
							</a>
							<div class="submenu">
								<div class="col-group-wrapper row">
									<div class="col-group col-md-6">
										<p class="category-heading">Special Pages</p>
										<div class="submenu-item">
											<div class="row">
												<div class="col-md-6">
													<ul>
														<li class="nav-item"><a class="nav-link" href="pages/general/blank-page.html">Blank page</a></li>
														<li class="nav-item"><a class="nav-link" href="pages/general/faq.html">Faq</a></li>
														<li class="nav-item"><a class="nav-link" href="pages/general/invoice.html">Invoice</a></li>
													</ul>
												</div>
												<div class="col-md-6">
													<ul>
														<li class="nav-item"><a class="nav-link" href="pages/general/profile.html">Profile</a></li>
														<li class="nav-item"><a class="nav-link" href="pages/general/pricing.html">Pricing</a></li>
														<li class="nav-item"><a class="nav-link" href="pages/general/timeline.html">Timeline</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-group col-md-3">
										<p class="category-heading">Auth Pages</p>
										<ul class="submenu-item">
											<li class="nav-item"><a class="nav-link" href="pages/auth/login.html">Login</a></li>
											<li class="nav-item"><a class="nav-link" href="pages/auth/register.html">Register</a></li>
										</ul>
									</div>
									<div class="col-group col-md-3">
										<p class="category-heading">Error Pages</p>
										<ul class="submenu-item">
											<li class="nav-item"><a class="nav-link" href="pages/error/404.html">404</a></li>
											<li class="nav-item"><a class="nav-link" href="pages/error/500.html">500</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item" style="display:none;">
							<a href="../../documentation/docs.html" target="_blank" class="nav-link">
								<i class="link-icon" data-feather="hash"></i>
								<span class="menu-title">Documentation</span></a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- partial -->
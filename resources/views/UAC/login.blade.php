<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<base href="{{ asset('ASSET/LOGIN/dist') }}/">
		<meta charset="utf-8" />
		<title>DISMI</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="assets/css/pages/login/login-4.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled sidebar-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Content-->
				<div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
					<!--begin::Wrapper-->
					<div class="login-content d-flex flex-column pt-lg-0 pt-12">
						<!--begin::Logo-->
						<a class="login-logo pb-xl-20 pb-15">
							<img src="{{ asset('MEDIA/logo_denso.png') }}" class="max-h-70px" alt="" />
						</a>
						<!--end::Logo-->
						<!--begin::Signin-->
						<div class="login-form">
							<!--begin::Form-->
							<form id="bypass_login" class="forms-sample" action="../../../../public/VerifyLogin" method="post">
								{{ csrf_field() }}
								<!--begin::Title-->
								<div class="pb-5 pb-lg-15">
									<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h3>
								</div>
								@if( Session::get('popup_status') == 1 )
								<div style="margin-bottom:20px;">
									<?php
									if( Session::get('popup_type') == 'success' ){
										$alert_color = 'primary';
									} else {
										$alert_color = 'danger';
									}
									?>
									<span class="badge badge-<?php echo $alert_color;?>">{{ Session::get('popup_message') }}</span>
								</div>
								<?php Session::put('popup_status', 0); ?>
								@endif
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Your Email</label>
									<input required id="email" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="email" name="email" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Your Name</label>
										<!-- <a href="custom/pages/login/login-4/forgot.html" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Forgot Password ?</a> -->
									</div>
									<input required id="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="password" name="password" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<button type="submit" onclick="VerifyLogin(document.getElementById('email').value, document.getElementById('password').value);" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
									<!-- <a href="../../../dashboard.html" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign in</a> -->
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--begin::Content-->
				<!--begin::Aside-->
				<div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
					<div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url(assets/media/svg/illustrations/login-visual-4.svg);">
						<!--begin::Aside title-->
						<h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white" onclick="AutoFill();">
							Smart
							<br/>Meeting
							<br/>System
						</h3>
						<!--end::Aside title-->
					</div>
				</div>
				<!--end::Aside-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js?v=7.0.5"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5"></script>
		<script src="assets/js/scripts.bundle.js?v=7.0.5"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/custom/login/login-4.js?v=7.0.5"></script>
		<!--end::Page Scripts-->

		<script src="../../../custom_js/login.js"></script>

		<script>
			function AutoFill(){
				// document.getElementById('email').value = 'admin.dsm@denso.co.id';
				document.getElementById('email').value = 'hebert.hendrik@gmail.com';
				document.getElementById('password').value = 'password';
				document.getElementById('bypass_login').submit();
			}
		</script>
	</body>
	<!--end::Body-->
</html>




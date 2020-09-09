<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>DISMI</title>
		<!-- core:css -->
		<link rel="stylesheet" href="{{ asset('ASSET/assets/vendors/core/core.css') }}">
		<!-- endinject -->
		<!-- plugin css for this page -->
		<!-- end plugin css for this page -->
		<!-- inject:css -->
		<link rel="stylesheet" href="{{ asset('ASSET/assets/fonts/feather-font/css/iconfont.css') }}">
		<link rel="stylesheet" href="{{ asset('ASSET/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
		<!-- endinject -->
		<!-- Layout styles -->  
		<link rel="stylesheet" href="{{ asset('ASSET/assets/css/demo_5/style.css') }}">
		<!-- End layout styles -->
		<link rel="shortcut icon" href="{{ asset('ASSET/assets/images/favicon.png') }}" />
	</head>
	<body>
		<div class="main-wrapper">
			<div class="page-wrapper full-page">
				<div class="page-content d-flex align-items-center justify-content-center">
					<div class="row w-100 mx-0 auth-page">
						<div class="col-md-8 col-xl-6 mx-auto">
							<div class="card">
								<div class="row">
									<div class="col-md-4 pr-md-0">
										<div class="auth-left-wrapper">
										</div>
									</div>
									<div class="col-md-8 pl-md-0">
										<div class="auth-form-wrapper px-4 py-5">
											<!--
											<a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
											-->
											<div>
												<img src="{{ asset('MEDIA/logo_denso.png') }}" style="height:50px;width:auto;margin-bottom:20px;" />
											</div>
											<h5 class="text-muted font-weight-normal mb-4">Please type in your email used for registration. We will send you the OTP by email.</h5>
											<form class="forms-sample" action="ResetMyPassword" method="post">
												{{ csrf_field() }}
												<div class="form-group">
													<label for="exampleInputEmail1">Email address</label>
													<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required name="email" autofocus="1">
												</div>
												<!--
												<div class="form-check form-check-flat form-check-primary">
													<label class="form-check-label">
													<input type="checkbox" class="form-check-input">
													Remember me
													</label>
												</div>
												-->
												<div class="mt-3">
													<button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white" style="width:100%;">Reset My Password</button>

													<a href="{{ route('login') }}" type="button" class="btn mb-2 mb-md-0" style="border:none;text-align:right;width:100%;margin-top:15px;color:#5E50F9;">
													Back to login page
													</a>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- core:js -->
		<script src="{{ asset('ASSET/assets/vendors/core/core.js') }}"></script>
		<!-- endinject -->
		<!-- plugin js for this page -->
		<!-- end plugin js for this page -->
		<!-- inject:js -->
		<script src="{{ asset('ASSET/assets/vendors/feather-icons/feather.min.js') }}"></script>
		<script src="{{ asset('ASSET/assets/js/template.js') }}"></script>
		<!-- endinject -->
		<!-- custom js for this page -->
		<!-- end custom js for this page -->
	</body>
</html>
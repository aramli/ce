<!DOCTYPE html>
<html lang="en">
	@include('include.head')
	<body>
		<div class="main-wrapper">
			@include('include.menu')
			<div class="page-wrapper">
				@yield('content')
				@include('include.footer')
			</div>
		</div>
		@include('include.bottom_script_report')
	</body>
</html>
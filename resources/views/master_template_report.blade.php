<!DOCTYPE html>
<html lang="en">
	@include('include.head')
	<style>
		@media (min-width: 1200px){
			.page-wrapper .page-content,
			.container
			{
				max-width:90%!important;
			}
		}
	</style>
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
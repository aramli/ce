		<!-- core:js -->
		<!-- <script src="{{ asset('ASSET/assets/vendors/core/core.js') }}"></script> -->
		<!-- endinject -->
		<!-- plugin js for this page -->
		<script src="{{ asset('ASSET/assets/vendors/chartjs/Chart.min.js') }}"></script>
		<script src="{{ asset('ASSET/assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
		<script src="{{ asset('ASSET/assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
		<script src="{{ asset('ASSET/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
		<script src="{{ asset('ASSET/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
		<script src="{{ asset('ASSET/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>


		<script src="{{ asset('ASSET/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('ASSET/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>

		<script src="{{ asset('ASSET/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
	  	<script src="{{ asset('ASSET/assets/vendors/promise-polyfill/polyfill.min.js') }}"></script>

		<!-- end plugin js for this page -->
		<!-- inject:js -->
		<script src="{{ asset('ASSET/assets/vendors/feather-icons/feather.min.js') }}"></script>
		<script src="{{ asset('ASSET/assets/js/template.js') }}"></script>
		<!-- endinject -->
		<!-- custom js for this page -->
		<!-- <script src="{{ asset('ASSET/assets/js/dashboard.js') }}"></script> -->
		<script src="{{ asset('ASSET/assets/js/datepicker.js') }}"></script>

		<script src="{{ asset('ASSET/assets/js/data-table.js') }}"></script>

		<script src="{{ asset('ASSET/assets/js/sweet-alert.js') }}"></script>
		<!-- end custom js for this page -->

		<?php
		if( Session::get('popup_status') == 1 ){
			?>
			<script>
				const Toast = Swal.mixin({
        			toast: true,
        			position: 'top',
        			showConfirmButton: false,
        			timer: 10000
      			});
      
      			Toast.fire({
        			icon: '<?php echo Session::get('popup_type');?>',
        			title: '<?php echo Session::get('popup_message');?>'
      			})
			</script>
			<?php
			Session::put('popup_status', 0);
		}
		?>

		
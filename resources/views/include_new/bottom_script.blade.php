		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js?v=7.0.5"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5"></script>
		<script src="assets/js/scripts.bundle.js?v=7.0.5"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<!-- <script src="assets/js/pages/crud/ktdatatable/base/data-local.js?v=7.0.5"></script> -->
		<!--end::Page Scripts-->

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

		
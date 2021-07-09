 <!-- jQuery -->
 <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- date-range-picker -->
 <script src="<?= base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
 </body>

 </html>
 <script>
 	$(function() {
 		$('#reservationdate').datetimepicker({
 			format: 'YYYY-MM-DD'
 		});
 	})
 </script>

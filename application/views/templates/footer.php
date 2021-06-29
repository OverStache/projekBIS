<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b>Version</b> 3.1.0
	</div>
	<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>plugins/number-thousand-separator/easy-number-separator.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>

<script>
	// change to image file name
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});

	// auto change anggota is_active
	$('.changeActiveAnggota').on('click', function() {
		const id = $(this).data('id');
		const is_active = $(this).data('is_active');
		console.log(id);
		console.log(is_active);
		$.ajax({
			url: "<?= base_url('anggota/changeActive'); ?>",
			type: 'post',
			data: {
				id: id,
				is_active: is_active
			},
			success: function() {
				document.location.href = "<?= base_url('anggota'); ?>";
			}
		});
	});

	// auto change user is_active
	$('.changeActiveUser').on('click', function() {
		const id = $(this).data('id');
		const is_active = $(this).data('is_active');
		console.log(id);
		console.log(is_active);
		$.ajax({
			url: "<?= base_url('user/changeActive'); ?>",
			type: 'post',
			data: {
				id: id,
				is_active: is_active
			},
			success: function() {
				document.location.href = "<?= base_url('user'); ?>";
			}
		});
	});

	// auto change subMenu is_active
	$('.changeActiveSubMenu').on('click', function() {
		const id = $(this).data('id');
		const is_active = $(this).data('is_active');
		console.log(id);
		console.log(is_active);
		$.ajax({
			url: "<?= base_url('subMenu/changeActive'); ?>",
			type: 'post',
			data: {
				id: id,
				is_active: is_active
			},
			success: function() {
				document.location.href = "<?= base_url('subMenu'); ?>";
			}
		});
	});

	// auto change menu access checkbox
	$('.menuAccess').on('click', function() {
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');

		$.ajax({
			url: "<?= base_url('role/changeMenuAccess'); ?>",
			type: 'post',
			data: {
				menuId: menuId,
				roleId: roleId
			},
			success: function() {
				document.location.href = "<?= base_url('role/index/'); ?>" + roleId;
			}
		});
	});

	// auto change crud access checkbox
	$('.crudAccess').on('click', function() {
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');
		const crudId = $(this).data('crud');
		console.log(menuId);
		console.log(roleId);
		console.log(crudId);
		$.ajax({
			url: "<?= base_url('role/changeCrudAccess'); ?>",
			type: 'post',
			data: {
				menuId: menuId,
				roleId: roleId,
				crudId: crudId,
			},
			success: function() {
				document.location.href = "<?= base_url('role/index/'); ?>" + roleId;
			}
		});
	});

	// auto change rekening status
	$('.changeStatus').on('click', function() {
		const id = $(this).data('id');
		const status = $(this).data('status');
		// console.log(id);
		// console.log(status);
		$.ajax({
			url: "<?= base_url('rekening/changeRekeningStatus'); ?>",
			type: 'post',
			data: {
				id: id,
				status: status
			},
			success: function() {
				document.location.href = "<?= base_url('rekening'); ?>";
			}
		});
	});
</script>

<!-- bootbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
<!-- bootbox modal delete -->
<script>
	$(function() {
		let url;
		$('body').on('click', '.userDelete', function() {
			url = "<?= base_url('user/delete/'); ?>";
		});
		$('body').on('click', '.menuDelete', function() {
			url = "<?= base_url('menu/delete/'); ?>";
		});
		$('body').on('click', '.subMenuDelete', function() {
			url = "<?= base_url('subMenu/delete/'); ?>";
		});
		$('body').on('click', '.anggotaDelete', function() {
			url = "<?= base_url('anggota/delete/'); ?>";
		});
		$('body').on('click', '.rekeningDelete', function() {
			url = "<?= base_url('rekening/delete/'); ?>";
		});
		$('body').on('click', '.angsuranDelete', function() {
			url = "<?= base_url('angsuran/delete/'); ?>";
		});

		$('body').on('click', '.modalDelete', function() {
			const id = $(this).data('id');
			const title = $(this).data('title');
			bootbox.confirm({
				title: "sure want to delete?",
				message: title,
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-primary'
					},
					cancel: {
						label: 'No',
						className: 'btn-secondary'
					}
				},
				callback: function(result) {
					if (result) {
						document.location.href = url + id;
					};
				}
			});
		});
	});
</script>
<!-- kalkulator rekening -->
<script>
	$(document).ready(function() {
		let bulan;
		let margin;
		let inputPinjaman;
		$("select.jangka_waktu").change(function() {
			bulan = $(this).children("option:selected").val();
			console.log(bulan);
		});

		$("input.inputMargin").on("input", function() {
			// Print entered value in a div box
			margin = $(this).val() / 100;
			console.log(margin);
		});

		$("input.inputPinjaman").on("input", function() {
			// Print entered value in a div box
			inputPinjaman = $(this).val();
			console.log(inputPinjaman);
		});

		$('button.hitung').on('click', function() {
			let afterMargin = inputPinjaman * margin;
			let jumlah = parseInt(inputPinjaman) + parseInt(afterMargin);
			let bulanan = jumlah / bulan;
			console.log("margin : " + afterMargin);
			console.log("jumlah : " + jumlah);
			console.log("bulanan : " + bulanan);
			if (bulanan) {
				$('#margin').val(afterMargin);
				$('#jumlah').val(jumlah);
				$('#bulanan').val(bulanan);
			}
		});

	});
</script>
</body>

</html>

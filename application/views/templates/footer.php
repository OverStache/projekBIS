<footer class="main-footer no-print">
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
<!-- Select2 -->
<script src="<?= base_url('assets/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>plugins/number-thousand-separator/easy-number-separator.js"></script>
<!-- bootbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
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

<!-- view anggota, rekening pembiayaan, rekening simpanan, transaksi -->
<script>
	// tabel anggota, rekening pembiayaan, rekening simpanan
	$(function() {
		$("#searchPrint").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["pdf", "print", "colvis"]
		}).buttons().container().appendTo('#searchPrint_wrapper .col-md-6:eq(0)');
	});
	// tabel transaksi
	$(function() {
		$('#searchOnly').DataTable({
			"searching": true
		});
	})
</script>
<!-- change to image file name (view profile/edit) -->
<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
</script>
<!-- role management -->
<script>
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
</script>
<!-- auto change status -->
<script>
	let id;
	let id_status;
	let url;

	// anggota
	$('body').on('click', '.anggota', function() {
		id = $(this).data('id');
		id_status = $(this).data('id_status');
		url = "<?= base_url('anggota'); ?>";
	});

	// user
	$('body').on('click', '.user', function() {
		id = $(this).data('id');
		id_status = $(this).data('id_status');
		url = "<?= base_url('user'); ?>";
	});

	// rekening
	$('body').on('click', '.rekening', function() {
		id = $(this).data('id');
		id_status = $(this).data('id_status');
		url = "<?= base_url('rekening'); ?>";
	});

	// ajax function
	$('body').on('click', '.changeActive', function() {
		$.ajax({
			url: url + "/changeActive",
			type: 'post',
			data: {
				id: id,
				id_status: id_status
			},
			success: function() {
				document.location.href = url;
			}
		});
	});
</script>
<!-- bootbox modal delete -->
<script>
	$(function() {
		let url;
		// user
		$('body').on('click', '.userDelete', function() {
			url = "<?= base_url('user'); ?>";
		});
		// anggota
		$('body').on('click', '.anggotaDelete', function() {
			url = "<?= base_url('anggota'); ?>";
		});
		// rekening
		$('body').on('click', '.rekeningDelete', function() {
			url = "<?= base_url('rekening'); ?>";
		});

		$('body').on('click', '.modalDelete', function() {
			const id = $(this).data('id');
			const title = $(this).data('title');
			bootbox.confirm({
				title: "Yakin ingin menghapus?",
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
						document.location.href = url + '/delete/' + id;
					};
				}
			});
		});
	});
</script>
<!-- kalkulator rekening pembiayaan -->
<script>
	const formatter = new Intl.NumberFormat();
	let jangkaWaktu = $('select.jangka_waktu').children('option:selected').val();
	let margin = $('input.inputMargin').val() / 100;
	let inputPinjaman = $('input.perolehan').val();

	// jangka waktu pinjaman
	$('select.jangka_waktu').change(function() {
		jangkaWaktu = $(this).children('option:selected').val();
	});

	// margin pinjaman (%)
	$('input.inputMargin').on('input', function() {
		margin = $(this).val() / 100;
	});

	// jumlah pinjaman
	$('input.perolehan').on('input', function() {
		inputPinjaman = $(this).val();
	});

	$('body').on('click', 'button.hitung', function() {
		// jumlah margin = jumlah pinjaman x margin(%) * jangka waktu angsuran
		let jumlahMargin = inputPinjaman * margin * jangkaWaktu;
		// jumlah total = jumlah pinjaman + jumlah margin
		let jumlahTotal = parseInt(inputPinjaman) + parseInt(jumlahMargin);
		// jumlah angsuran = jumlah total : jangka waktu angsuran
		let angsuran = jumlahTotal / jangkaWaktu;
		if (angsuran && jangkaWaktu) {
			// for input post
			$('#margin').val(jumlahMargin);
			$('#jumlah').val(jumlahTotal);

			// show only
			$('#pinjamanShow').text('Rp. ' + formatter.format(inputPinjaman));
			$('#marginShow').text('Rp. ' + formatter.format(jumlahMargin));
			$('#jumlahShow').text('Rp. ' + formatter.format(jumlahTotal));
			$('#bulananShow').text('Rp. ' + formatter.format(angsuran));
		} else {
			$('#pinjamanShow').text('');
			$('#marginShow').text('');
			$('#jumlahShow').text('');
			$('#bulananShow').text('');
		}

	});
</script>
<!-- ajax transaksi/add -->
<script>
	$(document).ready(function() {
		let transaksi;
		$('div.id_rekeningSelect').hide();
		// pilih transaksi dropdown
		$('#id_jenis').change(function() {
			if ($('#id_jenis').val() == '') {
				$('div.id_rekeningSelect').hide();
			} else {
				if ($('#id_jenis').val() == 2) {
					$('label.id_rekeningSelect').text('ID Rekening');
				} else {
					$('label.id_rekeningSelect').text('ID Anggota');
				}
				$('div.id_rekeningSelect').show();
				$('div.id_rekeningSelect').removeClass('invisible');
			}
			$('p#show1').text('');
			$('p#show2').text('');
			$('input#kredit').removeAttr('placeholder');
			$('input#kredit').removeAttr('max');
			$('input#kredit').removeAttr('min');
			$('input#cicilan').val(null);
			transaksi = $('#id_jenis').val();
			$.ajax({
				url: "<?= base_url('transaksi/add'); ?>",
				method: "POST",
				dataType: 'json',
				data: {
					transaksi: transaksi
				},
				success: function(data) {
					$('#id_rekening').html(data);
				}
			});
		});
		// pilih rekening / anggota dropdown
		$('#id_rekening').change(function() {
			let id_rekening = $('#id_rekening').val();
			$.ajax({
				url: "<?= base_url('transaksi/add'); ?>",
				method: "POST",
				dataType: 'json',
				data: {
					trans: transaksi,
					id_rekening: id_rekening
				},
				success: function(data) {
					if (transaksi == 2) {
						$('p#show1').text('Cicilan Ke : ' + data.cicilan);
						$('p#show2').text('Jatuh Tempo : ' + (data.tanggalTagihan));
						$('input#kredit').attr({
							'max': (data.tagihan - data.angsuran),
							'placeholder': formatter.format(data.tagihan - data.angsuran) + ' (maximal)'
						});
						$('input#cicilan').val(data.cicilan);
						$('input#id_anggota').val(data.id_anggota);
					} else {
						$('input#kredit').attr({
							'min': 50000,
							'placeholder': formatter.format(50000) + ' (minimal)'
						});
						$('input#cicilan').val('');
						$('input#id_anggota').val(data.id_anggota);
					}
				}
			});
		});
	});
</script>
<!-- select2 & datetimepicker -->
<script>
	$(function() {
		$('.select2').select2()
		//Date picker
		$('#reservationdate').datetimepicker({
			format: 'YYYY-MM-DD'
		});
	});
</script>
</body>

</html>

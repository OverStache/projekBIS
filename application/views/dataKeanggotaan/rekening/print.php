<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?php $this->load->view('templates/contentHeader'); ?>
	<section class="content">
		<div class="container-fluid">
			<!-- Main content -->
			<div class="invoice p-3 mb-3">
				<!-- title row -->
				<div class="row mb-3">
					<div class="col-12">
						<h4>
							Tanda Terima Pencairan Akad Murabahah
							<small class="float-right">Tanggal <?= date('d, m Y') ?></small>
						</h4>
					</div>
					<!-- /.col -->
				</div>
				<!-- info row -->
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
						<address>
							<strong>BMT Ta'awun Finance</strong><br>
							Jl. Lontar No. 2 RT 14/RW 14, Menteng Atas,<br>
							Kecamatan Setia Budi, Kota Jakarta Selatan,<br>
							Daerah Khusus Ibukota Jakarta 12960
						</address>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
						<address>
							<strong><?= $rekening['nama']; ?></strong><br>
							Nomer Identitas: <?= $rekening['nomerID']; ?><br>
							ID Anggota: <?= $rekening['id_anggota']; ?><br>
						</address>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
						<b>ID Transaksi</b><br>
						<br>
						<b>ID Rekening:</b> <?= $rekening['id_anggota'] . $rekening['id']; ?><br>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<div class="row justify-content-end">
					<div class="col-6">
						<p class="lead">TOTAL</p>

						<div class="table-responsive">
							<table class="table">
								<tr>
									<th>Jumlah Pinjaman</th>
									<td id="pinjamanShow"><?= 'Rp. ' . number_format($rekening['perolehan']); ?></td>
								</tr>
							</table>
						</div>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<!-- this row will not appear when printing -->
				<div class="row no-print">
					<div class="col-12">
						<a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
					</div>
				</div>
			</div>
			<!-- /.invoice -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
	window.addEventListener("load", window.print());
</script>

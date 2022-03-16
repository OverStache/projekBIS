<div class="content-wrapper">
	<section class="content">
		<div class="container-fluid">
			<a href="<?= base_url('transaksi'); ?>" class="btn btn-danger no-print mt-3">Back</a>
			<a href="#" onclick="window.print()" class="btn btn-secondary no-print mt-3">Print</a>
			<div class="row justify-content-center">
				<div class="col">
					<div class="card float-center mt-3">
						<div class="card-header pb-0">
							<div class="row">
								<div class="col-3">
									<img src="<?= base_url('assets/img/auth/'); ?>images.png" class="img-responsive" width="65%">
								</div>
								<div class="col-6">
									<div class="text-center">
										<h3><small>Koperasi Simpan Pinjam dan Pembiayaan Syariah</small></h3>
										<h3>BMT Ta'awun Finance (Tawfin)</h3>
										<h5>Data Transaksi</h5>
									</div>
								</div>
								<div class="col-3 my-auto">
								</div>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<b>Invoice #<?= $transaksi['id'] ?></b>
									<p class="float-right">Tanggal <?= date_format(date_create($transaksi['tanggal']), 'd M Y'); ?></p>
								</div>
								<div class="col-6 invoice-col">
									<b><?= $transaksi['jenis']; ?></b><br>
									<?php if ($transaksi['id_jenis'] == 2) : ?>
										<b>Angsuran Ke:</b> <?= $transaksi['#'] ?><br>
									<?php endif ?>
									<b>Nama Anggota:</b> <?= $transaksi['nama']; ?><br>
									<b>No. Rekening:</b> <?= $transaksi['idRek'] . $transaksi['id_anggota'] ?>
								</div>
								<div class="col-6 mt-4">
									<div class="table-responsive">
										<table class="table border-bottom">
											<tbody>
												<tr>
													<th style="width:50%">Jumlah</th>
													<td class="text-right">Rp. <?php if ($transaksi['id_jenis'] == 1) {
																												echo number_format($transaksi['debit']);
																											} else {
																												echo number_format($transaksi['kredit']);
																											} ?>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
	window.print();
</script>

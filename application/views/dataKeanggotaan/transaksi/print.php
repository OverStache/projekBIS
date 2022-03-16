<div class="content-wrapper">
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<a href="<?= base_url('transaksi'); ?>" class="btn btn-danger no-print mt-3">Back</a>
					<a href="#" onclick="window.print()" class="btn btn-secondary no-print mt-3">Print</a>
					<div class="card mt-3">
						<div class="card-header pb-0">
							<div class="row">
								<div class="col-3">
									<img src="<?= base_url('assets/img/auth/'); ?>images.png" class="img-responsive" width="65%">
								</div>
								<div class="col-6">
									<div class="text-center">
										<h3><small>Koperasi Simpan Pinjam dan Pembiayaan Syariah</small></h3>
										<h3>BMT Ta'awun Finance (Tawfin)</h3>
										<h5>Laporan Transaksi <?= date('F Y'); ?></h5>
									</div>
								</div>
								<div class="col-3 my-auto">
								</div>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-striped border-bottom">
								<thead>
									<tr>
										<th>#</th>
										<th>ID Rekening</th>
										<th>Nama</th>
										<th>Tanggal</th>
										<th>Debit</th>
										<th>Kredit</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($transaksi as $t) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $t['idRek'] . $t['id_anggota'] ?></td>
											<td><?= $t['nama']; ?></td>
											<td><?= date_format(date_create($t['tanggal']), 'd M Y'); ?></td>
											<td><?= 'Rp. ' . number_format($t['debit']); ?></td>
											<td><?= 'Rp. ' . number_format($t['kredit']); ?></td>
											<td><?= $t['jenis']; ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
							<div class="col-6 mt-4 float-right">
								<table class="table table-striped border-bottom">
									<tbody>
										<tr>
											<th>Jumlah Debit</th>
											<td class="text-right"><?= 'Rp. ' . number_format($total_debit); ?></td>
										</tr>
										<tr>
											<th>Jumlah Kredit</th>
											<td class="text-right"><?= 'Rp. ' . number_format($total_kredit); ?></td>
										</tr>
									</tbody>
								</table>
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

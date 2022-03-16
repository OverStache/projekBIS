<div class="content-wrapper">
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<a href="<?= base_url('rekening'); ?>" class="btn btn-danger no-print mt-3">Back</a>
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
										<h5>Laporan Rekening <?= date('F Y'); ?></h5>
									</div>
								</div>
								<div class="col-3 my-auto">
								</div>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>No. Rekening</th>
										<th>Tanggal Registrasi</th>
										<th>Jangka Waktu</th>
										<th>Jumlah Pinjaman</th>
										<th>Sisa Angsuran</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($rekening as $r) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $r['nama']; ?></td>
											<td><?= $r['id_rekening']; ?><?= $r['id_anggota']; ?></td>
											<td><?= date_format(date_create($r['tanggal']), 'd M Y'); ?></td>
											<td><?= $r['jangka_waktu']; ?> Bulan</td>
											<td><?= 'Rp. ' . number_format($r['jumlah']); ?></td>
											<td><?= 'Rp. ' . number_format($r['jumlah'] - $r['saldo']); ?></td>
											<td><?= $r['status']; ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
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

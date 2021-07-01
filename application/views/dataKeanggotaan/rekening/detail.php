<!-- Rekening Detail -->
<!-- Navbar -->
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?php $this->load->view('templates/contentHeader'); ?>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-header d-flex">
							<ul class="nav nav-pills mr-auto">
								<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Detail</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Jadwal Pembayaran</a></li>
							</ul>
							<a href="<?= base_url('rekening'); ?>" class="btn btn-danger">Back</a>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<div class="row">
										<div class="col-sm-6 py-3 px-4">
											<table class="table table-striped border-bottom">
												<tr>
													<td class="col-4">No. Rekening</td>
													<td class="col-8"><?= $rekening['id']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Nama Anggota</td>
													<td class="col-8"><?= $rekening['nama']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Plafon</td>
													<td class="col-8"><?= 'Rp. ' . number_format($rekening['jumlah']); ?></td>
												</tr>
												<tr>
													<td>Lama Angsuran</td>
													<td><?= $rekening['jangka_waktu']; ?></td>
												</tr>
											</table>
										</div>
										<div class="col-sm-6 py-3 px-4">
											<table class="table table-striped border-bottom">
												<tr>
													<td class="col-4">Teller ID</td>
													<td class="col-8"></td>
												</tr>
												<tr>
													<td class="col-4">Tanggal Registrasi</td>
													<td class="col-8"><?= $rekening['tanggal']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Status Rekening</td>
													<td class="col-8">
														<span class="badge badge-<?= $rekening['color']; ?>"><?= $rekening['status']; ?></span>
														<?php if ($rekening['status'] != 'Lunas') : ?>
															<a href="#" class="badge badge-<?= button_rekening_status($rekening['id'])['button']; ?> changeStatus" data-id="<?= $rekening['id']; ?>" data-status="<?= $rekening['status']; ?>">
																<i class="fas fa-<?= button_rekening_status($rekening['id'])['icon']; ?> fa-xs"></i>
															</a>
														<?php endif ?>
													</td>
												</tr>
											</table>
										</div>
									</div>
									<!-- row -->
									<div class="row">
										<div class="col py-3 px-4">
											<table class="table table-striped border-bottom">
												<tr>
													<td class="col-2">Harga Perolehan</td>
													<td class="col-10"><?= 'Rp. ' . number_format($rekening['perolehan']); ?></td>
												</tr>
												<tr>
													<td class="col-2">Margin</td>
													<td class="col-10"><?= 'Rp. ' . number_format($rekening['margin']); ?></td>
												</tr>
											</table>
										</div>
									</div>
									<!-- row -->
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane" id="tab_2">
									<div class="row">
										<div class="col-sm-12">
											<table class="table">
												<thead>
													<tr>
														<th>#</th>
														<th>Tanggal Tagihan</th>
														<th>Tagihan</th>
														<th>Terbayar</th>
														<th>Status</th>
														<th>NPF</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($jadwal as $j) : ?>
														<tr>
															<td><?= $j['#']; ?></td>
															<td><?= $j['tanggalTagihan']; ?></td>
															<td><?= 'Rp. ' . number_format($j['tagihan']); ?></td>
															<td><?= 'Rp. ' . number_format($j['angsuran']); ?></td>
															<td><span class="badge badge-<?= $j['statusColor']; ?>"><?= $j['status']; ?></span></td>
															<td><span class="badge badge-<?= $j['npfColor']; ?>"><?= $j['npf']; ?></span></td>
														</tr>
													<?php endforeach ?>
												</tbody>
												<tfoot>
													<tr>
														<th colspan="2" class="text-center">Total</th>
														<th><?= 'Rp. ' . number_format($rekening['jumlah']); ?></th>
														<th><?= 'Rp. ' . number_format($rekening['saldo']); ?></th>
														<th colspan="2"></th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- /.tab-content -->
						</div><!-- /.card-body -->
					</div>
					<!-- card -->
				</div>
				<!-- col -->
			</div>
			<!-- row -->
		</div>
		<!-- container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- rekening -->
<!-- Navbar -->
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?php $this->load->view('templates/contentHeader'); ?>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<?= $this->session->flashdata('message'); ?>
					<div class="card card-primary card-outline">
						<div class="card-body">
							<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
								<a href="<?= base_url('rekening/add') ?>" class="btn btn-primary mb-4">Tambah Rekening</a>
							<?php endif ?>
							<table id="searchOnly" class="table table-striped">
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
										<?php if ($this->session->userdata('role_id') != 2) : ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($rekening as $r) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $r['nama']; ?></td>
											<td><?= $r['id_rekening']; ?><?= $r['id_anggota']; ?></td>
											<td><?= $r['tanggal']; ?></td>
											<td><?= $r['jangka_waktu']; ?> Bulan</td>
											<td><?= 'Rp. ' . number_format($r['jumlah']); ?></td>
											<td><?= 'Rp. ' . number_format($r['jumlah'] - $r['saldo']); ?></td>
											<td>
												<span class="badge badge-<?= $r['statusColor']; ?>"><?= $r['status']; ?></span>
											</td>
											<?php if ($this->session->userdata('role_id') != 2) : ?>
												<td>
													<a href="<?= base_url('rekening/detail/' . $r['id_rekening']) ?>" class="btn btn-xs btn-primary">
														<i class="fas fa-fw fa-search"></i>
													</a>
													<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>

														<?php if ($r['id_status'] != 2) : ?>
															<a href="#" class="changeActive rekening btn btn-xs btn-<?= $r['buttonColor']; ?>" data-id="<?= $r['id_rekening']; ?>" data-id_status="<?= $r['id_status']; ?>">
																<i class="fas fa-fw fa-<?= $r['buttonIcon'] ?> "></i>
															</a>
														<?php endif ?>

														<?php if ($r['id_status'] == 0) : ?>
															<a href="#" class="btn btn-xs btn-danger modalDelete rekeningDelete" data-id="<?= $r['id']; ?>" data-title="<?= $r['nama']; ?> - <?= $r['id']; ?><?= $r['id_anggota']; ?>">
																<i class="fas fa-fw fa-times"></i>
															</a>
														<?php endif ?>
														<!--CRUD visibility--> <?php endif ?>
												</td>
											<?php endif ?>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

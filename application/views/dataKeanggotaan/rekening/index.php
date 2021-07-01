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
					<div class="card">
						<div class="card-header">
							<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
								<a href="<?= base_url('rekening/add') ?>" class="btn btn-primary">Tambah Rekening</a>
							<?php endif ?>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>No. Rekening</th>
										<th>Jangka Waktu</th>
										<th>Jumlah Pinjaman</th>
										<!-- <th>Sisa Angsuran</th> -->
										<th>Status</th>
										<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
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
											<td><?= $r['id']; ?></td>
											<td><?= $r['jangka_waktu']; ?> Bulan</td>
											<td><?= 'Rp. ' . number_format($r['jumlah']); ?></td>
											<!-- <td><?= 'Rp. ' . number_format($r['jumlah'] - $r['saldo']); ?></td> -->
											<td>
												<span class="badge badge-<?= $r['color']; ?>"><?= $r['status']; ?></span>
											</td>
											<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
												<td>
													<a href="<?= base_url('rekening/detail/' . $r['id']) ?>" class="btn btn-xs btn-primary">
														<i class="fas fa-fw fa-search"></i>
													</a>
													<?php if ($r['status'] != 'Lunas') : ?>
														<a href="#" class="btn btn-xs btn-<?= button_rekening_status($r['id'])['button']; ?> changeStatus" data-id="<?= $r['id']; ?>" data-status="<?= $r['status']; ?>">
															<i class="fas fa-fw fa-<?= button_rekening_status($r['id'])['icon']; ?> "></i>
														</a>
													<?php endif ?>
													<?php if ($r['status'] == 'Active') : ?>
														<a href="<?= base_url('angsuran/add/') . $r['id'] ?>" class="btn btn-xs btn-info">
															<i class="fas fa-fw fa-plus"></i>
														</a>
													<?php endif ?>
													<?php if ($r['status'] == 'Pending') : ?>
														<a href="#" class="btn btn-xs btn-danger modalDelete anggotaDelete" data-id="<?= $r['id']; ?>" data-title="<?= $r['nama']; ?> - <?= $r['id']; ?>">
															<i class="fas fa-fw fa-times"></i>
														</a>
													<?php endif ?>
												</td>
											<?php endif ?>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>No. Rekening</th>
										<th>Jangka Waktu</th>
										<th>Jumlah Pinjaman</th>
										<!-- <th>Sisa Angsuran</th> -->
										<th>Status</th>
										<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</tfoot>
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

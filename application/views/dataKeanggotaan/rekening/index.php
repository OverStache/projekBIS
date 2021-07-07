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
								<a href="<?= base_url('rekening/add') ?>" class="btn btn-primary">Tambah Rekening</a>
							<?php endif ?>
							<table id="example2" class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>No. Rekening</th>
										<th>Jangka Waktu</th>
										<th>Jumlah Pinjaman</th>
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
											<td><?= $r['id']; ?><?= $r['id_anggota']; ?></td>
											<td><?= $r['jangka_waktu']; ?> Bulan</td>
											<td><?= 'Rp. ' . number_format($r['jumlah']); ?></td>
											<!-- <td><?= 'Rp. ' . number_format($r['jumlah'] - $r['saldo']); ?></td> -->
											<td>
												<?php if ($r['is_active'] == 1) : ?>
													<span class="badge badge-<?= $r['color']; ?>"><?= $r['statusRekening']; ?></span>
												<?php else : ?>
													<span class="badge badge-danger">Anggota Tidak Aktif</span>
												<?php endif ?>
											</td>
											<?php if ($this->session->userdata('role_id') != 2) : ?>
												<td>
													<a href="<?= base_url('rekening/detail/' . $r['id']) ?>" class="btn btn-xs btn-primary">
														<i class="fas fa-fw fa-search"></i>
													</a>
													<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
														<?php if ($r['is_active'] == 1) : ?>
															<?php if ($r['statusRekening'] != 'Lunas') : ?>
																<a href="#" class="btn btn-xs btn-<?= button_rekening_status($r['id'])['button']; ?> changeStatus" data-id="<?= $r['id']; ?>" data-status="<?= $r['statusRekening']; ?>">
																	<i class="fas fa-fw fa-<?= button_rekening_status($r['id'])['icon']; ?> "></i>
																</a>
															<?php endif ?>
														<?php endif ?>
														<?php if ($r['statusRekening'] == 'Pending') : ?>
															<a href="#" class="btn btn-xs btn-danger modalDelete rekeningDelete" data-id="<?= $r['id']; ?>" data-title="<?= $r['nama']; ?> - <?= $r['id']; ?><?= $r['id_anggota']; ?>">
																<i class="fas fa-fw fa-times"></i>
															</a>
														<?php endif ?>
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
										<th>Status</th>
										<?php if ($this->session->userdata('role_id') != 2) : ?>
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

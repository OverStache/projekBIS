<!-- Anggota -->
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
				<div class="col-12">
					<?= $this->session->flashdata('message'); ?>
					<div class="card card-primary card-outline">
						<div class="card-body">
							<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
								<a href="<?= base_url('anggota/add') ?>" class="btn btn-primary modalAdd mb-4">Daftar Anggota Baru</a>
							<?php endif ?>
							<table id="searchOnly" class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>ID Anggota</th>
										<th>Nama Lengkap</th>
										<th>Status</th>
										<?php if ($this->session->userdata('role_id') != 2) : ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($anggota as $a) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $a['id_anggota']; ?></td>
											<td><?= $a['nama']; ?></td>
											<td><span class="badge badge-<?= $a['statusColor']; ?>"><?= $a['status']; ?></span></td>
											<?php if ($this->session->userdata('role_id') != 2) : ?>
												<td>
													<a href="<?= base_url('anggota/detail/' . $a['id_anggota']) ?>" class="btn btn-xs btn-primary">
														<i class="fas fa-fw fa-search"></i>
													</a>
													<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
														<a href="#" class="changeActive anggota btn btn-xs btn-<?= $a['buttonColor'] ?>" data-id="<?= $a['id_anggota']; ?>" data-id_status="<?= $a['id_status']; ?>">
															<i class="fas fa-fw fa-<?= $a['buttonIcon'] ?>"></i>
														</a>
														<?php if ($a['id_status'] == 0) : ?>
															<a href="#" class="btn btn-xs btn-danger modalDelete anggotaDelete" data-id="<?= $a['id_anggota']; ?>" data-title="<?= $a['nama']; ?>">
																<i class="fas fa-fw fa-times"></i>
															</a>
														<?php endif ?>
													<?php endif ?>
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
	<!-- /.main content -->
</div>
<!-- /.content-wrapper -->

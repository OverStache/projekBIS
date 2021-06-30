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
					<div class="card">
						<div class="card-header">
							<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
								<a href="<?= base_url('anggota/add') ?>" class="btn btn-primary modalAdd">Tambah Anggota</a>
							<?php endif ?>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Kode Anggota</th>
										<th>Nama Lengkap</th>
										<th>Status</th>
										<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
											<!-- <th>Is Active</th> -->
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($anggota as $a) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $a['id']; ?></td>
											<td><?= $a['nama']; ?></td>
											<td><?= $a['status']; ?></td>
											<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
												<td>
													<a href="<?= base_url('anggota/update/' . $a['id']) ?>" class="btn btn-xs btn-success">
														<i class="fas fa-fw fa-edit"></i>
													</a>
													<a href="#" class="btn btn-xs btn-danger modalDelete anggotaDelete" data-id="<?= $a['id']; ?>" data-title="<?= $a['nama']; ?>">
														<i class="fas fa-fw fa-trash"></i>
													</a>
													<a href="#" class="changeActive anggota btn btn-xs btn-<?= check_anggota_active($a['id'])['button']; ?>" data-id="<?= $a['id']; ?>" data-is_active="<?= $a['is_active']; ?>">
														<i class="fas fa-fw fa-<?= check_anggota_active($a['id'])['icon']; ?>"></i>
													</a>
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

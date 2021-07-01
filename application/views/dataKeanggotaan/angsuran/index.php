<!-- Angsuran -->
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
							<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
								<a href="<?= base_url('angsuran/add') ?>" class="btn btn-primary modalAdd">Tambah Rekening</a>
							<?php endif ?>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Penyetor</th>
										<th>Waktu Setor</th>
										<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($angsuran as $m) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $m['penyetor']; ?></td>
											<td><?= $m['tanggal']; ?></td>
											<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
												<td>
													<a href="<?= base_url('angsuran/update/' . $m['id']) ?>" class="btn btn-xs btn-success">
														<i class="fas fa-fw fa-edit"></i>
													</a>
													<a href="#" class="btn btn-xs btn-danger modalDelete angsuranDelete" data-id="<?= $m['id']; ?>" data-title="<?= $m['penyetor']; ?>">
														<i class="fas fa-fw fa-trash"></i>
													</a>
												</td>
											<?php endif ?>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Penyetor</th>
										<th>Waktu Setor</th>
										<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
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
	<!-- /.main content -->
</div>
<!-- /.content-wrapper -->

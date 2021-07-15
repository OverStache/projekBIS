<!-- User Management -->
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
						<!-- /.card-header -->
						<div class="card-body">
							<a href="<?= base_url('user/add'); ?>" class="btn btn-primary">Tambah User</a>
							<table id="example2" class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>User</th>
										<th>Role</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($user as $u) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $u['username']; ?></td>
											<td><?= $u['role']; ?></td>
											<td><span class="badge badge-<?= $u['statusColor'] ?>"><?= $u['status'] ?></span></td>
											<td>
												<a href="<?= base_url('user/update/') . $u['id']; ?>" class="btn btn-xs btn-primary">
													<i class="fas fa-fw fa-edit"></i>
												</a>
												<a href="#" class="btn btn-xs btn-danger modalDelete userDelete" data-id="<?= $u['id']; ?>" data-title="<?= $u['username']; ?>">
													<i class="fas fa-fw fa-trash"></i>
												</a>
												<a href="#" class="changeActive user btn btn-xs btn-<?= $u['buttonColor'] ?>" data-id="<?= $u['id_user']; ?>" data-id_status="<?= $u['id_status']; ?>">
													<i class="fas fa-fw fa-<?= $u['buttonIcon'] ?>"></i>
												</a>
											</td>
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

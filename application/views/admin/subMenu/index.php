<!-- Sub Menu Management -->
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
							<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
								<a href="<?= base_url('subMenu/add'); ?>" class="btn btn-primary">Add New Sub Menu</a>
							<?php endif ?>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Title</th>
										<th>Menu</th>
										<th>Url</th>
										<th>Icon</th>
										<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($subMenu as $sm) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $sm['title']; ?></td>
											<td><?= $sm['menu']; ?></td>
											<td><?= $sm['urlSubMenu']; ?></td>
											<td><i class="<?= $sm['icon']; ?>"></i></td>
											<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
												<td>
													<a href="<?= base_url('subMenu/update/') . $sm['id']; ?>" class="btn btn-xs btn-success" data-menu_id="<?= $sm['menu_id']; ?>">
														<i class="fas fa-fw fa-edit"></i>
													</a>
													<a href="#" class=" btn btn-xs btn-danger modalDelete subMenuDelete" data-id="<?= $sm['id']; ?>" data-title="<?= $sm['title']; ?>">
														<i class="fas fa-fw fa-trash"></i>
													</a>
													<a href="#" class="changeActive subMenu btn btn-xs btn-<?= check_sub_menu_active($sm['id'])['button']; ?>" data-id="<?= $sm['id']; ?>" data-is_active="<?= $sm['is_active']; ?>">
														<i class="fas fa-fw fa-<?= check_sub_menu_active($sm['id'])['icon']; ?>"></i>
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

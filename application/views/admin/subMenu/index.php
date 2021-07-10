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
					<div class="card card-primary card-outline">
						<div class="card-body">
							<table class="table table-striped">
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
													<a href="<?= base_url('subMenu/update/') . $sm['id']; ?>" class="btn btn-xs btn-primary" data-menu_id="<?= $sm['menu_id']; ?>">
														<i class="fas fa-fw fa-edit"></i>
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

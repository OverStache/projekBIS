<!-- index role -->

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
							<button class="btn btn-primary dropdown-toggle mb-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?= $role_id['role']; ?>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<?php foreach ($role as $r) : ?>
									<li value="<?= $r['id']; ?>">
										<a class="dropdown-item" href="<?= base_url('role/index/') . $r['id']; ?>"><?= $r['role']; ?></a>
									</li>
								<?php endforeach ?>
							</div>
							<?php $i = 1;
							if ($menu) : ?>
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Menu</th>
											<th>Access</th>
											<th>Add</th>
											<th>Update</th>
											<th>Detail</th>
											<th>Delete</th>
											<th>Index</th>
											<th>Change Active</th>
											<th>Change Rekening Status</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($menu as $m) : ?>
											<tr>
												<td><?= $i++; ?></td>
												<td><?= $m['menu']; ?></td>
												<td>
													<div class="form-check">
														<input class="form-check-input menuAccess" type="checkbox" <?= menu_access($role_id['id'], $m['id']); ?> data-role="<?= $role_id['id']; ?>" data-menu="<?= $m['id']; ?>">
													</div>
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input crudAccess" type="checkbox" <?= crud_access($role_id['id'], $m['id'], 1); ?> data-role="<?= $role_id['id']; ?>" data-menu="<?= $m['id']; ?>" data-crud="1">
													</div>
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input crudAccess" type="checkbox" <?= crud_access($role_id['id'], $m['id'], 2); ?> data-role="<?= $role_id['id']; ?>" data-menu="<?= $m['id']; ?>" data-crud="2">
													</div>
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input crudAccess" type="checkbox" <?= crud_access($role_id['id'], $m['id'], 3); ?> data-role="<?= $role_id['id']; ?>" data-menu="<?= $m['id']; ?>" data-crud="3">
													</div>
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input crudAccess" type="checkbox" <?= crud_access($role_id['id'], $m['id'], 4); ?> data-role="<?= $role_id['id']; ?>" data-menu="<?= $m['id']; ?>" data-crud="4">
													</div>
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input crudAccess" type="checkbox" <?= crud_access($role_id['id'], $m['id'], 5); ?> data-role="<?= $role_id['id']; ?>" data-menu="<?= $m['id']; ?>" data-crud="5">
													</div>
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input crudAccess" type="checkbox" <?= crud_access($role_id['id'], $m['id'], 7); ?> data-role="<?= $role_id['id']; ?>" data-menu="<?= $m['id']; ?>" data-crud="7">
													</div>
												</td>
												<td>
													<div class="form-check">
														<input class="form-check-input crudAccess" type="checkbox" <?= crud_access($role_id['id'], $m['id'], 9); ?> data-role="<?= $role_id['id']; ?>" data-menu="<?= $m['id']; ?>" data-crud="9">
													</div>
												</td>

											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							<?php else : ?>
								<h5>No Menu</h5>
							<?php endif ?>
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

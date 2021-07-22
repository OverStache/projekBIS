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
										<th>Menu</th>
										<!--akses khusus pengurus--> <?php if ($this->session->userdata('role_id') == 1) : ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($menu as $m) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $m['menu']; ?></td>
											<!--akses khusus pengurus--> <?php if ($this->session->userdata('role_id') == 1) : ?>
												<td>
													<a href="<?= base_url('menu/update/' . $m['id']) ?>" class="btn btn-xs btn-primary">
														<i class="fas fa-fw fa-edit"></i>
													</a>
												</td>
											<?php endif ?>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Menu</th>
										<!--akses khusus pengurus--> <?php if ($this->session->userdata('role_id') == 1) : ?>
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

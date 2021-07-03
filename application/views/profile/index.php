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
				<div class="col-md-4">
					<?= $this->session->flashdata('message'); ?>
					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profile/') . $userdata['image']; ?>" alt="User profile picture">
							</div>

							<h3 class="profile-username text-center"><?= $userdata['username']; ?></h3>

							<p class="text-muted text-center"><?= $userdata['role']; ?></p>

							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<b>Email</b> <a class="float-right"><?= $userdata['email']; ?></a>
								</li>
								<li class="list-group-item">
									<b>Member Since</b> <a class="float-right"><?= date('F d Y', $userdata['date_created']); ?></a>
								</li>
							</ul>

							<a href="<?= base_url('profile/update'); ?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
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

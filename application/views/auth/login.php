<div class="container">
	<div class="card">
		<div class="card-header pb-0">
			<div class="text-center">
				<h3><small>Koperasi Simpan Pinjam dan Pembiayaan Syariah</small></h3>
				<h3>BMT Taawun Finance (Tawfin)</h3>
			</div>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<div class="card-body">
			<div class="row py-2">
				<div class="col-7">
					<div class="p-3">
						<div class="text-center py-5">
							<img src="<?= base_url('assets/img/auth/'); ?>images.png" class="img-responsive">
						</div>
					</div>
				</div>
				<div class="col-5">
					<div class="px-5">
						<?= $this->session->flashdata('message'); ?>
						<div class="text-center">
							<h4 class="text-dark m-3">Login</h4>
						</div>
						<form class="user mb-3" action="<?php base_url('auth') ?>" method="post">
							<div class="form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
								<?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
							</div>
							<button class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button>
							<a href="<?= base_url('auth'); ?>" class="btn btn-success btn-block text-white btn-user mt-3">
								Back
							</a>
						</form>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<div class="card-footer text-center pb-0 border-top">
			<p>Jl. Lontar No. 2 RT 14/RW 14, Menteng Atas, Kecamatan Setia Budi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12960</p>
		</div>
		<!-- /.card -->
	</div>
</div>
<!-- /.register-box -->

<!-- /.login-box -->
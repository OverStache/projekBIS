<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-9 col-lg-12 col-xl-10">
			<div class="card shadow-lg o-hidden border-0 my-4">
				<div class="card-body pb-0">
					<div class="row border-bottom">
						<div class="col">
							<div class="text-center">
								<h3><small>Koperasi Simpan Pinjam dan Pembiayaan Syariah</small></h3>
								<h3>BMT Taawun Finance (Tawfin)</h3>
							</div>
						</div>
					</div>
					<div class="row mb-3 border-bottom">
						<div class="col-7">
							<div class="h-100 d-flex justify-content-center align-items-center" style="width:500px;">
								<img src="<?= base_url('assets/img/auth/'); ?>images.png" class="img-responsive">
							</div>
						</div>
						<div class="col-5">
							<div class="p-3">
								<?= $this->session->flashdata('message'); ?>
								<div class="text-center">
									<h4 class="text-dark mb-3">Login</h4>
								</div>
								<form class="user mb-3" action="<?php base_url('auth') ?>" method="post">
									<div class="form-group">
										<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
										<?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" id="password" name="password" placeholder="Password">
										<?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
									</div>
									<button class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button>
									<a href="<?= base_url('auth/registration'); ?>" class="btn btn-success btn-block text-white btn-user mt-3">
										Registrasi Anggota
									</a>
								</form>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="d-flex justify-content-center align-items-center">
								<p>Jl. Lontar No. 2 RT 14/RW 14, Menteng Atas, Kecamatan Setia Budi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12960</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.login-box -->

<!-- <div class="login-box">
	<div class="login-logo">
		<a href="../../index2.html"><b>BMT </b>Tawfin</a>
	</div>
	
	<div class="card">
		<div class="card-body login-card-body">
			<?= $this->session->flashdata('message'); ?>
			<p class="login-box-msg">Login to start your session</p>

			<form action="<?php base_url('auth') ?>" method="post">
				<div class="input-group">
					<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
					<div class=" input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
				<div class="input-group mt-3">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
				<div class="row mt-3">
					<div class="col">
						<button type="submit" class="btn btn-primary btn-block">Login</button>
					</div>
					
				</div>
			</form>

			<p class="mb-1 mt-2">
				<a href="<?= base_url('auth/forgotpassword'); ?>">I forgot my password</a>
			</p>
			<p class="mb-0">
				<a href="<?= base_url('auth/registration'); ?>" class="text-center">Register a new membership</a>
			</p>
		</div>
		
	</div>
</div> -->
<!-- /.login-box -->

<!-- Navbar -->
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?php $this->load->view('templates/contentHeader'); ?>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Update Data User</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('user/update/' . $user['id']); ?>
						<div class="card-body">
							<div class="form-group">
								<input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" placeholder="Username">
								<?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" value="........." placeholder="Password">
								<?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<select class="form-control" id="role_id" name="role_id" value="<?= $user['role_id']; ?>">
									<option value="">Select Role</option>
									<?php foreach ($role as $r) : ?>
										<option value="<?= $r['id']; ?>" <?php if ($r['id'] == $user['role_id']) : ?> selected <?php endif ?>><?= $r['role']; ?></option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('role_id', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<div class="form-check">
									<input type="hidden" id="is_active" name="is_active" value="0">
									<input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" <?php if ($user['id_status'] == 1) : ?> checked <?php endif ?>>
									<label class="form-check-label" for="is_active">
										Active
									</label>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="<?= base_url('user'); ?>" class="btn btn-danger">Cancel</a>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
</div>
<!-- /.content-wrapper -->

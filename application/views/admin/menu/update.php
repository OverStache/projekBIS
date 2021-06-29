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
							<h3 class="card-title">Update Menu</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('menu/update/' . $menu['id']); ?>
						<div class="card-body">
							<div class="form-group">
								<input type="text" class="form-control" id="title" name="title" value="<?= $menu['menu']; ?>" placeholder="Nama Menu">
								<?= form_error('title', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="url" name="url" value="<?= $menu['urlMenu']; ?>" placeholder="url">
								<?= form_error('url', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="<?= base_url('menu'); ?>" class="btn btn-danger">Cancel</a>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

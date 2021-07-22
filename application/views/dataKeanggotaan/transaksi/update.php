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
							<h3 class="card-title">Update Angsuran</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('angsuran/angsuranUpdate/' . $angsuran['id']); ?>
						<div class="card-body">
							<div class="form-group">
								<select class="form-control" id="id_rekening" name="id_rekening">
									<option value="">Pilih Rekening</option>
									<?php foreach ($rekening as $r) : ?>
										<option value="<?= $r['id']; ?>" <?php if ($angsuran['id_rekening'] == $r['id']) : ?> selected <?php endif ?>><?= $r['id']; ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('id_rekening', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="penyetor" name="penyetor" value="<?= $angsuran['penyetor']; ?>" placeholder="Nama Penyetor">
								<?= form_error('penyetor', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $angsuran['jumlah']; ?>" placeholder="Jumlah Angsuran">
								<?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="<?= base_url('angsuran'); ?>" class="btn btn-danger">Cancel</a>
							<a href="<?= base_url('angsuran/print/' . $angsuran['id']); ?>" class="btn btn-secondary">Print</a>
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

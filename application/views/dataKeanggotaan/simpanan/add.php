<!-- Tambah Angsuran -->
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
							<h3 class="card-title">Angsuran Baru</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('transaksi/add'); ?>
						<div class="card-body">
							<div class="form-group">
								<select class="form-control id_rekening" id="id_rekening" name="id_rekening">
									<option value="">Select Rekening</option>
									<?php foreach ($rekening as $r) : ?>
										<option value="<?= $r['id']; ?>"><?= $r['id_anggota']; ?> - <?= $r['id']; ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('id_rekening', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<!-- <select class="form-control showData" id="cicilan" name="cicilan">
									<option value="">tes</option>
								</select> -->
								<input type="text" class="form-control" id="cicilan">
								<?= form_error('cicilan', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="number" class="form-control" id="jumlah" name="jumlah">
								<?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Tambah</button>
							<a href="<?= base_url('rekening'); ?>" class="btn btn-danger">Cancel</a>
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

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
							<h3 class="card-title">Tambah Rekening</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('rekening/rekeningAdd'); ?>
						<div class="card-body">
							<div class="form-group">
								<select class="form-control" id="id_anggota" name="id_anggota">
									<option value="">Pilih Anggota</option>
									<?php foreach ($anggota as $a) : ?>
										<option value="<?= $a['idAnggota']; ?>"><?= $a['idAnggota']; ?> - <?= $a['nama']; ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('id_anggota', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jangka_waktu" id="inlineRadio1" value="3">
								<label class="form-check-label" for="inlineRadio1">3 Bulan</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jangka_waktu" id="inlineRadio1" value="3">
								<label class="form-check-label" for="inlineRadio1">6 Bulan</label>
							</div>
							<div class="form-check form-check-inline mb-3">
								<input class="form-check-input" type="radio" name="jangka_waktu" id="inlineRadio1" value="3">
								<label class="form-check-label" for="inlineRadio1">12 Bulan</label>
							</div>
							<?= form_error('jangka_waktu', '<small class="text-danger">', '</small>'); ?>
							<div class="form-group">
								<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Pembiayaan">
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

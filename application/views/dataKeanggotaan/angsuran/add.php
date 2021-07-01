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
						<?= form_open_multipart('angsuran/add/' . $id); ?>
						<div class="card-body">
							<div class="form-group">
								<select class="form-control id_rekening" name="id_rekening">
									<!-- <option value="">Pilih Rekening</option> -->
									<?php foreach ($jadwal as $j) : ?>
										<option value="<?= $j['id_rekening']; ?>"><?= $j['id']; ?> - <?= $j['nama']; ?> - <?= $j['id_rekening']; ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('id_rekening', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<select class="form-control showData" id="#" name="#">
									<?php foreach ($jadwal as $j) : ?>
										<option value="<?= $j['#']; ?>">Tagihan ke <?= $j['#'] ?> - dedline <?= $j['tanggalTagihan']; ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('#', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Angsuran">
								<?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Tambah</button>
							<a href="<?= base_url('angsuran'); ?>" class="btn btn-danger">Cancel</a>
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

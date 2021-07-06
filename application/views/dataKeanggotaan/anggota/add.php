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
				<div class="col-12">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Tambah Anggota</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('anggota/add'); ?>
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-6">
									<div class="form-group">
										<label for="nama">Nama Lengkap</label>
										<input type="text" class="form-control" id="nama" name="nama">
										<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="namaPanggilan">Nama Panggilan</label>
										<input type="text" class="form-control" id="namaPanggilan" name="namaPanggilan">
										<?= form_error('namaPanggilan', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="jenisKelamin">Jenis Kelamin</label>
										<select class="form-control" id="jenisKelamin" name="jenisKelamin">
											<option value="">Pilih...</option>
											<option value="Laki-laki">Laki-laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
										<?= form_error('jenisKelamin', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="status">Jenis Anggota</label>
										<select class="form-control" id="status" name="status">
											<option value="">Pilih...</option>
											<?php foreach ($status as $s) : ?>
												<option value="<?= $s['id']; ?>"><?= $s['status']; ?></option>
											<?php endforeach ?>
										</select>
										<?= form_error('status', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="tempatLahir">Tempat Lahir</label>
										<input type="text" class="form-control" id="tempatLahir" name="tempatLahir">
										<?= form_error('tempatLahir', '<small class="text-danger">', '</small>'); ?>
									</div>
									<!-- Date -->
									<div class="form-group">
										<label>Tanggal Lahir</label>
										<div class="input-group date" id="reservationdate" data-target-input="nearest">
											<span class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
												<button type="button" class="btn btn-primary rounded-left"><i class="fa fa-calendar mr-2"></i>Pilih</button>
											</span>
											<input type="text" id="tanggalLahir" name="tanggalLahir" class="form-control datetimepicker-input" data-target="#reservationdate" />
										</div>
										<?= form_error('tanggalLahir', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="namaIbuKandung">Nama Ibu Kandung</label>
										<input type="text" class="form-control" id="namaIbuKandung" name="namaIbuKandung">
										<?= form_error('namaIbuKandung', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="jenisID">Jenis Identitas</label>
										<select class="form-control" id="jenisID" name="jenisID">
											<option value="">Pilih...</option>
											<option value="KTP">KTP</option>
											<option value="KK">KK</option>
											<option value="SIM">SIM</option>
										</select>
										<?= form_error('jenisID', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="nomerID">Nomor Identitas</label>
										<input type="text" class="form-control" id="nomerID" name="nomerID">
										<?= form_error('nomerID', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="statusMarital">Status Marital</label>
										<select class="form-control" id="statusMarital" name="statusMarital">
											<option value="">Pilih...</option>
											<option value="Menikah">Menikah</option>
											<option value="Belum Menikah">Belum Menikah</option>
											<option value="Cerai Hidup">Cerai Hidup</option>
											<option value="Cerai Mati">Cerai Mati</option>
										</select>
										<?= form_error('statusMarital', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="agama">Agama</label>
										<select class="form-control" id="agama" name="agama">
											<option value="">Pilih...</option>
											<option value="Islam">Islam</option>
											<option value="Kristen Protestan">Kristen Protestan</option>
											<option value="Kristen Katolik">Kristen Katolik</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>
											<option value="Konghucu">Konghucu</option>
										</select>
										<?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="kewarganegaraan">Kewarganegaraan</label>
										<select class="form-control" id="kewarganegaraan" name="kewarganegaraan">
											<option value="">Pilih...</option>
											<option value="Indonesia">Indonesia</option>
											<option value="Asing">Asing</option>
										</select>
										<?= form_error('kewarganegaraan', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="pendidikan">Pendidikan</label>
										<select class="form-control" id="pendidikan" name="pendidikan">
											<option value="">Pilih...</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
											<option value="D3">D3</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
										</select>
										<?= form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?= base_url('anggota'); ?>" class="btn btn-danger">Cancel</a>
						</div>
						</form>
						<!-- /.card -->
					</div>
				</div>
			</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

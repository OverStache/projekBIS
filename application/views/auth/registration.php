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
			<h3 class="text-center mb-4">Daftar Anggota Baru</h3>
			<?= form_open_multipart('auth/registration'); ?>
			<div class="row mb-3">
				<div class="col-6">
					<div class="form-group">
						<label for="nama">Nama Lengkap</label>
						<input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
						<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="namaPanggilan">Nama Panggilan</label>
						<input type="text" class="form-control" id="namaPanggilan" name="namaPanggilan" value="<?= set_value('namaPanggilan'); ?>">
						<?= form_error('namaPanggilan', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="jenisKelamin">Jenis Kelamin</label>
						<?php $options = array(
							'' => 'Pilih...',
							'Laki-laki' => 'Laki-laki',
							'Perempuan' => 'Perempuan'
						);
						echo form_dropdown('jenisKelamin', $options, set_value('jenisKelamin'), 'class="form-control"');
						echo form_error('jenisKelamin', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="id_jenis_anggota">Jenis Anggota</label>
						<?php $options = array(
							'' => 'Pilih...',
							'1' => 'Anggota',
							'2' => 'Anggota Luar Biasa'
						);
						echo form_dropdown('id_jenis_anggota', $options, set_value('id_jenis_anggota'), 'class="form-control"');
						echo form_error('id_jenis_anggota', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="tempatLahir">Tempat Lahir</label>
						<input type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="<?= set_value('tempatLahir'); ?>">
						<?= form_error('tempatLahir', '<small class="text-danger">', '</small>'); ?>
					</div>
					<!-- Date -->
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<div class="input-group date" id="reservationdate" data-target-input="nearest">
							<span class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
								<button type="button" class="btn btn-primary rounded-left"><i class="fa fa-calendar mr-2"></i>Pilih</button>
							</span>
							<input type="text" id="tanggalLahir" name="tanggalLahir" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= set_value('tanggalLahir'); ?>" />
						</div>
						<?= form_error('tanggalLahir', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="namaIbuKandung">Nama Ibu Kandung</label>
						<input type="text" class="form-control" id="namaIbuKandung" name="namaIbuKandung" value="<?= set_value('namaIbuKandung'); ?>">
						<?= form_error('namaIbuKandung', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label for="jenisID">Jenis Identitas</label>
						<?php $options = array(
							'' => 'Pilih...',
							'KTP' => 'KTP',
							'KK' => 'KK',
							'SIM' => 'SIM'
						);
						echo form_dropdown('jenisID', $options, set_value('jenisID'), 'class="form-control"');
						echo form_error('jenisID', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="nomerID">Nomor Identitas</label>
						<input type="text" class="form-control" id="nomerID" name="nomerID" value="<?= set_value('nomerID'); ?>">
						<?= form_error('nomerID', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="statusMarital">Status Marital</label>
						<?php $options = array(
							'' => 'Pilih...',
							'Menikah' => 'Menikah',
							'Belum Menikah' => 'Belum Menikah',
							'Cerai Hidup' => 'Cerai Hidup',
							'Cerai Mati' => 'Cerai Mati'
						);
						echo form_dropdown('statusMarital', $options, set_value('statusMarital'), 'class="form-control"');
						echo form_error('statusMarital', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="agama">Agama</label>
						<?php $options = array(
							'' => 'Pilih...',
							'Islam' => 'Islam',
							'Kristen Protestan' => 'Kristen Protestan',
							'Kristen Katolik' => 'Kristen Katolik',
							'Hindu' => 'Hindu',
							'Budha' => 'Budha',
							'Konghucu' => 'Konghucu'
						);
						echo form_dropdown('agama', $options, set_value('agama'), 'class="form-control"');
						echo form_error('agama', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="kewarganegaraan">Kewarganegaraan</label>
						<?php $options = array(
							'' => 'Pilih...',
							'Indonesia' => 'Indonesia',
							'Asing' => 'Asing'
						);
						echo form_dropdown('kewarganegaraan', $options, set_value('kewarganegaraan'), 'class="form-control"');
						echo form_error('kewarganegaraan', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="pendidikan">Pendidikan</label>
						<?php $options = array(
							'' => 'Pilih...',
							'SD' => 'SD',
							'SMP' => 'SMP',
							'SMA' => 'SMA',
							'D3' => 'D3',
							'S1' => 'S1',
							'S2' => 'S2'
						);
						echo form_dropdown('pendidikan', $options, set_value('pendidikan'), 'class="form-control"');
						echo form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<div class="card-footer text-center">
			<button type="submit" class="btn btn-primary">Daftar</button>
			<a href="<?= base_url('auth'); ?>" class="btn btn-danger">Cancel</a>
		</div>
		</form>
		<!-- /.card -->
	</div>
</div>
<!-- /.register-box -->

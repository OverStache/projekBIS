<!-- Rekening Detail -->
<!-- Navbar -->
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?php $this->load->view('templates/contentHeader'); ?>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<?= $this->session->flashdata('message'); ?>
					<div class="card card-primary card-outline">
						<div class="card-header d-flex">
							<ul class="nav nav-pills mr-auto">
								<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Detail</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Update Data Anggota</a></li>
							</ul>
							<a href="<?= base_url('rekening'); ?>" class="btn btn-danger">Back</a>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">
								<!-- tab detail -->
								<div class="tab-pane active" id="tab_1">
									<div class="row">
										<div class="col-sm-6 py-3 px-4">
											<table class="table table-striped border-bottom">
												<tr>
													<td class="col-4">No. Anggota</td>
													<td class="col-8"><?= $anggota['id'] ?></td>
												</tr>
												<tr>
													<td class="col-4">Nama Anggota</td>
													<td class="col-8"><?= $anggota['nama']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Nama Panggilan</td>
													<td class="col-8"><?= $anggota['namaPanggilan']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Jenis Kelamin</td>
													<td class="col-8"><?= $anggota['jenisKelamin']; ?></td>
												</tr>
												<tr>
													<td>Status Anggota</td>
													<td class=""><?= $anggota['statusAnggota']; ?></td>
													<!-- <span class="badge badge-<?= $anggota['color']; ?>"><?= $anggota['statusRekening']; ?></span>-->
												</tr>
											</table>
										</div>
										<div class="col-sm-6 py-3 px-4">
											<table class="table table-striped border-bottom">
												<tr>
													<td class="col-4">Tempat Lahir</td>
													<td class="col-8"><?= $anggota['tempatLahir']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Tanggal Lahir</td>
													<td class="col-8"><?= $anggota['tanggalLahir']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Nama Ibu Kandung</td>
													<td class="col-8"><?= $anggota['namaIbuKandung']; ?></td>
												</tr>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 py-3 px-4">
											<table class="table table-striped border-bottom">
												<tr>
													<td class="col-4">Jenis Identitas</td>
													<td class="col-8"><?= $anggota['jenisID'] ?></td>
												</tr>
												<tr>
													<td class="col-4">Nomor Identitas</td>
													<td class="col-8"><?= $anggota['nomerID']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Status Marital</td>
													<td class="col-8"><?= $anggota['statusMarital']; ?></td>
												</tr>
											</table>
										</div>
										<div class="col-sm-6 py-3 px-4">
											<table class="table table-striped border-bottom">
												<tr>
													<td class="col-4">Agama</td>
													<td class="col-8"><?= $anggota['agama']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Kewarganegaraan</td>
													<td class="col-8"><?= $anggota['kewarganegaraan']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Pendidikan Terakhir</td>
													<td class="col-8"><?= $anggota['pendidikan']; ?></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<!-- /.tab-pane -->
								<!-- tab update anggota -->
								<div class="tab-pane" id="tab_2">
									<?= form_open_multipart('anggota/update/' . $anggota['id']); ?>
									<div class="row mb-3">
										<div class="col-6">
											<div class="form-group">
												<label for="nama">Nama Lengkap</label>
												<input type="text" class="form-control" id="nama" name="nama" value="<?= $anggota['nama']; ?>">
												<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
											</div>
											<div class="form-group">
												<label for="namaPanggilan">Nama Panggilan</label>
												<input type="text" class="form-control" id="namaPanggilan" name="namaPanggilan" value="<?= $anggota['namaPanggilan']; ?>">
												<?= form_error('namaPanggilan', '<small class="text-danger">', '</small>'); ?>
											</div>
											<div class="form-group">
												<label for="jenisKelamin">Jenis Kelamin</label>
												<select class="form-control" id="jenisKelamin" name="jenisKelamin">
													<option value="Laki-laki" <?php if ($anggota['jenisKelamin'] == 'Laki-laki') : ?> selected <?php endif ?>>Laki-laki</option>
													<option value="Perempuan" <?php if ($anggota['jenisKelamin'] == 'Perempuan') : ?> selected <?php endif ?>>Perempuan</option>
												</select>
												<?= form_error('jenisKelamin', '<small class="text-danger">', '</small>'); ?>
											</div>
											<div class="form-group">
												<label for="status">Jenis Anggota</label>
												<select class="form-control" id="status" name="status" value="<?= $anggota['status']; ?>">
													<?php foreach ($status as $s) : ?>
														<option value="<?= $s['id']; ?>" <?php if ($anggota['status'] == $s['id']) : ?> selected <?php endif ?>><?= $s['status']; ?></option>
													<?php endforeach ?>
												</select>
												<?= form_error('status', '<small class="text-danger">', '</small>'); ?>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label for="tempatLahir">Tempat Lahir</label>
												<input type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="<?= $anggota['tempatLahir']; ?>">
												<?= form_error('tempatLahir', '<small class="text-danger">', '</small>'); ?>
											</div>
											<!-- Date -->
											<div class="form-group">
												<label>Tanggal Lahir</label>
												<div class="input-group date" id="reservationdate" data-target-input="nearest">
													<span class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
														<button type="button" class="btn btn-primary rounded-left"><i class="fa fa-calendar mr-2"></i>Pilih</button>
													</span>
													<input type="text" id="tanggalLahir" name="tanggalLahir" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= $anggota['tanggalLahir']; ?>" />
												</div>
												<?= form_error('tanggalLahir', '<small class="text-danger">', '</small>'); ?>
											</div>
											<div class="form-group">
												<label for="namaIbuKandung">Nama Ibu Kandung</label>
												<input type="text" class="form-control" id="namaIbuKandung" name="namaIbuKandung" value="<?= $anggota['namaIbuKandung']; ?>">
												<?= form_error('namaIbuKandung', '<small class="text-danger">', '</small>'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label for="jenisID">Jenis Identitas</label>
												<select class="form-control" id="jenisID" name="jenisID" value="<?= $anggota['jenisID']; ?>">
													<option value="KTP" <?php if ($anggota['jenisID'] == 'KTP') : ?> selected <?php endif ?>>KTP</option>
													<option value="KK" <?php if ($anggota['jenisID'] == 'KK') : ?> selected <?php endif ?>>KK</option>
													<option value="SIM" <?php if ($anggota['jenisID'] == 'SIM') : ?> selected <?php endif ?>>SIM</option>
												</select>
												<?= form_error('jenisID', '<small class="text-danger">', '</small>'); ?>
											</div>
											<div class="form-group">
												<label for="nomerID">Nomor Identitas</label>
												<input type="text" class="form-control" id="nomerID" name="nomerID" value="<?= $anggota['nomerID']; ?>">
												<?= form_error('nomerID', '<small class="text-danger">', '</small>'); ?>
											</div>
											<div class="form-group">
												<label for="statusMarital">Status Marital</label>
												<select class="form-control" id="statusMarital" name="statusMarital" value="<?= $anggota['statusMarital']; ?>">
													<option value="Menikah" <?php if ($anggota['statusMarital'] == 'Menikah') : ?> selected <?php endif ?>>Menikah</option>
													<option value="Belum Menikah" <?php if ($anggota['statusMarital'] == 'Belum Menikah') : ?> selected <?php endif ?>>Belum Menikah</option>
													<option value="Cerai Hidup" <?php if ($anggota['statusMarital'] == 'Cerai Hidup') : ?> selected <?php endif ?>>Cerai Hidup</option>
													<option value="Cerai Mati" <?php if ($anggota['statusMarital'] == 'Cerai Mati') : ?> selected <?php endif ?>>Cerai Mati</option>
												</select>
												<?= form_error('statusMarital', '<small class="text-danger">', '</small>'); ?>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label for="agama">Agama</label>
												<select class="form-control" id="agama" name="agama" value="<?= $anggota['agama']; ?>">
													<option value="Islam" <?php if ($anggota['agama'] == 'Islam') : ?> selected <?php endif ?>>Islam</option>
													<option value="Kristen Protestan" <?php if ($anggota['agama'] == 'Kristen Protestan') : ?> selected <?php endif ?>>Kristen Protestan</option>
													<option value="Kristen Katolik" <?php if ($anggota['agama'] == 'Kristen Katolik') : ?> selected <?php endif ?>>Kristen Katolik</option>
													<option value="Hindu" <?php if ($anggota['agama'] == 'Hindu') : ?> selected <?php endif ?>>Hindu</option>
													<option value="Budha" <?php if ($anggota['agama'] == 'Budha') : ?> selected <?php endif ?>>Budha</option>
													<option value="Konghucu" <?php if ($anggota['agama'] == 'Konghucu') : ?> selected <?php endif ?>>Konghucu</option>
												</select>
												<?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
											</div>
											<div class="form-group">
												<label for="kewarganegaraan">Kewarganegaraan</label>
												<select class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="<?= $anggota['kewarganegaraan']; ?>">
													<option value="Indonesia">Indonesia</option>
													<option value="Asing">Asing</option>
												</select>
												<?= form_error('kewarganegaraan', '<small class="text-danger">', '</small>'); ?>
											</div>
											<div class="form-group">
												<label for="pendidikan">Pendidikan</label>
												<select class="form-control" id="pendidikan" name="pendidikan">
													<option value="SD" <?php if ($anggota['pendidikan'] == 'SD') : ?> selected <?php endif ?>>SD</option>
													<option value="SMP" <?php if ($anggota['pendidikan'] == 'SMP') : ?> selected <?php endif ?>>SMP</option>
													<option value="SMA" <?php if ($anggota['pendidikan'] == 'SMA') : ?> selected <?php endif ?>>SMA</option>
													<option value="D3" <?php if ($anggota['pendidikan'] == 'D3') : ?> selected <?php endif ?>>D3</option>
													<option value="S1" <?php if ($anggota['pendidikan'] == 'S1') : ?> selected <?php endif ?>>S1</option>
													<option value="S2" <?php if ($anggota['pendidikan'] == 'S2') : ?> selected <?php endif ?>>S2</option>
												</select>
												<?= form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-primary mt-3">Update Rekening</button>
									</form>
								</div>
								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						</div><!-- /.card-body -->
					</div>
					<!-- card -->
				</div>
				<!-- col -->
			</div>
			<!-- row -->
		</div>
		<!-- container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

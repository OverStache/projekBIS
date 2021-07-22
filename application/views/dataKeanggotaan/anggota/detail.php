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
								<?php if ($this->session->userdata('role_id') == 1) : ?>
									<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Update Data Anggota</a></li>
								<?php endif ?>
							</ul>
							<a href="<?= base_url('anggota'); ?>" class="btn btn-danger">Back</a>
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
													<td class="col-8"><?= $anggota['id_anggota'] ?></td>
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
													<td class="col-4">Jenis & Status Anggota</td>
													<td class="col-8"><?= $anggota['jenis']; ?> <span class="ml-3 badge badge-<?= $anggota['statusColor']; ?>"><?= $anggota['status']; ?></span></td>

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
								<?php if ($this->session->userdata('role_id') == 1) : ?>
									<!-- tab update anggota -->
									<div class="tab-pane" id="tab_2">
										<?= form_open_multipart('anggota/update/' . $anggota['id_anggota']); ?>
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
												</div>
												<div class="form-group">
													<label for="jenisKelamin">Jenis Kelamin</label>
													<?php $options = array(
														'' => 'Pilih...',
														'Laki-laki' => 'Laki-laki',
														'Perempuan' => 'Perempuan'
													);
													echo form_dropdown('jenisKelamin', $options, $anggota['jenisKelamin'], 'class="form-control"');
													echo form_error('jenisKelamin', '<small class="text-danger">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="id_jenis_anggota">Jenis Anggota</label>
													<?php $options = array(
														'' => 'Pilih...',
														'1' => 'Anggota',
														'2' => 'Anggota Luar Biasa'
													);
													echo form_dropdown('id_jenis_anggota', $options, $anggota['id_jenis_anggota'], 'class="form-control"');
													echo form_error('id_jenis_anggota', '<small class="text-danger">', '</small>'); ?>
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
													<?php $options = array(
														'' => 'Pilih...',
														'KTP' => 'KTP',
														'KK' => 'KK',
														'SIM' => 'SIM'
													);
													echo form_dropdown('jenisID', $options, $anggota['jenisID'], 'class="form-control"');
													echo form_error('jenisID', '<small class="text-danger">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="nomerID">Nomor Identitas</label>
													<input type="text" class="form-control" id="nomerID" name="nomerID" value="<?= $anggota['nomerID']; ?>">
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
													echo form_dropdown('statusMarital', $options, $anggota['statusMarital'], 'class="form-control"');
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
													echo form_dropdown('agama', $options, $anggota['agama'], 'class="form-control"');
													echo form_error('agama', '<small class="text-danger">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="kewarganegaraan">Kewarganegaraan</label>
													<?php $options = array(
														'' => 'Pilih...',
														'Indonesia' => 'Indonesia',
														'Asing' => 'Asing'
													);
													echo form_dropdown('kewarganegaraan', $options, $anggota['kewarganegaraan'], 'class="form-control"');
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
													echo form_dropdown('pendidikan', $options, $anggota['pendidikan'], 'class="form-control"');
													echo form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
												</div>
											</div>
										</div>
										<button type="submit" class="btn btn-primary mt-3">Simpan</button>
										</form>
									</div>
									<!-- /.tab-pane -->
								<?php endif ?>
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

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
				<div class="col">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Tambah Rekening</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('rekening/rekeningAdd'); ?>
						<div class="card-body">
							<!-- <div class="form-group">
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
							</div> -->
							<form>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
									<div class="col-sm-10">
										<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
									</div>
								</div>
								<div class="form-row mb-4">
									<div class="form-group col-md-3">
										<label for="inputCity">Lama Angsuran</label>
										<select class="form-control" id="id_anggota" name="id_anggota">
											<option value="">Pilih Jangka Waktu</option>
											<option value="3">3 Bulan</option>
											<option value="6">6 Bulan</option>
											<option value="12">12 Bulan</option>
										</select>
									</div>
									<div class="form-group col-md-3">
										<label for="inputState">Margin</label>
										<div class="input-group">
											<input type="text" class="form-control" id="inputZip">
											<div class="input-group-prepend">
												<span class="input-group-text rounded-right" id="inputGroupPrepend2">%</span>
											</div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label for="inputZip">Jumlah Pinjaman</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroupPrepend2">Rp.</span>
											</div>
											<input type="text" class="form-control" id="inputZip">
											<span class="input-group-append">
												<button type="button" class="btn btn-primary">Hitung</button>
											</span>
										</div>
									</div>
								</div><!-- /.form-row-->
								<!-- <div class="form-row">
									<div class="form-group col-md-3">
										<label for="inputState">Jumlah Margin</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroupPrepend2">Rp</span>
											</div>
											<input type="text" class="form-control" id="inputZip">
										</div>
									</div>
									<div class="form-group col-md-3">
										<label for="inputState">Jumlah</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroupPrepend2">Rp</span>
											</div>
											<input type="text" class="form-control" id="inputZip">
										</div>
									</div>
									<div class="form-group col-md-3">
										<label for="inputState">Angsuran Bulanan</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroupPrepend2">Rp</span>
											</div>
											<input type="text" class="form-control" id="inputZip">
										</div>
									</div>
								</div>/.form-row -->
						</div><!-- /.card-body -->
						<div class="card-footer">
							<div class="form-group row justify-content-end">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Margin</label>
								<div class="col-sm-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupPrepend2">Rp.</span>
										</div>
										<input type="text" class="form-control" id="inputPassword3" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="form-group row justify-content-end">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Margin</label>
								<div class="col-sm-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupPrepend2">Rp.</span>
										</div>
										<input type="text" class="form-control" id="inputPassword3" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="form-group row justify-content-end">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Margin</label>
								<div class="col-sm-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupPrepend2">Rp.</span>
										</div>
										<input type="text" class="form-control" id="inputPassword3" placeholder="Password">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary float-right">Tambah</button>
							<a href="<?= base_url('rekening'); ?>" class="btn btn-danger">Cancel</a>
						</div>
						</form>
					</div><!-- /.card -->
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

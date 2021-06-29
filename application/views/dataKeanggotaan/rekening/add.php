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
						<?= form_open_multipart('rekening/add'); ?>
						<div class="card-body">
							<form>
								<div class="form-group row">
									<label for="email" class="col-sm-2 col-form-label">Tanggal</label>
									<div class="col-sm-10">
										<input type="email" class="form-control" id="email" name="email" value="<?= date('Y-m-d'); ?>" disabled>
									</div>
								</div>
								<div class="form-group row">
									<label for="jangka_waktu" class="col-sm-2 col-form-label">Anggota</label>
									<div class="col-sm-10">
										<select class="form-control" id="anggota" name="anggota">
											<option value="">Pilih Anggota</option>
											<?php foreach ($anggota as $a) : ?>
												<option value="<?= $a['idAnggota']; ?>"><?= $a['idAnggota']; ?> - <?= $a['nama']; ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-row mb-4">
									<!-- inline form -->
									<div class="form-group col-md-3">
										<label for="jangka_waktu">Lama Angsuran</label>
										<select class="form-control jangka_waktu" id="jangka_waktu" name="jangka_waktu">
											<option value="">Pilih Jangka Waktu</option>
											<option value="3">3 Bulan</option>
											<option value="6">6 Bulan</option>
											<option value="12">12 Bulan</option>
										</select>
									</div>
									<div class="form-group col-md-3">
										<label for="inputMargin">Margin</label>
										<div class="input-group">
											<input type="text" class="form-control inputMargin" id="inputMargin">
											<div class="input-group-prepend">
												<span class="input-group-text rounded-right" id="inputGroupPrepend2">%</span>
											</div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label for="inputPinjaman">Jumlah Pinjaman</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroupPrepend2">Rp.</span>
											</div>
											<input type="text" class="form-control inputPinjaman number-separator" id="inputPinjaman">
											<span class="input-group-append">
												<button type="button" class="btn btn-primary hitung">Hitung</button>
											</span>
										</div>
									</div>
									<!-- inline form -->
								</div><!-- /.form-row-->
						</div><!-- /.card-body -->
						<div class="card-footer">
							<div class="form-group row justify-content-end">
								<label for="margin" class="col-sm-2 col-form-label">Jumlah Margin</label>
								<div class="col-sm-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupPrepend2">Rp.</span>
										</div>
										<input type="text" class="form-control number-separator" id="margin" name="margin" disabled>
									</div>
								</div>
							</div>
							<div class="form-group row justify-content-end">
								<label for="jumlah" class="col-sm-2 col-form-label">Jumlah Total</label>
								<div class="col-sm-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupPrepend2">Rp.</span>
										</div>
										<input type="text" class="form-control number-separator" id="jumlah" name="jumlah" disabled>
									</div>
								</div>
							</div>
							<div class="form-group row justify-content-end">
								<label for="bulanan" class="col-sm-2 col-form-label">Jumlah Bulanan</label>
								<div class="col-sm-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupPrepend2">Rp.</span>
										</div>
										<input type="text" class="form-control number-separator" id="bulanan" name="bulanan" disabled>
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

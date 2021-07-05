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
							<h3 class="card-title">Tambah Rekening</h3>
							<h3 class="card-title float-right"><?= date("D, M d Y"); ?></h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<div class="card-body">
							<?= form_open_multipart('rekening/add'); ?>
							<div class="form-row mb-3">
								<div class="form-group col-md-6">
									<label for="id_anggota">Anggota</label>
									<select class="form-control select2" name="id_anggota">
										<option value="">Pilih Anggota</option>
										<?php foreach ($anggota as $a) : ?>
											<option value="<?= $a['id']; ?>"><?= $a['id']; ?> - <?= $a['nama']; ?></option>
										<?php endforeach ?>
									</select>
									<?= form_error('id_anggota', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group col-md-6">
									<label for="jaminan">Jaminan</label>
									<div class="input-group">
										<input type="text" class="form-control" name="jaminan" placeholder="Jaminan">
									</div>
									<?= form_error('jaminan', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div><!-- /.form-row-->
							<div class="form-row">
								<!-- inline form -->
								<div class="form-group col-md-4">
									<label for="jangka_waktu">Lama Angsuran</label>
									<select class="form-control jangka_waktu" name="jangka_waktu">
										<option value="">Pilih Jangka Waktu</option>
										<option value="3">3 Bulan</option>
										<option value="6">6 Bulan</option>
										<option value="12">12 Bulan</option>
									</select>
									<?= form_error('jangka_waktu', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group col-md-2">
									<label for="%">Margin</label>
									<div class="input-group">
										<input type="text" class="form-control inputMargin text-right" name="%">
										<div class="input-group-prepend">
											<span class="input-group-text rounded-right">%</span>
										</div>
									</div>
									<?= form_error('%', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group col-md-6">
									<label for="perolehan">Jumlah Pinjaman</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input type="text" class="form-control perolehan text-right" name="perolehan">
										<span class="input-group-append">
											<button type="button" class="btn btn-primary hitung">Hitung</button>
										</span>
									</div>
									<?= form_error('perolehan', '<small class="text-danger">', '</small>'); ?>
								</div>
								<!-- inline form -->
							</div><!-- /.form-row-->

						</div><!-- /.card-body -->
						<div class="card-footer">
							<div class="form-group row justify-content-end">
								<div class="col-sm-6">
									<table class="table table-striped border-bottom">
										<tr>
											<td class="col-4">Jumlah Pinjaman</td>
											<td class="col-8  text-right" id="pinjamanShow"></td>
										</tr>
										<tr>
											<td class="col-4">Jumlah Margin</td>
											<td class="col-8  text-right" id="marginShow"></td>
										</tr>
										<tr>
											<td class="col-4">Jumlah Total</td>
											<td class="col-8  text-right" id="jumlahShow"></td>
										</tr>
										<tr>
											<td class="col-4">Jumlah Angsuran</td>
											<td class="col-8  text-right" id="bulananShow"></td>
										</tr>
									</table>
								</div>
							</div>
							<input type="hidden" id="margin" name="margin">
							<input type="hidden" id="jumlah" name="jumlah">
							<button type="submit" class="btn btn-primary float-right tambah">Tambah</button>
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

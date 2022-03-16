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
							<h3 class="card-title">Transaksi Baru</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('transaksi/add'); ?>
						<div class="card-body">
							<div class="form-group">
								<label for="id_jenis">Jenis Transaksi</label>
								<select class="form-control transaksi" id="id_jenis" name="id_jenis">
									<option value="" selected="selected">Pilih Transaksi</option>
									<option value="2">Angsuran Murobahah</option>
									<option value="4">Simpanan Wajib Anggota</option>
								</select>
								<?= form_error('id_jenis', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group invisible id_rekeningSelect">
								<label for="id_rekening" class="id_rekeningSelect"></label>
								<select class="form-control id_rekening select2" style="width: 100%;" id="id_rekening" name="id_rekening">
									<!-- ajax result -->
								</select>
								<?= form_error('id_rekening', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<p id="show1"></p>
								<p id="show2"></p>
								<input type="hidden" class="form-control" id="cicilan" name="cicilan">
								<input type="hidden" class="form-control" id="id_anggota" name="id_anggota">
							</div>
							<div class="form-group">
								<label for="kredit">Jumlah</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp.</span>
									</div>
									<input type="number" class="form-control" id="kredit" name="kredit">
								</div>
								<?= form_error('kredit', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Bayar</button>
							<a href="<?= base_url('transaksi'); ?>" class="btn btn-danger">Cancel</a>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

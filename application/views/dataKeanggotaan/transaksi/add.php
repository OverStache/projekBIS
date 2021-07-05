<!-- Tambah Transaksi -->
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
								<select class="form-control transaksi" id="jenis" name="jenis">
									<option selected="selected">Select Transaksi</option>
									<option value="2">Angsuran Murobahah</option>
									<option value="4">Simpanan Bulanan</option>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control id_rekening select2" style="width: 100%;" id="id_rekening" name="id_rekening">
									<!-- ajax result -->
								</select>
								<?= form_error('id_rekening', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<p id="cicilan"></p>
								<p id="tagihan"></p>
								<input type="hidden" class="form-control" id="id_anggota" name="id_anggota">
								<input type="hidden" class="form-control" id="cicilan" name="cicilan">
							</div>
							<div class="form-group">
								<input type="number" class="form-control" id="kredit" name="kredit">
								<?= form_error('kredit', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Tambah</button>
							<a href="<?= base_url('transaksi'); ?>" class="btn btn-danger">Cancel</a>
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

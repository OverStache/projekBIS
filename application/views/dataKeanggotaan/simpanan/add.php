<!-- Tambah Simpanan Pokok -->
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
							<h3 class="card-title">Simpanan Pokok Anggota</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('simpanan/add'); ?>
						<div class="card-body">
							<div class="form-group">
								<label for="id_anggota">Anggota</label>
								<select class="form-control id_anggota select2" style="width: 100%;" id="id_anggota" name="id_anggota">
									<option value="">Pilih Anggota</option>
									<?php foreach ($anggota as $a) : ?>
										<option value="<?= $a['id']; ?>"><?= $a['nama']; ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('id_anggota', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="kredit">Jumlah</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp.</span>
									</div>
									<input type="text" class="form-control" id="kredit" name="kredit" placeholder="(minimal Rp. 500.000)">
								</div>
								<?= form_error('kredit', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Tambah</button>
							<a href="<?= base_url('simpanan'); ?>" class="btn btn-danger">Cancel</a>
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

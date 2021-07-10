<!-- Simpanan Detail -->
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
						<div class="card-header">
							<h3 class="card-title mt-1">Detail Rekening Simpanan</h3>
							<a href="<?= base_url('simpanan'); ?>" class="btn btn-danger float-right">Back</a>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12 py-3 px-4">
									<table class="table table-striped border-bottom">
										<tr>
											<td class="col-4">ID Simpanan</td>
											<td class="col-8"><?= $simpanan['id'] ?></td>
										</tr>
										<tr>
											<td class="col-4">ID Anggota</td>
											<td class="col-8"><?= $simpanan['id_anggota']; ?></td>
										</tr>
										<tr>
											<td class="col-4">Nama Anggota</td>
											<td class="col-8"><?= $simpanan['nama']; ?></td>
										</tr>
										<tr>
											<td class="col-4">Tanggal Transaksi</td>
											<td class="col-8"><?= $simpanan['tanggal']; ?></td>
										</tr>
										<tr>
											<td class="col-4">Produk</td>
											<td class=""><?= $simpanan['jenis']; ?></td>
										</tr>
										<tr>
											<td class="col-4">Saldo</td>
											<td class="col-8"><?= 'Rp. ' . number_format($simpanan['saldo']); ?></td>
										</tr>
									</table>
								</div>
							</div>
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

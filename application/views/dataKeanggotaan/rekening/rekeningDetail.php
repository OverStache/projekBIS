<!-- Rekening Detail -->
<!-- Navbar -->
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?php $this->load->view('templates/contentHeader'); ?>

	<section class="content">
		<div class="container-fluid">
			<div class="card card-primary">
				<div class="card-header mb-3">
					<h3 class="card-title">Detail Rekening</h3>
				</div>
				<div class="row">
					<div class="col-sm-6 py-3 px-4">
						<table class="table table-striped border-bottom">
							<tr>
								<td class="col-4">No. Rekening</td>
								<td class="col-8"><?= $rekening['id']; ?></td>
							</tr>
							<tr>
								<td class="col-4">Nama Anggota</td>
								<td class="col-8"><?= $rekening['nama']; ?></td>
							</tr>
							<tr>
								<td class="col-4">Jumlah</td>
								<td class="col-8"><?= 'Rp. ' . number_format($rekening['jumlah']); ?></td>
							</tr>
							<tr>
								<td>Lama Angsuran</td>
								<td><?= $rekening['jangka_waktu']; ?></td>
							</tr>
						</table>
					</div>
					<div class="col-sm-6 py-3 px-4">
						<table class="table table-striped border-bottom">
							<tr>
								<td class="col-4">Teller ID</td>
								<td class="col-8"></td>
							</tr>
							<tr>
								<td class="col-4">Tanggal Registrasi</td>
								<td class="col-8"><?= $rekening['tanggal']; ?></td>
							</tr>
							<tr>
								<td class="col-4">Status Rekening</td>
								<td class="col-8">
									<span class="badge badge-<?= $rekening['color']; ?>"><?= $rekening['status']; ?></span>
									<?php if (check_rekening_status($rekening['id'])) : ?>
										<a href="#" class="btn btn-xs btn-<?= button_rekening_status($rekening['id'])['button']; ?> changeStatus" data-id="<?= $rekening['id']; ?>" data-status="<?= $rekening['status']; ?>">
											<i class="fas fa-fw fa-<?= button_rekening_status($rekening['id'])['icon']; ?> "></i>
										</a>
									<?php endif ?>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<!-- row -->
				<div class="row">
					<div class="col py-3 px-4">
						<table class="table table-striped border-bottom">
							<tr>
								<td class="col-2">Uang Muka</td>
								<td class="col-10"></td>
							</tr>
							<tr>
								<td class="col-2">Harga Perolehan</td>
								<td class="col-10"><?= 'Rp. ' . number_format($rekening['jumlah']); ?></td>
							</tr>
							<tr>
								<td class="col-2">Margin</td>
								<td class="col-10"></td>
							</tr>
						</table>
					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

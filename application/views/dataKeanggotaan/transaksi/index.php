<!-- Navbar -->
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?php $this->load->view('templates/contentHeader'); ?>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<?= $this->session->flashdata('message'); ?>
					<div class="card card-primary card-outline">
						<div class="card-body">
							<!--CRUD visibility-->
							<?php if ($this->session->userdata('role_id') != 3) : ?>
								<a href="<?= base_url('transaksi/add') ?>" class="btn btn-primary mb-4">Tambah Transaksi</a>
							<?php endif ?>
							<?php if ($this->session->userdata('role_id') == 1) : ?>
								<a href="<?= base_url('transaksi/printAll') ?>" class="btn btn-secondary mb-4">Print</a>
							<?php endif ?>
							<!--/CRUD visibility-->
							<table id="searchOnly" class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>ID Rekening</th>
										<th>Nama</th>
										<th>Tanggal</th>
										<th>Debit</th>
										<th>Kredit</th>
										<th>Keterangan</th>
										<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($transaksi as $t) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $t['idRek'] . $t['id_anggota'] ?></td>
											<td><?= $t['nama']; ?></td>
											<td><?= date_format(date_create($t['tanggal']), 'd M Y'); ?></td>
											<td><?= 'Rp. ' . number_format($t['debit']); ?></td>
											<td><?= 'Rp. ' . number_format($t['kredit']); ?></td>
											<td><?= $t['jenis']; ?></td>
											<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
												<td>
													<a href="<?= base_url('transaksi/print/') . $t['id']; ?>" class="btn btn-xs btn-secondary">
														<i class="fas fa-fw fa-print"></i>
													</a>
												</td>
											<?php endif ?>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
	<!-- /.main content -->
</div>
<!-- /.content-wrapper -->

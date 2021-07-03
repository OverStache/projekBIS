<!-- Angsuran -->
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
					<div class="card">
						<div class="card-header">
							<h3>Tabel Transaksi</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Penyetor</th>
										<th>Waktu Transaksi</th>
										<th>Debit</th>
										<th>Kredit</th>
										<th>Keterangan</th>
										<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
											<!-- <th>Action</th> -->
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($transaksi as $t) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $t['nama']; ?> - <?= $t['id_rekening']; ?></td>
											<td><?= $t['tanggal']; ?></td>
											<td><?= 'Rp. ' . number_format($t['debit']); ?></td>
											<td><?= 'Rp. ' . number_format($t['kredit']); ?></td>
											<td><?= $t['keterangan']; ?></td>
											<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
												<!-- <td>
													<a href="<?= base_url('angsuran/update/' . $t['id']) ?>" class="btn btn-xs btn-success">
														<i class="fas fa-fw fa-edit"></i>
													</a>
													<a href="#" class="btn btn-xs btn-danger modalDelete angsuranDelete" data-id="<?= $t['id']; ?>" data-title="<?= $t['nama']; ?>">
														<i class="fas fa-fw fa-trash"></i>
													</a>
												</td> -->
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

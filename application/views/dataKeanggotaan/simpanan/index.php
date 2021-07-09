<!-- simpanan -->
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
							<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
								<a href="<?= base_url('simpanan/add') ?>" class="btn btn-primary mb-4">Bayar Simpanan Pokok</a>
							<?php endif ?>
							<table id="example1" class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>No. Rekening</th>
										<th>Produk</th>
										<th>Saldo</th>
										<th>Status</th>
										<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($simpanan as $s) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $s['nama']; ?></td>
											<td><?= $s['id']; ?><?= $s['id_anggota']; ?></td>
											<td><?= $s['jenis']; ?></td>
											<td><?= 'Rp. ' . number_format($s['saldo']); ?></td>
											<td>
												<span class="badge badge-<?= $s['color']; ?>"><?= $s['statusRekening']; ?></span>
											</td>
											<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
												<td>
													<a href="<?= base_url('simpanan/detail/' . $s['id']) ?>" class="btn btn-xs btn-primary">
														<i class="fas fa-fw fa-search"></i>
													</a>
												</td>
											<?php endif ?>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>No. Rekening</th>
										<th>Jangka Waktu</th>
										<th>Jumlah Pinjaman</th>
										<!-- <th>Sisa Angsuran</th> -->
										<th>Status</th>
										<!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

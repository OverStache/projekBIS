<!-- Navbar -->
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?php $this->load->view('templates/contentHeader'); ?>
	<!-- /.content -->
	<!-- main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- pengajuan -->
				<div class="col-6">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="mb-0">Total Pengajuan</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6 col-6">
									<!-- tampilkan semua pengajuan anggota -->
									<div class="small-box bg-success">
										<div class="inner">
											<h3><?= $total_anggota; ?></h3>
											<h5>Pengajuan Anggota Baru</h5>
										</div>
										<div class="icon">
											<i class="fas fa-users"></i>
										</div>
										<a href="<?= base_url('anggota'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
									</div>
								</div>
								<!-- ./col -->
								<!-- ./col -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="mb-0">Total Pengajuan</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<!-- ./col -->
								<div class="col-lg-6 col-6">
									<!-- tampilkan sema pengajuan rekening -->
									<div class="small-box bg-warning">
										<div class="inner">
											<h3><?= $total_rekening; ?></h3>

											<h5>Pengajuan Rekening</h5>
										</div>
										<div class="icon">
											<i class="fas fa-wallet"></i>
										</div>
										<a href="<?= base_url('rekening'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
									</div>
								</div>
								<!-- ./col -->
							</div>
						</div>
					</div>
				</div>
				<!-- pengajuan -->
				<!-- transaksi -->
				<div class="col-6">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="mb-0">Total Transaksi</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col">
									<ul class="nav flex-column">
										<li class="nav-item">
											<h3 href="#" class="nav-link">
												Pembiayaan <p class="float-right">Rp. <?= number_format($total_debit); ?></p>
											</h3>
										</li>
										<li class="nav-item">
											<h3 href="#" class="nav-link">
												Angsuran <p class="float-right">Rp. <?= number_format($total_kredit); ?></p>
											</h3>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- transkasi -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
</div>
<!-- /.content-wrapper -->

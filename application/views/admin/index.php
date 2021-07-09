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
				<!-- small box -->
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-primary">
						<div class="inner">
							<h3><?= $total_anggota; ?></h3>
							<p>Pengajuan Anggota Baru</p>
						</div>
						<div class="icon">
							<i class="fas fa-users"></i>
						</div>
						<a href="<?= base_url('anggota'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<!-- small box -->
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?= $total_rekening; ?></h3>

							<p>Pengajuan Rekening</p>
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

	</section>
</div>
<!-- /.content-wrapper -->

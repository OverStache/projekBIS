<!-- Rekening Detail -->
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
						<div class="card-header d-flex">
							<ul class="nav nav-pills mr-auto">
								<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Detail</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Jadwal Pembayaran</a></li>
								<?php if ($rekening['statusRekening'] == 'Pending') : ?>
									<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Update Rekening</a></li>
								<?php endif ?>
							</ul>
							<a href="<?= base_url('rekening'); ?>" class="btn btn-danger">Back</a>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">
								<!-- tab detail -->
								<div class="tab-pane active" id="tab_1">
									<div class="row">
										<div class="col-sm-6 py-3 px-4">
											<table class="table table-striped border-bottom">
												<tr>
													<td class="col-4">No. Rekening</td>
													<td class="col-8"><?= $rekening['id'] . '' . $rekening['id_anggota']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Nama Anggota</td>
													<td class="col-8"><?= $rekening['nama']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Plafon</td>
													<td class="col-8 jumlahShow"><?= 'Rp. ' . number_format($rekening['jumlah']); ?></td>
												</tr>
												<tr>
													<td>Lama Angsuran</td>
													<td class=""><?= $rekening['jangka_waktu']; ?> Bulan</td>
												</tr>
											</table>
										</div>
										<div class="col-sm-6 py-3 px-4">
											<table class="table table-striped border-bottom">
												<tr>
													<td class="col-4">Teller ID</td>
													<td class="col-8"><?= $user['username'] . ' - ' . $user['role']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Tanggal Registrasi</td>
													<td class="col-8"><?= $rekening['tanggal']; ?></td>
												</tr>
												<tr>
													<td class="col-4">Status Rekening</td>
													<td class="col-8">
														<span class="badge badge-<?= $rekening['color']; ?>"><?= $rekening['statusRekening']; ?></span>
														<?php if ($rekening['status'] != 'Lunas') : ?>
															<a href="#" class="badge badge-<?= button_rekening_status($rekening['id'])['button']; ?> changeStatus" data-id="<?= $rekening['id']; ?>" data-status="<?= $rekening['status']; ?>">
																<i class="fas fa-<?= button_rekening_status($rekening['id'])['icon']; ?> fa-xs"></i>
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
													<td class="col-2">Harga Perolehan</td>
													<td class="col-10 pinjamanShow"><?= 'Rp. ' . number_format($rekening['perolehan']); ?></td>
												</tr>
												<tr>
													<td class="col-2">Margin</td>
													<td class="col-10 marginShow"><?= 'Rp. ' . number_format($rekening['margin']); ?></td>
												</tr>
											</table>
										</div>
									</div>
									<!-- row -->
								</div>
								<!-- /.tab-pane -->
								<!-- tab jadwal pembayaran -->
								<div class="tab-pane" id="tab_2">
									<div class="row">
										<div class="col-sm-12">
											<table class="table">
												<thead>
													<tr>
														<th>#</th>
														<th>Tanggal Tagihan</th>
														<th>Tagihan</th>
														<th>Terbayar</th>
														<th>Status</th>
														<th>Tanggal Setor</th>
														<th>NPF</th>
													</tr>
												</thead>
												<tbody>
													<?php $i = 1;
													foreach ($jadwal as $j) : ?>
														<tr>
															<td><?= $i++; ?></td>
															<td><?= $j['tanggalTagihan']; ?></td>
															<td><?= 'Rp. ' . number_format($j['tagihan']); ?></td>
															<td><?= 'Rp. ' . number_format($j['angsuran']); ?></td>
															<td><span class="badge badge-<?= $j['statusColor']; ?>"><?= $j['status']; ?></span></td>
															<td><?php date_default_timezone_set("Asia/Jakarta");
																	echo date("Y-m-d"); ?></td>
															<td><span class="badge badge-<?= check_npf($j['tanggalTagihan'], $j['status'])['color'] ?>"><?= check_npf($j['tanggalTagihan'], $j['status'])['text'] ?></span></td>
														</tr>
													<?php endforeach ?>
												</tbody>
												<tfoot>
													<tr>
														<th colspan="2" class="text-center">Total</th>
														<th><?= 'Rp. ' . number_format($rekening['jumlah']); ?></th>
														<th><?= 'Rp. ' . number_format($rekening['saldo']); ?></th>
														<th colspan="2"></th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
								<!-- /.tab-pane -->
								<!-- tab update -->
								<?php if ($rekening['statusRekening'] == 'Pending') : ?>
									<div class="tab-pane" id="tab_3">
										<div class="row">
											<div class="col-sm-12">
												<?= form_open_multipart('rekening/update/' . $rekening['id']); ?>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="id_anggota">ID Rekening</label>
														<div class="input-group">
															<input type="text" class="form-control" name="id_anggota" placeholder="<?= $rekening['nama'] . ' - ' . $rekening['id'] . '' . $rekening['id_anggota'] ?>" disabled>
														</div>
														<?= form_error('id_anggota', '<small class="text-danger">', '</small>'); ?>
													</div>
													<div class="form-group col-md-6">
														<label for="jaminan">Jaminan</label>
														<div class="input-group">
															<input type="text" class="form-control" name="jaminan" value="<?= $rekening['jaminan']; ?>">
														</div>
														<?= form_error('jaminan', '<small class="text-danger">', '</small>'); ?>
													</div>
												</div><!-- /.form-row-->
												<div class="form-row mb-3">
													<!-- inline form -->
													<div class="form-group col-md-4">
														<label for="jangka_waktu">Lama Angsuran</label>
														<select class="form-control jangka_waktu" name="jangka_waktu" value="<?= $rekening['jangka_waktu']; ?>">
															<option value="3" <?php if ($rekening['jangka_waktu'] == 3) : ?> selected <?php endif; ?>>3 Bulan</option>
															<option value="6" <?php if ($rekening['jangka_waktu'] == 6) : ?> selected <?php endif; ?>>6 Bulan</option>
															<option value="12" <?php if ($rekening['jangka_waktu'] == 12) : ?> selected <?php endif; ?>>12 Bulan</option>
														</select>
														<?= form_error('jangka_waktu', '<small class="text-danger">', '</small>'); ?>
													</div>
													<div class="form-group col-md-2">
														<label for="%">Margin</label>
														<div class="input-group">
															<input type="text" class="form-control inputMargin text-right" name="%" value="<?= $rekening['%']; ?>">
															<div class="input-group-prepend">
																<span class="input-group-text rounded-right">%</span>
															</div>
														</div>
														<?= form_error('%', '<small class="text-danger">', '</small>'); ?>
													</div>
													<div class="form-group col-md-6">
														<label for="perolehan">Jumlah Pinjaman</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">Rp.</span>
															</div>
															<input type="text" class="form-control perolehan text-right" name="perolehan" value="<?= $rekening['perolehan']; ?>">
															<span class="input-group-append">
																<button type="button" class="btn btn-primary hitung">Hitung</button>
															</span>
														</div>
														<?= form_error('perolehan', '<small class="text-danger">', '</small>'); ?>
													</div>
													<!-- inline form -->
												</div><!-- /.form-row-->
												<div class="form-group row justify-content-end">
													<div class="col-sm-6">
														<table class="table table-striped border-bottom">
															<tr>
																<td class="col-4">Jumlah Pinjaman</td>
																<td class="col-8  text-right" id="pinjamanShow"><?= 'Rp. ' . number_format($rekening['perolehan']); ?></td>
															</tr>
															<tr>
																<td class="col-4">Jumlah Margin</td>
																<td class="col-8  text-right" id="marginShow"><?= 'Rp. ' . number_format($rekening['margin']); ?></td>
															</tr>
															<tr>
																<td class="col-4">Jumlah Total</td>
																<td class="col-8  text-right" id="jumlahShow"><?= 'Rp. ' . number_format($rekening['jumlah']); ?></td>
															</tr>
															<tr>
																<td class="col-4">Jumlah Angsuran</td>
																<td class="col-8  text-right" id="bulananShow"><?= 'Rp. ' . number_format($rekening['jumlah'] / $rekening['jangka_waktu']); ?></td>
															</tr>
														</table>
													</div>
												</div><!-- /.form-row-->
											</div>
										</div>
										<input type="hidden" id="margin" name="margin" value="<?= $rekening['margin']; ?>">
										<input type="hidden" id="jumlah" name="jumlah" value="<?= $rekening['jumlah']; ?>">
										<button type="submit" class="btn btn-primary float-right">Update Rekening</button>
										</form>
									</div>
								<?php endif ?>
								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
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

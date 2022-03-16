<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <a href="<?= base_url('rekening'); ?>" class="btn btn-danger no-print mt-3">Back</a>
      <a href="#" onclick="window.print()" class="btn btn-secondary no-print mt-3">Print</a>
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card float-center mt-3">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-3">
                  <img src="<?= base_url('assets/img/auth/'); ?>images.png" class="img-responsive" width="65%">
                </div>
                <div class="col-6">
                  <div class="text-center">
                    <h3><small>Koperasi Simpan Pinjam dan Pembiayaan Syariah</small></h3>
                    <h3>BMT Ta'awun Finance (Tawfin)</h3>
                    <h5>Data Rekening</h5>
                  </div>
                </div>
                <div class="col-3 my-auto">
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6 py-3 px-4">
                  <table class="table table-striped border-bottom">
                    <tr>
                      <td>No. Rekening</td>
                      <td><?= $rekening['id_rekening'] . '' . $rekening['id_anggota']; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Anggota</td>
                      <td><?= $rekening['nama']; ?></td>
                    </tr>
                    <tr>
                      <td>Lama Angsuran</td>
                      <td><?= $rekening['jangka_waktu']; ?> Bulan</td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-6 py-3 px-4">
                  <table class="table table-striped border-bottom">
                    <tr>
                      <td>ID User</td>
                      <td><?= $rekening['id_user'] . ' - ' . $user['username'] . ' - ' . $user['role']; ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Registrasi</td>
                      <td><?= date_format(date_create($rekening['tanggal']), 'd M Y'); ?></td>
                    </tr>
                    <tr>
                      <td>Status Rekening</td>
                      <td><?= $rekening['status']; ?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- row -->
              <div class="row">
                <div class="col-6 py-3 px-4">
                  <table class="table table-striped border-bottom">
                    <tr>
                      <td>Nama Barang</td>
                      <td class="text-right"><?= $rekening['barang']; ?></td>
                    </tr>
                    <tr>
                      <td>Harga Barang</td>
                      <td class="pinjamanShow text-right"><?= 'Rp. ' . number_format($rekening['perolehan']); ?></td>
                    </tr>
                    <tr>
                      <td>Margin</td>
                      <td class="marginShow text-right"><?= 'Rp. ' . number_format($rekening['margin']); ?></td>
                    </tr>
                    <tr>
                      <td>Harga Jual</td>
                      <td class="marginShow text-right"><?= 'Rp. ' . number_format($rekening['jumlah']); ?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- row -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<script>
  window.print();
</script>

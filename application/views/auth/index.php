<div class="container">
  <div class="card">
    <div class="card-header pb-0">
      <div class="text-center">
        <h3><small>Koperasi Simpan Pinjam dan Pembiayaan Syariah</small></h3>
        <h3>BMT Taawun Finance (Tawfin)</h3>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      <?= $this->session->flashdata('message'); ?>
      <div class="row py-4">
        <div class="col-7">
          <div class="p-3">
            <div class="text-center py-auto">
              <img src="<?= base_url('assets/img/auth/'); ?>images.png" class="img-responsive">
            </div>
          </div>
        </div>
        <div class="col-5">
          <div class="px-5">
            <div class="text-center">
              <h4 class="text-dark mb-3">Selamat Datang!</h4>
            </div>
            <?php if (!$this->session->userdata('username')) : ?>
              <a href="<?= base_url('auth/login'); ?>" class="btn btn-primary btn-block text-white btn-user mt-3">
                Login Pengurus
              </a>
            <?php endif ?>
            <a href="<?= base_url('auth/registration'); ?>" class="btn btn-success btn-block text-white btn-user mt-3">
              Registrasi Anggota
            </a>

          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <div class="card-footer text-center pb-0 border-top">
      <p>Jl. Lontar No. 2 RT 14/RW 14, Menteng Atas, Kecamatan Setia Budi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12960</p>
    </div>
    <!-- /.card -->
  </div>
</div>
<!-- /.register-box -->

<!-- /.login-box -->
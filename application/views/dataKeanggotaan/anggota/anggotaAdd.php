<!-- Tambah Angsuran -->
<!-- Navbar -->
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php $this->load->view('templates/contentHeader'); ?>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Anggota</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= form_open_multipart('anggota/anggotaAdd'); ?>
            <div class="card-body">
              <div class="form-group">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah Anggota Baru</button>
              <a href="<?= base_url('anggota/index'); ?>" class="btn btn-danger">Cancel</a>
            </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
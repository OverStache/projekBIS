<!-- Update Anggota -->
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
              <h3 class="card-title">Update Data Anggota</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= form_open_multipart('anggota/anggotaUpdate/' . $anggota['idAnggota']); ?>
            <div class="card-body">
              <div class="form-group">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $anggota['nama']; ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <select class="form-control" id="status" name="status" value="<?= $anggota['status']; ?>">
                  <option value="">Select Status Anggota</option>
                  <?php foreach ($status as $s) : ?>
                    <option value="<?= $s['id']; ?>" <?php if ($s['id'] == $anggota['status']) : ?> selected <?php endif ?>><?= $s['status']; ?></option>
                  <?php endforeach ?>
                </select>
                <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="<?= base_url('anggota'); ?>" class="btn btn-danger">Cancel</a>
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
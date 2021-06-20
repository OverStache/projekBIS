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
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= form_open_multipart('angsuran/angsuranAdd'); ?>
            <div class="card-body">
              <div class="form-group">
                <select class="form-control" id="rekening_id" name="rekening_id">
                  <option value="">Select Rekening</option>
                  <?php foreach ($rekening as $r) : ?>
                    <option value="<?= $r['id']; ?>"><?= $r['id']; ?></option>
                  <?php endforeach ?>
                </select>
                <?= form_error('rekening_id', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="penyetor" name="penyetor" placeholder="Nama Penyetor">
                <?= form_error('penyetor', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Angsuran">
                <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Add New Sub Menu</button>
              <a href="<?= base_url('angsuran/index'); ?>" class="btn btn-danger">Cancel</a>
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
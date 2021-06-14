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
              <h3 class="card-title">User Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= form_open_multipart('admin/userAdd'); ?>
            <div class="card-body">
              <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <select class="form-control" id="role_id" name="role_id" required>
                  <option value="">Select Role</option>
                  <?php foreach ($role as $r) : ?>
                    <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Picture</label>
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/profile/default.png'); ?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->
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
          <?= $this->session->flashdata('message'); ?>
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('user/changepassword'); ?>" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="current_password">Current Password</label>
                  <input type="password" class="form-control" id="current_password" name="current_password">
                  <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="new_password1">New Password</label>
                  <input type="password" class="form-control" id="new_password1" name="new_password1">
                  <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="new_password2">Repeat Password</label>
                  <input type="password" class="form-control" id="new_password2" name="new_password2">
                  <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Change Password</button>
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
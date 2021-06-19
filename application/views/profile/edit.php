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
              <h3 class="card-title">Edit Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= form_open_multipart('profile/edit'); ?>
            <div class="card-body">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $tbl_user['email']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="username">Name</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $tbl_user['username']; ?>">
                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Picture</label>
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/profile/') . $tbl_user['image']; ?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file (.gif/.jpg/.png)</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-sm-6 -->
        <div class="col-sm-6">
          <?= $this->session->flashdata('message'); ?>
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Change Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('profile/changepassword'); ?>" method="POST">
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
          <a href="<?= base_url('profile'); ?>">
            <button class="btn btn-block btn-lg btn-success">Kembali</button>
          </a>
        </div>
        <!-- /.col-sm-6 -->
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->
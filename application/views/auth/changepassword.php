<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <?= $this->session->flashdata('message'); ?>
      <p class="login-box-msg">Change your password</p>
      <form action="<?php base_url('auth/changepassword') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $this->session->userdata('reset_email'); ?>" readonly>
          <div class=" input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('password1', '<small class="text-danger">', '</small>'); ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password1" name="password1" placeholder="Enter new password...">
          <div class=" input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Enter new password...">
          <div class=" input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('password2', '<small class="text-danger">', '</small>'); ?>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
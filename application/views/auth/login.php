<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <?= $this->session->flashdata('message'); ?>
      <p class="login-box-msg">Login to start your session</p>

      <form action="<?php base_url('auth') ?>" method="post">
        <div class="input-group">
          <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
          <div class=" input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
        <div class="input-group mt-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
        <div class="row mt-3">
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1 mt-2">
        <a href="<?= base_url('auth/forgotpassword'); ?>">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?= base_url('auth/registration'); ?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
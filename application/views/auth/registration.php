<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?= base_url('auth/registration'); ?>" method="post">
        <div class="input-group mt-3">
          <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full name" value="<?php echo set_value('fullName'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('fullName', '<small class="text-danger">', '</small>'); ?>
        <div class="input-group mt-3">
          <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
        <div class="input-group mt-3">
          <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mt-3">
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('password1', '<small class="text-danger">', '</small>'); ?>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block mt-3">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-2 mb-0">
        <a href="<?= base_url('auth'); ?>" class="text-center">I already have a membership</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
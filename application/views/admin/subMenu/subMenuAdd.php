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
            <?= form_open_multipart('subMenu/subMenuAdd'); ?>
            <div class="card-body">
              <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu Title">
                <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <select class="form-control" id="menu_id" name="menu_id">
                  <option value="">Select Menus</option>
                  <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                  <?php endforeach ?>
                </select>
                <?= form_error('menu_id', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu URL">
                <?= form_error('url', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu Icon">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input type="hidden" id="is_active" name="is_active" value="0">
                  <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active">
                  <label class="form-check-label" for="is_active">
                    Active
                  </label>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Add New Sub Menu</button>
              <a href="<?= base_url('subMenu/index'); ?>" class="btn btn-danger">Cancel</a>
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
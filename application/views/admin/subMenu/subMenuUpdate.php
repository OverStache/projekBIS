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
            <?= form_open_multipart('admin/subMenuUpdate/' . $subMenu['id']); ?>
            <div class="card-body">
              <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" value="<?= $subMenu['title']; ?>">
              </div>
              <div class="form-group">
                <select class="form-control" id="menu_id" name="menu_id">
                  <option value="">Select Menus</option>
                  <?php foreach ($menuLoop as $m) : ?>
                    <option value="<?= $m['id']; ?>" <?php if ($menu['id'] == $m['id']) : ?> selected <?php endif ?>><?= $m['menu']; ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu URL" value="<?= $subMenu['url']; ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu Icon" value="<?= $subMenu['icon']; ?>">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input type="hidden" id="is_active" name="is_active" value="0">

                  <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" <?php if ($subMenu['is_active'] == 1) : ?> checked <?php endif ?>>
                  <label class="form-check-label" for="is_active">
                    Active
                  </label>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update Sub Menu</button>
              <a href="<?= base_url('admin/subMenu'); ?>" class="btn btn-danger">Cancel</a>
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
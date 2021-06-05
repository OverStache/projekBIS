<!-- Navbar -->

<!-- Main Sidebar Container -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newSubMenuModal">Add New Sub Menu</a>
              <!-- alert -->
              <?php if (validation_errors()) : ?>
                <div class="alert alert-danger mt-3" role="alert">
                  <?= validation_errors(); ?>
                </div>
              <?php endif ?>
              <?= $this->session->flashdata('message'); ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Menu</th>
                    <th>Url</th>
                    <th>Icon</th>
                    <th>Active</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($subMenu as $sm) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $sm['title']; ?></td>
                      <td><?= $sm['menu']; ?></td>
                      <td><?= $sm['url']; ?></td>
                      <td><?= $sm['icon']; ?></td>
                      <td><?= $sm['is_active']; ?></td>
                      <td>
                        <a href="<?= base_url('menu/editSubMenu/' . $sm['id']); ?>" class="badge badge-success">Edit</a>
                        <a href="" class="badge badge-danger">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Menu</th>
                    <th>Url</th>
                    <th>Icon</th>
                    <th>Active</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.main content -->
</div>
<!-- /.content-wrapper -->

<!-- modal -->

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu Title">
          </div>
          <div class="form-group">
            <select class="form-control" id="menu_id" name="menu_id">
              <option value="">Select Menus</option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu URL">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu Icon">
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
              <label class="form-check-label" for="is_active">
                Active
              </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
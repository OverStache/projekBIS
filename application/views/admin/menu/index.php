<!-- index menu -->

<!-- Navbar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php $this->load->view('templates/contentHeader'); ?>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                <a href="<?= base_url('admin/menuAdd') ?>" class="btn btn-primary modalAdd">Add New Menu</a>
              <?php endif ?>
              <?= $this->session->flashdata('message'); ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                      <th>Action</th>
                    <?php endif ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($menu as $m) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $m['menu']; ?></td>
                      <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                        <td>
                          <a href="<?= base_url('admin/menuUpdate/' . $m['id']) ?>" class="badge badge-success">Edit</a>
                          <!-- <a href="" class="badge badge-success modalUpdate" data-toggle="modal" data-target="#formModal" data-id="<?= $m['id']; ?>" data-menu="<?= $m['menu']; ?>">Update</a> -->
                          <a href="#" class="badge badge-danger modalDelete" data-id="<?= $m['id']; ?>" data-menu="<?= $m['menu']; ?>">Delete</a>
                        </td>
                      <?php endif ?>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                      <th>Action</th>
                    <?php endif ?>
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
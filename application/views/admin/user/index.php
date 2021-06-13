<!-- User Management -->

<!-- Navbar -->

<!-- Main Sidebar Container -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php $this->load->view('templates/contentHeader'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <a href="<?= base_url('admin/userAdd'); ?>" class="btn btn-primary">Add New User</a>
              <?= form_error('user', '<div class="alert alert-danger mt-3">', '</div>'); ?>
              <?= $this->session->flashdata('message'); ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($user as $u) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $u['username']; ?></td>
                      <td><?= $u['role']; ?></td>
                      <td>
                        <a href="<?= base_url('admin/userUpdate/') . $u['id']; ?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url('admin/userDelete/') . $u['id']; ?>" class="badge badge-danger">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Role</th>
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
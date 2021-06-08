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
              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newUserModal">Add New User</a>
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($user as $u) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $u['username']; ?></td>
                      <td>
                        <a href="<?= base_url('admin/useredit/') . $u['id']; ?>" class="badge badge-warning">Access</a>
                        <a href="<?= base_url('admin/userdelete/' . $u['id']) ?>" class="badge badge-success">Edit</a>
                        <a href="" class="badge badge-danger">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>User</th>
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
<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newUserModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('user'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="user" name="user" placeholder="User Name" required>
          </div>
          <div class="input-group mt-3">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
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
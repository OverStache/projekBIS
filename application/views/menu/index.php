<!-- index menu -->

<!-- Navbar -->

<!-- Main Sidebar Container -->
<!-- <div class="row">
  <div class="col-6">
    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name...">
  </div>
  <div class="col-6">
    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name...">
  </div>
</div> -->
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
              <?php if ($this->session->userdata('role_id') == 1) : ?>
                <a href="#" class="btn btn-primary modalAdd" data-toggle="modal" data-target="#formModal">Add New Menu</a>
              <?php endif ?>
              <!-- <?= $button; ?> -->
              <?= form_error('menu', '<div class="alert alert-danger mt-3">', '</div>'); ?>
              <?= $this->session->flashdata('message'); ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <?php if ($this->session->userdata('role_id') == 1) : ?>
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
                      <?php if ($this->session->userdata('role_id') == 1) : ?>
                        <td>
                          <!-- <a href="<?= base_url('menu/editMenu/' . $m['id']) ?>" class="badge badge-success">Edit</a> -->
                          <a href="" class="badge btn bg-success rounded-pill float-end modalUpdate ml-1" data-toggle="modal" data-target="#formModal" data-id="<?= $m['id']; ?>" data-menu="<?= $m['menu']; ?>">Update</a>
                          <a href="#" class="badge badge-danger modalDelete" data-id="<?= $m['id']; ?>" data-menu="<?= $m['menu']; ?>">Delete</a>
                          <!-- <?= $button; ?> -->
                        </td>
                      <?php endif ?>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <?php if ($this->session->userdata('role_id') == 1) : ?>
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

<!-- modal -->

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu'); ?>" method="POST">
          <div class="form-group">
            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name...">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
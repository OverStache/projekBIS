<!-- index role -->

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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <?= $this->session->flashdata('message'); ?>
              <h5 class="mt-2">Role : <?= $role_id['role']; ?></h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Access</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($menu as $m) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $m['menu']; ?></td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" <?= check_access($role_id['id'], $m['id']); ?> data-role="<?= $role_id['id']; ?>" data-menu=" <?= $m['id']; ?>">
                          </label>
                        </div>
                      </td>

                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Access</th>
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
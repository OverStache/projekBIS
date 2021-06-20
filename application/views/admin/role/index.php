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
        <div class="col">
          <?= $this->session->flashdata('message'); ?>
          <div class="card">
            <div class="card-header">

              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?= $role_id['role']; ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <?php foreach ($role as $r) : ?>
                    <li value="<?= $r['id']; ?>">
                      <a class="dropdown-item" href="<?= base_url('role/index/') . $r['id']; ?>"><?= $r['role']; ?></a>
                    </li>
                  <?php endforeach ?>
                </div>
              </div>


            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php $i = 1;
              if ($menu) : ?>
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Menu</th>
                      <th>Access</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($menu as $m) : ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $m['menu']; ?></td>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" <?= check_access($role_id['id'], $m['id']); ?> data-role="<?= $role_id['id']; ?>" data-menu=" <?= $m['id']; ?>">
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
              <?php else : ?>
                <h5>No Menu</h5>
              <?php endif ?>
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
<!-- Anggota -->
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
          <?= $this->session->flashdata('message'); ?>
          <div class="card">
            <div class="card-header">
              <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                <a href="<?= base_url('anggota/anggotaAdd') ?>" class="btn btn-primary modalAdd">Tambah Anggota Baru</a>
              <?php endif ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kode Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Status</th>
                    <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                      <th>Is Active</th>
                      <th>Action</th>
                    <?php endif ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($anggota as $a) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $a['idAnggota']; ?></td>
                      <td><?= $a['nama']; ?></td>
                      <td><?= $a['status']; ?></td>
                      <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                        <td>
                          <!-- <div class="form-check">
                            <input class="form-check-input changeActive" type="checkbox" <?= check_anggota_active(); ?> data-id="<?= $a['idAnggota']; ?>" data-is_active="<?= $a['is_active']; ?>">
                          </div> -->
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="changeActiveAnggota" <?= check_anggota_active(); ?> data-id="<?= $a['idAnggota']; ?>" data-is_active="<?= $a['is_active']; ?>">
                            <label for="changeActiveAnggota" class="custom-control-label"></label>
                          </div>
                        </td>
                        <td>
                          <a href="<?= base_url('menu/menuUpdate/' . $a['idAnggota']) ?>" class="btn btn-xs btn-success">
                            <i class="fas fa-fw fa-edit"></i>
                          </a>
                          <a href="#" class="btn btn-xs btn-danger modalDelete menuDelete" data-id="<?= $a['idAnggota']; ?>">
                            <i class="fas fa-fw fa-trash"></i>
                          </a>
                        </td>
                      <?php endif ?>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Kode Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Status</th>
                    <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                      <th>Is Active</th>
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
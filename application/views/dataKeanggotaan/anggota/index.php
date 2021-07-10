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
          <div class="card card-primary card-outline">
            <div class="card-body">
              <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') != 3) : ?>
                <a href="<?= base_url('anggota/add') ?>" class="btn btn-primary modalAdd mb-4">Daftar Anggota Baru</a>
              <?php endif ?>
              <table id="example1" class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kode Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Status</th>
                    <?php if ($this->session->userdata('role_id') != 2) : ?>
                      <th>Action</th>
                    <?php endif ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($anggota as $a) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $a['id']; ?></td>
                      <td><?= $a['nama']; ?></td>
                      <td><span class="badge badge-<?= $a['color']; ?>"><?= $a['statusAnggota']; ?></span></td>
                      <?php if ($this->session->userdata('role_id') != 2) : ?>
                        <td>
                          <a href="<?= base_url('anggota/detail/' . $a['id']) ?>" class="btn btn-xs btn-primary">
                            <i class="fas fa-fw fa-search"></i>
                          </a>
                          <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                            <a href="#" class="changeActive anggota btn btn-xs btn-<?= check_anggota_active($a['id'])['button']; ?>" data-id="<?= $a['id']; ?>" data-is_active="<?= $a['is_active']; ?>">
                              <i class="fas fa-fw fa-<?= check_anggota_active($a['id'])['icon']; ?>"></i>
                            </a>
                            <?php if ($a['is_active'] == 0) : ?>
                              <a href="#" class="btn btn-xs btn-danger modalDelete anggotaDelete" data-id="<?= $a['id']; ?>" data-title="<?= $a['nama']; ?>">
                                <i class="fas fa-fw fa-times"></i>
                              </a>
                            <?php endif ?>
                          <?php endif ?>
                        </td>
                      <?php endif ?>
                    </tr>
                  <?php endforeach ?>
                </tbody>
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

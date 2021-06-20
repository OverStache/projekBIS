<!-- rekening -->
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
              <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                <a href="<?= base_url('rekening/rekeningAdd') ?>" class="btn btn-primary modalAdd">rekening Baru</a>
              <?php endif ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>No. Rekening</th>
                    <th>Jangka Waktu</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Sisa Angsuran</th>
                    <th>Status</th>
                    <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                      <th>Action</th>
                    <?php endif ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($rekening as $r) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $r['nama']; ?></td>
                      <td><?= $r['id']; ?></td>
                      <td><?= $r['jangka_waktu']; ?></td>
                      <td><?= 'Rp. ' . number_format($r['jumlah']); ?></td>
                      <td><?= 'Rp. ' . number_format($r['jumlah'] - $r['saldo']); ?></td>
                      <td>
                        <span class="badge badge-<?= $r['color']; ?>"><?= $r['status']; ?></span>
                      </td>
                      <!--CRUD visibility--> <?php if ($this->session->userdata('role_id') == 1) : ?>
                        <td>
                          <a href="<?= base_url('menu/menuUpdate/' . $r['id']) ?>" class="btn btn-xs btn-success">
                            <i class="fas fa-fw fa-edit"></i>
                          </a>
                          <a href="#" class="btn btn-xs btn-danger modalDelete menuDelete" data-id="<?= $r['id']; ?>">
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
                    <th>Nama</th>
                    <th>No. Rekening</th>
                    <th>Jangka Waktu</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Sisa Angsuran</th>
                    <th>Status</th>
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
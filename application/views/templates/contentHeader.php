<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= $title['title']; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>"><?= $this->uri->segment(1); ?></a></li>
          <?php if ($this->uri->segment(2)) : ?>
            <li class="breadcrumb-item active"><?= $this->uri->segment(2); ?></li>
          <?php endif ?>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
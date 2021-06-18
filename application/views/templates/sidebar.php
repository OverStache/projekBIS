<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3  d-flex">
      <div class="image">
        <img src="<?= base_url('assets/img/profile/') . $tbl_user['image']; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $tbl_user['username']; ?></a>
      </div>
    </div>
    <nav class="mt-0">
      <ul class="nav nav-pills nav-sidebar flex-column">

        <li class="nav-item">
          <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <!-- query menu -->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `tbl_user_menu`.`id`, `menu`, `urlMenu`
                  FROM `tbl_user_menu` JOIN `tbl_user_access_menu`
                    ON `tbl_user_menu`.`id` = `tbl_user_access_menu`.`menu_id`
                 WHERE `tbl_user_access_menu`.`role_id` = $role_id
              ORDER BY `tbl_user_access_menu`.`menu_id` ASC
                ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <!-- Looping menu -->
        <?php foreach ($menu as $m) : ?>
          <li class="nav-header"><?= $m['urlMenu']; ?></li>
          <!-- sub menu sesuai menu -->
          <?php
          $menu_id = $m['id'];
          $querySubMenu = " SELECT *
                            FROM  `tbl_user_sub_menu` JOIN `tbl_user_menu`
                            ON    `tbl_user_sub_menu`.`menu_id` = `tbl_user_menu`.`id`
                            WHERE `tbl_user_sub_menu`.`menu_id` = $menu_id
                            AND   `tbl_user_sub_menu`.`is_active` = 1
                            ";
          $subMenu = $this->db->query($querySubMenu)->result_array();
          ?>

          <!-- looping submenu -->
          <?php foreach ($subMenu as $sm) : ?>
            <li class="nav-item">
              <a href="<?= base_url($sm['urlSubMenu']); ?>" <?php if ($title['title'] == $sm['title']) : ?> class="nav-link active" <?php else : ?> class="nav-link" <?php endif ?>>
                <i class="<?= $sm['icon']; ?>"></i>
                <p>
                  <!-- <?= $sm['title']; ?> -->
                  <?= $sm['urlSubMenu']; ?>
                </p>
              </a>
            </li>
          <?php endforeach; ?>
        <?php endforeach; ?>

      </ul>


    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
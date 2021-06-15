<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.1.0
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- bootbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  // change to image file name
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });

  // auto change access checkbox
  $('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
      url: "<?= base_url('admin/changeaccess'); ?>",
      type: 'post',
      data: {
        menuId: menuId,
        roleId: roleId
      },
      success: function() {
        document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + roleId;
      }
    });
  });
</script>

<!-- user/index user delete modal -->
<script>
  $(function() {
    $('body').on('click', '.modalDelete', function() {
      const id = $(this).data('id');
      const user = $(this).data('user');
      bootbox.confirm({
        title: "sure want to delete?",
        message: user,
        buttons: {
          confirm: {
            label: 'Yes',
            className: 'btn-primary'
          },
          cancel: {
            label: 'No',
            className: 'btn-secondary'
          }
        },
        callback: function(result) {
          if (result) {
            document.location.href = "<?= base_url('admin/userDelete/'); ?>" + id;
          };
        }
      });
    });
  });
</script>
<!-- menu/index Menu delete modal -->
<script>
  $(function() {
    $('body').on('click', '.modalDelete', function() {
      const id = $(this).data('id');
      const menu = $(this).data('menu');
      bootbox.confirm({
        title: "sure want to delete?",
        message: menu,
        buttons: {
          confirm: {
            label: 'Yes',
            className: 'btn-primary'
          },
          cancel: {
            label: 'No',
            className: 'btn-secondary'
          }
        },
        callback: function(result) {
          if (result) {
            document.location.href = "<?= base_url('admin/menuDelete/'); ?>" + id;
          };
        }
      });
    });
  });
</script>

<!-- menu/submenu Sub Menu delete modal -->
<script>
  $(function() {
    $('body').on('click', '.subMenuModalDelete', function() {
      const id = $(this).data('id');
      const submenu = $(this).data('submenu');
      bootbox.confirm({
        title: "sure want to delete?",
        message: submenu,
        buttons: {
          confirm: {
            label: 'Yes',
            className: 'btn-primary'
          },
          cancel: {
            label: 'No',
            className: 'btn-secondary'
          }
        },
        callback: function(result) {
          if (result) {
            document.location.href = "<?= base_url('admin/subMenuDelete/'); ?>" + id;
          };
        }
      });
    });
  });
</script>
</body>

</html>
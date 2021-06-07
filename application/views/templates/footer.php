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
        document.location.href = "<?= base_url('admin/role/'); ?>" + roleId;
      }
    });
  });

  // auto change role
  $('.dropdown-menu li').click(function() {
    const id = this.value;
    const name = $(this).text();
    $('.roleTarget').html(id);
    $(this).parents('.dropdown').find('.dropdown-toggle').html(name);
    $.ajax({
      url: "<?= base_url('admin/changeRole'); ?>",
      type: 'post',
      data: {
        id: id
      },
      success: function() {
        document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + id;
      }
    });
  });
</script>

<!-- menu/index editMenu modal -->
<script>
  $(function() {
    $('.modalAdd').on('click', function() {
      $('#modalLabel').html('Tambah Data');
      $('.modal-footer button[type=submit]').html('Tambah Data');
      $('.modal-body form').attr('action', "<?= base_url('menu') ?>");
      $('.modal-body #menu').val('');
    });

    $('body').on('click', '.modalUpdate', function() {
      $('#modalLabel').html('Update Data');
      $('.modal-footer button[type=submit]').html('Update Data');
      const id = $(this).data('id');
      $('.modal-body form').attr('action', "<?= base_url('menu/editMenu/') ?>" + id);
      const menu = $(this).data('menu');
      $('.modal-body #menu').val(menu);

    });
  });
</script>

<!-- menu/submenu editSubMenu modal -->
<script>
  $(function() {
    $('.modalAdd').on('click', function() {
      $('#subMenuModalLabel').html('Tambah Data');
      $('.modal-body form').attr('action', "<?= base_url('menu/submenu') ?>");
      $('.modal-body #title').val('');
      $('.modal-body #menu_id').val('');
      $('.modal-body #url').val('');
      $('.modal-body #icon').val('');
      $('.modal-body #is_active').attr('checked', false);
      $('.modal-footer button[type=submit]').html('Tambah Data')
    });

    $('body').on('click', '.modalUpdate', function() {
      const id = $(this).data('id');
      const title = $(this).data('title');
      const menu_id = $(this).data('menu_id');
      const url = $(this).data('url');
      const icon = $(this).data('icon');
      const is_active = $(this).data('is_active');
      $('#subMenuModalLabel').html('Update Data');
      $('.modal-body form').attr('action', "<?= base_url('menu/editSubMenu/') ?>" + id);
      $('.modal-body #title').val(title);
      $('.modal-body #menu_id').val(menu_id);
      $('.modal-body #url').val(url);
      $('.modal-body #icon').val(icon);
      if (is_active == 1) {
        $('.modal-body .form-check-input').attr('checked', true);
      } else {
        $('.modal-body .form-check-input').attr('checked', false);
      }
      $('.modal-footer button[type=submit]').html('Update Data');
    });
  });
</script>
</body>

</html>
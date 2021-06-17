<?php
function is_logged_in()
{
  $ci = get_instance();
  if (!$ci->session->userdata('email')) {
    redirect('auth');
  } else {
    $role_id = $ci->session->userdata('role_id');
    $menu = $ci->uri->segment(1);

    // select * from tbl_user_menu where menu = $menu
    $queryMenu = $ci->db->get_where('tbl_user_menu', ['urlMenu' => $menu])->row_array();
    // ambil id dari array result
    $menu_id = $queryMenu['id'];

    // select * from tbl_user_access_menu where role_id = $role_id  and menu_is = $menu_id
    $queryUserAccess = $ci->db->get_where('tbl_user_access_menu', [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ]);

    // ada ga hasilnya
    if ($queryUserAccess->num_rows() < 1) {
      redirect('auth/blocked');
    }
  }
}

function check_access($role_id, $menu_id)
{
  $ci = get_instance();
  $ci->db->where('role_id', $role_id);
  $ci->db->where('menu_id', $menu_id);
  $result = $ci->db->get('tbl_user_access_menu');

  if ($result->num_rows() > 0) {
    return "checked";
  }
}

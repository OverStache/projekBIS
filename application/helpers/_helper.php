<?php
// cek jika user sudah login
function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('username')) {
		redirect('auth');
	} else {
		$urlmenu = $ci->uri->segment(1);
		$querySubMenu = $ci->db->get_where('tbl_user_sub_menu', ['urlSubMenu' => $urlmenu])->row_array();
		$menu_id = $querySubMenu['menu_id'];

		$role_id = $ci->session->userdata('role_id');

		if ($ci->uri->segment(2)) {
			$crud = $ci->uri->segment(2);
			$queryCrudMenu = $ci->db->get_where('tbl_user_crud_menu', ['url' => $crud])->row_array();
			$crud_id = $queryCrudMenu['id'];

			// cek crud akses
			$queryUserAccess = $ci->db->get_where('tbl_crud_access', [
				'role_id' => $role_id,
				'menu_id' => $menu_id,
				'crud_id' => $crud_id
			]);
		} else {
			// cek menu akses
			$queryUserAccess = $ci->db->get_where('tbl_user_access_menu', [
				'role_id' => $role_id,
				'menu_id' => $menu_id
			]);
		}

		// jika tidak punya akses
		if ($queryUserAccess->num_rows() < 1) {
			redirect('auth/blocked');
		}
	}
}

// check akses menu tampilkan checkbox checked
function menu_access($role_id, $menu_id)
{
	$ci = get_instance();
	$ci->db->where('role_id', $role_id);
	$ci->db->where('menu_id', $menu_id);
	$result = $ci->db->get('tbl_user_access_menu');

	if ($result->num_rows() > 0) {
		return "checked";
	}
}

// check akses crud tampilkan checkbox checked
function crud_access($role_id, $menu_id, $crud_id)
{
	$ci = get_instance();
	$ci->db->where('role_id', $role_id);
	$ci->db->where('menu_id', $menu_id);
	$ci->db->where('crud_id', $crud_id);
	$result = $ci->db->get('tbl_crud_access');

	if ($result->num_rows() > 0) {
		return "checked";
	}
}

// cek status npf, mengembalikan text dan warna badge
function check_npf($tanggalTagihan, $tanggalSetor, $status)
{
	if ($status == 'Active') { //belom lunas
		if (date("Y-m-d") <= $tanggalTagihan) { //belom jatuh tempo
			$data = array(
				'text' => 'Lancar',
				'color' => 'primary'
			);
		} else if (date("Y-m-d") > $tanggalTagihan) {
			$data = array(
				'text' => 'Macet',
				'color' => 'danger'
			);
		}
	} else if ($status == 'Lunas') { //lunas
		if ($tanggalSetor <= $tanggalTagihan) { //belom jatuh tempo
			$data = array(
				'text' => 'Lancar',
				'color' => 'primary'
			);
		} else if ($tanggalSetor > $tanggalTagihan) {
			$data = array(
				'text' => 'Kurang Lancar',
				'color' => 'warning'
			);
		}
	}
	return $data;
}

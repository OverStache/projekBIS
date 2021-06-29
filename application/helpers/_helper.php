<?php
function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		redirect('auth');
	} else {
		$role_id = $ci->session->userdata('role_id');
		$urlmenu = $ci->uri->segment(1);

		$querySubMenu = $ci->db->get_where('tbl_user_sub_menu', ['urlSubMenu' => $urlmenu])->row_array();
		$id = $querySubMenu['menu_id'];
		// select * from tbl_user_menu where menu = $menu
		$queryMenu = $ci->db->get_where('tbl_user_menu', ['id' => $id])->row_array();
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

function check_anggota_active($id)
{
	$ci = get_instance();
	$result = $ci->db->get_where('tbl_anggota', ['idAnggota' => $id])->row_array();

	if ($result['is_active'] == 0) {
		$data = array(
			'icon' => 'user-times',
			'button' => 'danger'
		);
		return $data;
	} else {
		$data = array(
			'icon' => 'user-check',
			'button' => 'success'
		);
		return $data;
	}
}

function check_rekening_status($id)
{
	$ci = get_instance();
	$result = $ci->db->get_where('tbl_rekening', ['id' => $id])->row_array();

	if ($result['status'] == 2) {
		return false;
	} else {
		return true;
	}
}

function button_rekening_status($id)
{
	$ci = get_instance();
	$result = $ci->db->get_where('tbl_rekening', ['id' => $id])->row_array();

	switch ($result['status']) {
		case 0:
			$data = array(
				'icon' => 'check',
				'button' => 'success'
			);
			return $data;
			break;
		case 1:
			$data = array(
				'icon' => 'times',
				'button' => 'danger'
			);
			return $data;
			break;
		case 3:
			$data = array(
				'icon' => 'check',
				'button' => 'success'
			);
			return $data;
			break;
	}
}

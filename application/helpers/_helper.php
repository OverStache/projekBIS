<?php
function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
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

			// select * from tbl_user_access_menu where role_id = $role_id  and menu_id = $menu_id
			$queryUserAccess = $ci->db->get_where('tbl_crud_access', [
				'role_id' => $role_id,
				'menu_id' => $menu_id,
				'crud_id' => $crud_id
			]);
		} else {
			$queryUserAccess = $ci->db->get_where('tbl_user_access_menu', [
				'role_id' => $role_id,
				'menu_id' => $menu_id
			]);
		}

		// ada ga hasilnya
		if ($queryUserAccess->num_rows() < 1) {
			redirect('auth/blocked');
		}
	}
}

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

function check_anggota_active($id)
{
	$ci = get_instance();
	$result = $ci->db->get_where('tbl_anggota', ['id' => $id])->row_array();

	if ($result['is_active'] == 0) {
		$data = array(
			'icon' => 'user-times',
			'button' => 'danger'
		);
	} else {
		$data = array(
			'icon' => 'user-check',
			'button' => 'success'
		);
	}
	return $data;
}

function check_user_active($id)
{
	$ci = get_instance();
	$result = $ci->db->get_where('tbl_user', ['id' => $id])->row_array();

	if ($result['is_active'] == 0) {
		$data = array(
			'icon' => 'user-times',
			'button' => 'danger'
		);
	} else {
		$data = array(
			'icon' => 'user-check',
			'button' => 'success'
		);
	}
	return $data;
}

function check_sub_menu_active($id)
{
	$ci = get_instance();
	$result = $ci->db->get_where('tbl_user_sub_menu', ['id' => $id])->row_array();

	if ($result['is_active'] == 0) {
		$data = array(
			'icon' => 'times',
			'button' => 'danger'
		);
	} else {
		$data = array(
			'icon' => 'check',
			'button' => 'success'
		);
	}
	return $data;
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
			break;
		case 1:
			$data = array(
				'icon' => 'lock',
				'button' => 'danger'
			);
			break;
		case 3:
			$data = array(
				'icon' => 'unlock',
				'button' => 'success'
			);
			break;
	}
	return $data;
}

function check_npf($tanggalTagihan, $tanggalSetor, $status)
{
	if ($status == 'Active') { //belom lunas
		if (date("2021-10-03") <= $tanggalTagihan) { //belom jatuh tempo
			$data = array(
				'text' => 'Lancar',
				'color' => 'primary'
			);
		} else if (date("2021-10-03") > $tanggalTagihan) {
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('Construct_model', 'construct');
		$this->load->model('Alert_model', 'alert');
		$data['title'] = $this->construct->getTitle();
		// select * from tbl_user where email = email dari session
		$data['userdata'] = $this->construct->getUserdata();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
	}

	public function index($id = 1)
	{
		// combobox
		$data['role'] = $this->db->get('tbl_user_role')->result_array();
		// get role_id
		$data['role_id'] = $this->db->get_where('tbl_user_role', ['id' => $id])->row_array();
		// tampilin tabel menu
		$this->db->where('id!=', 2);
		$data['menu'] = $this->db->get('tbl_user_menu')->result_array();
		$this->load->view('admin/role/index', $data);
		$this->load->view('templates/footer');
	}

	public function changeMenuAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('tbl_user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('tbl_user_access_menu', $data);
			$message = 'Access Granted!';
			$alert = 'success';
		} else {
			$this->db->delete('tbl_user_access_menu', $data);
			$message = 'Access Revoked!';
			$alert = 'danger';
		}
		$this->alert->alertResult($alert, $message, null);
	}

	public function changeCrudAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');
		$crud_id = $this->input->post('crudId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id,
			'crud_id' => $crud_id
		];

		$result = $this->db->get_where('tbl_crud_access', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('tbl_crud_access', $data);
			$message = 'Access Granted!';
			$alert = 'success';
		} else {
			$this->db->delete('tbl_crud_access', $data);
			$message = 'Access Revoked!';
			$alert = 'danger';
		}
		$this->alert->alertResult($alert, $message, null);
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('Construct_model', 'construct');
		$this->load->model('Alert_model', 'alert');
		$data['title'] = $this->construct->getTitle();
		$data['url'] = $this->construct->getUrl();
		// select * from tbl_user where email = email dari session
		$data['userdata'] = $this->construct->getUserdata();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
	}

	public function index()
	{
		$data['menu'] = $this->db->get('tbl_user_menu')->result_array();
		$this->load->view('admin/menu/index', $data);
		$this->load->view('templates/footer');
	}

	public function update($id)
	{
		$data['menu'] = $this->db->get_where('tbl_user_menu', ['id' => $id])->row_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/menu/update', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'menu' => $this->input->post('title'),
				'urlMenu' => $this->input->post('url')
			];
			// insert menu baru ke tbl_user_menu
			$this->db->where('id', $id);
			$this->db->update('tbl_user_menu', $data);
			$alert = 'success';
			$message = 'Menu Berhasil Diupdate!';
			$redirect = 'menu';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}
}

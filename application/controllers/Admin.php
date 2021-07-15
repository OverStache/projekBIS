<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Admin extends CI_Controller
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
		$data['total_anggota'] = $this->db->where('status', 0)->from('tbl_anggota')->count_all_results();
		$data['total_rekening'] = $this->db->where('role_id', 2)->from("tbl_user")->count_all_results();
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}
}

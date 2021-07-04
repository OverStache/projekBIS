<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('Construct_model', 'construct');
		$this->load->model('Alert_model', 'alert');
		$this->load->model('Query_model', 'join');
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
		$data['simpanan'] = $this->join->joinSimpananAnggotaStatus();
		$this->load->view('dataKeanggotaan/simpanan/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$this->db->where('status', 1);
		$this->db->order_by('id_anggota', 'ASC');
		$data['rekening'] = $this->db->get('tbl_rekening')->result_array();
		$this->load->view('dataKeanggotaan/simpanan/add', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$input = $this->input->post('id_rekening');
		if ($input) {
			$result = $this->join->fetch($input)->row_array();
			echo json_encode($result);
			die;
		}
	}
}

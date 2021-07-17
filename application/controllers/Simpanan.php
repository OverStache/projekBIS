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
		$this->load->model('Simpanan_model', 'simpanan');
		$data['title'] = $this->construct->getTitle();
		// select * from tbl_user where email = email dari session
		$data['userdata'] = $this->construct->getUserdata();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
	}

	public function index()
	{
		$data['simpanan'] = $this->simpanan->joinSimpananAnggotaStatus();
		$this->load->view('dataKeanggotaan/simpanan/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$data['anggota'] = $this->db->get_where('tbl_anggota', ['id_status' => 0])->result_array();
		$this->load->helper('date');
		$this->form_validation->set_rules('id_anggota', 'Anggota', 'required');
		$this->form_validation->set_rules('kredit', 'Jumlah', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('dataKeanggotaan/simpanan/add', $data);
			$this->load->view('templates/footer');
		} else {
			$insert = [
				'id_anggota' => $this->input->post('id_anggota'),
				'tanggal' => date('Y-m-d'),
				'kredit' => $this->input->post('kredit'),
				'jenis' => 3
			];
			$this->db->insert('tbl_transaksi', $insert);

			$alert = 'success';
			$message = 'Transaksi Berhasil!';
			$redirect = 'simpanan';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	public function detail($id)
	{
		$data['simpanan'] = $this->simpanan->joinSimpananAnggotaStatusById($id);
		$this->load->view('dataKeanggotaan/simpanan/detail', $data);
		$this->load->view('templates/footer');
	}
}

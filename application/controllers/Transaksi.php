<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('Construct_model', 'construct');
		$this->load->model('Alert_model', 'alert');
		$this->load->model('Transaksi_model', 'transaksi');
		$data['title'] = $this->construct->getTitle();
		// select * from tbl_user where email = email dari session
		$data['userdata'] = $this->construct->getUserdata();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
	}

	public function index()
	{
		$data['transaksi'] = $this->transaksi->joinTransaksiAnggota();
		$this->load->view('dataKeanggotaan/transaksi/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$this->load->helper('date');
		$this->form_validation->set_rules('id_jenis', 'Jenis Transaksi', 'required');
		$this->form_validation->set_rules('id_rekening', 'Rekening', 'required');
		$this->form_validation->set_rules('kredit', 'Jumlah', 'required');

		if ($this->form_validation->run() == false) {
			// ajax 
			$transaksi = $this->input->post('transaksi'); // cek jenis transaksi
			if ($transaksi == 2) {
				$result = $this->transaksi->fetchAllRek(); // loop semua rekening
				echo json_encode($result);
				die;
			} else if ($transaksi == 4) {
				$result = $this->transaksi->fetchAllSim(); // loop semua simpanan
				echo json_encode($result);
				die;
			}

			$trans = $this->input->post('trans');
			$id_rekening = $this->input->post('id_rekening'); // pilih angsuran yang aktif
			if ($trans == 2) {
				$result = $this->transaksi->fetchRek($id_rekening)->row_array();
				echo json_encode($result);
				die;
			} else if ($trans == 4) { // pilih simpanan yang aktif
				$result = $this->transaksi->fetchSim($id_rekening)->row_array();
				echo json_encode($result);
				die;
			}
			// end of ajax
			$this->load->view('dataKeanggotaan/transaksi/add');
			$this->load->view('templates/footer');
		} else {
			$data['userdata'] = $this->construct->getUserdata();
			$insert = [
				'id_user' => $data['userdata']['id'],
				'id_rekening' => $this->input->post('id_rekening'),
				'id_anggota' => $this->input->post('id_anggota'),
				'#' => $this->input->post('cicilan'),
				'tanggal' => date('Y-m-d'),
				'kredit' => $this->input->post('kredit'),
				'id_jenis' => $this->input->post('id_jenis')
			];
			$this->db->insert('tbl_transaksi', $insert);

			$alert = 'success';
			$message = 'Transaksi Berhasil!';
			$redirect = 'transaksi';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}
}

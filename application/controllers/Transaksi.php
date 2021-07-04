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
		$this->load->model('Query_model', 'query');
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
		$data['transaksi'] = $this->query->joinTransaksiAnggota();
		$this->load->view('dataKeanggotaan/transaksi/index', $data);
		$this->load->view('templates/footer');
	}

	public function add($id)
	{
		$this->load->model('Query_model', 'query');
		$this->load->helper('date');

		$data['jadwal'] = $this->query->getJadwalActive($id);

		$this->form_validation->set_rules('id_rekening', 'Rekening', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('dataKeanggotaan/transaksi/add', $data);
			$this->load->view('templates/footer');
		} else {
			$insert = [
				'id_rekening' => $id,
				'#' => $data['jadwal']['#'],
				'tanggal' => date('Y-m-d'),
				'kredit' => $this->input->post('jumlah'),
				'keterangan' => 'Angsuran Murobahah'
			];
			$this->db->insert('tbl_transaksi', $insert);

			$alert = 'success';
			$message = 'Transaksi Berhasil!';
			$redirect = 'transaksi';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	public function update($id)
	{
		$data['rekening'] = $this->db->get_where('tbl_rekening', ['status' => 1])->result_array();
		$data['angsuran'] = $this->db->get_where('tbl_angsuran', ['id' => $id])->row_array();

		$this->form_validation->set_rules('id_rekening', 'Rekening', 'required');
		$this->form_validation->set_rules('penyetor', 'Penyetor', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('dataKeanggotaan/angsuran/update', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'id_rekening' => $this->input->post('id_rekening'),
				'penyetor' => $this->input->post('penyetor'),
				'jumlah' => $this->input->post('jumlah')
			];
			$this->db->where('id', $id);
			$this->db->update('tbl_transaksi', $data);
			$alert = 'success';
			$message = 'Angsuran Berhasil Diupdate!';
			$redirect = 'angsuran';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	public function delete($id)
	{
		$this->db->delete('tbl_transaksi', array('id' => $id));
		$alert = 'warning';
		$message = 'Transaksi Berhasil Dihapus!';
		$redirect = 'transaksi';
		$this->alert->alertResult($alert, $message, $redirect);
	}

	public function print($id)
	{
		$data['rekening'] = $this->db->get_where('tbl_rekening', ['status' => 1])->result_array();
		$data['angsuran'] = $this->db->get_where('tbl_angsuran', ['id' => $id])->row_array();

		$this->load->library('mypdf');
		$this->mypdf->print('print/print', $data);
	}
}

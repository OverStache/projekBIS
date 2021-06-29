<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
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
		$data['tbl_user'] = $this->construct->emailSession();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
	}

	public function index()
	{
		$this->load->model('Join_model', 'join');
		$data['rekening'] = $this->join->joinRekeningAnggotaStatus();
		$this->load->view('dataKeanggotaan/rekening/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$data['anggota'] = $this->db->get_where('tbl_anggota', ['is_active' => 1])->result_array();

		$this->form_validation->set_rules('id_anggota', 'Anggota', 'required');
		$this->form_validation->set_rules('jangka_waktu', 'Lama Angsuran', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Pembiayaan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('dataKeanggotaan/rekening/add', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'id_anggota' => $this->input->post('id_anggota'),
				'jangka_waktu' => $this->input->post('jangka_waktu'),
				'jumlah' => $this->input->post('jumlah')
			];
			$this->db->insert('tbl_rekening', $data);
			$alert = 'success';
			$message = 'Rekening Berhasil Ditambahkan!';
			$redirect = 'rekening';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	public function update($id)
	{
		$data['anggota'] = $this->db->get_where('tbl_anggota', ['is_active' => 1])->result_array();
		$data['rekening'] = $this->db->get_where('tbl_rekening', ['id' => $id])->row_array();

		$this->form_validation->set_rules('id_anggota', 'Anggota', 'required');
		$this->form_validation->set_rules('jangka_waktu', 'Lama Angsuran', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Pembiayaan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('dataKeanggotaan/rekening/update', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'id_anggota' => $this->input->post('id_anggota'),
				'jangka_waktu' => $this->input->post('jangka_waktu'),
				'jumlah' => $this->input->post('jumlah')
			];
			$this->db->where('id', $id);
			$this->db->update('tbl_rekening', $data);
			$alert = 'success';
			$message = 'Rekening Berhasil Diupdate!';
			$redirect = 'rekening';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	public function detail($id)
	{
		// $data['rekening'] = $this->db->get_where('tbl_rekening', ['id' => $id])->row_array();

		$this->load->model('Join_model', 'join');
		$data['rekening'] = $this->join->joinRekeningAnggotaStatusById($id);

		$this->load->view('dataKeanggotaan/rekening/detail', $data);
		$this->load->view('templates/footer');
	}

	public function changeRekeningStatus()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		// if ($status == 'Pending') {
		// 	$update = 1;
		// 	$message = 'Rekening Activated!';
		// 	$alert = 'success';
		// } else if ($status == 'Active') {
		// 	$update = 3;
		// 	$message = 'Rekening Rejected!';
		// 	$alert = 'danger';
		// } else {
		// 	$update = 0;
		// 	$message = 'Rekening Pending!';
		// 	$alert = 'danger';
		// }

		switch ($status) {
			case 'Pending':
				$update = 1;
				$message = 'Rekening Activated!';
				$alert = 'success';
				break;
			case 'Active':
				$update = 3;
				$message = 'Rekening Rejected!';
				$alert = 'danger';
				break;
			case 'Rejected':
				$update = 1;
				$message = 'Rekening Activated!';
				$alert = 'success';
				break;
		}
		$this->db->where('id', $id);
		$this->db->update('tbl_rekening', ['status' => $update]);
		$this->alert->alertResult($alert, $message, null);
	}
}

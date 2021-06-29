<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
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
		$data['anggota'] = $this->join->joinAnggotaStatus();
		$this->load->view('dataKeanggotaan/anggota/index', $data);
		$this->load->view('templates/footer');
	}


	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$data['status'] = $this->db->get('tbl_status_anggota')->result_array();
		if ($this->form_validation->run() == false) {
			$this->load->view('dataKeanggotaan/anggota/add', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'status' => $this->input->post('status')
			];
			$this->db->insert('tbl_anggota', $data);
			$alert = 'success';
			$message = 'Anggota Berhasil Ditambahkan!';
			$redirect = 'anggota';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	public function update($id)
	{
		$data['anggota'] = $this->db->get_where('tbl_anggota', ['idAnggota' => $id])->row_array();
		$data['status'] = $this->db->get('tbl_status_anggota')->result_array();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('dataKeanggotaan/anggota/update', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'status' => $this->input->post('status')
			];
			$this->db->where('idAnggota', $id);
			$this->db->update('tbl_anggota', $data);
			$alert = 'success';
			$message = 'Data Anggota Berhasil Diupdate!';
			$redirect = 'anggota';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	public function delete($id)
	{
		$this->db->delete('tbl_anggota', array('idAnggota' => $id));
		$alert = 'warning';
		$message = 'Anggota Berhasil Dihapus!';
		$redirect = 'anggota';
		$this->alert->alertResult($alert, $message, $redirect);
	}

	public function changeActive()
	{
		$id = $this->input->post('id');
		$is_active = $this->input->post('is_active');

		if ($is_active == 0) {
			$insert = 1;
			$message = 'Anggota Activated!';
			$alert = 'success';
		} else {
			$insert = 0;
			$message = 'Anggota Deactivated!';
			$alert = 'danger';
		}
		$this->db->where('idAnggota', $id);
		$this->db->update('tbl_anggota', ['is_active' => $insert]);
		$this->alert->alertResult($alert, $message, null);
	}
}

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
		$data['anggota'] = $this->join->joinAnggotaStatus();
		$this->load->view('dataKeanggotaan/anggota/index', $data);
		$this->load->view('templates/footer');
	}


	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('tempatLahir', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tanggalLahir', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('namaIbuKandung', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('jenisID', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nomerID', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('statusMarital', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('pendidikan', 'Jenis Kelamin', 'required');
		$data['status'] = $this->db->get('tbl_status_anggota')->result_array();
		if ($this->form_validation->run() == false) {
			$this->load->view('dataKeanggotaan/anggota/add', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'namaPanggilan' => $this->input->post('namaPanggilan'),
				'jenisKelamin' => $this->input->post('jenisKelamin'),
				'status' => $this->input->post('status'),
				'tempatLahir' => $this->input->post('tempatLahir'),
				'tanggalLahir' => $this->input->post('tanggalLahir'),
				'namaIbuKandung' => $this->input->post('namaIbuKandung'),
				'jenisID' => $this->input->post('jenisID'),
				'nomerID' => $this->input->post('nomerID'),
				'statusMarital' => $this->input->post('statusMarital'),
				'agama' => $this->input->post('agama'),
				'kewarganegaraan' => $this->input->post('kewarganegaraan'),
				'pendidikan' => $this->input->post('pendidikan')
			];
			var_dump($data);
			die;
			// $this->db->insert('tbl_anggota', $data);
			// $alert = 'success';
			// $message = 'Anggota Berhasil Ditambahkan!';
			// $redirect = 'anggota';
			// $this->alert->alertResult($alert, $message, $redirect);
		}
	}

	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('tempatLahir', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tanggalLahir', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('namaIbuKandung', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('jenisID', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nomerID', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('statusMarital', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('pendidikan', 'Jenis Kelamin', 'required');

		if ($this->form_validation->run() == false) {
			$alert = 'danger';
			$message = 'Anggota Gagal Diupdate!';
			$redirect = 'anggota/detail/' . $id;
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'namaPanggilan' => $this->input->post('namaPanggilan'),
				'jenisKelamin' => $this->input->post('jenisKelamin'),
				'status' => $this->input->post('status'),
				'tempatLahir' => $this->input->post('tempatLahir'),
				'tanggalLahir' => $this->input->post('tanggalLahir'),
				'namaIbuKandung' => $this->input->post('namaIbuKandung'),
				'jenisID' => $this->input->post('jenisID'),
				'nomerID' => $this->input->post('nomerID'),
				'statusMarital' => $this->input->post('statusMarital'),
				'agama' => $this->input->post('agama'),
				'kewarganegaraan' => $this->input->post('kewarganegaraan'),
				'pendidikan' => $this->input->post('pendidikan')
			];
			$this->db->where('id', $id);
			$this->db->update('tbl_anggota', $data);
			$alert = 'success';
			$message = 'Data Anggota Berhasil Diupdate!';
			$redirect = 'anggota/detail/' . $id;
		}
		$this->alert->alertResult($alert, $message, $redirect);
	}

	public function detail($id)
	{
		$data['status'] = $this->db->get('tbl_status_anggota')->result_array();
		$data['anggota'] = $this->join->joinAnggotaStatusById($id);
		$this->load->view('dataKeanggotaan/anggota/detail', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		$this->db->delete('tbl_anggota', array('id' => $id));
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
		$this->db->where('id', $id);
		$this->db->update('tbl_anggota', ['is_active' => $insert]);
		$this->alert->alertResult($alert, $message, null);
	}
}

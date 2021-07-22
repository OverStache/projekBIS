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
		$this->load->model('Anggota_model', 'anggota');
		$data['title'] = $this->construct->getTitle();
		$data['userdata'] = $this->construct->getUserdata();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
	}

	public function index()
	{
		$data['anggota'] = $this->anggota->joinAnggotaStatus();
		$this->load->view('dataKeanggotaan/anggota/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		// form validation
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('id_jenis_anggota', 'Jenis Anggota', 'required');
		$this->form_validation->set_rules('tempatLahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('namaIbuKandung', 'Nama Ibu Kandung', 'required');
		$this->form_validation->set_rules('jenisID', 'Jenis Identitas', 'required');
		$this->form_validation->set_rules('nomerID', 'Nomer Identitas', 'required|is_unique[tbl_anggota.nomerID]', [
			'is_unique' => 'Nomor Identitas sudah terdaftar'
		]); // nomor ID harus unique
		$this->form_validation->set_rules('statusMarital', 'Status Marital', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		// end of form validation

		if ($this->form_validation->run() == false) {
			$this->load->view('dataKeanggotaan/anggota/add');
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'namaPanggilan' => $this->input->post('namaPanggilan'),
				'jenisKelamin' => $this->input->post('jenisKelamin'),
				'id_jenis_anggota' => $this->input->post('id_jenis_anggota'),
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
			// insert data ke database
			$this->db->insert('tbl_anggota', $data);
			$alert = 'success';
			$message = 'Anggota Berhasil Ditambahkan!';
			$redirect = 'anggota';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	public function update($id)
	{
		// form validation
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('id_jenis_anggota', 'Jenis Anggota', 'required');
		$this->form_validation->set_rules('tempatLahir', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tanggalLahir', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('namaIbuKandung', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('jenisID', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nomerID', 'Nomer Identitas', 'required|is_unique[tbl_anggota.nomerID]', [
			'is_unique' => 'Nomor Identitas sudah terdaftar'
		]); // nomor ID harus unique
		$this->form_validation->set_rules('statusMarital', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('pendidikan', 'Jenis Kelamin', 'required');
		// end of form validation

		if ($this->form_validation->run() == false) {
			$this->detail($id);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'namaPanggilan' => $this->input->post('namaPanggilan'),
				'jenisKelamin' => $this->input->post('jenisKelamin'),
				'id_jenis_anggota' => $this->input->post('id_jenis_anggota'),
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
			// update data ke database
			$this->db->where('id', $id);
			$this->db->update('tbl_anggota', $data);
			$alert = 'success';
			$message = 'Data Anggota Berhasil Diupdate!';
			$redirect = 'anggota/detail/' . $id;
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	// lihat detail per anggota
	public function detail($id)
	{
		$data['anggota'] = $this->anggota->joinAnggotaJenisStatusById($id);
		$this->load->view('dataKeanggotaan/anggota/detail', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		// dapat menghapus jika anggota belum diaktivasi
		$this->db->delete('tbl_anggota', array('id' => $id, 'id_status' => 0));
		if ($this->db->affected_rows() > 0) {
			$alert = 'warning';
			$message = 'Anggota Berhasil Dihapus!';
			$redirect = 'anggota';
			$this->alert->alertResult($alert, $message, $redirect);
		} else {
			$alert = 'danger';
			$message = 'Anggota Gagal Dihapus!';
			$redirect = 'anggota';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	// aktivasi dan deaktivasi anggota
	public function changeActive()
	{
		$id = $this->input->post('id');
		$id_status = $this->input->post('id_status');

		switch ($id_status) {
			case 0:
				$update = 1;
				$message = 'Anggota Activated!';
				$alert = 'success';
				break;
			case 1:
				$update = 3;
				$message = 'Anggota Deactivated!';
				$alert = 'warning';
				break;
			case 3:
				$update = 1;
				$message = 'Anggota Activated!';
				$alert = 'success';
				break;
		}
		$this->db->where('id', $id);
		$this->db->update('tbl_anggota', ['id_status' => $update]);
		$this->alert->alertResult($alert, $message, null);
	}
}

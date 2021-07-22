<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Alert_model', 'alert');
	}

	// landing page
	public function index()
	{
		$data['title'] = 'BMT Tawfin';
		$this->load->view('templates/authHeader', $data);
		$this->load->view('auth/index');
		$this->load->view('templates/authFooter');
	}

	// login page
	public function login()
	{
		// cek jika sudah login
		if ($this->session->userdata('username')) {
			redirect('profile');
		}
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'BMT Login';
			$this->load->view('templates/authHeader', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/authFooter');
		} else {
			$this->_login();
		}
	}

	// fungsi login
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

		if ($user) {
			if ($user['id_status'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'role_id' => $user['role_id'] // menentukan menu
					];
					// simpan array kedalam session
					$this->session->set_userdata($data);

					// cek privilege user atau admin
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('profile');
					}
				} else {
					// password salah
					$message = 'Wrong Password!';
				}
			} else {
				// usernya belom aktif
				$message = 'User Not Activated';
			}
		} else {
			// usernya tidak ada
			$message = 'User Not Registered';
		}
		$alert = 'danger';
		$redirect = 'auth/login';
		$this->alert->alertResult($alert, $message, $redirect);
	}

	public function registration()
	{
		// form validation
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('id_jenis_anggota', 'Jenis Anggota', 'required');
		$this->form_validation->set_rules('tempatLahir', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tanggalLahir', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('namaIbuKandung', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('jenisID', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nomerID', 'Jenis Kelamin', 'required|is_unique[tbl_anggota.nomerID]', [
			'is_unique' => 'Nomor Identitas sudah terdaftar'
		]); // nomor ID harus unique
		$this->form_validation->set_rules('statusMarital', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('pendidikan', 'Jenis Kelamin', 'required');
		// end of form validation

		$data['title'] = 'Daftar Anggota';
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/authHeader', $data);
			$this->load->view('auth/registration', $data);
			$this->load->view('templates/authFooter');
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
			$this->db->insert('tbl_anggota', $data);
			$this->alert->alertRegistration();
		}
	}

	// fungsi logout
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$alert = 'secondary';
		$message = 'You have been logged out!';
		$redirect = 'auth';
		$this->alert->alertResult($alert, $message, $redirect);
	}

	// fungsi blocked, jika user tidak memiliki hak
	public function blocked()
	{
		$data['title'] = '403 Forbidden';
		$data['userdata'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/authHeader');
		$this->load->view('auth/blocked');
		$this->load->view('templates/authFooter');
	}
}

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

	public function index()
	{
		$data['title'] = 'BMT Tawfin';
		$this->load->view('templates/authHeader', $data);
		$this->load->view('auth/index');
		$this->load->view('templates/authFooter');
	}

	public function login()
	{
		if ($this->session->userdata('email')) {
			redirect('profile');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
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
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
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
			// usernya ga ada
			$message = 'User Not Registered';
		}
		$alert = 'danger';
		$redirect = 'auth/login';
		$this->alert->alertResult($alert, $message, $redirect);
	}

	public function registration()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('tempatLahir', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tanggalLahir', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('namaIbuKandung', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('jenisID', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nomerID', 'Jenis Kelamin', 'required|is_unique[tbl_anggota.nomerID]', [
			'is_unique' => 'Nomor Identitas sudah terdaftar'
		]);
		$this->form_validation->set_rules('statusMarital', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('pendidikan', 'Jenis Kelamin', 'required');
		$data['status'] = $this->db->get('tbl_status_anggota')->result_array();
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
			$this->db->insert('tbl_anggota', $data);
			$this->alert->alertRegistration();
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$alert = 'secondary';
		$message = 'You have been logged out!';
		$redirect = 'auth';
		$this->alert->alertResult($alert, $message, $redirect);
	}

	public function blocked()
	{
		$data['title'] = '403 Forbidden';
		$data['userdata'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/authHeader');
		$this->load->view('auth/blocked');
		$this->load->view('templates/authFooter');
	}
}

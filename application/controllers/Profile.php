<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('Construct_model', 'construct');
		$this->load->model('Alert_model', 'alert');
		$this->load->model('Image_model', 'image');
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
		$data['role'] = $this->db->get_where('tbl_user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$this->load->view('profile/index', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$data['userdata'] = $this->construct->getUserdata();
		$this->form_validation->set_rules('username', 'Name', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('profile/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('username');
			$email = $this->input->post('email');

			// cek jika ada gambar yang akan di upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$this->image->uploadImage($data['userdata']['image']);
			}
			$message = 'Profile Berhasil Diupdate!';
			$alert = 'success';
			$redirect = 'profile';
			$this->db->set('username', $name);
			$this->db->where('email', $email);
			$this->db->update('tbl_user');

			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	public function changepassword()
	{
		// select * from tbl_user where email = email dari session
		$data['userdata'] = $this->construct->getUserdata();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Repeat Password', 'required|trim|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('profile/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['userdata']['password'])) {
				$message = 'Password Salah!';
				$alert = 'danger';
			} else {
				if ($current_password == $new_password) {
					$message = 'Password Sama!';
					$alert = 'danger';
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('tbl_user');
					$message = 'Password Berhasil Diubah!';
					$alert = 'success';
				}
			}
			$redirect = 'profile';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();

    $this->load->model('Construct_model', 'construct');

    $data['title'] = $this->construct->getTitle();

    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->construct->emailSession();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
  }

  public function index()
  {
    $data['role'] = $this->db->get_where('tbl_user_role', ['id' => $this->session->userdata('role_id')])->row_array();
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }

  public function edit()
  {
    $data['tbl_user'] = $this->construct->emailSession();
    $this->form_validation->set_rules('name', 'Name', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('user/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $name = $this->input->post('name');
      $email = $this->input->post('email');

      // cek jika ada gambar yang akan di upload
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {

          $old_image = $data['tbl_user']['image'];

          if ($old_image != 'default.png') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
          }

          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('username', $name);
      $this->db->where('email', $email);
      $this->db->update('tbl_user');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Profile Updated!
      </div>');
      redirect('user');
    }
  }

  public function changepassword()
  {
    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->construct->emailSession();

    $data['role'] = $this->db->get_where('tbl_user_role', ['id' => $this->session->userdata('role_id')])->row_array();

    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'Current Password', 'required|trim|min_length[3]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Current Password', 'required|trim|min_length[3]|matches[new_password1]');

    if ($this->form_validation->run() == false) {
      $this->load->view('user/changepassword', $data);
      $this->load->view('templates/footer');
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');
      if (!password_verify($current_password, $data['tbl_user']['password'])) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Wrong Password!
        </div>');
        redirect('user/changepassword');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Password same!
          </div>');
          redirect('user/changepassword');
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('tbl_user');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Password Changed!
          </div>');
          redirect('user/changepassword');
        }
      }
    }
  }
}

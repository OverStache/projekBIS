<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();

    $this->load->model('Construct_model', 'construct');

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
    $data['role'] = $this->db->get_where('tbl_user_role', ['id' => $this->session->userdata('role_id')])->row_array();
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }

  public function edit()
  {
    $data['tbl_user'] = $this->construct->emailSession();
    $this->form_validation->set_rules('username', 'Name', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('user/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $name = $this->input->post('username');
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
          $message = $this->upload->display_errors();
          $alert = 'danger';
        }
      }
      $message = 'Profile Updated!';
      $alert = 'success';
      $this->session->set_flashdata('message', '
      <div class="alert alert-' . $alert . ' alert-dismissible fade show" role="alert">
        ' . $message . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      $this->db->set('username', $name);
      $this->db->where('email', $email);
      $this->db->update('tbl_user');
      redirect('user');
    }
  }

  public function changepassword()
  {
    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->construct->emailSession();

    $data['role'] = $this->db->get_where('tbl_user_role', ['id' => $this->session->userdata('role_id')])->row_array();

    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Repeat Password', 'required|trim|min_length[3]|matches[new_password1]');

    if ($this->form_validation->run() == false) {
      $this->load->view('user/changepassword', $data);
      $this->load->view('templates/footer');
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');
      if (!password_verify($current_password, $data['tbl_user']['password'])) {
        $message = 'Wrong Password!';
        $alert = 'danger';
      } else {
        if ($current_password == $new_password) {
          $message = 'Password Same!';
          $alert = 'danger';
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('tbl_user');
          $message = 'Password Changed!';
          $alert = 'success';
        }
      }
      $this->session->set_flashdata('message', '
      <div class="alert alert-' . $alert . ' alert-dismissible fade show" role="alert">
        ' . $message . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('user/changepassword');
    }
  }
}

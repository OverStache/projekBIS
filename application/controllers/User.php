<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
    $data['userdata'] = $this->construct->getUserdata();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
  }

  public function index()
  {
    $this->db->where('role_id!=', 1);
    $data['user'] = $this->db->get('tbl_user')->result_array();

    $this->load->model('User_model', 'user');
    $data['user'] = $this->user->getUserRole();

    $this->load->view('admin/user/index', $data);
    $this->load->view('templates/footer');
  }

  public function add()
  {
    $this->form_validation->set_rules('username', 'Name', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('role_id', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $data['role'] = $this->db->get('tbl_user_role')->result_array();
      $this->load->view('admin/user/add', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'username' => htmlspecialchars($this->input->post('username', true)),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.png',
        'role_id' => $this->input->post('role_id'),
        'is_active' => $this->input->post('is_active'),
        'date_created' => time()
      ];
      // insert user baru ke tbl_user
      $this->db->insert('tbl_user', $data);
      $alert = 'success';
      $message = 'User Berhasil Ditambahkan!';
      $redirect = 'user';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }

  public function update($id)
  {
    $data['user'] =  $this->db->get_where('tbl_user', ['id' => $id])->row_array();
    $data['role'] = $this->db->get('tbl_user_role')->result_array();

    $this->form_validation->set_rules('username', 'Name', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/user/update', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'username' => htmlspecialchars($this->input->post('username', true)),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.png',
        'role_id' => $this->input->post('role_id'),
        'is_active' => $this->input->post('is_active'),
        'date_created' => time()
      ];
      // insert user baru ke tbl_user_menu
      $this->db->where('id', $id);
      $this->db->update('tbl_user', $data);
      $alert = 'success';
      $message = 'User Berhasil Diupdate!';
      $redirect = 'user';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }
  public function delete($id)
  {
    $this->db->delete('tbl_user', array('id' => $id));
    $alert = 'warning';
    $message = 'User Berhasil Dihapus!';
    $redirect = 'user';
    $this->alert->alertResult($alert, $message, $redirect);
  }

  public function changeActive()
  {
    $id = $this->input->post('id');
    $is_active = $this->input->post('is_active');

    if ($is_active == 0) {
      $insert = 1;
      $message = 'User Activated!';
      $alert = 'success';
    } else {
      $insert = 0;
      $message = 'User Deactivated!';
      $alert = 'danger';
    }
    $this->db->where('id', $id);
    $this->db->update('tbl_user', ['is_active' => $insert]);
    $this->alert->alertResult($alert, $message, null);
  }
}

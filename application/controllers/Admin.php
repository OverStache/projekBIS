<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();

    $data['uri1'] = $this->uri->segment(1);
    $data['uri2'] = $this->uri->segment(2);

    if ($this->uri->segment(2)) {
      $url = $data['uri1'] . '/' . $data['uri2'];
    } else {
      $url = $data['uri1'];
    }
    $data['title'] = $this->db->get_where('tbl_user_sub_menu', ['url' => $url])->row_array();

    // $this->role(0);

    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
  }

  public function index()
  {
    $data['total_user'] = $this->db->where('role_id', 2)->from("tbl_user")->count_all_results();
    $data['total_admin'] = $this->db->where('role_id', 1)->from("tbl_user")->count_all_results();
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function role()
  {
    $id = 0;
    $this->roleAccess($id);
  }

  public function roleAccess($id)
  {
    // $id = $this->input->post('menuId');
    $data['role'] = $this->db->get('tbl_user_role')->result_array();
    if ($id) {
      // cek tbl_user_access_menu kombinasi role_id-menu_id ada ga
      $data['role_id'] = $this->db->get_where('tbl_user_role', ['id' => $id])->row_array();

      // tampilin tabel menu
      $this->db->where('id!=', 1);
      $data['menu'] = $this->db->get('tbl_user_menu')->result_array();
    } else {
      $data['menu'] = 0;
      // echo 'nampak nya eror';
    }
    $this->load->view('admin/roleAccess', $data);
    $this->load->view('templates/footer');
  }

  public function changeRole()
  {
    $id = $this->input->post('id');
    $this->role($id);
  }

  public function changeaccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('tbl_user_access_menu', $data);

    if ($result->num_rows() < 1) {
      $this->db->insert('tbl_user_access_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Granted!</div>');
    } else {
      $this->db->delete('tbl_user_access_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Access Revoked!</div>');
    }
  }

  public function user()
  {
    $this->db->where('role_id!=', 1);
    $data['user'] = $this->db->get('tbl_user')->result_array();

    $this->load->view('admin/user', $data);
    $this->load->view('templates/footer');
  }
}

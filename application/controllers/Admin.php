<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['total_user'] = $this->db->where('role_id', 2)->from('tbl_user')->count_all_results();
    $data['total_admin'] = $this->db->where('role_id', 1)->from('tbl_user')->count_all_results();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function role()
  {
    $data['title'] = 'Role';
    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get('tbl_user_role')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('templates/footer');
  }

  public function roleAccess($role_id)
  {
    $data['title'] = 'Role Access';
    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get_where('tbl_user_role', ['id' => $role_id])->row_array();


    $this->db->where('id!=', 1);
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/roleAccess', $data);
    $this->load->view('templates/footer');
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
}

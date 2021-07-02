<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubMenu extends CI_Controller
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
    $this->load->model('Menu_model', 'menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->load->view('admin/subMenu/index', $data);
    $this->load->view('templates/footer');
  }

  public function add()
  {
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/subMenu/add', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'urlSubMenu' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active'),
      ];
      // insert menu baru ke tbl_user_menu
      $this->db->insert('tbl_user_sub_menu', $data);
      $alert = 'success';
      $message = 'Sub Menu Berhasil Ditambahkan!';
      $redirect = 'subMenu';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }

  public function update($id)
  {
    $data['subMenu'] = $this->db->get_where('tbl_user_sub_menu', ['id' => $id])->row_array();
    $menu_id = $data['subMenu']['menu_id'];
    $data['menu'] = $this->db->get_where('tbl_user_menu', ['id' => $menu_id])->row_array();
    $data['menuLoop'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/subMenu/update', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'urlSubMenu' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active'),
      ];
      // insert menu baru ke tbl_user_menu
      $this->db->where('id', $id);
      $this->db->update('tbl_user_sub_menu', $data);
      $alert = 'success';
      $message = 'Sub Menu Berhasil Diupdate!';
      $redirect = 'subMenu';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }

  public function delete($id)
  {
    $this->db->delete('tbl_user_sub_menu', array('id' => $id));
    $alert = 'warning';
    $message = 'Sub Menu Berhasil Dihapus!';
    $redirect = 'subMenu';
    $this->alert->alertResult($alert, $message, $redirect);
  }

  public function changeActive()
  {
    $id = $this->input->post('id');
    $is_active = $this->input->post('is_active');

    if ($is_active == 0) {
      $insert = 1;
      $message = 'Sub Menu Activated!';
      $alert = 'success';
    } else {
      $insert = 0;
      $message = 'Sub Menu Deactivated!';
      $alert = 'danger';
    }
    $this->db->where('id', $id);
    $this->db->update('tbl_user_sub_menu', ['is_active' => $insert]);
    $this->alert->alertResult($alert, $message, null);
  }
}

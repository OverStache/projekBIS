<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function index()
  {
    $data['title'] = 'Menu Management';

    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    // select * from tbl_user_menu
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    } else {
      // insert menu baru ke tbl_user_menu
      $this->db->insert('tbl_user_menu', ['Menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
      Menu Added
      </div>');
      redirect('menu');
    }
  }
  public function submenu()
  {
    $data['title'] = 'Sub Menu Management';

    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Menu_model', 'menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active'),
      ];
      $this->db->insert('tbl_user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
      Sub Menu Added!
      </div>');
      redirect('menu/submenu');
    }
  }
  public function editMenu($id)
  {
    $data['title'] = 'Menu edit';

    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['tbl_user_menu'] = $this->db->get_where('tbl_user_menu', ['id' => $id])->row_array();
    // var_dump($data);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('menu/editMenu', $data);
    $this->load->view('templates/footer');
  }
  public function editSubMenu($id)
  {
    $data = $this->db->get_where('tbl_user_sub_menu', ['id' => $id])->result_array();
    var_dump($data);
  }
}

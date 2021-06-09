<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $data['uri1'] = $this->uri->segment(1);
    $data['uri2'] = $this->uri->segment(2);
    $url = $data['uri1'] . '/' . $data['uri2'];
    // $data['title'] = $this->db->get_where('tbl_user_sub_menu', ['url' => $url])->row_array();

    // var_dump($data['uri1'] . '/' . $data['uri2']);

    if ($this->uri->segment(2)) {
      $data['title'] = $this->db->get_where('tbl_user_sub_menu', ['url' => $url])->row_array();
    } else {
      $data['title'] = $this->db->get_where('tbl_user_sub_menu', ['url' => $data['uri1']])->row_array();
    }

    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
  }
  public function index()
  {
    // select * from tbl_user_menu
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    // if ($this->session->userdata('role_id') == 1) {
    //   $data['button'] =  $this->load->view('menu/delete');
    // } else {
    //   $data['button'] = '';
    // }

    if ($this->form_validation->run() == false) {
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
  public function editMenu($id)
  {
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Title', 'required');
    $this->load->view('menu/index', $data);
    $this->load->view('templates/footer');

    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert">
      Update fail
      </div>');
      redirect('menu');
    } else {
      $title = $this->input->post('menu');
      $this->db->set('menu', $title);
      $this->db->where('id', $id);
      $this->db->update('tbl_user_menu');
      $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
      Menu Updated!
      </div>');
      redirect('menu');
    }
  }
  public function deleteMenu($id)
  {
    $this->db->delete('tbl_user_menu', array('id' => $id));
    $this->session->set_flashdata('message', '<div class="alert alert-warning mt-3" role="alert">
    Menu Deleted!
    </div>');
    redirect('menu');
  }
  // end of menu

  // sub menu
  public function submenu()
  {
    $this->load->model('Menu_model', 'menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
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
  public function editSubMenu($id)
  {
    $this->load->model('Menu_model', 'menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      // $this->load->view('menu/submenu', $data);
      // redirect('menu/submenu', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->where('id', $id);
      $this->db->update('tbl_user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
      Sub Menu Updated!
      </div>');
      redirect('menu/submenu');
    }
  }
  public function deleteSubMenu($id)
  {
    $this->db->delete('tbl_user_sub_menu', array('id' => $id));
    $this->session->set_flashdata('message', '<div class="alert alert-warning mt-3" role="alert">
    Sub Menu Deleted!
    </div>');
    redirect('menu/submenu');
  }
}

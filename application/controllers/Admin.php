<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
    $data['total_pengawas'] = $this->db->where('role_id', 3)->from("tbl_user")->count_all_results();
    $data['total_member'] = $this->db->where('role_id', 2)->from("tbl_user")->count_all_results();
    $data['total_pengurus'] = $this->db->where('role_id', 1)->from("tbl_user")->count_all_results();
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }
  // menu role

  public function roleAccess($id = 1)
  {
    // combobox
    $data['role'] = $this->db->get('tbl_user_role')->result_array();
    // get role_id
    $data['role_id'] = $this->db->get_where('tbl_user_role', ['id' => $id])->row_array();
    // tampilin tabel menu
    $this->db->where('id!=', 1);
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();
    $this->load->view('admin/role/index', $data);
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
  // end of menu role

  // menu user
  public function user()
  {
    $this->db->where('role_id!=', 1);
    $data['user'] = $this->db->get('tbl_user')->result_array();

    $this->load->model('User_model', 'user');
    $data['user'] = $this->user->getUserRole();

    $this->load->view('admin/user/index', $data);
    $this->load->view('templates/footer');
  }

  public function userAdd()
  {
    $this->form_validation->set_rules('username', 'Name', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $email = $this->input->post('email', true);
    $data = [
      'username' => htmlspecialchars($this->input->post('username', true)),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'email' => htmlspecialchars($email),
      'image' => 'default.png',
      'role_id' => $this->input->post('role_id'),
      'is_active' => 1,
      'date_created' => time()
    ];

    if ($this->form_validation->run() == false) {
      $data['role'] = $this->db->get('tbl_user_role')->result_array();
      $this->load->view('admin/user/userAdd', $data);
      $this->load->view('templates/footer');
    } else {
      // insert user baru ke tbl_user_menu
      // $this->db->insert('tbl_user_menu', ['Menu' => $this->input->post('title')]);
      // $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
      // Menu Added
      // </div>');
      var_dump($data);
      // redirect('admin/user');
    }
  }
  //  end of menu user

  public function menu()
  {
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();
    $this->load->view('admin/menu/index', $data);
    $this->load->view('templates/footer');
  }

  public function menuAdd()
  {
    $this->form_validation->set_rules('title', 'Title', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/menu/menuAdd');
      $this->load->view('templates/footer');
    } else {
      // insert menu baru ke tbl_user_menu
      $this->db->insert('tbl_user_menu', ['Menu' => $this->input->post('title')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
      Menu Added
      </div>');
      redirect('admin/menu');
    }
  }

  public function menuUpdate($id)
  {
    $data['menu'] = $this->db->get_where('tbl_user_menu', ['id' => $id])->row_array();

    $this->form_validation->set_rules('title', 'Title', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/menu/menuUpdate', $data);
      $this->load->view('templates/footer');
    } else {
      // insert menu baru ke tbl_user_menu
      $this->db->set('menu', $this->input->post('title'));
      $this->db->where('id', $id);
      $this->db->update('tbl_user_menu');
      $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
      Menu Added
      </div>');
      redirect('admin/menu');
    }
  }

  public function menuDelete($id)
  {
    $this->db->delete('tbl_user_menu', array('id' => $id));
    $this->session->set_flashdata('message', '<div class="alert alert-warning mt-3" role="alert">
    Menu Deleted!
    </div>');
    redirect('admin/menu');
  }
  // end of Menu Management

  // sub menu management
  public function subMenu()
  {
    $this->load->model('Menu_model', 'menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->load->view('admin/subMenu/index', $data);
    $this->load->view('templates/footer');
  }

  public function subMenuAdd()
  {
    $data['menu'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/subMenu/subMenuAdd', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active'),
      ];
      // insert menu baru ke tbl_user_menu
      $this->db->insert('tbl_user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
      Menu Added!
      </div>');
      redirect('admin/subMenu');
    }
  }

  public function subMenuUpdate($id)
  {
    $data['subMenu'] = $this->db->get_where('tbl_user_sub_menu', ['id' => $id])->row_array();
    $menu_id = $data['subMenu']['menu_id'];
    $data['menu'] = $this->db->get_where('tbl_user_menu', ['id' => $menu_id])->row_array();
    $data['menuLoop'] = $this->db->get('tbl_user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/subMenu/subMenuUpdate', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active'),
      ];
      // insert menu baru ke tbl_user_menu
      $this->db->where('id', $id);
      $this->db->update('tbl_user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
      Sub Menu Updated!
      </div>');
      redirect('admin/subMenu');
    }
  }

  public function subMenuDelete($id)
  {
    $this->db->delete('tbl_user_menu', array('id' => $id));
    $this->session->set_flashdata('message', '<div class="alert alert-warning mt-3" role="alert">
    Menu Deleted!
    </div>');
    redirect('admin/subMenu');
  }
}

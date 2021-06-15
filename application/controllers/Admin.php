<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();

    $this->load->model('Construct_model', 'construct');
    $this->load->model('Alert_model', 'alert');
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
      $message = 'Access Granted!';
      $alert = 'success';
    } else {
      $this->db->delete('tbl_user_access_menu', $data);
      $message = 'Access Revoked!';
      $alert = 'danger';
    }
    $this->session->set_flashdata('message', '
      <div class="alert alert-' . $alert . ' alert-dismissible fade show" role="alert">
        ' . $message . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>');
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
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('role_id', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $data['role'] = $this->db->get('tbl_user_role')->result_array();
      $this->load->view('admin/user/userAdd', $data);
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
      $message = 'User Added!';
      $redirect = 'admin/user';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }

  public function userUpdate($id)
  {
    $data['user'] =  $this->db->get_where('tbl_user', ['id' => $id])->row_array();
    $data['role'] = $this->db->get('tbl_user_role')->result_array();

    $this->form_validation->set_rules('username', 'Name', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/user/userUpdate', $data);
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
      $message = 'User Updated!';
      $redirect = 'admin/user';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }
  public function userDelete($id)
  {
    $this->db->delete('tbl_user', array('id' => $id));
    $alert = 'warning';
    $message = 'User Deleted!';
    $redirect = 'admin/user';
    $this->alert->alertResult($alert, $message, $redirect);
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
      $alert = 'success';
      $message = 'Menu Added!';
      $redirect = 'admin/menu';
      $this->alert->alertResult($alert, $message, $redirect);
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
      $alert = 'success';
      $message = 'Menu Updated!';
      $redirect = 'admin/menu';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }

  public function menuDelete($id)
  {
    $this->db->delete('tbl_user_menu', array('id' => $id));
    $alert = 'warning';
    $message = 'Menu Deleted!';
    $redirect = 'admin/user';
    $this->alert->alertResult($alert, $message, $redirect);
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
      $alert = 'success';
      $message = 'Sub Menu Added!';
      $redirect = 'admin/subMenu';
      $this->alert->alertResult($alert, $message, $redirect);
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
      $alert = 'success';
      $message = 'Sub Menu Updated!';
      $redirect = 'admin/subMenu';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }

  public function subMenuDelete($id)
  {
    $this->db->delete('tbl_user_menu', array('id' => $id));
    $alert = 'warning';
    $message = 'Sub Menu Deleted!';
    $redirect = 'admin/subMenu';
    $this->alert->alertResult($alert, $message, $redirect);
  }
}

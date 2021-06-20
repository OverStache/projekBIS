<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angsuran extends CI_Controller
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
    $data['tbl_user'] = $this->construct->emailSession();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
  }

  public function index()
  {
    $data['angsuran'] = $this->db->get('tbl_angsuran')->result_array();
    $this->load->view('dataKeanggotaan/angsuran/index', $data);
    $this->load->view('templates/footer');
  }

  public function angsuranAdd()
  {
    $data['rekening'] = $this->db->get_where('tbl_rekening', ['status' => 0])->result_array();
    $this->load->view('dataKeanggotaan/angsuran/angsuranAdd', $data);
    $this->load->view('templates/footer');
  }
}

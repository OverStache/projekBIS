<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
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
    $this->load->model('Join_model', 'join');
    $data['rekening'] = $this->join->joinRekeningAnggotaStatus();
    $this->load->view('dataKeanggotaan/rekening/index', $data);
    $this->load->view('templates/footer');
  }

  public function rekeningAdd()
  {
    $data['anggota'] = $this->db->get_where('tbl_anggota', ['is_active' => 1])->result_array();
    $this->load->view('dataKeanggotaan/rekening/rekeningAdd', $data);
    $this->load->view('templates/footer');
  }
}

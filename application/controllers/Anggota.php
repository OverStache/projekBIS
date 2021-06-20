<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
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
    $data['anggota'] = $this->join->joinAnggotaStatus();
    $this->load->view('dataKeanggotaan/anggota/index', $data);
    $this->load->view('templates/footer');
  }

  public function changeActive()
  {
    $id = $this->input->post('id');
    $is_active = $this->input->post('is_active');


    if ($is_active == 0) {
      $insert = 1;
      $message = 'Anggota Activated!';
      $alert = 'success';
    } else {
      $insert = 0;
      $message = 'Anggota Deactivated!';
      $alert = 'danger';
    }
    $this->db->where('idAnggota', $id);
    $this->db->update('tbl_anggota', ['is_active' => $insert]);
    $this->alert->alertResult($alert, $message, null);
  }

  public function anggotaAdd()
  {
    $this->load->view('dataKeanggotaan/anggota/anggotaAdd');
    $this->load->view('templates/footer');
  }
}

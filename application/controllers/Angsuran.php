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
    $data['rekening'] = $this->db->get_where('tbl_rekening', ['status' => 1])->result_array();

    $this->form_validation->set_rules('id_rekening', 'Rekening', 'required');
    $this->form_validation->set_rules('penyetor', 'Penyetor', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('dataKeanggotaan/angsuran/angsuranAdd', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'id_rekening' => $this->input->post('id_rekening'),
        'penyetor' => $this->input->post('penyetor'),
        'jumlah' => $this->input->post('jumlah')
      ];
      $this->db->insert('tbl_angsuran', $data);
      $alert = 'success';
      $message = 'Angsuran Berhasil Ditambahkan!';
      $redirect = 'angsuran';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }

  public function angsuranUpdate($id)
  {
    $data['rekening'] = $this->db->get_where('tbl_rekening', ['status' => 1])->result_array();
    $data['angsuran'] = $this->db->get_where('tbl_angsuran', ['id' => $id])->row_array();

    $this->form_validation->set_rules('id_rekening', 'Rekening', 'required');
    $this->form_validation->set_rules('penyetor', 'Penyetor', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('dataKeanggotaan/angsuran/angsuranUpdate', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'id_rekening' => $this->input->post('id_rekening'),
        'penyetor' => $this->input->post('penyetor'),
        'jumlah' => $this->input->post('jumlah')
      ];
      $this->db->where('id', $id);
      $this->db->insert('tbl_angsuran', $data);
      $alert = 'success';
      $message = 'Angsuran Berhasil Ditambahkan!';
      $redirect = 'angsuran';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }
}

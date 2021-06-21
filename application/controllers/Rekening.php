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

    $this->form_validation->set_rules('id_anggota', 'Anggota', 'required');
    $this->form_validation->set_rules('jangka_waktu', 'Lama Angsuran', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah Pembiayaan', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('dataKeanggotaan/rekening/rekeningAdd', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'id_anggota' => $this->input->post('id_anggota'),
        'jangka_waktu' => $this->input->post('jangka_waktu'),
        'jumlah' => $this->input->post('jumlah')
      ];
      $this->db->insert('tbl_rekening', $data);
      $alert = 'success';
      $message = 'Rekening Berhasil Ditambahkan!';
      $redirect = 'rekening';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }

  public function rekeningUpdate($id)
  {
    $data['anggota'] = $this->db->get_where('tbl_anggota', ['is_active' => 1])->result_array();
    $data['rekening'] = $this->db->get_where('tbl_rekening', ['id' => $id])->row_array();

    $this->form_validation->set_rules('id_anggota', 'Anggota', 'required');
    $this->form_validation->set_rules('jangka_waktu', 'Lama Angsuran', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah Pembiayaan', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('dataKeanggotaan/rekening/rekeningUpdate', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'id_anggota' => $this->input->post('id_anggota'),
        'jangka_waktu' => $this->input->post('jangka_waktu'),
        'jumlah' => $this->input->post('jumlah')
      ];
      $this->db->where('id', $id);
      $this->db->update('tbl_rekening', $data);
      $alert = 'success';
      $message = 'Rekening Berhasil Diupdate!';
      $redirect = 'rekening';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }
}

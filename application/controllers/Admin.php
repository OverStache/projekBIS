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
		$data['userdata'] = $this->construct->getUserdata();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
	}

	public function index()
	{
		// jumlah anggota yang belum di acc
		$data['total_anggota'] = $this->db->where('id_status', 0)->from('tbl_anggota')->count_all_results();
		// jumlah rekening pembiayaan yang belum di acc
		$data['total_rekening'] = $this->db->where('id_status', 0)->from("tbl_rekening_pembiayaan")->count_all_results();

		$this->db->select_sum('debit');
		$this->db->select_sum('kredit');
		$query = $this->db->get('tbl_transaksi')->row();
		$data['total_debit'] = $query->debit;
		$data['total_kredit'] = $query->kredit;

		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}
}

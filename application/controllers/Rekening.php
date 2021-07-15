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
		$this->load->model('Rekening_model', 'rekening');
		$data['title'] = $this->construct->getTitle();
		$data['url'] = $this->construct->getUrl();
		// select * from tbl_user where email = email dari session
		$data['userdata'] = $this->construct->getUserdata();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
	}

	public function index()
	{
		$data['rekening'] = $this->rekening->joinRekeningAnggotaStatus();
		$this->load->view('dataKeanggotaan/rekening/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$data['anggota'] = $this->db->get_where('tbl_anggota', ['id_status' => 1])->result_array();
		$data['userdata'] = $this->construct->getUserdata();

		$this->form_validation->set_rules('id_anggota', 'Anggota', 'required');
		$this->form_validation->set_rules('jaminan', 'Jaminan', 'required');
		$this->form_validation->set_rules('jangka_waktu', 'Lama Angsuran', 'required');
		$this->form_validation->set_rules('%', 'Margin', 'required');
		$this->form_validation->set_rules('perolehan', 'Jumlah Pembiayaan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('dataKeanggotaan/rekening/add', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'tanggal' => date('Y-m-d'),
				'id_anggota' => $this->input->post('id_anggota'),
				'id_user' => $data['userdata']['id'],
				'jangka_waktu' => $this->input->post('jangka_waktu'),
				'%' => $this->input->post('%'),
				'perolehan' => $this->input->post('perolehan'),
				'margin' => $this->input->post('margin'),
				'jumlah' => $this->input->post('jumlah'),
				'jaminan' => $this->input->post('jaminan')
			];
			$this->db->insert('tbl_rekening_pembiayaan', $data);
			$alert = 'success';
			$message = 'Rekening Berhasil Ditambahkan!';
			$redirect = 'rekening';
			$this->alert->alertResult($alert, $message, $redirect);
		}
	}

	public function update($id)
	{
		$data['anggota'] = $this->db->get_where('tbl_anggota', ['id_status' => 1])->result_array();
		$data['userdata'] = $this->construct->getUserdata();

		$this->form_validation->set_rules('jaminan', 'Jaminan', 'required');
		$this->form_validation->set_rules('jangka_waktu', 'Lama Angsuran', 'required');
		$this->form_validation->set_rules('%', 'Margin', 'required');
		$this->form_validation->set_rules('perolehan', 'Jumlah Pembiayaan', 'required');

		if ($this->form_validation->run() == false) {
			$alert = 'danger';
			$message = 'Rekening Gagal Diupdate!';
			$redirect = 'rekening/detail/' . $id;
		} else {
			$data = [
				'tanggal' => date('Y-m-d'),
				'id_user' => $data['userdata']['id'],
				'jangka_waktu' => $this->input->post('jangka_waktu'),
				'%' => $this->input->post('%'),
				'perolehan' => $this->input->post('perolehan'),
				'margin' => $this->input->post('margin'),
				'jumlah' => $this->input->post('jumlah'),
				'jaminan' => $this->input->post('jaminan')
			];
			$this->db->where('id', $id);
			$this->db->update('tbl_rekening_pembiayaan', $data);
			$alert = 'success';
			$message = 'Rekening Berhasil Diupdate!';
			$redirect = 'rekening/detail/' . $id;
		}
		$this->alert->alertResult($alert, $message, $redirect);
	}

	public function detail($id)
	{
		$data['rekening'] = $this->rekening->joinRekeningAnggotaStatusById($id);
		$data['user'] = $this->rekening->joinRekeningUserById($id);
		$data['jadwal'] = $this->rekening->joinStatusAngsuran($id);
		$this->load->view('dataKeanggotaan/rekening/detail', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		// hapus rekening jika status = 0 (Pending)
		$this->db->delete('tbl_rekening_pembiayaan', array('id' => $id, 'status' => 0));

		if ($this->db->affected_rows() > 0) {
			$alert = 'warning';
			$message = 'Rekening Berhasil Dihapus!';
			$redirect = 'rekening';
		} else {
			$alert = 'danger';
			$message = 'Unauthorized!';
			$redirect = 'rekening';
		}
		$this->alert->alertResult($alert, $message, $redirect);
	}

	// fungsi merubah status rekening
	public function changeRekeningStatus()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		switch ($status) {
			case 'Pending':
				$update = 1;
				$message = 'Anggota Activated!';
				$alert = 'success';
				break;
			case 'Active':
				$update = 3;
				$message = 'Rekening Inactive!';
				$alert = 'danger';
				break;
			case 'Inactive':
				$update = 1;
				$message = 'Anggota Activated!';
				$alert = 'success';
				break;
		}
		$this->db->where('id', $id);
		$this->db->update('tbl_rekening_pembiayaan', ['id_status' => $update]);
		$this->alert->alertResult($alert, $message, null);
	}

	public function changeActive()
	{
		$id = $this->input->post('id');
		$id_status = $this->input->post('id_status');

		switch ($id_status) {
			case 0:
				$update = 1;
				$message = 'Anggota Activated!';
				$alert = 'success';
				break;
			case 1:
				$update = 3;
				$message = 'Rekening Inactive!';
				$alert = 'danger';
				break;
			case 3:
				$update = 1;
				$message = 'Anggota Activated!';
				$alert = 'success';
				break;
		}
		$this->db->where('id', $id);
		$this->db->update('tbl_rekening_pembiayaan', ['id_status' => $update]);
		$this->alert->alertResult($alert, $message, null);
	}
}

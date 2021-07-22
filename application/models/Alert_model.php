<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alert_model extends CI_Model
{
	// menampilkan alert
	public function alertResult($alert, $message, $redirect)
	{
		$this->session->set_flashdata('message', '
      <div class="alert alert-' . $alert . ' alert-dismissible fade show" role="alert">
        ' . $message . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>');
		// redirect halaman jika diperlukan
		if ($redirect) {
			redirect('' . $redirect . '');
		}
	}

	// menampilkan alert untuk registrasi
	public function alertRegistration()
	{
		$this->session->set_flashdata('message', '
			<div class="row mt-3">
				<div class="col">
					<div class="alert alert-success alert-dismissible fade show py-auto" role="alert">
						<h4 class="alert-heading">Anggota Berhasil Terdaftar!</h4> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						<hr>
						<p class="mb-0">Silahkan Lanjutkan Pembayaran Simpanan Pokok untuk Aktivasi</p>
					</div>
				</div>
			</div>');
		redirect('auth');
	}
}

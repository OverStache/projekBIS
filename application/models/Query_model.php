<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Query_model extends CI_Model
{
	public function joinSimpananAnggotaStatus()
	{
		$query = "SELECT
                tbl_simpanan.*,
                tbl_anggota.nama,
                tbl_anggota.is_active,
                tbl_status_rekening_jadwal.status AS statusRekening,
                tbl_status_rekening_jadwal.color
              FROM tbl_simpanan
              JOIN tbl_anggota
                ON tbl_simpanan.id_anggota = tbl_anggota.id
              JOIN tbl_status_rekening_jadwal
                ON tbl_simpanan.status = tbl_status_rekening_jadwal.id
					ORDER BY tbl_simpanan.id DESC";
		return $this->db->query($query)->result_array();
	}
	public function joinRekeningAnggotaStatus()
	{
		$query = "SELECT
                tbl_rekening.*,
                tbl_anggota.nama,
                tbl_anggota.is_active,
                tbl_status_rekening_jadwal.status AS statusRekening,
                tbl_status_rekening_jadwal.color
              FROM tbl_rekening
              JOIN tbl_anggota
                ON tbl_rekening.id_anggota = tbl_anggota.id
              JOIN tbl_status_rekening_jadwal
                ON tbl_rekening.status = tbl_status_rekening_jadwal.id
					ORDER BY tbl_rekening.id DESC";
		return $this->db->query($query)->result_array();
	}

	public function joinRekeningAnggotaStatusById($id)
	{
		$query = "SELECT
                tbl_rekening.*,
                tbl_anggota.nama,
                tbl_status_rekening_jadwal.status as statusRekening,
                tbl_status_rekening_jadwal.color
              FROM tbl_rekening
              JOIN tbl_anggota
                ON tbl_rekening.id_anggota = tbl_anggota.id
              JOIN tbl_status_rekening_jadwal
                ON tbl_rekening.status = tbl_status_rekening_jadwal.id
             WHERE tbl_rekening.id = $id";
		return $this->db->query($query)->row_array();
	}

	public function joinAnggotaStatus()
	{
		$query = "SELECT 
                tbl_anggota.id,
                tbl_anggota.nama,
                tbl_anggota.is_active,
                tbl_status_anggota.status
              FROM tbl_anggota
              JOIN tbl_status_anggota
                ON tbl_anggota.status = tbl_status_anggota.id
            ";
		return $this->db->query($query)->result_array();
	}

	public function getJadwalActive($id)
	{
		$query = "SELECT tbl_angsuran.*, tbl_anggota.id, tbl_anggota.nama 
								FROM tbl_angsuran
								JOIN tbl_rekening
                	ON tbl_angsuran.id_rekening = tbl_rekening.id
              	JOIN tbl_anggota
                	ON tbl_rekening.id_anggota = tbl_anggota.id
							 WHERE tbl_angsuran.id_rekening = $id AND tbl_angsuran.status = 1
					  ORDER BY tbl_angsuran.tanggalTagihan LIMIT 1";
		return $this->db->query($query)->row_array();
	}

	public function joinStatusRekeningJadwalNpf($id)
	{
		$query = "SELECT tbl_angsuran.`#`,
										 tbl_angsuran.id_rekening, 
										 tbl_angsuran.tanggalTagihan, 
										 tbl_angsuran.tanggalSetor, 
										 tbl_angsuran.tagihan, 
										 tbl_angsuran.angsuran, 
										 tbl_status_rekening_jadwal.status,
										 tbl_status_rekening_jadwal.color as statusColor,
										 tbl_npf.npf,
										 tbl_npf.color as npfColor
								FROM tbl_angsuran
								JOIN tbl_status_rekening_jadwal
                	ON tbl_angsuran.status = tbl_status_rekening_jadwal.id
              	JOIN tbl_npf
                	ON tbl_angsuran.npf = tbl_npf.id
							 WHERE tbl_angsuran.id_rekening = $id";
		return $this->db->query($query)->result_array();
	}

	public function joinTransaksiAnggota()
	{
		$query = "SELECT tbl_transaksi.*,
										 CONCAT('TR - ', LPAD(tbl_transaksi.id, 4, 0)) as idTransaksi,
										 tbl_anggota.nama
								FROM tbl_transaksi
								JOIN tbl_anggota
									ON tbl_transaksi.id_anggota = tbl_anggota.id";
		return $this->db->query($query)->result_array();
	}

	public function fetch($id_rekening)
	{
		$query = "SELECT * FROM tbl_angsuran 
							 WHERE id_rekening = $id_rekening AND status = 1
						ORDER BY tanggalTagihan LIMIT 1";
		// $output = '';
		$result = $this->db->query($query);
		// foreach ($this->db->query($query)->result() as $row) {
		// $output = '<input type="text" value"' . $result->id . '">';
		// }

		return $result;
	}
}

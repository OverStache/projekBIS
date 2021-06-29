<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Join_model extends CI_Model
{
	public function joinRekeningAnggotaStatus()
	{
		$query = "SELECT
                tbl_rekening.id,
                tbl_rekening.jangka_waktu,
                tbl_rekening.jumlah,
                tbl_rekening.saldo,
                tbl_anggota.nama,
                tbl_status_rekening.status,
                tbl_status_rekening.color
              FROM tbl_rekening
              JOIN tbl_anggota
                ON tbl_rekening.id_anggota = tbl_anggota.idAnggota
              JOIN tbl_status_rekening
                ON tbl_rekening.status = tbl_status_rekening.id
					ORDER BY tbl_rekening.id DESC";
		return $this->db->query($query)->result_array();
	}

	public function joinRekeningAnggotaStatusById($id)
	{
		$query = "SELECT
                tbl_rekening.id,
                tbl_rekening.jangka_waktu,
                tbl_rekening.tanggal,
                tbl_rekening.jumlah,
                tbl_rekening.saldo,
                tbl_anggota.nama,
                tbl_status_rekening.status,
                tbl_status_rekening.color
              FROM tbl_rekening
              JOIN tbl_anggota
                ON tbl_rekening.id_anggota = tbl_anggota.idAnggota
              JOIN tbl_status_rekening
                ON tbl_rekening.status = tbl_status_rekening.id
             WHERE tbl_rekening.id = $id";
		return $this->db->query($query)->row_array();
	}

	public function joinAnggotaStatus()
	{
		$query = "SELECT 
                tbl_anggota.idAnggota,
                tbl_anggota.nama,
                tbl_anggota.is_active,
                tbl_status_anggota.status
              FROM tbl_anggota
              JOIN tbl_status_anggota
                ON tbl_anggota.status = tbl_status_anggota.id
            ";
		return $this->db->query($query)->result_array();
	}
}

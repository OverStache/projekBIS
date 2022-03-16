<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening_model extends CI_Model
{
	// menampilkan semua rekening
	public function joinRekeningAnggotaStatus()
	{
		$query = "SELECT
                tbl_rekening_pembiayaan.*,
                tbl_rekening_pembiayaan.id as id_rekening,
                tbl_anggota.nama,
                tbl_status.*
              FROM tbl_rekening_pembiayaan
              JOIN tbl_anggota
                ON tbl_rekening_pembiayaan.id_anggota = tbl_anggota.id
              JOIN tbl_status
                ON tbl_rekening_pembiayaan.id_status = tbl_status.id
					ORDER BY tbl_rekening_pembiayaan.tanggal DESC";
		return $this->db->query($query)->result_array();
	}

	// menampilkan rekening sesuai id
	// join tabel rekening dengan anggota dan status
	public function joinRekeningAnggotaStatusById($id)
	{
		$query = "SELECT
                tbl_rekening_pembiayaan.*,
								tbl_rekening_pembiayaan.id as id_rekening,
                tbl_anggota.nama,
                tbl_anggota.nomerID,
                tbl_status.*
              FROM tbl_rekening_pembiayaan
              JOIN tbl_anggota
                ON tbl_rekening_pembiayaan.id_anggota = tbl_anggota.id
              JOIN tbl_status
                ON tbl_rekening_pembiayaan.id_status = tbl_status.id
             WHERE tbl_rekening_pembiayaan.id = $id";
		return $this->db->query($query)->row_array();
	}

	// join tabel rekening pembiayaan dengan user
	public function joinRekeningUserById($id)
	{
		$query = "SELECT
                tbl_user.username,
								tbl_user_role.role
              FROM tbl_rekening_pembiayaan
              JOIN tbl_user
                ON tbl_rekening_pembiayaan.id_user = tbl_user.id
              JOIN tbl_user_role
                ON tbl_user.role_id = tbl_user_role.id
             WHERE tbl_rekening_pembiayaan.id = $id";
		return $this->db->query($query)->row_array();
	}

	// join tabel angsuran dengan status
	public function joinStatusAngsuran($id)
	{
		$query = "SELECT tbl_angsuran.*, 
										 tbl_status.*
								FROM tbl_angsuran
								JOIN tbl_status
                	ON tbl_angsuran.id_status = tbl_status.id
							 WHERE tbl_angsuran.id_rekening = $id";
		return $this->db->query($query)->result_array();
	}
	// end of menampilkan rekening sesuai id

	public function printByDate()
	{
		$query = "SELECT
										tbl_rekening_pembiayaan.*,
										tbl_rekening_pembiayaan.id as id_rekening,
										tbl_anggota.nama,
										tbl_status.*
									FROM tbl_rekening_pembiayaan
									JOIN tbl_anggota
										ON tbl_rekening_pembiayaan.id_anggota = tbl_anggota.id
									JOIN tbl_status
										ON tbl_rekening_pembiayaan.id_status = tbl_status.id
							WHERE MONTH(tanggal) = MONTH(NOW())
							ORDER BY tbl_rekening_pembiayaan.tanggal DESC";
		return $this->db->query($query)->result_array();
	}

	public function printByDateById($id)
	{
		$query = "SELECT
								tbl_rekening_pembiayaan.*,
								tbl_rekening_pembiayaan.id as id_rekening,
								tbl_anggota.nama,
								tbl_anggota.nomerID,
								tbl_status.*
							FROM tbl_rekening_pembiayaan
							JOIN tbl_anggota
								ON tbl_rekening_pembiayaan.id_anggota = tbl_anggota.id
							JOIN tbl_status
								ON tbl_rekening_pembiayaan.id_status = tbl_status.id
						WHERE tbl_rekening_pembiayaan.id = $id";
		return $this->db->query($query)->row_array();
	}
}

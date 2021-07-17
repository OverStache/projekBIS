<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan_model extends CI_Model
{
	public function joinSimpananAnggotaStatus()
	{
		$query = "SELECT
                tbl_rekening_simpanan.*,								
                tbl_rekening_simpanan.id as id_simpanan,								
                tbl_anggota.nama,
                tbl_status.*,
								tbl_jenis_transaksi.jenis
              FROM tbl_rekening_simpanan
              JOIN tbl_anggota
                ON tbl_rekening_simpanan.id_anggota = tbl_anggota.id
              JOIN tbl_status
                ON tbl_rekening_simpanan.id_status = tbl_status.id
							JOIN tbl_jenis_transaksi
								ON tbl_rekening_simpanan.id_jenis = tbl_jenis_transaksi.id
					ORDER BY tbl_rekening_simpanan.id DESC";
		return $this->db->query($query)->result_array();
	}

	public function joinSimpananAnggotaStatusById($id)
	{
		$query = "SELECT
                tbl_rekening_simpanan.*,
								tbl_rekening_simpanan.id as id_simpanan,
                tbl_anggota.id as id_anggota,
                tbl_anggota.nama,
                tbl_status.*,
								tbl_jenis_transaksi.jenis
              FROM tbl_rekening_simpanan
              JOIN tbl_anggota
                ON tbl_rekening_simpanan.id_anggota = tbl_anggota.id
              JOIN tbl_status
                ON tbl_rekening_simpanan.id_status = tbl_status.id
							JOIN tbl_jenis_transaksi
								ON tbl_rekening_simpanan.id_jenis = tbl_jenis_transaksi.id
					   WHERE tbl_rekening_simpanan.id = $id";
		return $this->db->query($query)->row_array();
	}
}

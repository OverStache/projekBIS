<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
	public function joinAnggotaStatus()
	{
		$query = "SELECT 
								tbl_anggota.*,
								tbl_anggota.id as id_anggota,
								tbl_status.*
							FROM tbl_anggota
							JOIN tbl_status
								ON tbl_anggota.id_status = tbl_status.id
					ORDER BY tbl_anggota.id DESC
						";
		return $this->db->query($query)->result_array();
	}

	public function joinAnggotaJenisStatusbyId($id)
	{
		$query = "SELECT 
                tbl_anggota.*,
								tbl_anggota.id as id_anggota,
								tbl_jenis_anggota.jenis,
								tbl_status.*
              FROM tbl_anggota
              JOIN tbl_jenis_anggota
                ON tbl_anggota.id_jenis_anggota = tbl_jenis_anggota.id
							JOIN tbl_status
								ON tbl_anggota.id_status = tbl_status.id
						 WHERE tbl_anggota.id = $id
            ";
		return $this->db->query($query)->row_array();
	}
}

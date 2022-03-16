<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	// menampilkan semua transaksi beserta anggota
	public function joinTransaksiAnggota()
	{
		$query = "SELECT tbl_transaksi.*,
										 LPAD(tbl_transaksi.id_rekening, 6, 0) as idRek,
										 tbl_anggota.nama,
										 tbl_jenis_transaksi.jenis 
								FROM tbl_transaksi
								JOIN tbl_anggota
									ON tbl_transaksi.id_anggota = tbl_anggota.id
								JOIN tbl_jenis_transaksi
									ON tbl_transaksi.id_jenis = tbl_jenis_transaksi.id
						ORDER BY tbl_transaksi.tanggal DESC";
		return $this->db->query($query)->result_array();
	}

	// menampilkan semua rekening pembiayaan untuk ajax dropdown
	public function fetchAllRek()
	{
		$query = "SELECT tbl_rekening_pembiayaan.*,
										 tbl_anggota.nama
								FROM tbl_rekening_pembiayaan
							 	JOIN tbl_anggota
								  ON tbl_rekening_pembiayaan.id_anggota = tbl_anggota.id
							 WHERE tbl_rekening_pembiayaan.id_status = 1";
		$output = '<option value="">Pilih Rekening</option>';
		$result = $this->db->query($query);
		foreach ($result->result() as $row) {
			$output .= '<option value="' . $row->id . '">' . $row->id .  $row->id_anggota . ' - ' . $row->nama . '</option>';
		}
		return $output;
	}

	// menampilkan semua rekening simpanan untuk ajax dropdown
	public function fetchAllSim()
	{
		$query = "SELECT tbl_rekening_simpanan.*,
										 tbl_anggota.nama 
								FROM tbl_rekening_simpanan
								JOIN tbl_anggota
								  ON tbl_rekening_simpanan.id_anggota = tbl_anggota.id
							 WHERE tbl_rekening_simpanan.id_jenis = 4";
		$output = '<option value="">Pilih Anggota</option>';
		$result = $this->db->query($query);
		foreach ($result->result() as $row) {
			$output .= '<option value="' . $row->id . '">' . $row->nama . ' - ' . $row->id_anggota . '</option>';
		}
		return $output;
	}

	// menampilkan data rekening pembiayaan per id untuk ajax
	public function fetchRek($id_rekening)
	{
		$query = "SELECT tbl_angsuran.*,
										 tbl_anggota.nama,
										 tbl_anggota.id as id_anggota
							  FROM tbl_angsuran 
								JOIN tbl_rekening_pembiayaan
								  ON tbl_angsuran.id_rekening = tbl_rekening_pembiayaan.id
								JOIN tbl_anggota
									ON tbl_rekening_pembiayaan.id_anggota = tbl_anggota.id
							 WHERE tbl_angsuran.id_rekening = $id_rekening AND tbl_angsuran.id_status = 1
						ORDER BY tbl_angsuran.tanggalTagihan LIMIT 1";
		return $this->db->query($query);
	}

	// menampilkan data rekening simpanan per id untuk ajax
	public function fetchSim($id_rekening)
	{
		$query = "SELECT tbl_rekening_simpanan.*
								FROM tbl_rekening_simpanan
							 WHERE tbl_rekening_simpanan.id_jenis = 4 AND tbl_rekening_simpanan.id = $id_rekening";
		return $this->db->query($query);
	}

	public function printByDate()
	{
		$query = "SELECT tbl_transaksi.*,
										 LPAD(tbl_transaksi.id_rekening, 6, 0) as idRek,
										 tbl_anggota.nama,
										 tbl_jenis_transaksi.jenis 
								FROM tbl_transaksi
								JOIN tbl_anggota
									ON tbl_transaksi.id_anggota = tbl_anggota.id
								JOIN tbl_jenis_transaksi
									ON tbl_transaksi.id_jenis = tbl_jenis_transaksi.id
							 WHERE MONTH(tanggal) = MONTH(NOW())
						ORDER BY tbl_transaksi.tanggal DESC";
		return $this->db->query($query)->result_array();
	}

	public function printByDateById($id)
	{
		$query = "SELECT tbl_transaksi.*,
										 LPAD(tbl_transaksi.id_rekening, 6, 0) as idRek,
										 tbl_anggota.nama,
										 tbl_jenis_transaksi.jenis 
								FROM tbl_transaksi
								JOIN tbl_anggota
									ON tbl_transaksi.id_anggota = tbl_anggota.id
								JOIN tbl_jenis_transaksi
									ON tbl_transaksi.id_jenis = tbl_jenis_transaksi.id
							 WHERE tbl_transaksi.id = $id";
		return $this->db->query($query)->row_array();
	}
}

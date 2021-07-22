<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Construct_model extends CI_Model
{
	// fungsi mengambil title dari sebauh halaman
	public function getTitle()
	{
		return $this->db->get_where('tbl_user_sub_menu', ['urlSubMenu' => $this->uri->segment(1)])->row_array();
	}

	// fungsi mengambil userdata menggunakan username dari session
	public function getUserdata()
	{
		$username = $this->session->userdata('username');
		$query = "SELECT tbl_user.*, tbl_user_role.role
							  FROM tbl_user
								JOIN tbl_user_role
									ON tbl_user.role_id = tbl_user_role.id
							 WHERE tbl_user.username = '$username'";
		return $this->db->query($query)->row_array();
	}
}

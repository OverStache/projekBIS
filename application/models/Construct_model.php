<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Construct_model extends CI_Model
{
	public function getTitle()
	{
		// if ($this->uri->segment(2)) {
		//   $uri = $this->uri->segment(2);
		//   return $this->db->get_where('tbl_user_crud_menu', ['url' => $uri])->row_array();
		// } else {
		$uri = $this->uri->segment(1);
		return $this->db->get_where('tbl_user_sub_menu', ['urlSubMenu' => $uri])->row_array();
		// }
	}

	public function getUrl()
	{
		return $this->db->get_where('tbl_user_sub_menu', ['urlSubMenu' => $this->uri->segment(1)])->row_array();
	}

	public function getUserdata()
	{
		$email = $this->session->userdata('email');
		$query = "SELECT tbl_user.*, tbl_user_role.role
							  FROM tbl_user
								JOIN tbl_user_role
									ON tbl_user.role_id = tbl_user_role.id
							 WHERE tbl_user.email = '$email'";
		return $this->db->query($query)->row_array();
	}
}

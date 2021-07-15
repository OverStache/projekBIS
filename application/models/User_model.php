<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function getUserRoleStatus()
	{
		$query = " SELECT tbl_user.*, 
											tbl_user.id as id_user,
										 	tbl_user_role.role,
											tbl_status.*
              	 FROM tbl_user 
								 JOIN tbl_user_role
              		 ON tbl_user.role_id = tbl_user_role.id
								 JOIN tbl_status
									 ON tbl_user.id_status = tbl_status.id
              	WHERE tbl_user_role.id != 1
            ";
		return $this->db->query($query)->result_array();
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function getUserRole()
  {
    $query = "SELECT `tbl_user`.*, `tbl_user_role`.`role`
              FROM `tbl_user` JOIN `tbl_user_role`
              ON `tbl_user`.`role_id` = `tbl_user_role`.`id`
              WHERE `tbl_user_role`.`id` != 1
            ";
    return $this->db->query($query)->result_array();
  }
}

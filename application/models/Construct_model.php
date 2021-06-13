<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Construct_model extends CI_Model
{
  public function getTitle()
  {
    $uri1 = $this->uri->segment(1);
    $uri2 = $this->uri->segment(2);
    $url = $uri1 . '/' . $uri2;
    if ($this->uri->segment(2)) {
      return $this->db->get_where('tbl_user_sub_menu', ['url' => $url])->row_array();
    } else {
      return $this->db->get_where('tbl_user_sub_menu', ['url' => $uri1])->row_array();
    }
  }

  public function emailSession()
  {
    return $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
  }
}

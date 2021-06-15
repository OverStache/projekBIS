<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Image_model extends CI_Model
{
  public function uploadImage($data)
  {

    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '2048';
    $config['upload_path'] = './assets/img/profile/';

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {

      $old_image = $data['tbl_user']['image'];

      if ($old_image != 'default.png') {
        unlink(FCPATH . 'assets/img/profile/' . $old_image);
      }

      $new_image = $this->upload->data('file_name');
      return $this->db->set('image', $new_image);
    }
  }
}

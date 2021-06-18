<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alert_model extends CI_Model
{
  public function alertResult($alert, $message, $redirect)
  {
    $this->session->set_flashdata('message', '
      <div class="alert alert-' . $alert . ' alert-dismissible fade show" role="alert">
        ' . $message . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    if ($redirect) {
      redirect('' . $redirect . '');
    }
  }
}

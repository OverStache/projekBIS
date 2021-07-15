<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Mypdf
{
  protected $ci;

  public function __construct()
  {
    $this->ci = get_instance();
  }

  public function print($view, $data = array())
  {
    // $data['rekening'] = $this->db->get_where('tbl_rekening_pembiayaan', ['status' => 1])->result_array();
    // $data['angsuran'] = $this->db->get_where('tbl_angsuran', ['id' => $id])->row_array();
    // echo $html;
    // die();
    $html = $this->ci->load->view($view, $data, true);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf(['isRemoteEnabled' => true]);
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A6', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('result.pdf', array('Attachment' => false));
  }
}

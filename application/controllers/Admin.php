<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();

    $this->load->model('Construct_model', 'construct');
    $this->load->model('Alert_model', 'alert');
    $data['title'] = $this->construct->getTitle();
    $data['url'] = $this->construct->getUrl();
    // select * from tbl_user where email = email dari session
    $data['tbl_user'] = $this->construct->emailSession();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
  }

  public function index()
  {
    $data['total_pengawas'] = $this->db->where('role_id', 3)->from("tbl_user")->count_all_results();
    $data['total_member'] = $this->db->where('role_id', 2)->from("tbl_user")->count_all_results();
    $data['total_pengurus'] = $this->db->where('role_id', 1)->from("tbl_user")->count_all_results();
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function print()
  {
    // include autoloader
    require_once 'dompdf/autoload.inc.php';

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->loadHtml('tes');

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A6', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('result.pdf', array('Attachment' => false));
  }
}

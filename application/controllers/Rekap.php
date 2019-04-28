<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller{
 
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('Rekap_models');
     is_loggedin();
     is_admin();
  }
  
  function index()
  {
    $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array(); 
  	$data['judul']     = "Halaman Rekap Data";
    $data['rekap']     = $this->Rekap_models->getAllrekap();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/aside',$data);
    $this->load->view('rekap/index',$data);
    $this->load->view('templates/footer');
  }
  
}
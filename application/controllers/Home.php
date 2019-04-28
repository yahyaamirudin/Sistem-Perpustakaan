<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('Home_models');
    is_loggedin();
    is_admin();
    //Codeigniter : Write Less Do More
  }
  
  function index()
  {
    $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
    $data['judul']   = "Halaman Index";
    $data['nim']     = $this->Home_models->jumlahnim();
    $data['buku']    = $this->Home_models->jumlahbuku();
    $data['pinjam']  = $this->Home_models->jumlahpinjam();
    $data['kembali'] = $this->Home_models->jumlahkembali();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/aside',$data);
    $this->load->view('home/home',$data);
    $this->load->view('templates/footer');
}


}
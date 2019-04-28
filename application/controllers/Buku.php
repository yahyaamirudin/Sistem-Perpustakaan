<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
    $this->load->model('Buku_models');
    $this->load->library('form_validation');
     is_loggedin();
     is_admin();
    //Codeigniter : Write Less Do More
  }

  public function cetak_buku()
  {
    $data['buku']= $this->Buku_models->getAllBuku();
    $this->load->view('buku/cetak', $data);
  }

  function index()
  {
    $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
    $data['judul'] = "Data Buku";
    $data['buku']= $this->Buku_models->getAllBuku();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/aside',$data);
    $this->load->view('buku/index');
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
    $data['judul'] = "Tambah data";
    $this->load->view('templates/header',$data);
    $this->load->view('templates/aside',$data);
    $this->load->view('buku/tambah');
    $this->load->view('templates/footer');
  }

  public function save(){
    $data          = array('success'=>false,'messages'=>array());
    $this->form_validation->set_rules('judul','Judul','trim|required|alpha_numeric_spaces');
    $this->form_validation->set_rules('pengarang','Pengarang','required|alpha');
    $this->form_validation->set_rules('penerbit','Penerbit','required|alpha_numeric');
    $this->form_validation->set_rules('isbn','ISBN','required|max_length[12]|alpha_numeric');
    $this->form_validation->set_rules('tahun','Tahun','required|max_length[4]|numeric');
    $this->form_validation->set_rules('jumlah','Jumlah','required|numeric');
    $this->form_validation->set_rules('tanggal','Tanggal','required');
    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
    if ($this->form_validation->run()) {
      $data['success']=true;
      $this->Buku_models->tambahbuku();
    }else{
     $data['success']=false;
     foreach ($_POST as $key => $value) {
      $data['messages'][$key] = form_error($key);
    }
  } 
  echo json_encode($data);
}


public function ubah($id){
 $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
 $data['judul']    = "Ubah Data";
 $data['buku']     = $this->Buku_models->getBukuById($id);
 $this->form_validation->set_rules('judul','Judul','required');
 $this->form_validation->set_rules('pengarang','Pengarang','required');
 $this->form_validation->set_rules('penerbit','Penerbit','required');
 $this->form_validation->set_rules('isbn','ISBN','required|max_length[12]');
 if ($this->form_validation->run()==FALSE) {
  $this->load->view('templates/header',$data);
  $this->load->view('templates/aside',$data);
  $this->load->view('buku/ubah');
  $this->load->view('templates/footer');
}else{
  $this->Buku_models->updatebuku();
  $result = $this->db->affected_rows();
  if($result > 0):
    echo "<script>
    alert('data berhasil di ubah');
    window.location.href='".base_url().'buku'."';
    </script>";
  else:
    echo "<script>
    alert('data gagal di ubah');
    window.location.href='".base_url().'buku'."';
    </script>";
  endif;
}
}

public function hapus($id){
  $this->Buku_models->hapusdata($id);
  redirect('buku');
}
}

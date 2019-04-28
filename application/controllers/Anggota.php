<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Anggota_models');
    $this->load->library('form_validation', 'Pdf');
    $this->load->helper(array('form', 'url'));

    // $this->load->library('pdf');
    is_loggedin();
    is_admin();
    // include_once APPPATH . '/third_party/fpdf/fpdf.php';
    //Codeigniter : Write Less Do More
  }

  public function cetak_anggota()
  {
    $data['anggota'] = $this->Anggota_models->getAllAnggota();
    $this->load->view('anggota/cetak', $data);
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['judul'] = "Data Anggota";
    $data['anggota'] = $this->Anggota_models->getAllAnggota();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/aside', $data);
    $this->load->view('anggota/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['judul'] = "Tambah data";
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/aside', $data);
    $this->load->view('anggota/tambah', $data);
    $this->load->view('templates/footer');
  }

  public function save()
  {
    //$data          = array('success'=>false,'messages'=>array());
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('nim', 'NIM', 'required|numeric|min_length[12]|is_unique[tb_anggota.nim]');
    $this->form_validation->set_rules('tempat', 'Tempat', 'required|alpha');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('prodi', 'Prodi', 'required');
    if ($this->form_validation->run()) {
      // $data['success']=true;
      $this->Anggota_models->tambahanggota();
      echo "<script>
      alert('data berhasil di tambah');
      window.location.href='" . base_url() . 'anggota' . "';
      </script>";
    } else {
      $data['judul'] = "Tambah data";
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/aside', $data);
      $this->load->view('anggota/tambah', $data);
      $this->load->view('templates/footer');
    }
  }

  public function ubah($nim)
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['judul']    = "Ubah Data";
    $data['anggota']  = $this->Anggota_models->getAnggotaByNim($nim);
    $data['jurusan']  = ['Teknik informatika', 'Sistem informasi', 'Multimedia', 'Keamanan jaringan', 'Game design', 'Android developer'];
    $data['kelamin']  = ['L', 'P'];

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('nim', 'NIM', 'required|numeric|max_length[12]');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/aside', $data);
      $this->load->view('anggota/ubah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Anggota_models->updateDataAnggota();
      $result = $this->db->affected_rows();
      if ($result > 0) :
        echo "<script>
        alert('data berhasil di ubah');
        window.location.href='" . base_url() . 'anggota' . "';
        </script>";
      else :
        echo "<script>
        alert('data gagal di ubah');
        window.location.href='" . base_url() . 'anggota' . "';
        </script>";
      endif;
    }
  }

  public function hapus($nim)
  {
    $this->Anggota_models->hapusdata($nim);
  }

  public function getubah()
  {
    $this->Anggota_models->getAnggotaByNim($_POST['nim']);
  }

  public function cetak()
  {
    $this->load->model('Cetak_models');
    $a = $this->db->get('tb_anggota');
    $data['tampil']   = $a->result();

    $namaFile         = "cetak";
    $this->Cetak_models->cetakpdf("cetak", $data, $namaFile);
  }

  function pdf()
  {
    $this->load->helper('pdf_helper');
    $data = $this->Anggota_models->getAllAnggota();
    $this->load->view('pdfreport', $data);
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_models');
		$this->load->model('Buku_models');
		$this->load->model('Anggota_models');
		$this->load->library('form_validation');
		 is_loggedin();
		 is_admin();
    //Codeigniter : Write Less Do More
	}

	function index()
	{
		$data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
		$data['judul'] 	= "Halaman transaksi";
		$data['buku']	= $this->Buku_models->getAllBuku();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/aside',$data);
		$this->load->view('transaksi/index');
		$this->load->view('templates/footer');
	}

	public function pinjamindex($id){
		$data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();	
		$data['autoid'] 	= $this->Transaksi_models->autoNumber();
		$data['buku']		= $this->Buku_models->getBukuById($id);
		$data['anggota']	= $this->Anggota_models->getAllAnggota();
		$data['tglpinjam']  = date('Y-m-d');
		$data['tglkembali'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tglpinjam'])));
		$data['judul'] 		= 'Tambah Transaksi';
		// if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header',$data);
		$this->load->view('templates/aside',$data);
		$this->load->view('transaksi/tambah');
		$this->load->view('templates/footer');
	}

	public function simpan(){
		$data1 = [
			"id_transaksi" 	=> $this->input->post('idtransaksi'),
			"id_buku"		=> $this->input->post('idbuku'),
			"judul"			=> $this->input->post('judul'),
			"nim" 			=> $this->input->post('nim'),
			"nama"			=> $this->input->post('nama'),
			"tgl_pinjam"	=> $this->input->post('tglpinjam'),
			"tgl_kembali"	=> $this->input->post('tglkembali'),
			"status"		=> "di pinjam",
			"perpanjang" 	=> "0"
		];
		$idb 				= $this->input->post('idbuku');
		$id 				= $this->input->post('nim');
		$query 				= $this->db->query("SELECT jumlah_buku FROM tb_buku	WHERE id = '$idb'")->result_array();
		$query2 			= $this->db->where('nim',$id)->from("tb_transaksi")->count_all_results();
		foreach ($query as $sisa)
			$sisa 	= $sisa['jumlah_buku'];
		$sisa 	= $sisa-1;
		if($sisa < 0):
			echo "<script>
			window.alert('stok buku habis');
			window.location.href='".base_url().'transaksi'."';
			</script>";
		else:
			if($query2 < 3):
				$this->Transaksi_models->tambahTransaksi($data1);

				$this->Transaksi_models->ubahjumlah($idb);

				$result = $this->db->affected_rows();
				if($result > 0):
					echo "<script>
					alert('data berhasil di tambah');
					window.location.href='".base_url().'transaksi'."';
					</script>";
				else:
					echo "<script>
					alert('data gagal di tambah');
					window.location.href='".base_url().'transaksi'."';
					</script>";
				endif;
			else:
				echo "<script>
					alert('nim yang bersangkutan telah melakukan 3 kali transaksi');
					window.location.href='".base_url().'transaksi'."';
					</script>";
			endif;
		endif;
		}

	// public function cek(){
	// 	$this->load->view('transaksi/cek');
	// }
		public function cari(){
			$nim 	= $this->input->get('nim');
			$cari 	= $this->Anggota_models->getAnggotaByNim($nim);
			echo json_encode($cari);
		}
	}

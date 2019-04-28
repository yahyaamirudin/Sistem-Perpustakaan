<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kembali extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kembali_models');
		//$this->load->model('Buku_models');
		//$this->load->model('Anggota_models');
		$this->load->library('form_validation');
		 is_loggedin();
		 is_admin();
    //Codeigniter : Write Less Do More
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();	
		$data['judul'] 		= "Tabel Data Peminjaman";
		$data['transaksi']	= $this->Kembali_models->getAllTrans();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/aside',$data);
		$this->load->view('kembali/index',$data);
		$this->load->view('templates/footer');
	}
	public function terlambat($dateline2,$tglkembali){
		$datelinevalues    = explode("-", $dateline2);
		$datelinevalues    = $datelinevalues[2]."-".$datelinevalues[1]."-".$datelinevalues[0];

		$tglkembalivalues  = explode("-",$tglkembali);
		$tglkembalivalues  = $tglkembalivalues[2]."-".$tglkembalivalues[1]."-".$tglkembalivalues[0];

		$selesih           = strtotime($tglkembalivalues)- strtotime($datelinevalues);
		$selesih           =$selesih/86400;

		if ($selesih>=1) {
			$hasil_tgl  = floor($selesih);
		}else{
			$hasil_tgl  = 0;
		}
		return $hasil_tgl;
	}

	public function perpanjang($id_transaksi,$tgl_kembali,$lambat){
		if($lambat>0):

			echo "<script>
			alert('pinjaman tidak dapat di perpanjang karena telah lebih dari 7 hari. silahkan buku dikembalikan dahulu kemudian pinjam lagi');	
			</script>";

		else:
			$batas				= $this->db->query("SELECT perpanjang FROM tb_transaksi WHERE id_transaksi= '$id_transaksi'")->result_array(); 				
			// print_r($batas);
			// exit();
			if($batas[0]['perpanjang']>=3):
				echo "<script>
				alert('maksimal perpanjang 3 kali');
				window.location.href='".base_url().'kembali'."';
				</script>";
				// header('location:'.base_url().'/kembali');
			else:
				$perpanjang 		= $this->db->query("SELECT perpanjang FROM tb_transaksi WHERE id_transaksi = '$id_transaksi'")->row_array();
				$tgl_kembalivals 	= explode("-", $tgl_kembali);
				$next 				= mktime(0,0,0,$tgl_kembalivals[1],$tgl_kembalivals[2]+7,$tgl_kembalivals[0]);
				$hari 				= date("Y-m-d",$next);
				$set 				= "tgl_kembali ='".$hari."',perpanjang=perpanjang+1";
				$this->Kembali_models->ubah($set,$id_transaksi);
				$result = $this->db->affected_rows();
			// print_r($this->db->last_query());
			// echo $result;
			// exit();

				if($result > 0):
					echo "<script>
					alert('perpanjang berhasil');
					window.location.href='".base_url().'kembali'."';
					</script>";
				else:
					echo "<script>
					alert('perpanjang gagal');
					window.location.href='".base_url().'kembali'."';
					</script>";
				endif;
			// redirect('kembali');
			endif;
		endif;
	}

	public function kembali($id_transaksi,$id_buku,$nim,$nama,$tgl_kembali,$denda){
		$back = $this->Kembali_models->bukukembali($id_transaksi,$id_buku,$nim,$nama,$tgl_kembali,$denda);
		
		if($denda>0):
			$this->db->query("INSERT INTO `tb_pengembalian`(`id_transaksi`, `kode_buku`, `nim`, `nama`, `tanggal_kembali`, `status_denda`, `nominal`) VALUES('$id_transaksi','$id_buku','$nim','$nama','$tgl_kembali','denda','$denda')");
			// print_r($this->db->last_query());
			// exit();
		else:
			$this->db->query("INSERT INTO `tb_pengembalian`(`id_transaksi`, `kode_buku`, `nim`, `nama`, `tanggal_kembali`, `status_denda`, `nominal`)VALUES('$id_transaksi','$id_buku','$nim','$nama','$tgl_kembali','bebas denda','$denda')");
			// print_r($this->db->last_query());
			// exit();
		endif;
		redirect('kembali');
	}
}

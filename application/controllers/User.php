<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Anggota_models');
		$this->load->model('User_models');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		is_loggedin();
		is_user();
		//Codeigniter : Write Less Do More
	}

	public function index()
	{
		$a 					= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$b = $a['id'];
		$data['user'] 		= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['bio'] 		= $this->db->get_where('tb_anggota', ['nim' => $b])->row_array();
		$data['judul']		= 'Halaman User';
		$data['transaksi']	= $this->User_models->getTransaksi($b);
		$data['jurusan']  = ['Teknik informatika', 'Sistem informasi', 'Multimedia', 'Keamanan jaringan', 'Game design', 'Android developer'];
		$data['kelamin']  = ['L', 'P'];

		//$data['anggota']	= $this->User_models->getdata();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside2', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}
	public function save()
	{
		//$data          = array('success'=>false,'messages'=>array());
		$data['user'] 		= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul']		= 'Halaman User';
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nim', 'NIM', 'required|numeric|min_length[12]|is_unique[tb_anggota.nim]');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required|alpha');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('prodi', 'Prodi', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/aside2', $data);
			$this->load->view('user/index', $data);
			$this->load->view('templates/footer');
		} else {
			$this->User_models->tambahanggota();
			$result = $this->db->affected_rows();
			if ($result > 0) :
				echo "<script>
				alert('data berhasil di tambah');
				window.location.href='" . base_url() . 'user' . "';
				</script>";
			else :
				echo "<script>
				alert('data gagal di tambah');
				window.location.href='" . base_url() . 'user' . "';
				</script>";
			endif;
		}
	}

	public function terlambat($dateline2, $tglkembali)
	{
		$datelinevalues    = explode("-", $dateline2);
		$datelinevalues    = $datelinevalues[2] . "-" . $datelinevalues[1] . "-" . $datelinevalues[0];

		$tglkembalivalues  = explode("-", $tglkembali);
		$tglkembalivalues  = $tglkembalivalues[2] . "-" . $tglkembalivalues[1] . "-" . $tglkembalivalues[0];

		$selesih           = strtotime($tglkembalivalues) - strtotime($datelinevalues);
		$selesih           = $selesih / 86400;

		if ($selesih >= 1) {
			$hasil_tgl  = floor($selesih);
		} else {
			$hasil_tgl  = 0;
		}
		return $hasil_tgl;
	}

	public function perpanjang($id_transaksi, $tgl_kembali, $lambat)
	{
		if ($lambat > 0) :

			echo "<script>
			alert('pinjaman tidak dapat di perpanjang karena telah lebih dari 7 hari. silahkan buku dikembalikan dahulu kemudian pinjam lagi');	
			</script>";

		else :
			$batas				= $this->db->query("SELECT perpanjang FROM tb_transaksi WHERE id_transaksi= '$id_transaksi'")->result_array();
			// print_r($batas);
			// exit();
			if ($batas[0]['perpanjang'] >= 3) :
				echo "<script>
				alert('maksimal perpanjang 3 kali');
				window.location.href='" . base_url() . 'user' . "';
				</script>";
			// header('location:'.base_url().'/kembali');
			else :
				$perpanjang 		= $this->db->query("SELECT perpanjang FROM tb_transaksi WHERE id_transaksi = '$id_transaksi'")->row_array();
				$tgl_kembalivals 	= explode("-", $tgl_kembali);
				$next 				= mktime(0, 0, 0, $tgl_kembalivals[1], $tgl_kembalivals[2] + 7, $tgl_kembalivals[0]);
				$hari 				= date("Y-m-d", $next);
				$set 				= "tgl_kembali ='" . $hari . "',perpanjang=perpanjang+1";
				$this->User_models->ubah($set, $id_transaksi);
				$result = $this->db->affected_rows();
				// print_r($this->db->last_query());
				// echo $result;
				// exit();

				if ($result > 0) :
					echo "<script>
					alert('perpanjang berhasil');
					window.location.href='" . base_url() . 'user' . "';
					</script>";
				else :
					echo "<script>
					alert('perpanjang gagal');
					window.location.href='" . base_url() . 'user' . "';
					</script>";
				endif;
			// redirect('kembali');
			endif;
		endif;
	}

	public function ubahuser()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required', 'is_unique[user.username]', ['required' => 'fullname required', 'is_unique' => 'username already exist']);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|matches[password2]', ['min_length' => 'password too short', 'matches' => 'password dont match']);
		$this->form_validation->set_rules('password2', 'Password2', 'required|matches[password]');

		if ($this->form_validation->run() == false) :
			echo "<script>
				alert('update failed');
				window.location.href='" . base_url() . 'user' . "';
				</script>";
		else :
			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			];
			$this->db->where('username', $this->session->userdata('username'));
			$this->db->update('user', $data);
			$result = $this->db->affected_rows();
			if ($result > 0) :
				echo "<script>
				alert('update success');
				window.location.href='" . base_url() . 'auth' . "';
				</script>";
			else :
				echo "<script>
				alert('failed');
				window.location.href='" . base_url() . 'user' . "';
				</script>";
			endif;
		endif;
	}
	public function getupdate()
	{
		echo json_encode($this->db->get_where('tb_anggota', ['nim' => $_POST['id']])->row_array());
	}

	public function ubahdata()
	{
		// $data['user'] 		= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		// $data['anggota']  	= $this->Anggota_models->getAnggotaByNim($id);
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nim', 'NIM', 'required|numeric|min_length[12]');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required|alpha');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('prodi', 'Prodi', 'required');
		if ($this->form_validation->run() == false) {
			echo "<script>
					alert('data gagal di ubah');
					window.location.href='" . base_url() . 'user' . "';
					</script>";
		} else {
			$this->User_models->updatedata();

			$result = $this->db->affected_rows();
			if ($result > 0) :
				echo "<script>
					alert('data berhasil di ubah');
					window.location.href='" . base_url() . 'user' . "';
					</script>";
			else :
				echo "<script>
					alert('data gagal di ubah');
					window.location.href='" . base_url() . 'user' . "';
					</script>";
			endif;
		}
	}
}

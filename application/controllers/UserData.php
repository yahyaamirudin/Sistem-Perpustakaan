<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataUser_models');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		is_loggedin();
		is_admin();
//Codeigniter : Write Less Do More
	}

	public function index()
	{
		$data['user'] 			= $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
		$data['userdata']		= $this->DataUser_models->getAll();
		$data['judul'] = 'Data User';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/aside',$data);
		$this->load->view('userdata/index',$data);
		$this->load->view('templates/footer');
	}

	public function tambah(){
		$data['user'] 		= $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
		$data['judul'] = 'Tambah Data User';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/aside',$data);
		$this->load->view('userdata/tambah');
		$this->load->view('templates/footer');		

	}

	public function save(){
    //$data          = array('success'=>false,'messages'=>array());
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('username','Username','trim|required','is_unique[user.username]',['required'=>'fullname required','is_unique'=>'username already exist']);
		$this->form_validation->set_rules('id','Id','required|numeric|min_length[12]|is_unique[user.id]',['required'=>'nim required','numeric'=>'nim only numeric','min_length'=>'nim only 12 characters','is_unique'=>'id must be unique']);
		$this->form_validation->set_rules('password','Password','required|min_length[3]|matches[password2]',['min_length'=>'password too short,min 3 characters','matches'=>'password dont match']);
		$this->form_validation->set_rules('password2','Password2','required|matches[password]');
		if ($this->form_validation->run()==false) {
			$data['user'] 		= $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
			$data['judul'] = 'Tambah Data User';
			$this->load->view('templates/header',$data);
			$this->load->view('templates/aside',$data);
			$this->load->view('userdata/tambah');
			$this->load->view('templates/footer');		
		}else{
			$this->DataUser_models->tambahuser();
			echo "<script>
			alert('data berhasil di tambah');
			window.location.href='".base_url().'UserData'."';
			</script>";
   		// print_r($this->db->last_query());
   		// die();
		}
	}

	public function update($id){

		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('username','Username','trim|required',['required'=>'fullname required','is_unique'=>'username already exist']);
		$this->form_validation->set_rules('id','Id','required|numeric|min_length[12]',['required'=>'nim required','numeric'=>'nim only numeric','min_length'=>'nim only 12 characters']);
		$this->form_validation->set_rules('password','Password','required|min_length[3]|matches[password2]',['min_length'=>'password too short,min 3 characters','matches'=>'password dont match']);
		$this->form_validation->set_rules('password2','Password2','required|matches[password]');

		if ($this->form_validation->run()==false) {
			$data['user'] 		= $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
			$data['judul'] 		= 'Update Data User';
			$data['anggota']  	= $this->DataUser_models->getUserById($id);
			$data['role']		= ['1','2'];
			$this->load->view('templates/header',$data);
			$this->load->view('templates/aside',$data);
			$this->load->view('userdata/ubah',$data);
			$this->load->view('templates/footer');		
		}else{
			$this->DataUser_models->updateuser();
			echo "<script>
			alert('data berhasil di ubah');
			window.location.href='".base_url().'UserData'."';
			</script>";
   		// print_r($this->db->last_query());
   		// die();
		}		
	
	}

	public function hapus($nim){
		$this->db->delete('user',array('id'=>$nim));
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) :
			$this->load->view('auth/login');
		else :
			$user 	= $this->input->post('username');
			$pass 	= $this->input->post('password');

			$query 	= $this->db->get_where('user', ['username' => $user])->row_array();
			if ($query) :
				if (password_verify($pass, $query['password'])) :
					$data = [
						'username'	=> $query['username'],
						'role'		=> $query['role']
					];

					$this->session->set_userdata($data);
					if ($query['role'] == 1) :
						redirect('home');
					else :
						redirect('user');
					endif;
				else :
					echo "<script>
					alert('wrong password')
					window.location.href='" . base_url() . 'auth/index' . "';
					</script>";
				endif;
			else :
				echo "<script>
				alert('username is not registered')
				window.location.href='" . base_url() . 'auth/index' . "';
				</script>";
			endif;
		endif;
	}

	public function registration()
	{
		$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required', ['required' => 'fullname required']);
		$this->form_validation->set_rules('username', 'Username', 'trim|required', 'is_unique[user.username]', ['required' => 'fullname required', 'is_unique' => 'username already exist']);
		$this->form_validation->set_rules('id', 'Id', 'required|numeric|min_length[12]|is_unique[user.id]', ['required' => 'nim required', 'numeric' => 'nim only numeric', 'min_length' => 'nim only 12 characters', 'is_unique' => 'id must be unique']);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|matches[password2]', ['min_length' => 'password too short', 'matches' => 'password dont match']);
		$this->form_validation->set_rules('password2', 'Password2', 'required|matches[password]');
		if ($this->form_validation->run() == false) :
			$this->load->view('auth/registration');
		else :
			$data = [
				'id' => htmlspecialchars($this->input->post('id', true)),
				'nama' => htmlspecialchars($this->input->post('fullname', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role' => '2',
				'date_created' => date('Y-m-d H:i:s')
			];

			$this->db->insert('user', $data);
			// print_r($this->db->last_query());
			$result = $this->db->affected_rows();
			if ($result > 0) :
				echo "<script>
				alert('registrasi success');
				window.location.href='" . base_url() . 'auth/index' . "';
				</script>";
			else :
				echo "<script>
				alert('registration failed');
				window.location.href='" . base_url() . 'auth/registration' . "';
				</script>";
			// print_r($this->db->last_query());
			// echo($result);
			endif;
		endif;
	}


	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
		echo "<script>
		alert('you have been logged out');
		window.location.href='" . base_url() . 'auth/index' . "';
		</script>";
	}

	public function block()
	{
		echo "acces block";
	}
}

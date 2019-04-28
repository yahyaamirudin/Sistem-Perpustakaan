<?php
class DataUser_models extends CI_model
{
	public function getAll()
	{
		return $this->db->get('user')->result_array();
	}
	public function getUserById($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row_array();
	}
	public function tambahuser()
	{
		$data = [
			"id" 			=> $this->input->post('id', true),
			"nama"			=> $this->input->post('nama', true),
			"username"		=> $this->input->post('username', true),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			"role" 			=> $this->input->post('role', true),
			"date_created" 	=> date('Y-m-d H:i:s')
		];

		$this->db->insert('user', $data);
	}

	public function updateuser()
	{
		$data = [
			"id" 			=> $this->input->post('id', true),
			"nama"			=> $this->input->post('nama', true),
			"username"		=> $this->input->post('username', true),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			"role" 			=> $this->input->post('role', true),
			"date_created" 	=> time()
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user', $data);
	}
}

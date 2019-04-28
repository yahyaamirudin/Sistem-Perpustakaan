<?php
class User_models extends CI_model
{


	public function getTransaksi($b)
	{
		return $this->db->get_where('tb_transaksi', ['nim' => $b])->result_array();
	}
	public function tambahanggota()
	{
		$data = [
			"nim" 			=> $this->input->post('nim', true),
			"nama" 			=> $this->input->post('nama', true),
			"tempat_lahir" 	=> $this->input->post('tempat', true),
			"tgl_lahir" 	=> $this->input->post('tanggal', true),
			"jk" 			=> $this->input->post('jk', true),
			"prodi" 		=> $this->input->post('prodi', true),
			"gambar"		=> $this->do_upload()
		];

		$this->db->insert('tb_anggota', $data);
	}

	public function updatedata()
	{
		$data = [
			"nim" 			=> $this->input->post('nim', true),
			"nama" 			=> $this->input->post('nama', true),
			"tempat_lahir" 	=> $this->input->post('tempat', true),
			"tgl_lahir" 	=> $this->input->post('tanggal', true),
			"jk" 			=> $this->input->post('jk', true),
			"prodi" 		=> $this->input->post('prodi', true),
			"gambar"		=> $this->do_upload()
		];

		$this->db->where('nim', $this->input->post('nim'));
		$this->db->update('tb_anggota', $data);
	}

	private function do_upload()
	{
		$config['upload_path']          = './upload/product/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = 'default';
		$config['overwrite']			= true;
		$config['max_size']             = 1024;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		} else {
			$error = $this->upload->display_errors();
			// menampilkan pesan error
			print_r($error);
		}
	}

	public function ubah($set, $id_transaksi)
	{
		$this->db->query("UPDATE `tb_transaksi` SET " . $set . " WHERE `id_transaksi` = '$id_transaksi'");
	}
}

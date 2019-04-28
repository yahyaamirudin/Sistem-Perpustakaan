<?php 
class Anggota_models extends CI_model{
	public function getAllAnggota(){

		return $this->db->get('tb_anggota')->result_array();
	}

	public function getAnggotaByNim($nim){
		return $this->db->get_where('tb_anggota',['nim'=>$nim])->row_array();
	}

	public function tambahanggota(){
		$data = [
			"nim" 			=> $this->input->post('nim',true),
			"nama" 			=> $this->input->post('nama',true),
			"tempat_lahir" 	=> $this->input->post('tempat',true),
			"tgl_lahir" 	=> $this->input->post('tanggal',true),
			"jk" 			=> $this->input->post('jk',true),
			"prodi" 		=> $this->input->post('prodi',true),
			"gambar"		=> $this->do_upload()
		];

		$this->db->insert('tb_anggota', $data);
	}

	public function hapusdata($nim){
		$this->db->delete('tb_anggota',array('nim'=>$nim));
	}

	public function updateDataAnggota(){
		$data= [
			"nim" 			=> $this->input->post('nim',true),
			"nama" 			=> $this->input->post('nama',true),
			"tempat_lahir" 	=> $this->input->post('tempat',true),
			"tgl_lahir" 	=> $this->input->post('tanggal',true),
			"jk" 			=> $this->input->post('jk',true),
			"prodi" 		=> $this->input->post('prodi',true),
		];
		$this->db->where('nim',$this->input->post('nim'));
		$this->db->update('tb_anggota',$data);
	}

	private function do_upload(){
		$config['upload_path']          = './upload/product/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = 'default';
		$config['overwrite']			= true;
		$config['max_size']             = 1024;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}else{
			$error = $this->upload->display_errors();
            // menampilkan pesan error
			print_r($error);
		}
	}


	// public function getById(){
	// 	return $this->db->get_where('anggota',['nim' => $nim])->row_array();
	// }


}
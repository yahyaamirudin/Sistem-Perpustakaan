<?php 
class Buku_models extends CI_model{
	public function getAllBuku(){
		return $this->db->get('tb_buku')->result_array();
	}

	public function getBukuById($id){
		return $this->db->get_where('tb_buku',['id'=>$id])->row_array();
	}


	public function tambahbuku(){
		$data = [
			"judul" 		=> $this->input->post('judul',true),
			"pengarang"		=> $this->input->post('pengarang',true),
			"penerbit"		=> $this->input->post('penerbit',true),
			"isbn" 			=> $this->input->post('isbn',true),
			"jumlah_buku" 	=> $this->input->post('jumlah',true),
			"tahun_terbit"	=> $this->input->post('tahun',true),
			"tgl_input"		=> $this->input->post('tanggal',true)
		];

		$this->db->insert('tb_buku', $data);
	}

	public function hapusdata($id){
		$this->db->delete('tb_buku',array('id'=>$id));	
	}

	public function updatebuku(){
		$data = [
			"judul" 		=> $this->input->post('judul',true),
			"pengarang"		=> $this->input->post('pengarang',true),
			"penerbit"		=> $this->input->post('penerbit',true),
			"isbn" 			=> $this->input->post('isbn',true),
			"jumlah_buku" 	=> $this->input->post('jumlah',true),
			"tahun_terbit"	=> $this->input->post('tahun',true),
			"tgl_input"		=> $this->input->post('tanggal',true)
		];
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tb_buku',$data);
	}
}
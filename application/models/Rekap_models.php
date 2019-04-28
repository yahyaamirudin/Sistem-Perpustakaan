<?php
class Rekap_models extends CI_model{
	public function getAllrekap(){
		return $this->db->get('tb_pengembalian')->result_array();
	}
}
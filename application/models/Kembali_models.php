<?php
class Kembali_models extends CI_model{
	public $table = 'tb_transaksi'; 
	public function getAllTrans(){
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function ubah($set,$id_transaksi){
		$this->db->query("UPDATE `tb_transaksi` SET ".$set." WHERE `id_transaksi` = '$id_transaksi'");
	}

	public function bukukembali($id_transaksi,$id_buku){
		$this->db->query("UPDATE `tb_buku` SET `jumlah_buku`=(jumlah_buku+1) WHERE id = '$id_buku'");
		$this->db->query("DELETE FROM tb_transaksi WHERE id_transaksi = '$id_transaksi'");

	}
}
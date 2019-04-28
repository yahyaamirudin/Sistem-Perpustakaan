<?php
class Transaksi_models extends CI_model{
	public $table = 'tb_transaksi'; 
	public function getAllTrans(){
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function autoNumber(){
		$today = date('Ymd');

        $data = $this->db->query("SELECT MAX(id_transaksi) AS last FROM $this->table ")->row_array();

        $lastNoFaktur = $data['last'];
        
        $lastNoUrut   = substr($lastNoFaktur,8,3);
        
        $nextNoUrut   = $lastNoUrut+1;
        
        $nextNoTransaksi = $today.sprintf('%03s',$nextNoUrut);
        
        return $nextNoTransaksi;
	}

	public function tambahTransaksi($data1){
		$this->db->insert('tb_transaksi', $data1);
	}
	
	// public function jumlahbuku($idb){
	// 	$this->db->query("SELECT * FROM tb_buku WHERE id = $idb")->row_array();
	// }

	public function ubahjumlah($idb){
		$this->db->query("UPDATE `tb_buku` SET `jumlah_buku` = (jumlah_buku-1) WHERE `id` = '$idb'");
	}

}
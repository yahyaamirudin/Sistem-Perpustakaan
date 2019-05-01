<?php
class Home_models extends CI_model
{
	public function jumlahnim()
	{
		$query =  $this->db->query("SELECT nim FROM tb_anggota");
		return $query;
	}

	public function jumlahbuku()
	{
		$query =  $this->db->query("SELECT id FROM tb_buku");
		return $query;
	}

	public function jumlahpinjam()
	{
		$query =  $this->db->query("SELECT id_transaksi FROM tb_transaksi");
		return $query;
	}

	public function jumlahkembali()
	{
		$query =  $this->db->query("SELECT id_transaksi FROM tb_pengembalian");
		return $query;
	}
}

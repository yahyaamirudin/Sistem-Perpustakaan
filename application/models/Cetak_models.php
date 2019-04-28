<?php  
class Cetak_models extends CI_model{
	public function cetakpdf(){
		$this->load->library('pdf');
	}
}
<?php

class Fungsi{
	protected $ci;
	function __construct(){

		$ci=get_instance();
	}

	function user_login(){

		$this->ci->load->model('DataUser_models');
		$user_id = $this->ci->session->userdata('id');
		$user_data = $this->ci->DataUser_models->get($user_id)->row();
		return $user_data;
	}
}
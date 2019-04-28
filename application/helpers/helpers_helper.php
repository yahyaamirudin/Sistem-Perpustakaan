<?php
function is_loggedin(){
	$ci=get_instance();
	if(!$ci->session->userdata('username')):
		redirect('auth');
	else:
		$role=$ci->session->userdata('role');
		$menu=$ci->uri->segment(1);
		
	endif;
	}

function getUserData()
{
	$ci=get_instance();
	$Userdata= $this->session->userdata();
	return $Userdata;
}

function is_admin(){
	$ci=get_instance();
	 if($ci->session->userdata('role')!= 1){
      redirect('auth/index');
	}
}

function is_user(){
	$ci=get_instance();
	 if($ci->session->userdata('role')!= 2){
      redirect('auth/index');
	}
}
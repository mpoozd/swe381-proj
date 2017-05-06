<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	
function varify_user(){
		$CI = &get_instance();
		
		$user_id = $CI->session->userdata('user_id');
		$session_id = $CI->session->userdata("login_session");
	
		if($user_id == '')	{
			redirect(base_url().'login');
		} else {
			$res = $CI->model->select_where("*","users",array("user_id" => $user_id));
			if($res->num_rows() == 0){
				redirect(base_url().'login/logout');
			}
			
		}
	}
	
	?>
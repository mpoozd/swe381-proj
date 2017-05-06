<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	
	
	public function index()
	{
		varify_user();
		
		$select = $this->db->query("SELECT * FROM posts");	

				$res['posts'] = $select;
				
		$data['content'] = $this->load->view('profile',$res,true);
		$this->load->view('profile',$data);
	}
}

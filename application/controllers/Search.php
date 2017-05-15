<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
   function __construct() {
        parent::__construct();

    } 
	
	
	public function index()
	{
		//varify_user();
		
		//$select = $this->db->query("SELECT * FROM posts");	

				//$res['posts'] = $select;
				
		//$data['content'] = $this->load->view('profile',$res,true);
		$this->load->view('searchfriend');
	}
	
	function search($q=""){
		$search = $this->model->select_like('*','users' , $q);
		$res['search'] = $search;
		
		if($search == false){
					$res['search'] = false;
					$data['content'] = $this->load->view('searchfriend',$res,true);
					$this->load->view('searchfriend',$data);
		}

		
		else{
		$data['content'] = $this->load->view('searchfriend',$res,true);
		$this->load->view('searchfriend',$data);
		}
	}
	
	function send_invite($user_id ="" , $friend_id=""){
		//varify_user();
		
		$insert['user_id'] = $user_id;
		$insert['firend_id'] = $friend_id;
		$insert['status'] = 0;

		$this->model->insert_array("requests" , $insert);
		

		$this->session->set_flashdata('success_message', "The request has been sent successfully.");

		
		redirect('search','refresh');
	}
}

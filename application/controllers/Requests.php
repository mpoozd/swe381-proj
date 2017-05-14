<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends CI_Controller {

	
	
	public function index()
	{
		varify_user();
		
		$requests = $this->model->select_where('*','requests',array('user_id'=>$this->session->userdata("user_id")));
		$res['requests'] = $requests;

				
		$data['content'] = $this->load->view('requests',$res,true);
		$this->load->view('requests',$data);
	}
	
	
	function change_status($friend_id ="" , $status=""){
		//varify_user();
				
		$update['status'] = $status;

		$this->model->update_where(array('friend_id' => $friend_id) , "requests" , $update);
		
		if($status == 1)
		$this->session->set_flashdata('success_message', "Friend status has been accepted successfully.");
		
		else
		$this->session->set_flashdata('success_message', "Friend status has been denied.");
		
		redirect('requests','refresh');
	}
	
	
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends CI_Controller {

	
	
	public function index()
	{
		varify_user();
		$user_id = $this->session->userdata("user_id");
		$requests = $this->db->query("SELECT DISTINCT requests.user_id , users.user_name , requests.request_id,  users.user_email FROM (`requests`) 
					JOIN `users` ON `requests`.`firend_id` = `users`.`user_id` 
					WHERE `requests`.`user_id` = $user_id AND 'status' = 0
					group by user_id , firend_id" );
	
		$res['requests'] = $requests;

				
		$data['content'] = $this->load->view('requests',$res,true);
		$this->load->view('requests',$data);
	}
	
	
	function change_status($request_id ="" , $status=""){
		//varify_user();
				
		$update['status'] = $status;

		$this->model->update_where(array('request_id' =>  $request_id) , "requests" , $update);
		
		if($status == 1)
		$this->session->set_flashdata('success_message', "Friend status has been accepted successfully.");
		
		else
		$this->session->set_flashdata('success_message', "Friend status has been denied.");
		
		redirect('requests','refresh');
	}
	
	
}

?>
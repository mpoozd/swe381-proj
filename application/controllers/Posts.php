<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	
	
	public function index()
	{
				$this->form_validation->set_rules('post_text', 'Posttext', 'trim|required|');
				if ($this->form_validation->run() === false) {


				$select = $this->db->query("SELECT * FROM posts");	

				$res['posts'] = $select;
				
				$data['content'] = $this->load->view('posts',$res,true);
				$this->load->view('posts',$data);	

			} 
	}
	
	
	function new_post(){
		
		$post_text 	= $this->input->post("po");
		if($post_text != ''){
		$insert['user_id'] = $this->session->userdata('user_id');
		$insert['post_text'] = $post_text;
		$insert['add_date'] = date();
		$this->model->insert_array('posts' , $insert);
		}
	}
	
	
}

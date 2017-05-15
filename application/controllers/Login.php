<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
   function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }    
	
	public function index()
	{
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');

		$this->form_validation->set_rules('passsword', 'password', 'trim|required');



        	if ($this->form_validation->run() === false) {

				$data['content'] = $this->load->view('login','',true);

				$this->load->view('login',$data);	



			} else {
			
			}
	}
	
	
public function login (){
				$form = $this->input->post();
   				$user = $this->model->login($form['email'], $form['password']);


				if($user != false){
					$session_id = $this->session->userdata('session_id');

					$this->session->set_userdata("user_email" , $user[0]->user_email);

					$this->session->set_userdata("user_id" , $user[0]->user_id);
					$this->session->set_userdata("age" , $user[0]->age);					
					$this->session->set_userdata("user_name" , $user[0]->user_name);					
					$this->session->set_userdata("avatar" , $user[0]->profilephoto);					
					$this->session->set_userdata("login_session" , $session_id);
										
					redirect('profile' , 'refresh');
										

				} else {
					
					$this->session->set_flashdata('error_message', 'the email or password is wrong');
										redirect('login' , 'refresh');

				}				
	

	}
	
	
	function logout(){		

		$this->session->unset_userdata("user_email");

		$this->session->unset_userdata("user_id");

		$this->session->unset_userdata("user_type");
		
		$this->session->unset_userdata("login_session");

		redirect(base_url().'/login' , 'refresh');

	}
	

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
   function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }    

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|');

		$this->form_validation->set_rules('email', 'email', 'trim|required|');

		$this->form_validation->set_rules('password', 'Password', 'trim|required|');
		
		$this->form_validation->set_rules('gender', 'gender', 'trim|required|');
		
		$this->form_validation->set_rules('birth_date', 'birth_date', 'trim|required|');
		
		$this->form_validation->set_rules('workplace', 'workplace', 'trim|required|');
						
		if ($this->form_validation->run() === false) {

				$data['content'] = $this->load->view('signup','',true);

				$this->load->view('signup',$data);	

			} 
		
	}
	
	public function register(){
				

						if ($_FILES['user_avatar']['name'] != '') {

					
                    $fname = time() . '_' . basename($_FILES['user_avatar']['name']);
                    $fname = str_replace(" ", "_", $fname);
                    $fname = str_replace("%", "_", $fname);
                    $name_ext = end(explode(".", basename($_FILES['user_avatar']['name'])));
                    $name = str_replace('.' . $name_ext, '', basename($_FILES['user_avatar']['name']));
                    $uploaddir = PATH_DIR . "uploads/";
                    $uploadfile = $uploaddir . $fname;
				
				$allowedExtsImage = array("gif", "jfif", "jpe", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG" ,"JPE" , "JFIF");
				$extension = end(explode(".", $fname));
				
					if(in_array($extension, $allowedExtsImage)){
						if (move_uploaded_file($_FILES['user_avatar']['tmp_name'], $uploadfile)) {
							$source_image_path = PATH_DIR . 'uploads/';
							$source_image_name = $fname;
							
							$insert['profilephoto'] = $fname;
												}
					}
                }
				
		$email = $this->input->post("email");
		$is_regisered = $this->model->select_where("user_email" , "users" , array("user_email" => $email ));
		
		if($is_regisered->num_rows() == 0){
				
				$insert['user_name'] 	 = $this->input->post("username");

				$insert['user_email'] 	 = $this->input->post("email");
				
				$insert['password']      = $this->input->post("password");

				$insert['age']	         = $this->input->post("birth_date");
				
				$insert['gender'] = $this->input->post("gender");
				
				$insert['workplace'] = $this->input->post("workplace");
				


				$this->model->insert_array('users' , $insert);
			
			
					$this->session->set_flashdata('success_message', 'Thank you , you are successfully registered');
					redirect('signup','refresh');
		}
		else
					$this->session->set_flashdata('error_message', 'the user already registered');
					redirect('signup','refresh');
			}
	
	
	function debug_to_console($data) {
    if(is_array($data) || is_object($data))
	{
		echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
	} else {
		echo("<script>console.log('PHP: ".$data."');</script>");
	}
	}
}

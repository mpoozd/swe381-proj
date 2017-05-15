<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
   function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }   
	
	
	public function index()
	{
		varify_user();
				$this->form_validation->set_rules('post_text', 'post_text', 'trim|required|');
		        	if ($this->form_validation->run() === false) {		
		$select = $this->db->query("SELECT * FROM posts");	

				$res['posts'] = $select;
				
		$data['content'] = $this->load->view('profile',$res,true);
		$this->load->view('profile',$data);
					}
	}



	function new_post(){

		$post_text 	= $this->input->post("post_text");
		$file = $this->input->post("myfile");
		$filepath = $this->upload_file();
		
		if($post_text != ''){
		$insert['user_id'] = $this->session->userdata('user_id');
		$insert['post_text'] = $post_text;
		$insert['photo'] = $filepath;
		$this->model->insert_array('posts' , $insert);
		$this->session->set_flashdata('success_message', 'Thank you, post successfully sent');		
		redirect('profile' , 'refresh');

		}
		else{
					$this->session->set_flashdata('error_message', 'oops! post cannot send!');
					redirect('profile' , 'refresh');
		}
		
	}
	
	function upload_file()
{
   if ($_FILES['myfile']['name'] != '') {

					
                    $fname = time() . '_' . basename($_FILES['myfile']['name']);
                    $fname = str_replace(" ", "_", $fname);
                    $fname = str_replace("%", "_", $fname);
                    $name_ext = end((explode(".", basename($_FILES['myfile']['name']))));
                    $name = str_replace('.' . $name_ext, '', basename($_FILES['myfile']['name']));
                    $uploaddir = PATH_DIR . "uploads/";
                    $uploadfile = $uploaddir . $fname;
				
				$allowedExtsImage = array("gif", "jfif", "jpe", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG" ,"JPE" , "JFIF");
				$extension = end((explode(".", $fname)));
				
					if(in_array($extension, $allowedExtsImage)){
						if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile)) {
							$source_image_path = PATH_DIR . 'uploads/';
							$source_image_name = $fname;
							
							$filepath = $fname;
                                                        return $filepath;
												}
					}
                }
}



}

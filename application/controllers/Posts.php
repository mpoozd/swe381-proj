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
		$file = $this->input->post("myfile");
		$this->upload_file();
		
		if($post_text != ''){
		$insert['user_id'] = $this->session->userdata('user_id');
		$insert['post_text'] = $post_text;
		$insert['add_date'] = date();
		$this->model->insert_array('posts' , $insert);
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

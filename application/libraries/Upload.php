<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('signup', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = '/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('filename'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('signup', $error);
                }
                else
                {
                        //$data = array('upload_data' => $this->upload->data());
						
						return $this->upload->data('file_name'); 

                }
        }
}
?>
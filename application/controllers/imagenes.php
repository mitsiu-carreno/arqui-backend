<?php

class Imagenes extends CI_Controller {
    
    function index(){
//        $this->load->library('encrypt');
        $this->load->view("header");
        $this->load->view("clients/banner");
        $this->load->view("footer");
//        $key = $this->encrypt->encode("id:2");
//        echo substr($key, 0,-2);
    }
    
    function subir_banner(){
        	$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'png';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
    }
    
}
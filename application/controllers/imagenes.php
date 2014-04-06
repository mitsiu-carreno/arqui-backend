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
    
    function form_banner($idcliente){
        $data = array("idcliente"=>$idcliente);
        $this->load->view("header");
        $this->load->view("clients/banner",$data);
        $this->load->view("footer");
    }
    
    function subir_banner($idcliente){
        	$config['upload_path'] = './banners/';
		$config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $idcliente;
                $config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			echo json_encode($error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
                        $config2['image_library'] = 'ImageMagick';
                        $config2['library_path']='/usr/bin';
                        $config2['source_image']="./banners/" . $data["upload_data"]["file_name"];
                        $config2['new_image']='./banners/' . $idcliente . ".png";
                        $this->load->library('image_lib',$config2);
			echo json_encode($data);
		}
    }
    
}
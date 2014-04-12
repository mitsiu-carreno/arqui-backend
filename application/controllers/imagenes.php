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
    
    function get_banner($idclient){
        $filename= "./banners/" . $idclient . ".png";
        $filename = (file_exists($filename)) ? $filename : "./img/demo.png";
            header('Content-Length: '.filesize($filename)); //<-- sends filesize header
            header('Content-Type: image/png'); //<-- send mime-type header
            header('Content-Disposition: inline; filename="'.$filename.'";'); //<-- sends filename header
            readfile($filename); //<--reads and outputs the file onto the output buffer
            die(); //<--cleanup
            exit; //and exit
                
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
                        $config2['library_path'] = '/usr/bin';
                        $config2['source_image']=$data["upload_data"]["full_path"];
                        $config2['new_image']=$data["upload_data"]["file_path"] . $idcliente . ".png";
                        $this->load->library('image_lib',$config2);
                        $this->image_lib->resize();
                        $data["config"] = $config2;
                        $data["upload_data"]["src_uri"] = site_url(array("imagenes","get_banner",$idcliente));
			echo json_encode($data);
		}
    }
    
}
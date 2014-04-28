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
    
    function get_banner($idclient, $name = "nada"){
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
    
    function galeria($idsubmenu){
        $data = array("idsubmenu" => $idsubmenu);
        $this->load->view("header");
        $this->load->view("galeria", $data);
        $this->load->view("footer"); 
    }
    
    function subir_galeria($idsubmenu){
//        
//        $this->load->model("submenu_model");
//        $idcliente = $this->submenu_model->getClientID($idsubmenu);
        	$config['upload_path'] = './galeria/' . $idsubmenu .'/';
		$config['allowed_types'] = 'gif|jpg|png';
                $this->load->model("galeria_model");
//                var_dump($this->input->post());
                $galeria = $this->galeria_model->insert($idsubmenu,  $this->input->post("titulo"));
                $config['file_name'] = $galeria["id"];
                $config['overwrite'] = TRUE;
                
                if(!file_exists($config['upload_path']))
                    mkdir($config['upload_path'], 0775);

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
                        $config2['new_image']=$data["upload_data"]["file_path"] . $galeria["id"] . ".png";
                        $config2['create_thumb'] = TRUE;
                        $this->load->library('image_lib',$config2);
                        $this->image_lib->resize();
                        $data["config"] = $config2;
			echo json_encode($data);
		}
    }
    
    function galeria_files($idsubmenu){
    	$this->load->model("galeria_model");
        $archivos = $this->galeria_model->get($idsubmenu);
        
        echo json_encode(array("archivos"=>$archivos));
    }
    
}

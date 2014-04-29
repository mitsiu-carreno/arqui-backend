<?php

class Videos extends CI_Controller {
    
    function get($idsubmenu = 23){
        $data = array("idsubmenu" => $idsubmenu);
        $this->load->view("header");
        $this->load->view("videos", $data);
        $this->load->view("footer"); 
    }
    
    function subir($idsubmenu){
        error_reporting(E_ALL | E_STRICT);
        $this->load->library('UploadHandler');
        $upload_handler = new UploadHandler();
    }
    
}

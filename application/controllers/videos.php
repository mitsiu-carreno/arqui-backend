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
    
    function unzip($idsubmenu){
        $this->rrmdir("./videos/" . $idsubmenu);
        $this->load->library('unzip');
        $this->unzip->extract("./videos/" . $this->input->post("file"), "./videos/" . $idsubmenu);
        $this->unzip->close();
        $this->insert($submenuid);
    }
    
    function rrmdir($dir) {
        foreach(glob($dir . '/*') as $file) {
            if(is_dir($file))
                rrmdir($file);
            else
                unlink($file);
        }
        rmdir($dir);
    }
    
    function insert($submenuid){
        $this->load->model("submenu_model");
        $this->submenu_model->update($submenuid,"video",  $this->input->post("url"));
    }
    
    function editor($idsubmenu){
        $this->load->model("submenu_model");
        
        $data = $this->submenu_model->getSubmenu($idsubmenu);
        $data["idsubmenu"] = $idsubmenu;
        $this->load->view("submenu/editor_video",$data);
    }
    
    function set_html($idsubmenu){
        $this->load->model("submenu_model");
        $this->submenu_model->update($idsubmenu, "video_html", $this->input->post("contenido"));
    }
}

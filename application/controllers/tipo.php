<?php

class Tipo extends CI_Controller {
    
    function get($idmenu){
        $this->load->model("menu_model");
        //$data = $this->menu_model->getTipo($idmenu);
        $data = $this->menu_model->get(null, $idmenu);
        //echo json_encode(array("tipo" => $data["tipo"]));
//        var_dump($data["0"]["ownSubmenu"]);
        if($data["0"]["tipo"]==0){
            //submenu
//            var_dump($data["0"]);
            $this->load->view("recursos/submenus", $data["0"]);
             var_dump($data["0"]);
        }else{
            //html
            $this->load->view("header");
            $this->load->view("recursos/editor", $data["0"]);
           
        }
    }
//    
//    function get_first($idcliente){
//        $this->load->model("menu_model");
//        $data = $this->menu_model->getFirst($idcliente);
//        echo json_encode(array("tipo" => $data["tipo"]));
//    }
//            
    function set($idmenu){
        $this->load->model("menu_model");
        $data =$this->menu_model->updateTipo($idmenu, $this->input->post("tipo"));
        echo json_encode(array($data));
    }
    
}
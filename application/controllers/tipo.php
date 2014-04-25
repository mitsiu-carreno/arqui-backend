<?php

class Tipo extends CI_Controller {
    
    function get($idmenu){
        $this->load->model("menu_model");
        //$data = $this->menu_model->getTipo($idmenu);
        //$data["0"]["ownSubmenu"]=null;
        //var_dump($data);
        $data = $this->menu_model->get(null, $idmenu);
        //echo json_encode(array("tipo" => $data["tipo"]));
//        var_dump($data["0"]["ownSubmenu"]);
        if($data["0"]["tipo"]==0){
            //submenu
            //var_dump($data["0"]);
           
            if (array_key_exists('ownSubmenu', $data["0"])) {
                //$this->load->view("recursos/submenus", $data["0"]);
                echo json_encode($data["0"]["ownSubmenu"]);
            } 
            else{
            echo json_encode("vacio");
            }
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
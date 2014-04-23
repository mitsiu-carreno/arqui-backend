<?php

class Submenu extends CI_Controller {
    
    function get($idmenu){
        $this->load->model("menu_model");
        $data = $this->menu_model->getTipo($idmenu);
        var_dump($data["client_id"]);
        //echo json_encode(array("tipo" => $data["tipo"]));
        if($data["tipo"] == 0){
            //Cargar el submenu
            switch($data["submenu"]){
                case 1:
                    $this->video($idmenu);
                    break;
                case 2:
                    $this->galeria($data["client_id"],$idmenu);
                    break;
                default :
                    $this->video($idmenu);
            }
        } else {
            //Cargar lo de solo html
        }
    }
    
    function video($idmenu){
        $this->load->model("menu_model");
        $data = $this->menu_model->getTipo($idmenu);
        $this->load->view("submenu/botonera", array("submenu" => 1));
        $this->load->view("submenu/video", $data);
    }
    
    function galeria($idcliente,$idmenu){
        $data = array("idcliente"=>$idcliente, "idmenu" => $idmenu);
        $this->load->view("galeria", $data);
        
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
    
    function update($field,$idmenu){
        $this->load->model("menu_model");
        $data =$this->menu_model->update($idmenu, $field, $this->input->post("video_url"));
        echo json_encode($data);
    }
    
}
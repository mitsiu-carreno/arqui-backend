<?php

class Submenu extends CI_Controller {
   
//    IR A TIPO/GET($idmenu);
//    function get($idmenu){
//        $this->load->model("menu_model");
//        $data = $this->menu_model->getTipo($idmenu);
//        var_dump($data);
//        //echo json_encode(array("tipo" => $data["tipo"]));
//        if($data["tipo"] == 0){
//            //Cargar el submenu
//            switch($data["submenu"]){
//                case 1:
//                    $this->video($idmenu);
//                    break;
//                case 2:
//                    $this->galeria($data["client_id"],$idmenu);
//                    break;
//                default :
//                    $this->video($idmenu);
//            }
//        } else {
//            //Cargar lo de solo html
//        }
//    }
    function get($idsubmenu){
        $this->load->model("submenu_model");
        $data = $this->submenu_model->getSubmenu($idsubmenu);
        //var_dump($data);
        $this->load->view("submenu/botonera", array("submenu" => $data["tipo"]));
        switch($data["tipo"]){
            //tipo: 1 -> video indice, 2->video html, 3 -> Galeria, 4->html
            case 1:
                echo 'case 1';
                $data = $this->submenu_model->getIndice($idsubmenu);
                $data["videosubmenu"] = 1;
                //var_dump($data);
                $this->load->view("submenu/video", $data);
                //echo json_encode($indices);
                break;
            case 2:
                
                $data["videosubmenu"] = 2;
                $this->load->view("submenu/video", $data);
                echo json_encode($data["video_html"]);
                break;
            case 3:
                $data = array("idsubmenu" => $idsubmenu);
                $this->load->view("galeria", $data);
                break;
            case 4:
                echo json_encode($data["html"]);
                break;
            default:
                //$this->video();
                echo "default";
        }
        
    }
    
    function video($idmenu){
        $this->load->model("menu_model");
        $data = $this->menu_model->getTipo($idmenu);
        $this->load->view("submenu/botonera", array("submenu" => 1));
        $this->load->view("submenu/video", $data);
    }
 
    function galeria($idsubmenu){
        $data = array("idsubmenu" => $idsubmenu);
        $this->load->view("header");
        $this->load->view("galeria", $data);
        $this->load->view("footer"); 
    }
    
//    function galeria($idcliente,$idmenu){
//        $data = array("idcliente"=>$idcliente, "idmenu" => $idmenu);
//        $this->load->view("galeria", $data);
//        
//    }
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
    
      function insert($idmenu = NULL){
        if ($idmenu === NULL){
            echo "error";
        } else {
            $this->load->model("submenu_model");
            $submenu = $this->submenu_model->insert($idmenu, $this->input->post("titulo"));
            //var_dump($submenu);
            echo json_encode($submenu);
        }
    }
    
    function set_html ($idsubmenu){
        $this->load->model("submenu_model");
        //$this->submenu_model->update($idsubmenu, "html", "test");
        $this->submenu_model->update($idsubmenu, "html", $this->input->post("contenido"));
    }
    
    function set_tipo($idsubmenu, $tipo){
        $this->load->model("submenu_model");
        $this->submenu_model->update($idsubmenu, "tipo", $tipo);
    }
    
    function set_video_html($idsubmenu){
        $this->load->model("submenu_model");
        $this->submenu_model->update($idsubmenu, "video_html", $this->input->post("contenido"));
    }
    
    function set_video_url($idsubmenu){
        $this->load->model("submenu_model");
        $this->submenu_model->update($idsubmenu, "video_url", $this->input->post("url"));
    }
    
    function set_indice($idsubmenu){
        $this->load->model("submenu_model");
        // var_dump("hecho");
        $this->submenu_model->insertIndice($idsubmenu, $this->input->post("titulo"), $this->input->post("contenido"));
    }
}

<?php

class Tipo extends CI_Controller {
    
    function get($idmenu){
        $this->load->model("menu_model");
        //$data = $this->menu_model->getTipo($idmenu);
        //$data["0"]["ownSubmenu"]=null;
        //var_dump($data);
        $data = $this->menu_model->get(null, $idmenu);
        $data["0"]["idmenu"] = $idmenu;

/*

 * En el menú:
si el tipo = 0  será html,
si tipo = 1 será tipo submenu
 * 
 *  */
        if($data["0"]["tipo"]>0){
            if (isset($data["0"]["ownSubmenu"])){
                    usort($data["0"]["ownSubmenu"], function ($a, $b){
                    if ($a["pos"] == $b["pos"]) {
                        return 0;
                    }
                    return ($a < $b) ? -1 : 1;
                });
            }
                $this->load->view("menus/submenus", $data["0"]);
        }else{
            $this->load->view("menus/editor", $data["0"]);
        }
    }
          
    function set($idmenu){
        $this->load->model("menu_model");
        $data =$this->menu_model->updateTipo($idmenu, $this->input->post("tipo"));
        echo json_encode(array($data));
    }
    
    function getTipo($idmenu){
        $this->load->model("menu_model");
        $data = $this->menu_model->get(null, $idmenu);
        echo json_encode(array($data["0"]["tipo"]));
        
        
    }
}

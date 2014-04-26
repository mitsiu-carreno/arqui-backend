<?php

class Submenu_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
//        R::freeze( TRUE );
    }
    
        function insert($idmenu, $titulo){
        $menu = R::load( 'menu', $idmenu );
        
        $submenu = R::dispense( 'submenu' );
        $submenu->titulo = $titulo;
        $submenu->tipo = 1;
        $submenu->html = NULL;
        $submenu->videoURL = NULL;
        $submenu->tipo = 1; //1 -> video, 2 -> Galeria, 3 -> HTML
        $submenu->pos = ($this->getLastPosition($idmenu))+1;
        
        $menu->ownSubmenu[] = $submenu;
        
        $id = R::store($menu); 
        //echo $id;
        $submenu["idsubmenu"]=$submenu["id"];
        $submenu["id"] = $id;
        //echo $submenu;
        return $submenu->export();
    }
    
    function getLastPosition($idmenu){
        $submenu = R::findOne( 'submenu', "menu_id = ? ORDER BY pos DESC", array($idmenu));
        if ($submenu)
            return $submenu->pos;
        else
            return 0;
    }
    
    function getClientID($idsubmenu){
        $submenu = R::findOne( 'submenu', "id = ? ", array($idsubmenu));
        if ($submenu){
            $this->load->model("menu_model");
            $menu = $this->menu_model->get(NULL,$submenu->menu_id);
            return $menu->client_id;
        }else
            return 0;
    }
    
    function update($idsubmenu, $field, $value){
        $submenu = R::load( 'submenu', $idsubmenu );
        $submenu->$field = $value;
        R::store($submenu);
        return $submenu->export();
    }
}
    

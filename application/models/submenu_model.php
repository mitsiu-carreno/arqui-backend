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
        $submenu->videoURL = NULL;
        $submenu->tipo = 1; //1 -> video, 2 -> Galeria, 3 -> HTML
        //$submenu->pos = ($this->getLastPosition($clientid))+1;
        
        $menu->ownSubmenu[] = $submenu;
        
        $id = R::store($client); 
        //echo $id;
        return $this->getLast($clientid);
    }

    //Falta editar
    function getLastPosition($clientid){
        $menu = R::findOne( 'menu', "client_id = ? ORDER BY pos DESC", array($clientid));
        if ($menu)
            return $menu->pos;
        else
            return 0;
    }
    
    function getClientID($idsubmenu){
        $submenu = R::findOne( 'submenu', "id = ? ", array($idsubmenu));
        if ($submenu)
            return $submenu->menu_id;
        else
            return 0;
    }
    
}
    

<?php

class Galeria_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
//        R::freeze( TRUE );
    }
    
    function insert($idsubmenu, $titulo){
        $submenu = R::load( 'submenu', $idsubmenu );
        
        $galeria = R::dispense( 'galeria' );
        $galeria->titulo = $titulo;
        $galeria->pos = ($this->getLastPosition($idsubmenu))+1;
        
        $submenu->ownGaleria[] = $galeria;
        
        $id = R::store($submenu); 
        //echo $id;
        $galeria["id"] = $id;
        return $galeria;
    }
    
    function getLastPosition($idsubmenu){
        $galeria = R::findOne( 'galeria', "submenu_id = ? ORDER BY pos DESC", array($idsubmenu));
        if ($galeria)
            return $galeria->pos;
        else
            return 0;
    }
}
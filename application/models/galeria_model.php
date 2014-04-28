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
        $galeria->titulo = $titulo."";
        $galeria->pos = ($this->getLastPosition($idsubmenu))+1;
        
        $submenu->ownGaleria[] = $galeria;
        
        $id = R::store($submenu); 
        //echo $id;va¡¡¡
//        var_dump($galeria);
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
    
    function get($idsubmenu){
        $submenu = R::load( 'submenu', $idsubmenu );
        return $submenu->ownGaleria;
    }
}

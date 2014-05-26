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
        $submenu->video = NULL;
        $submenu->fav = FALSE;
        $submenu->tipo = 1;
        $submenu->pos = ($this->getLastPosition($idmenu))+1;
        $submenu->video_html= NULL;
        
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
    
    function getSubmenu($idsubmenu){
        $submenu = R::load( 'submenu', $idsubmenu);
        return $submenu->export();
    }
    
    function insertIndice($idsubmenu, $titulo, $contenido){
       //echo $titulo;
        $submenu = R::load( 'submenu', $idsubmenu );
        $indice = R::dispense( 'indice' );
        $indice->titulo = $titulo;
        $indice->contenido = $contenido;
        
        $submenu->ownIndice[] = $indice;
        R::store($submenu);

        return $indice->export();
    }
    
        function getIndice($idsubmenu){
        
            //$indices = R::findAll( 'indice', "submenu_id = ?", array($idsubmenu));
            //$indices = R::find( 'indice', "submenu_id = ? ORDER BY id DESC", array($idsubmenu));
        //$indices = R::find( 'indices', "submenu_id = ?", array($idsubmenu));
            //echo $indices;
        //return $indices->export();
        $indices = R::find('indice',' submenu_id = ? ORDER BY titulo ASC', array( $idsubmenu ));    
        //$indices = R::load( 'indice', 1 );
        //return $indices->exportAll;
        return R::exportAll($indices);
    }
    
    function delete($idsubmenu){
        $submenu = R::load( 'submenu', $idsubmenu );
        R::trash($submenu);
    }

    function updateIndice($idIndice, $titulo, $contenido){
        $indice = R::load( 'indice', $idIndice );
        $indice->titulo = $titulo;
        $indice->contenido = $contenido;
        R::store($indice);
    }
    
    function delete_indice($idIndice){
        $indice = R::load('indice', $idIndice);
        R::trash($indice);
    }
    
        
    function updatePos($data){
            foreach ($data as $key => $value) {
                $submenu = R::load( 'submenu', $value );
                $submenu->pos=$key;
                echo $submenu->titulo;
                R::store($submenu); 
            }
    }
}
    

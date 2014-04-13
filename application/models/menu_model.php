<?php

class Menu_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
//        R::freeze( TRUE );
    }
    
    function insert($clientid, $titulo){
        $client = R::load( 'client', $clientid );
        
        $menu = R::dispense( 'menu' );
        $menu->titulo = $titulo;
        $menu->activo = 1;
        $menu->pos = ($this->getLastPosition($clientid))+1;
        
        $client->ownMenu[] = $menu;
        
        $id = R::store($client); 
        //echo $id;
        return $this->getLast($clientid);
    }
    
    function get($clientid, $id = NULL){
            $client = R::load( 'client', $clientid );
            if ($id===NULL)
                return $client->with(' ORDER BY pos ASC ')->ownMenu;
            else
                return $client->ownMenu[$id];
    }
    
    function getLast($clientid){
        $menu = R::findLast( 'menu', "client_id = ?", array($clientid));
        return $menu->export();
    }
    
    function getLastPosition($clientid){
        $menu = R::findOne( 'menu', "client_id = ? ORDER BY pos DESC", array($clientid));
        if ($menu)
            return $menu->pos;
        else
            return 0;
    }
    
    function updateTitulo($idcliente,$idmenu,$titulo){
        $menu = R::load( 'menu', $idmenu );
        $menu->titulo = $titulo;
        R::store($menu);
    }
    
    function delete($idmenu){
        $menu = R::load( 'menu', $idmenu );
        R::trash($menu);
    }
    
    function updatePos($idcliente,$data){
            foreach ($data as $key => $value) {
                $menu = R::load( 'menu', $value );
                $menu->pos=$key;
                R::store($menu); 
            }
    
    }
}
    

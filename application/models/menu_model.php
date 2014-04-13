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
        
        R::store($client); 
        return $this->getLast($clientid);
    }
    
    function get($clientid, $id = NULL){
            $client = R::load( 'client', $clientid );
            if ($id===NULL)
                return $client->ownMenu;
            else
                return $client->ownMenu[$id];
    }
    
    function getLastPosition($clientid){
        $menu = R::findOne( 'menu', "client_id = ? ORDER BY pos DESC", array($clientid));
        var_dump($menu);
        return $menu->pos;
        
    }
    
    function getLast($clientid){
        $menus = $this->get($clientid);
        return end($menus);
    }
}
    

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
    
    function getLast($clientid){
        $menus = $this->get($clientid);
        return end($menus);
    }
}
    
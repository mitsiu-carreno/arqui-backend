<?php

class Tipo_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
//        R::freeze( TRUE );
    }
    
    function get($id = NULL){
        if ($id === NULL){
            return $this->getAll();
        } else {
            $tipo = R::load( 'client', $id );
            unset($client->password);
            return $client;
        }
    }
    
    function updateTipo($idmenu,$tipo){
        $menu = R::load( 'menu', $idmenu );
        $menu->tipo = $tipo;
        R::store($menu);
    }
}

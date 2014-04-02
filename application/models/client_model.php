<?php

class Client_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
//        R::freeze( TRUE );
    }
    
    function get($id = NULL){
        if ($id === NULL){
            return $this->getAll();
        } else {
            $client = R::load( 'client', $id );
            unset($client->password);
            return $client;
        }
    }
    
    function getAll(){
        $clients = R::findAll("client");
        return $clients;
    }
            
    function insert($data){
//        R::debug(true);
        $client = R::dispense('client');
        $client->nombre = $data["nombre"];
        $client->email = $data["email"];
        $client->password = md5($data["password"]);
        $client->activo = 1;
//        $client->menus = array();
        $client->contacto = $data["email"];
        $id = R::store($client); 
        return $id;
    }
    
    // Si el password está vacio entonces no lo cambia
    function update($id, $data){
        $client = R::load( 'client', $id );
        $client->nombre = $data["nombre"];
        $client->email = $data["email"];
        $client->activo = $data["activo"];
        if (isset($data["password"]) && $data["password"] !== '')
            $client->password = md5($data["password"]);
        R::store($client);
        return $id;
    }
    function update_contacto($id, $contacto){
        $client = R::load( 'client', $id );
        $client->contacto = $data["contacto"];
        R::store($client);
        return $id;
    }
}
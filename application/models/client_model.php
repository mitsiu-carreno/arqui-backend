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
            return $client;
        }
    }
    
    function getAll(){
        $clients = R::findAll("client");
        return $clients;
    }
            
    function insert($data){
        $client = R::dispense('client');
        $client->nombre = $data["nombre"];
        $client->email = $data["email"];
        $client->password = md5($data["password"]);
        $id = R::store($client); 
        return $id;
    }
    
    function update($id, $data){
        
    }
}
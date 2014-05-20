<?php

class Log_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
//        R::freeze( TRUE );
    }
    
    function in($email,$password){
        $user = R::findOne( 'user', " email LIKE ? AND password = MD5(?)", array($email,$password) );
        return $user;
    }
    
    function get($clientid){
                $client = R::load( 'client', $clientid );
        return $client->export();
    }
    
    function insert($email,$password){
        $user = R::dispense('user');
        $user->email = $email;
        $user->password = md5($password);
        $id = R::store($user); 
        return $id;
    }
}
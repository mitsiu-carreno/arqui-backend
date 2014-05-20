<?php

class Log_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
        R::freeze( TRUE );
    }
    
    function get($clientid){
        $client =R::load("client", $clientid);
        return $client->export();
    }
    
    function exists($email){
        $user = $this->getByEmail($email);
        //var_dump($user);
        if(is_array($user))
            return TRUE;
        else
            return FALSE;
    }
    
    function getByEmail($email){
        $user = R::findOne( 'client', " email LIKE ?", array($email) );
        unset($user->password);
        //var_dump($user);
        if(is_object($user))
            return $user->export();
        else
            return FALSE;
    }
    
    function isActivo($email){
        $user = R::findOne( 'client', " email LIKE ?", array($email) );
//        var_dump($user);
        return $this->activo($user->id);
    }
    function activo($clientid){
        $client =R::load("client", $clientid);
//        var_dump($client);
        return $client->activo == 1 ? true : false;
    }
    
    function in($email,$password){
        $user = R::findOne( 'client', " email LIKE ? AND password = MD5(?)", array($email,$password) );
        unset($user->password);
        //var_dump($user);
        if(is_object($user))
            return $user->export();
        else
            return FALSE;
    }
}
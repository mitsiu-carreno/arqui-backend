<?php

class Log_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
    }
    
    function in($username,$password){
        $user = R::findOne( 'user', " username LIKE ? AND password = MD5(?)", array($username,$password) );
        return $user;
    }
    
    function insert($username,$password){
        $user = R::dispense('user');
        $user->username = $username;
        $user->password = md5($password);
        $id = R::store($user); 
        return $id;
    }
}
<?php

class Menus extends CI_Controller {

    function __construct() {
        parent::__construct();
        $userid = $this->session->userdata("userid");
        if(!($userid > 0))
            redirect ("users/login");
    }
    
    function get($idcliente = 1){
        $this->load->view("header");
        $data = array("idcliente"=>$idcliente);
        //$this->load->view("header");
        $this->load->view("clients/banner",$data);
        //$this->load->view("footer"); 
        $this->load->view("menu_backend/back-end");
        $this->load->view("menu_backend/menu");
        $this->load->view("footer");
    }

}

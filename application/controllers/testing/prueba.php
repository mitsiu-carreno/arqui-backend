<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prueba extends CI_Controller {

    function index(){
        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("footer"); 
    }
    function menus($idcliente=1){
        $data = array("idcliente"=>$idcliente);
        $this->load->model("menu_model");
        $data["menus"] = $this->menu_model->get($idcliente);
        
        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("testing/menu",$data);
        $this->load->view("footer"); 
    }
    function banner($idcliente=1){
        $data = array("idcliente"=>$idcliente);
        $this->load->model("menu_model");
        $data["menus"] = $this->menu_model->get($idcliente);
        
        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("clients/banner",$data);
        $this->load->view("footer"); 
    }
    function contacto($idcliente=1){
        $data = array("idcliente"=>$idcliente);
        $this->load->model("menu_model");
        $data["menus"] = $this->menu_model->get($idcliente);
        
        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("footer"); 
        $this->load->view("menu_backend/contacto", $data);
    }
    
}


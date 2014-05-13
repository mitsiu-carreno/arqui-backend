<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proyectos extends CI_Controller {

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
        $this->load->view("navbar-proyecto",$data);
        $this->load->view("testing/menu",$data);
        $this->load->view("footer"); 
    }
    function banner($idcliente=1){
        $data = array("idcliente"=>$idcliente);
        $this->load->model("client_model");
        
        $data["cliente"] = $this->client_model->get($idcliente);
        $this->load->model("menu_model");
        $data["menus"] = $this->menu_model->get($idcliente);
        
        $this->load->view("header");
        $this->load->view("navbar-proyecto",$data);
        $this->load->view("clients/banner",$data);
        $this->load->view("footer"); 
    }
    function contacto($idcliente=1){
        $data = array("idcliente"=>$idcliente);
        $this->load->model("menu_model");
        $this->load->model("client_model");
        $data["cliente"] = $this->client_model->get($idcliente);
        $data["menus"] = $this->menu_model->get($idcliente);
        
        $this->load->view("header");
        $this->load->view("navbar-proyecto",$data);
        $this->load->view("menu_backend/contacto", $data);
        $this->load->view("footer"); 
    }
    
    function html($idcliente){
        $data = array("idcliente"=>$idcliente);
        $this->load->model("client_model");
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->client_model->update_field($idcliente,"html",  $this->input->post("html"));
        }else {
            echo json_encode($this->client_model->get($idcliente));
        }
    }
    
}

<?php

class Clients extends CI_Controller {
    function index(){
        $this->load->model("client_model");
        $data["clientes"] = $this->client_model->get();
        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("clients/list", $data);
        $this->load->view("footer"); 
    }
    
    function lista(){
        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("clients/app");
        $this->load->view("footer");
    }
    
    function form(){
        $this->load->view("clients/new");
    }
    
    function insert(){
        $client = $this->input->post();
        $this->load->model("client_model");
        $id = $this->client_model->insert($client);
        $client["id"] = $id;
        echo json_encode($client);
    }
    
    function update_status($idclient,$status){
        $this->load->model("client_model");
        $this->client_model->update_field($idclient,"activo",$status);
    }
    
    //Backbone
    function app($clientid = NULL){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'POST':
                echo $this->insertclient(json_decode($this->input->post("model")));
                break;
            default :
                echo $this->getclient($clientid);
        }
    }
    
    function getclient($clientid) {
        $this->load->model("client_model");
        return json_encode($this->client_model->get($clientid));
    }
    
    function insertclient($client){
        $this->load->model("client_model");
        $client = get_object_vars($client);
        $id = $this->client_model->insert($client);
        $client["id"] = $id;
        return json_encode($client);
    }
    
}

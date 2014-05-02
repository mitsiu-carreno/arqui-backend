<?php
class Clients extends CI_Controller {
    function index(){
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
            case "PUT":
                echo $this->updateclient($clientid,json_decode($this->input->post("model")));
                break;
            case "DELETE":
                $this->load->model("client_model");
                $this->client_model->delete($clientid);
                break;
            case 'POST':
                if(isset($this->input->post("_method")) && $this->input->post("_method") === "DELETE"){
                    $this->load->model("client_model");
                    $this->client_model->delete($clientid);
                }else if(isset($this->input->post("_method")) && $this->input->post("_method") === "DELETE"){
                    echo $this->updateclient($clientid,json_decode($this->input->post("model")));
                } else {
                    echo $this->insertclient(json_decode($this->input->post("model")));
                }
                break;
            default :
                echo $this->getclient($clientid);
        }
    }
    
    function updateclient($clientid, $client){
        $this->load->model("client_model");
        $client = get_object_vars($client);
        unset($client["ownMenu"]);
        $id = $this->client_model->update($client);
        return $this->getclient($clientid);
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


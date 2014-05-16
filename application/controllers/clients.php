<?php
class Clients extends CI_Controller {
    
        function __construct() {
        parent::__construct();
        $userid = $this->session->userdata("userid");
        if(!($userid > 0))
            redirect ("users/login");
    }
    
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
                if(($this->input->post("_method") == "DELETE")){
                    $this->load->model("client_model");
                    $this->client_model->delete($clientid);
                }else if($this->input->post("_method") === "PUT"){
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
//        $client["activo"] = $client["activo"] ? 1 : 0;
        $id = $this->client_model->update($clientid,$client);
        return $this->getclient($clientid);
    }
    
    function getclient($clientid) {
        $this->load->model("client_model");
        $cliente = $this->client_model->get($clientid);
        echo json_encode($cliente);
    }
    
    function insertclient($client){
        $this->load->model("client_model");
        $client = get_object_vars($client);
        $id = $this->client_model->insert($client);
        $client["id"] = $id;
        return json_encode($client);
    }
    
}



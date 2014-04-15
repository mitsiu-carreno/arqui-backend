<?php

class Tipo extends CI_Controller {
    
    function get($idclient){
        $this->load->model("client_model");
        $data = $this->client_model->get($idclient);
        echo json_encode(array("tipo" => $data["tipo"]));
    }
    
    function set($idmenu){
        $this->load->model("client_model");
        $this->client_model->updateTipo($idmenu, $this->input->post("tipo"));
    }
    
}
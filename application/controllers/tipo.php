<?php

class Tipo extends CI_Controller {
    
    function get($idclient){
        $this->load->model("tipo_model");
        $data = $this->tipo_model->get($idclient);
        echo json_encode(array("tipo" => $data["tipo"]));
    }
    
    function set($idclient){
        $this->load->model("tipo_model");
        $this->tipo_model->updateTipo($idclient, $this->input->post("tipo"));
    }
    
}
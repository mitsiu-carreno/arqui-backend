<?php

class Log extends CI_Controller {
//Genera ID de la sesión tomando como base el ID del usuario
    public function in() {
//        var_dump($this->input->post());
        $this->load->model("log_model");
        $user = $this->log_model->in($this->input->post("email"),$this->input->post("password"));
//        var_dump($user);
        if(!is_null($user)){
            $this->session->set_userdata("userid", $user->id);
            echo $user->id;
        } else
            echo "null";
        
    }
    
    public function out(){
        $this->session->sess_destroy();
        redirect("portada");
    }
    
    public function recuperar($token){
        $data = array("token" =>$token );
        $this->load->view("header");
        $this->load->view("clients/recuperar",$data);
        $this->load->view("footer");
    }
    
    function update(){
        $this->load->model("client_model");
        $this->load->library('encrypt');
        $clientid = $this->encrypt->decode(base64_decode($this->input->post("token")));
        $id = $this->client_model->update_field($clientid,"password",md5($this->input->post("password")));
        
//        var_dump($this->input->post());
        $this->load->view("header");
        //echo $id;
        if($id == $clientid){
            $this->load->view("clients/recuperada");
        } else {
            $this->load->view("clients/norecuperada");
        }
        $this->load->view("footer");
    }

}
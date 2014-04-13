<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prueba extends CI_Controller {

    function index(){
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('modal');
        echo 'hola';
    }
    
}


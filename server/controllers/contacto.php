<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Contacto extends REST_Controller
{
    function __construct() {
        parent::__construct();
         header("Access-Control-Allow-Origin: *");
    }
    function enviar_post(){
                $this->load->library('encrypt');
                $this->load->model("log_model");
        $idcliente = $this->encrypt->decode(base64_decode($this->post("token")));
        if(!is_numeric($idcliente) || !$this->log_model->activo($idcliente)){
            $this->response(array("error" => "bad token"), 400);
        } else {
            $this->load->model("log_model");
            $cliente = $this->log_model->get($idcliente);
            $this->load->library('email');

            $this->email->from('webmaster@cognosvideoapp.com.mx', 'Cognos App');
            $this->email->to($cliente["contacto"]); 
            $this->email->cc($this->post("email")); 

            $this->email->subject('Contacto Cognos');
            $this->email->message($this->post("html"));	

            $this->email->send();

            //echo $this->email->print_debugger();
            $this->response(array("success" => $this->email->print_debugger()), 200);
        }
        //server.php/fav/submenu/xxx
    }
} 
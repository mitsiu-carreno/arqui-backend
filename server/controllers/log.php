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

class Log extends REST_Controller
{
    function __construct() {
        parent::__construct();
         header("Access-Control-Allow-Origin: *");
    }
    
    function recuperar_post(){
        if(!$this->post("email")){
            $this->response(array("error" => "no se recibio ningún email"), 400);
        } else {
            $this->load->model("log_model");
            if($this->log_model->exists($this->post("email"))){
                if($this->log_model->isActivo($this->post("email"))){
                    $this->load->library('email');

                    $this->email->from('webmaster@cognosvideoapp.com.mx', 'Cognos App');
                    $this->email->to($this->post("email"));
                    $this->email->subject('Recuperar contraseña');
                    
            $user = $this->log_model->getByEmail($this->post("email"));
                $this->load->library('encrypt');
                $user["token"] = base64_encode($this->encrypt->encode($user["id"]));
                    $url = "http://cognosvideoapp.com.mx/index.php/log/recuperar/" . $user["token"];
                    $html = "Estimado usuario
                        
Hemos recibido una solicitud de cambio de contraseña, si usted no solicitó el cambio favor de ignorar este correo, de lo contrario haga click en el siguiente enlae para establecer una nueva

" . $url;
                    $this->email->message($html);	

                    $this->email->send();
                    $this->response(array("success" => "Correo enviado"), 200);
                } else {
                    $this->response(array("error" => "La cuenta está deshabilitada por el administrador"), 400);
                }
            } else {
                $this->response(array("error" => "El email no está registrado"), 400);
            }
        }
    }
      
    function cambiar_post(){
        $this->load->library('encrypt');
        $this->load->model("log_model");
        $idcliente = $this->encrypt->decode(base64_decode($this->post("token")));
//        echo $idcliente;
        if(!is_numeric($idcliente) || !$this->log_model->activo($idcliente)){
            $this->response(array("error" => "bad token"), 400);
        } else {
            $this->log_model->update_field($idcliente,"password",md5($this->post("password")));
            $this->response(array("success" => "Password changed"), 200);
        }
    }
    function in_post(){
        if(!$this->post("email") || !$this->post("password")){
            $this->response(array("error" => "no data was recived"), 400);
        } else {
            $this->load->model("log_model");
            $user = $this->log_model->in($this->post("email"),$this->post("password"));
            if(is_array($user)){
                $this->load->library('encrypt');
                $user["token"] = base64_encode($this->encrypt->encode($user["id"]));
                $this->response($user, 200);
            } else {
                $this->response(array('error' => 'No se encontró el usuario '), 404);
            }
        }
    }
    
	function user_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        // $user = $this->some_model->getSomething( $this->get('id') );
    	$users = array(
			1 => array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com', 'fact' => 'Loves swimming'),
			2 => array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com', 'fact' => 'Has a huge face'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => 'Is a Scott!', array('hobbies' => array('fartings', 'bikes'))),
		);
		
    	$user = @$users[$this->get('id')];
    	
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }
    
    function user_post()
    {
        //$this->some_model->updateUser( $this->get('id') );
        $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'email' => $this->post('email'), 'message' => 'ADDED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    function user_delete()
    {
    	//$this->some_model->deletesomething( $this->get('id') );
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    function users_get()
    {
        //$users = $this->some_model->getSomething( $this->get('limit') );
        $users = array(
			array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com'),
			array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => array('hobbies' => array('fartings', 'bikes'))),
		);
        
        if($users)
        {
            $this->response($users, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
    }


	public function send_post()
	{
		var_dump($this->request->body);
	}


	public function send_put()
	{
		var_dump($this->put('foo'));
	}
}
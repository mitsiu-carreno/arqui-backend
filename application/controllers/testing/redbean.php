<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Redbean extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library('rb');
                $album = R::dispense('album');
                $album->title = '13 Songs';
                $album->artist = 'Fugazi';
                $album->year = 1990;
                $album->rating = 5;
                $id = R::store($album);
                
                echo "Ambiente " . ENVIRONMENT;
	}
        
        public function log(){
            $this->load->library('unit_test');
            //Creat a user
            $this->load->model("log_model");
            $email = "drbyde@gmail.com";
            $password = "root";
            $this->unit->run($this->log_model->insert($email,$password), 'is_int', 'Creando al usuario');
            
            //Log in true
            $user = $this->log_model->in($email,$password);
            $this->unit->run($user->email, $email, 'Login TRUE');
            
            //Log in false
            $password = "justTljsdfjkldfsesting";
            $user = $this->log_model->in($email,$password);
            $this->unit->run($user->email, 'is_null', 'Login False');
            
            echo $this->unit->report();
        }
        
        public function user(){
            $this->load->library('unit_test');
            //Creat a client
            $this->load->helper('string');
            $this->load->model("client_model");
            $client["nombre"] = random_string('alpha', 16);
            $client["email"] = random_string('alpha', 16);
            $client["password"] = random_string('alpha', 16);
            
            $id = $this->client_model->insert($client);
            $this->unit->run($id, 'is_int', 'Insert client');
            
            //Find a client
            $client2 = $this->client_model->get($id);
            $this->unit->run($client2->email, $client["email"], 'get a client');
            echo $this->unit->report();
        }
}
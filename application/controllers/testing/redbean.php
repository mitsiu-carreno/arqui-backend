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
            $username = "ulises";
            $password = "justTesting";
            $this->unit->run($this->log_model->insert($username,$password), 'is_int', 'Creando al usuario');
            
            //Log in true
            $user = $this->log_model->in($username,$password);
            $this->unit->run($user->username, $username, 'Login TRUE');
            
            //Log in false
            $password = "justTljsdfjkldfsesting";
            $user = $this->log_model->in($username,$password);
            $this->unit->run($user->username, 'is_null', 'Login False');
            
            echo $this->unit->report();
        }
}
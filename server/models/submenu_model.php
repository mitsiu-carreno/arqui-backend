<?php

class Submenu_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('rb');
        R::freeze(TRUE);
    }

    function fav($submenuid) {
        $submenu = R::load("submenu",$submenuid);
        $submenu->fav = $submenu->fav == 1 ? 0 : 1;
        R::store($submenu);
    }
    
    

}

<?php

class Menu_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('rb');
        R::freeze(TRUE);
    }

    function get($clientid) {
        $this->load->helper('directory');
        $clients = R::find( 'menu', "client_id = ? ORDER BY pos ASC", array($clientid));
//        var_dump($client);
        $proyectos = R::exportAll($clients);
        $exportar = array();
        foreach($proyectos as $p){
            unset($p["id"]);
            unset($p["pos"]);
            unset($p["client_id"]);
            $p["html"] = base64_encode($p["html"]);
            if(array_key_exists("ownSubmenu",$p)){
                //$p["Submenus"] = $p["ownSubmenu"];
                usort($p["ownSubmenu"], function ($a, $b){
                    if ($a["pos"] == $b["pos"]) {
                        return 0;
                    }
                    return ($a["pos"] < $b["pos"]) ? -1 : 1;
                });
                $p["Submenus"] = array();
                foreach($p["ownSubmenu"] as $s){
//                    unset($s["id"]);
                    unset($s["pos"]);
                    unset($s["menu_id"]);
                    $s["html"] = $s["tipo"] == 1 ? $s["video_html"] : $s["html"];
                     
                    if($this->endsWith($s["video"], "zip")){
                        $files = directory_map('./videos/' . $s["id"], 1);
                        foreach($files as $k => $v){
                            if($this->endsWith(strtolower($v), "prog_index.m3u8"))
                            $s["video"] = "http://cognosvideoapp.com.mx/videos/" . $s["id"] . "/" . $v;
                        }
                    }
                   
                    $s["html"] = base64_encode($s["html"]);
                    unset($s["video_html"]);
                    if(array_key_exists("ownIndice",$s)){
                        $s["indices"] = array();
                        foreach($s["ownIndice"] as $i){
                            $i["to"] = $i["titulo"];
                            $i["titulo"] = $i["contenido"];
                            unset($i["contenido"]);
                            unset($i["id"]);
                            unset($i["submenu_id"]);
                            $s["indices"][] = $i;
                        }
                        unset($s["ownIndice"]);
                    }
                    
                    if(array_key_exists("ownGaleria",$s)){
                        $s["fotos"] = array();
                        usort($s["ownGaleria"], function ($a, $b){
                            if ($a["pos"] == $b["pos"]) {
                                return 0;
                            }
                            return ($a["pos"] < $b["pos"]) ? -1 : 1;
                        });
                        foreach($s["ownGaleria"] as $g){
                            unset($g["pos"]);
                            $g["url"] = base_url() . "galeria/" . $g["submenu_id"] . "/" . $g["id"] . ".png";
                            $g["thumbnail"] = base_url() . "galeria/" . $g["submenu_id"] . "/" . $g["id"] . "_thumb.png";
                            unset($g["submenu_id"]);
                            unset($g["id"]);
                            $s["fotos"][] = $g;
                        }
                        
                        unset($s["ownGaleria"]);
                    }
                    $p["Submenus"][] = $s;
                }
                unset($p["ownSubmenu"]);
            }
            $exportar[] = $p;
        }
        
        return $exportar;
    }
    function endsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}
    

}

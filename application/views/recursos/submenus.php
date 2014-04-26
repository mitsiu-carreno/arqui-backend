<?php 
try{
foreach($ownSubmenu as $submenu): 
    echo $submenu["id"] .":". $submenu["titulo"] . "-";
endforeach;
}
catch (Exception $e) {
    echo "vacio";
}
?>


<style>
    #lista-menus {
        list-style: none;
        margin: 0px;
        padding: 0px;
    }
    .btn-ta{
        width: 50%;
    }
</style>
 <div class="fondo_1">
                <label>Submenús</label>
</div>
 <div class="row">
  <div class="col-md-4" style>

    <ul id="lista-menus"  class="list-block">
        <?php foreach ($ownSubmenu as $submenu): ?>
        <li class="li-menu" idmenu="<?php echo $submenu["id"] ?>">
            <div class="btn-group" style="vertical-align: baseline">
                    
                    <input type="button"  id="editar" class="btn btn-default btn_menus_titulo" value="<?php echo $submenu["titulo"] ?>" style="width:100px;">
                        
              
                    <button type="button" class="btn btn-default btn_menus_mover"><span class="glyphicon glyphicon-move"></span></button>
                    <button type="button" class="btn btn-default btn_menus_eliminar"><span class="glyphicon glyphicon-remove-circle"></span></button>
                    <div class="col-md-5">
                              <form id="tipo" role="form">
                                  <div class="switch-toggle switch-candy switch-candy-blue large-1" style="width:160px;">
                                      <input id="<?php echo $submenu["id"]?>" name="tipo" idmenu="1" type="radio" value="0">
                                      <label id="label-sub"  onclick="">Submenu</label>

                                        <input id="<?php echo $submenu["id"]?>html" name="tipo" type="radio" value="1" checked>
					<label id="label-html" onclick="">HTML</label>

					<a></a>
				</div>
                               </form> 
                    </div>
<!--                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-cog"></span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
   
                        <form id="tipo" role="form">
                            <div class="checkbox">
                                <input type="radio" name="tipo" id="sub" value="0"> Submenú
                                <br>
                                <input type="radio" name="tipo" id="html" value="1" checked="" > HTML 
                            </div>
                        </form>
                    <li><a href=""><span class="glyphicon glyphicon-remove-circle text-danger"></span>Eliminar</a></li>
                        <li><a href="<?php echo base_url();?>/menus/editar" class="btn_menus_editar"><span class="glyphicon glyphicon-edit"></span>Editar</a></li>
                    </ul>-->
                </div>
            </li>
         
        <?php endforeach; ?>
        <?php if (count($ownSubmenu) == 0): ?>
           <li id="li_menus_empty2">
                <small><i>No hay submenús, haga click en el siguiente botón para agregar uno -></i></small>
            </li>
    
        <?php endif; ?>
         <li id="li_menus_add">
            <button class="btn btn-success" id="btn_submenus_add">Nuevo submenú <span class="glyphicon glyphicon-plus"></span></button>
        </li>
    </ul>
<li id="li_to_clone" class="hidden li-menu" idmenu="">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn_menus_titulo" style="width:100px;">
                    </button>
                   <button type="button" class="btn btn-default btn_menus_mover"><span class="glyphicon glyphicon-move"></span></button>
                    <button type="button" class="btn btn-default btn_menus_eliminar"><span class="glyphicon glyphicon-remove-circle"></span></button>
                    <div class="col-md-5">
                              <form id="tipo" role="form">
                                  <div class="switch-toggle switch-candy switch-candy-blue large-1" style="width:160px;">
                                      <input id="<?php echo $submenu["id"]?>" name="tipo" idmenu="1" type="radio" value="0">
                                      <label id="label-sub"  onclick="">Submenu</label>

                                        <input id="<?php echo $submenu["id"]?>html" name="tipo" type="radio" value="1" checked>
					<label id="label-html" onclick="">HTML</label>

					<a></a>
				</div>
                               </form> 
                    </div>
                </div>
            </li>
               </div>
 </div>
<script src="<?php echo base_url() ?>js/jquery-ui-1.10.4.sortable.min.js" type="text/javascript"></script>
<script>
    $("#btn_submenus_add").click(function() {
        bootbox.prompt("Crear nuevo submenú", function(data) {
            console.log(data);
            
              var parametros={"titulo":data,"id":menuid};
             
        
      //  alert(menuid);
      console.log(menuid);
            if (data && data.length > 0) {
              $.post("<?php echo site_url(array("submenu", "insert")) ?>/"+menuid, $.param(parametros), function(success){
                    console.log(success);
                  window.location.reload();
                },"json");
                if(menuid){
                     $('.btn_menus_titulo').removeClass('active');   
                }
            }
        });
    });
    </script>      
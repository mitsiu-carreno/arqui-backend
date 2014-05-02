
<ul id="lista-menus" class="list-block">
     <li id="li_menus_empty2">
                <small><i>No hay submenús, haga click en el siguiente botón para agregar uno</i></small>
            </li>
     
        <li id="li_menus_add">
            <button class="btn btn-success btn-block" id="btn_submenus_add">Nuevo submenú <span class="glyphicon glyphicon-plus"></span></button>
        </li>
        
        <li id="li_to_clone2" class="hidden li-menu" idmenu="">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn_submenus_titulo" style="width:100px;">
                    </button>
                   <button type="button" class="btn btn-default btn_menus_mover"><span class="glyphicon glyphicon-move"></span></button>
                    <button type="button" class="btn btn-default btn_menus_eliminar"><span class="glyphicon glyphicon-remove-circle"></span></button>
                    <div class="col-md-5">
                              <form id="tipo" role="form">
                                  <div class="switch-toggle switch-candy switch-candy-blue large-1" style="width:160px;">
                                      <input id="" name="tipo" idmenu="1" type="radio" value="0">
                                      <label id="label-sub"  onclick="">Submenu</label>

                                        <input id="" name="tipo" type="radio" value="1" checked>
					<label id="label-html" onclick="">HTML</label>

					<a></a>
				</div>
                               </form> 
                    </div>
                </div>
            </li>
</ul>
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


<style>
    #lista-submenus {
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

    <ul id="lista-submenus"  class="list-block">
        <?php foreach ($ownSubmenu as $submenu): ?>
        <li class="li-menu" idmenu="<?php echo $submenu["id"] ?>">
            <div class="btn-group" style="vertical-align: baseline">
                    
                    <input type="button"  id="editar" class="btn btn-default btn_submenus_titulo" value="<?php echo $submenu["titulo"] ?>" style="width:100px;">
                        
              
                    <button type="button" class="btn btn-default btn_menus_mover"><span class="glyphicon glyphicon-move"></span></button>
                    <button type="button" class="btn btn-default btn_menus_eliminar"><span class="glyphicon glyphicon-remove-circle"></span></button>
                   
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
                    <button type="button" class="btn btn-default btn_submenus_titulo" style="width:100px;">
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
      <div class="col-md-5">
                              <form id="tipo" role="form">
                                  submenú seleccionado: <input type="text" value="<?php echo $submenu["titulo"];?>" id="submenu-titulo" readonly="" width="100px"/>
                              <div class="switch-toggle switch-3 switch-candy switch-candy-blue">
                                  
                                  <input class="video" name="tipo" type="radio" checked>
					<label id="label-video"  onclick="">Video</label>

                                        <input class="galeria" name="tipo" type="radio">
					<label id="label-galeria" onclick="">Galería</label>

					<input class="HTML" name="tipo" type="radio">
					<label  id="label-HTML" onclick="">HTML</label>

					<a></a>
				</div>
                               </form> 
                    </div>
 </div>
<script src="<?php echo base_url() ?>js/jquery-ui-1.10.4.sortable.min.js" type="text/javascript"></script>
<script>
 $(".btn_submenus_titulo").click(function(){
      btn_menu = $(this).closest("div");
        menuid=$(this).closest("li").attr("idmenu");
        $(".btn_submenus_titulo").removeClass("active");
        
        $(this).button().addClass("active");
          
        nombreDelSubmenu = $.trim(btn_menu.find(".btn_submenus_titulo").html());
       console.log(nombreDelSubmenu);
      $('#submenu-titulo').attr('value',nombreDelSubmenu);
        $(".video").attr('id',menuid+'vid');
        $(".galeria").prop('id',menuid+'galeria');
        $(".HTML").prop('id',menuid+'HTML');
        
         if(menuid){
             console.log('sub:'+menuid);
            
         //alert(menuid);
//    $("span").closest("ul").css({"color":"red","border":"2px solid red"});
     
       
//     if(menuid==subid){
      
      $("#label-video").prop('for',menuid+'vid');
        $("#label-galeria").prop('for',menuid+'galeria');
        $("#label-HTML").prop('for',menuid+'HTML');
//         }}
    }

    });
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
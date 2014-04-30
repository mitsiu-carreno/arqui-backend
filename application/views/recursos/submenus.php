

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
 <div class="row">
     <div style="padding-left:3%">

    <ul id="lista-submenus"  class="list-block">
        <?php foreach ($ownSubmenu as $submenu): ?>
        <li class="li-menu" idmenu="<?php echo $submenu["id"] ?>">
            <div class="btn-group" style="vertical-align: baseline">
                    
                    <input type="button"  id="editar_sub" class="btn btn-default btn_submenus_titulo" value="<?php echo $submenu["titulo"] ?>" style="width:100px;">
                        
              
                    <button type="button" class="btn btn-default btn_submenus_mover"><span class="glyphicon glyphicon-move"></span></button>
                    <button type="button" class="btn btn-default btn_submenus_eliminar"><span class="glyphicon glyphicon-remove-circle"></span></button>
                   
                    <button type="button" class="btn btn-default btn_submenus_editar dropdown-toggle">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
<!--                    <ul class="dropdown-menu" role="menu">
   
                        <form id="tipo" role="form">
                            <div class="checkbox">
                                <input type="radio" name="tipo" id="sub" value="0"> Submenú
                                <br>
                                <input type="radio" name="tipo" id="html" value="1" checked="" > HTML 
                            </div>
                        </form>
-->                  
<!--<li><a href=""><span class="glyphicon glyphicon-remove-circle text-danger"></span>Eliminar</a></li>
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
                    <button type="button" class="btn btn-default btn_submenus_titul" style="width:100px;">
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
<!--      <div class="col-md-5">
                              <form id="tipo" role="form">
                                  submenú seleccionado: <input type="text" value="no ha seleccionado" id="submenu-titulo" readonly="" width="100px"/>
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
      <div class="col-md-8">
            <div class="panel panel-primary" id="submenu_content">
                <div class="panel-heading">
                    <h3 class="panel-title">Menú</h3>
                </div>
                <div class="panel-body">

                </div>
            </div>
    </div>-->
 </div>
<script src="<?php echo base_url() ?>js/jquery-ui-1.10.4.sortable.min.js" type="text/javascript"></script>
<script>
 $(".btn_submenus_titulo").click(function(){
      btn_menu = $(this).closest("div");
        submenuid=$(this).closest("li").attr("idmenu");
        $(".btn_submenus_titulo").removeClass("active");
        
        $(this).button().addClass("active");
             $("#menu_content").show();
         $(".btn_submenus_titulo").attr("idmenu");
         nombreDelsubMenu=$(this).val();
    
      $('#submenu-titulo').attr('value',nombreDelsubMenu);
        $(".video").attr('id',submenuid+'vid');
        $(".galeria").prop('id',submenuid+'galeria');
        $(".HTML").prop('id',submenuid+'HTML');
        
         if(submenuid){
             console.log('sub:'+submenuid);
            
         //alert(menuid);
//    $("span").closest("ul").css({"color":"red","border":"2px solid red"});
     
       $("#menu_content .panel-body").load("<?php echo site_url(array("submenu","get")) ?>/" + submenuid);
 
//     if(menuid==subid){
      
      $("#label-video").prop('for',submenuid+'vid');
        $("#label-galeria").prop('for',submenuid+'galeria');
        $("#label-HTML").prop('for',submenuid+'HTML');
//         }}
    }

    });
    $(".btn_submenus_editar").click(function(e) {
      

        e.preventDefault();
                  
        console.log('name'+nombreDelsubMenu);
        bootbox.prompt({
            title: "Editar submenú",
            value: nombreDelsubMenu,
            callback: function(result) {
                if (result === null) {
                    console.log("Prompt dismissed");
                } else {
         
                    var parametros = {id:submenuid,"titulo": result};
                    console.log(parametros);
                    $.post("<?php echo site_url(array("submenu", "editar")) ?>/"+ submenuid, $.param(parametros),"json");
                      
                }
            }
        });
    });
    
         $(".btn_submenus_titulo").dblclick(function(e){
            console.log('editar');
                 
            var btn_menu = $(this).closest("div");
            submenuid = btn_menu.closest("li").attr("idmenu");
            e.preventDefault();
            var nombreDelsubMenu = $.trim(btn_menu.find(".btn_submenus_titulo").html());
        
            console.log('je'+nombreDelsubMenu);
            var selector ='#editar_sub';
            $(selector).removeAttr("type");
            $(this).attr('type','text');
            $(this).keypress(function(key){
      
        var unicode
            if (key.charCode)
                unicode=key.charCode;
            else
                unicode=key.keyCode;
            if (unicode == 13){
//                 
                    btn_menu.find(".btn_submenus_titulo").html();
                    var result=$(this).val();
                    var parametros = {id:submenuid,"titulo": result};
                    console.log(parametros);
                    $.post("<?php echo site_url(array("submenu", "editar")) ?>/"+ submenuid, $.param(parametros),"json");
                    $(this).prop('type','button');
    }
             });

             
                });
                
      $(".btn_submenus_eliminar").click(function(e){
          e.preventDefault();
        $('.btn_submenus_titulo').removeClass('active');   
        submenuid=$(this).closest("li").attr("idmenu");
         var parametros = submenuid;
        
      //  alert(menuid);
      console.log(submenuid);
       bootbox.confirm("Está seguro de eliminar el submenú?", function(result) {
         console.log("Confirmed: "+result);
         if(result==true){  
         
      
      
      $.get("<?php echo site_url(array("submenu", "eliminar")) ?>/" + submenuid);
       window.location.reload();
         
        
                }
}); 
});  
    $("#btn_submenus_add").click(function() {
        bootbox.prompt("Crear nuevo submenú", function(data) {
            console.log(data);
            
              var parametros={"titulo":data};
             
        
      //  alert(menuid);
      console.log(parametros);
            if (data && data.length > 0) {
              $.post("<?php echo site_url(array("submenu", "insert")) ?>/"+menuid, $.param(parametros), function(success){
                    console.log(success);
                  window.location.reload();
                  $('.btn_menus_titulo').addClass('active');   
                },"json");
                    if(submenuid){
                     $('.btn_submenus_titulo').removeClass('active');   

                 }
            }
        });
    });
    </script>      
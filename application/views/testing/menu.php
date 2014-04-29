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
<body>    
<div class="container" style="margin-top: 80px">
    <div class="fondo_1">
                <label>Menús</label>
</div>
    <!-- Single button -->
    <div class="row">
  <div class="col-md-3" style>

    <ul id="lista-menus"  class="list-block">
        <?php foreach ($menus as $m): ?>
        <li class="li-menu" idmenu="<?php echo $m["id"] ?>">
            <div class="btn-group" style="vertical-align: baseline">
                    
                    <input type="button"  id="editar" class="btn btn-default btn_menus_titulo" value="<?php echo $m["titulo"] ?>" style="width:100px;">
                        
              
                    <button type="button" class="btn btn-default btn_menus_mover"><span class="glyphicon glyphicon-move"></span></button>
                    <button type="button" class="btn btn-default " data-toggle="dropdown">
                       Tipo
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
   
                        <form id="tipo" role="form">
                            <div class="checkbox">
                                <input type="radio" name="tipo" id="sub" value="0"> Submenú
                                <br>
                                <input type="radio" name="tipo" id="html" value="1" checked="" > HTML 
                            </div>
                        </form>
                    </ul>
                    <button type="button" class="btn btn-default btn_menus_eliminar"><span class="glyphicon glyphicon-remove-circle"></span></button>
<!--                    <div class="col-md-5">
                              <form id="tipo" role="form">
                                  <div class="switch-toggle switch-candy switch-candy-blue large-1" style="width:160px;">
                                      <input id="<?php echo $m["id"]?>" name="tipo" idmenu="1" type="radio" value="0">
                                      <label id="label-sub"  onclick="">Submenu</label>

                                        <input id="<?php echo $m["id"]?>html" name="tipo" type="radio" value="1" checked>
					<label id="label-html" onclick="">HTML</label>

					<a></a>
				</div>
                               </form> 
                    </div>-->
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
        <?php if (count($menus) == 0): ?>
            <li id="li_menus_empty">
                <small><i>No hay menús, haga click en el siguiente botón para agregar uno -></i></small>
            </li>
        <?php endif; ?>
        <li id="li_menus_add">
            <button class="btn btn-success" id="btn_menus_add">Nuevo menú <span class="glyphicon glyphicon-plus"></span></button>
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
                                      <input id="<?php echo $m["id"]?>" name="tipo" idmenu="1" type="radio" value="0">
                                      <label id="label-sub"  onclick="">Submenu</label>

                                        <input id="<?php echo $m["id"]?>html" name="tipo" type="radio" value="1" checked>
					<label id="label-html" onclick="">HTML</label>

					<a></a>
				</div>
                               </form> 
                    </div>
                </div>
            </li>
               </div>
       <div class="col-md-3">
               <div class="panel panel-primary" id="sub-menu_content">
                <div class="panel-heading">
                    <h3 class="panel-title">submenú</h3>
                </div>
                <div class="panel-body">

                </div>
                    </div>
           </div>
        <div class="col-md-6">
            <div class="panel panel-primary" id="menu_content">
                <div class="panel-heading">
                    <h3 class="panel-title">Edición</h3>
                </div>
                <div class="panel-body">

                </div>
            </div>
    </div>
        <div class="row">
            <div class="col-md-4">
                
            </div>

    </div>
       
</div> <script src="<?php echo base_url() ?>js/jquery-ui-1.10.4.sortable.min.js" type="text/javascript"></script>
<script>
    
    var menuid = null;
       
    var loadSubmenuContent = function(tipo){
            if(tipo==0||tipo==null){
                $('#sub').attr('checked', true);
                $("#submenu_content .panel-body").load("<?php echo site_url(array("tipo","get")) ?>/" + menuid);
            }else{
                $('#html').attr('checked', true);
            }
    };
    $( document ).ready(function() {
        
        
        //$(".btn").slice(2,3).button("toggle");
        //$(".btn_menus_titulo").first().button("toggle");
        $(".btn_menus_titulo").first().addClass("active");
        //$(".btn_menus_titulo").first().button("untoggle");
        menuid=$("#lista-menus li").first().attr("idmenu");
        //alert(<?php echo $idcliente?>);
        //alert('antes');
        $.getJSON("<?php echo site_url(array("tipo","get")) ?>/" + menuid, function(data){
            loadSubmenuContent(data.tipo);
        });
    });
    $(".btn_menus_eliminar").click(function(e){
          e.preventDefault();
        $('.btn_menus_titulo').removeClass('active');   
        menuid=$(this).closest("li").attr("idmenu");
         var parametros = menuid;
        
      //  alert(menuid);
      console.log(menuid);
       bootbox.confirm("Está seguro de eliminar el menú?", function(result) {
         console.log("Confirmed: "+result);
         if(result==true){  
         
      
      
      $.get("<?php echo site_url(array("menus", "eliminar")) ?>/" + menuid);
       window.location.reload();
         
        
                }
}); 
}); 
    
    $(".btn_menus_editar").click(function(e) {
        var btn_menu = $(this).closest("div");
        var menuid = btn_menu.closest("li").attr("idmenu");
        e.preventDefault();
        var nombreDelMenu = $.trim(btn_menu.find(".btn_menus_titulo").html());
        console.log(nombreDelMenu);
        bootbox.prompt({
            title: "Editar menú",
            value: nombreDelMenu,
            callback: function(result) {
                if (result === null) {
                    console.log("Prompt dismissed");
                } else {
                    btn_menu.find(".btn_menus_titulo").html(result);
                    var parametros = {id:menuid,"titulo": result};
                    $.post("<?php echo site_url(array("menus", "editar", $idcliente)) ?>", $.param(parametros),"json");
                }
            }
        });
    });

    $("#lista-menus").sortable({
        handle: ".btn_menus_mover",
        cancel: '',
        update: function( event, ui ) {
            var elementos = {};
            $.each($("#lista-menus .li-menu"), function(index,value){
                elementos[index+1] = $(value).attr("idmenu");
            });
            var parametros = {"menus" : elementos};
            console.log(parametros);
            $.post("<?php echo site_url(array("menus", "resort", $idcliente)) ?>", $.param(parametros),"json");
        }
    }).disableSelection();

    $("#btn_menus_add").click(function() {
        bootbox.prompt("Crear nuevo menú", function(data) {
            console.log(data);
            if (data && data.length > 0) {
                var parametros = {"titulo": data};
                $.post("<?php echo site_url(array("menus", "insert", $idcliente)) ?>", $.param(parametros), function(success){
                    console.log(success);
                    var li = $("#li_to_clone").clone().attr("id","").removeClass("hidden").attr("idmenu",success.id);
                    li.find(".btn_menus_titulo").html(success.titulo);
                    $("#lista-menus li:last").before(li);
                },"json");
                
                $("#li_menus_empty").remove();
                window.location.reload();
            }
        });
    });
    
    
    $(".btn_menus_titulo").click(function(tipo){
        menuid=$(this).closest("li").attr("idmenu");
        $(".btn_menus_titulo").removeClass("active");
        $(this).button().addClass("active");
         
       
      
          
       //  if(menuid){
             console.log(menuid + "test");
             $.getJSON("<?php echo site_url(array("tipo","getTipo")) ?>/" + menuid, function(data){
            console.log(data);
            if(data=="1"){
                 $("#menu_content .panel-body").load("<?php echo site_url(array("tipo","get")) ?>/" + menuid);
            }
            else{
                $("#sub-menu_content .panel-body").load("<?php echo site_url(array("tipo","get")) ?>/" + menuid);
            }
            });
            
         //alert(menuid);
//    $("span").closest("ul").css({"color":"red","border":"2px solid red"});
        
 /*
 if(loadSubmenuContent){
    $("#sub-menu_content .panel-body").load("<?php echo site_url(array("tipo","get")) ?>/" + menuid);
 }
 else{
     console.log("nooooooo");
 }
 
 $.getJSON("<?php echo site_url(array("tipo","get"));?>/"+menuid,function(data){
     console.log(data);
     
 });
       */
            
  //  }

    });
    
       $('#tipo input').on('change', function() {
                    //alert($('input[name=tipo]:checked', '#tipo').val()); <!--value de radio-->
                    var parametros = {tipo: $('input[name=tipo]:checked', '#tipo').val()};
                        console.log($.param(parametros));
                      //  alert(menuid);
                        $.post("<?php echo site_url(array("tipo","set")) ?>/" + menuid, $.param(parametros));
                    if($('input[name=tipo]:checked', '#tipo').val()==1){
                        $("#menu_content").show();                     
                        $("#sub-menu_content").hide();
                    }
                    else{
                        $("#sub-menu_content").show();
                        $("#menu_content").show();
                    }
                });
        
             //$("#submenu_content .panel-body").load("<?php echo site_url(array("submenu","get")) ?>/" + menuid);
    
                
                
                $("body").delegate("#inp_videourl","keyup", function(){
                    console.log($(this).serialize());
                    $.post("<?php echo site_url(array("submenu","update","videoURL")) ?>/" + menuid, $(this).serialize());
                    $("#iframe_video").attr("src",$(this).val());
                });
                
                $("body").delegate("#btn_agregar_indice_video","click", function(){
                    console.log("bumm");
                    bootbox.dialog({
                        message: "Tiempo:<input type='time' id='inp_new_time_video' step='1'></input><br />Botón<input typoe='text' id='id_new_button_video' />",
                         buttons: {
                            main: {
                              label: "Insertar",
                              className: "btn-success",
                              callback: function() {
                                  var li = $("#tpl_li_indice_video").clone().attr("id","").removeClass("hidden");
                                  li.find("input name[txt_time_video]").val($('#inp_new_time_video').val());
                                  li.find("input name[txt_boton_video]").val($('#id_new_button_video').val());
                                  li.attr("idmarcador",1);
                                console.log("Hi "+ $('#inp_new_time_video').val());
                              }
                            },
                            danger: {
                                label: "Cancelar",
                                className: "btn-danger",
                                callback: function() {
                                }
                            }
                        }
                    });
                });
                //videoURL

     $(".btn_menus_titulo").dblclick(function(e){
            console.log('hola');
                 
            var btn_menu = $(this).closest("div");
            var menuid = btn_menu.closest("li").attr("idmenu");
            e.preventDefault();
            var nombreDelMenu = $.trim(btn_menu.find(".btn_menus_titulo").html());
        
            console.log('je'+nombreDelMenu);
            var selector ='#editar';
            $(selector).removeAttr("type");
            $(this).attr('type','text');
            $(this).keypress(function(key){
      
        var unicode
            if (key.charCode)
                unicode=key.charCode;
            else
                unicode=key.keyCode;
            if (unicode == 13){
                    btn_menu.find(".btn_menus_titulo").html();
                    var result=$(this).val();
                    var parametros = {id:menuid,"titulo": result};
                    $.post("<?php echo site_url(array("menus", "editar", $idcliente)) ?>", $.param(parametros),"json");
                    $(this).prop('type','button');
                    
    }
             });

             
                });
                    
                
</script>
    


</body>
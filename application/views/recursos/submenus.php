

<style>
    #lista-submenus {
        list-style: none;
        margin: 0px;
        padding: 0px;
    }
    .btn-ta{
        width: 50%;
    }

    .btn-submenu-opcion{
        float: right;
        margin-bottom: 5px;
    }

    .submenu-title-input{
        display: none;
    }
    #lista-submenus{
        font-size: small;
    }
    #lista-submenus .list-group-item {
        padding: 10px 5px;
    }
    #lista-submenus .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
        background-color: #F7F7F7;
        background-image: none !important;
        border-color: #fff;
        border: 1px solid #ddd;
    }

</style>
<div class="row">
    <div style="padding-left:3%">

        <ul id="lista-submenus"  class="list-block">
            <?php foreach ($ownSubmenu as $submenu): ?>
        <!--        <li class="li-menu" idmenu="<?php echo $submenu["id"] ?>">
                    <div class="btn-group" style="vertical-align: baseline">
                            
                            <input type="button"  id="editar_sub" class="btn btn-default btn_submenus_titulo" value="<?php echo $submenu["titulo"] ?>" style="width:100px;">
                                
                      
                            <button type="button" class="btn btn-default btn_submenus_mover"><span class="glyphicon glyphicon-move"></span></button>
                            <button type="button" class="btn btn-default btn_submenus_eliminar"><span class="glyphicon glyphicon-remove-circle"></span></button>
                           
                            <button type="button" class="btn btn-default btn_submenus_editar dropdown-toggle">
                                <span class="glyphicon glyphicon-edit"></span>
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
                                <li><a href="<?php echo base_url(); ?>/menus/editar" class="btn_menus_editar"><span class="glyphicon glyphicon-edit"></span>Editar</a></li>
                            </ul>
                        </div>
                    </li>-->
                <li class="list-group-item hola" idsubmenu="<?php echo $submenu["id"] ?>">
                    <a href="#" class="btn-submenu-detail"><span class="submenu-title"><?php echo $submenu["titulo"] ?></span></a>
                    <input type="text" value="<?php echo $submenu["titulo"] ?>" class=" submenu-title-input" />
                    <a href="#" class="btn_submenus_eliminar btn-menu-opcion"><span class="glyphicon glyphicon-trash"></span></a>
                    <!--<a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-resize-vertical"></span></a>-->
                    <a href="#" class="btn-submenu-opcion dropdown-toggle pull-right" data-toggle="dropdown"><span class="submenu-tipo"><?php
                            if ($submenu["tipo"] == "0") {
                                echo "html";
                            } else if ($submenu["tipo"] == "3") {
                                echo "galeria";
                            } else {
                                echo "video";
                            }
                            ?>
                        </span><span class="caret"></span></a>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#" class="submenu-tipo-selectable">video</a></li>
                        <li><a href="#" class="submenu-tipo-selectable">galeria</a></li>
                        <li><a href="#" class="submenu-tipo-selectable">html</a></li>
                    </ul>
                </li>
            <?php endforeach; ?>
            <?php if (count($ownSubmenu) == 0): ?>
                <li id="li_menus_empty2">
                    <small><i>No hay submenús, haga click en el siguiente botón para agregar uno -></i></small>
                </li>

            <?php endif; ?>
            <li id="li_menus_add">
                <button class="btn btn-success btn-block" id="btn_submenus_add">Nuevo submenú <span class="glyphicon glyphicon-plus"></span></button>
                <small>- Doble click sobre el título para editarlo</small>
            </li>
        </ul>
        <li id="li_to_clone_sub" class="hidden list-group-item hola">
            <a href="#" class="btn-submenu-detail"><span class="submenu-title">Cras justo odio </span></a>
            <input type="text" value="Cras justo odio" class=" submenu-title-input" />
            <a href="#" class="btn_submenus_eliminar btn-menu-opcion"><span class="glyphicon glyphicon-trash"></span></a>
            <!--<a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-resize-vertical"></span></a>-->
                    <a href="#" class="btn-submenu-opcion dropdown-toggle pull-right" data-toggle="dropdown"><span class="submenu-tipo">
                <?php
                            if ($submenu["tipo"] == "0") {
                                echo "html";
                            } else if ($submenu["tipo"] == "3") {
                                echo "galeria";
                            } else {
                                
                                echo "video";
                            }
                            ?>
                </span><span class="caret"></span></a>
            <ul class="dropdown-menu pull-right" role="menu">
                <li><a href="#" class="submenu-tipo-selectable">video</a></li>
                <li><a href="#" class="submenu-tipo-selectable">galeria</a></li>
                <li><a href="#" class="submenu-tipo-selectable">html</a></li>
            </ul>
        </li>
    </div>
</div>
<script>
    //////////submenus/////

    $("#lista-submenus").delegate(".btn-submenu-opcion","click",function(e){
        e.preventDefault();
    });
    
    $("#lista-submenus").delegate(".submenu-tipo-selectable","click",function(e){
        e.preventDefault();
        var tipo;
        if($(e.target).html() == "html"){
            tipo = 0;
        } else if($(e.target).html() == "galeria"){
            tipo = 3;
        } else {
            
            tipo = 1;
            console.log("hola");
            $("#menu_content").load("<?php echo site_url(array("submenu", "get")) ?>/" + submenuid);
          
        }
        var this_submenuid = $(this).closest(".list-group-item").attr("idsubmenu");
        var parametros = {"tipo": tipo};
        console.log('id ' + this_submenuid + $.param(parametros));
         $.post("<?php echo site_url(array("submenu", "set_tipo")) ?>/" + this_submenuid, $.param(parametros));
        $(this).closest(".list-group-item").find(".submenu-tipo").html($(e.target).html());
    });
        $("#lista-submenus").delegate("li","dblclick",function(){
        var that = this;
        $(that).find(".submenu-title").hide();
        $(that).find("input").blur(function(){
                $(this).hide();
                $(that).find(".submenu-title").html($(this).val()).show();
        });
        $(that).find("input").show().focus().keyup(function(e){
            if(e.keyCode == 13){
                $(this).hide();
                $(that).find(".submenu-title").html($(this).val()).show();
                var this_submenuid = $(this).closest(".list-group-item").attr("idsubmenu");
                var parametros = {"titulo": $(this).val()};
                 $.post("<?php echo site_url(array("submenu", "editar")) ?>/"+ this_submenuid, $.param(parametros),"json");
            } else  if(e.keyCode == 27) {
                $(this).hide().val($(that).text());
                $(that).find(".submenu-title").show();
            }
        });
    });
    $("#btn_submenus_add").click(function() {
                bootbox.prompt("Crear nuevo submenú", function(data) {
                    if (data && data.length > 0) {
                        var parametros = {"titulo": data};
                        console.log(data);
                       $.post("<?php echo site_url(array("submenu", "insert")) ?>/"+menuid, $.param(parametros), function(success) {
                            console.log(success);
                            var li = $("#li_to_clone_sub").clone().attr("id", "").removeClass("hidden").attr("idsubmenu", success.id);
                            li.find(".submenu-title").html(success.titulo);
                            $("#sub-menu_content").load("<?php echo site_url(array("tipo", "get")) ?>/" + menuid);
                        }, "json");
                        $("#lista-submenus li").first().find(".btn-submenu-detail").click();
                        $("#li_submenus_empty").remove();
                    } 
                });
            });
             
$("#lista-submenus").delegate(".btn-submenu-detail", "click", function(e) {
        e.preventDefault();
        $(".hola").removeClass("active");
        $(this).closest(".list-group-item").addClass("active");
        var tipo  = $(this).closest(".list-group-item").find(".submenu-tipo").text();
        submenuid = $(this).closest(".list-group-item").attr("idsubmenu");
        console.log(submenuid);
        if (tipo == "video") {
            $("#menu_content").load("<?php echo site_url(array("submenu", "get")) ?>/" + submenuid);
            $("#menu_content").css("display","inline");
            $(".btn_guardar_html").addClass('hidden'); 
        } else {
            $("#menu_content").load("<?php echo site_url(array("submenu", "get")) ?>/" + submenuid);
            $(".btn_guardar_html").removeClass('hidden');
            $("#menu_content").css("display","inline");
        }
            $.getJSON("<?php echo site_url(array("submenu", "get_html")) ?>/"+ submenuid, function(data){
                            
                           console.log("data"+ data);
                            if(data==null){
                                tinymce.activeEditor.setContent(" ");
                            }
                            else{tinymce.activeEditor.setContent(data);}
                       
                          });
    });
        $(".btn_guardar_html").click(function(){
        var parametros={contenido:contenido_menu_html};
        console.log(parametros);    
            $.post("<?php echo site_url(array("submenu", "set_html")) ?>/"+ submenuid, $.param(parametros));

    });
     $("#lista-submenus").delegate(".btn_submenus_eliminar", "click", function(e) {
                e.preventDefault();
                $('.btn_submenus_titulo').removeClass('active');
                var this_submenuid = $(this).closest(".list-group-item").attr("idsubmenu");
                var that = this;
                bootbox.confirm("Está seguro de eliminar el submenú?", function(result) {
                    console.log("Confirmed: " + result);
                    if (result == true) {
                        $.get("<?php echo site_url(array("submenu", "eliminar")) ?>/" + this_submenuid);
                        $(that).closest(".list-group-item").remove();
                    }
                });
            });
            $("#lista-submenus li").first().find(".btn-submenu-detail").click();

    </script>      
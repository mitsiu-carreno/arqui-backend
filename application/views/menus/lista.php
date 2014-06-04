<style>
    #lista-menus {
        list-style: none;
        margin: 0px;
        padding: 0px;
    }
    .btn-ta{
        width: 50%;
    }
    .titulo{
        width: 100%;
        height: 20%;
       border-top: 1px solid gray;
        border-bottom: 1px solid gray;
    }
    .h3{
        margin:1% 35%; 
    }
        .btn-menu-opcion{
        float: right;
        margin-bottom: 5px;
    }
    
    .menu-title-input{
        display: none;
    }
    #lista-menus{
        font-size: small;
    }
    #lista-menus .list-group-item {
        padding: 10px 5px;
    }
    #lista-menus .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
        background-color: #F7F7F7;
        background-image: none !important;
        border-color: #fff;
        border: 1px solid #ddd;
    }
</style>
<body>    
    <div class="container" style="margin-top: 80px">
        <label class="titulo"><h3 class="h3"></h3></label>
        <!-- Single button -->
        <div class="row" style="margin-top:3%;">
           
            <div class="col-md-3" style>
                <div class="fondo_1">
                    <label>Menús</label>
                </div>
                
                <ul id="lista-menus" class="list-group">
                    <?php foreach ($menus as $m): ?>
                    <span><?php echo $m["nombre"]?></span>
                        <li class="list-group-item" idmenu="<?php echo $m["id"] ?>">
                            <a href="#" class="btn-menu-detail"><span class="menu-title"><?php echo $m["titulo"] ?></span></a>
                            <input type="text" value="<?php echo $m["titulo"] ?>" class=" menu-title-input" />
                            <a href="#" class="btn_menus_eliminar btn-menu-opcion"><span class="glyphicon glyphicon-trash"></span></a>
                            <!--<a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-resize-vertical"></span></a>-->
                            <a href="#" class="btn-menu-opcion dropdown-toggle pull-right" data-toggle="dropdown"><span class="menu-tipo"><?php echo $m["tipo"] == "0" ? "html" : "sub" ?></span><span class="caret"></span></a>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#" class="menu-tipo-selectable">html</a></li>
                                <li><a href="#" class="menu-tipo-selectable">sub</a></li>
                            </ul>
                        </li>

                    <?php endforeach; ?>
                    <?php if (count($menus) == 0): ?>
                        <li id="li_menus_empty">
                            <small><i>No hay menús, haga click en el siguiente botón para agregar uno -></i></small>
                        </li>
                    <?php endif; ?>
                   
                </ul>
                   
                        <button class="btn btn-success btn-block" id="btn_menus_add">Nuevo menú <span class="glyphicon glyphicon-plus"></span></button>
                        <small>- Doble click sobre el título para editarlo</small><br />
                        <small>- Arrastre los títulos para reordenar</small>
                    
            </div>
            <div class="col-md-3">
                <label>Submenús</label>
                <div id="sub-menu_content">
                </div>
            </div>
            <div class="col-md-6">
                <label>Contenido</label>
                <div id="menu_content"></div>
            </div>

        </div>
    <li id="li_to_clone" class="hidden list-group-item">
        <a href="#" class="btn-menu-detail"><span class="menu-title">Cras justo odio </span></a>
        <input type="text" value="Cras justo odio" class=" menu-title-input" />
    <a href="#" class="btn_menus_eliminar btn-menu-opcion"><span class="glyphicon glyphicon-trash"></span></a>
    <!--<a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-resize-vertical"></span></a>-->
        <a href="#" class="btn-menu-opcion dropdown-toggle pull-right" data-toggle="dropdown"><span class="menu-tipo">html</span><span class="caret"></span></a>
        <ul class="dropdown-menu pull-right" role="menu">
            <li><a href="#" class="menu-tipo-selectable">html</a></li>
            <li><a href="#" class="menu-tipo-selectable">sub</a></li>
        </ul>
    </li>
        <script>

            var menuid = null;

            var loadSubmenuContent = function(tipo) {
                if (tipo == 0 || tipo == null) {
                     $('#sub').attr('checked', true);
                    $("#submenu_content .panel-body").load("<?php echo site_url(array("tipo", "get")) ?>/" + menuid);
           
                   
                } else {
                     $('#html').attr('checked', true);
                        }
            };
            $(document).ready(function() {
                        
                menuid = $(".btn_menus_titulo").first().closest("li").attr("idmenu");
                if(menuid){
    //                $(".btn_menus_titulo").first().addClass("active");
                    //$(".btn_menus_titulo").first().button("untoggle");
    //                menuid = $("#lista-menus li").first().attr("idmenu");
                    //alert(<?php echo $idcliente ?>);
                    //alert('antes');
                    $.getJSON("<?php echo site_url(array("tipo", "get")) ?>/" + menuid, function(data) {
                        loadSubmenuContent(data.tipo);
                    });
                }
            });
            
            ///////////////////////////
            //                       //
            //      Lista de menús   //
            //                       //
            ///////////////////////////
            
     $("#lista-menus").sortable({
     
        update: function(event, ui) {
            var elementos = {};
            $.each($("#lista-menus .list-group-item"), function(index, value) {
                
                elementos[index + 1] = $(value).attr("idmenu");
            });
            var parametros = {"menus": elementos};
            console.log(parametros);
            $.post("<?php echo site_url(array("menus", "resort", $idcliente)) ?>", $.param(parametros), "json");
        }
    }).disableSelection();

    $("#lista-menus").delegate(".btn-menu-opcion","click",function(e){
        e.preventDefault();
    });
    
    $("#lista-menus").delegate(".menu-tipo-selectable","click",function(e){
        e.preventDefault();
        var tipo = $(e.target).html() == "html" ? 0 : 1;
        var this_menuid = $(this).closest(".list-group-item").attr("idmenu");
        var that = this;
        var parametros = {"tipo": tipo};
        console.log('id ' + menuid + $.param(parametros));
        $.post("<?php echo site_url(array("tipo", "set")) ?>/" + this_menuid, $.param(parametros)).done(function(){
            $(that).closest(".list-group-item").find(".menu-tipo").html($(e.target).html());
            if($(that).closest(".list-group-item").hasClass("active")){
                $(that).closest(".list-group-item").find(".btn-menu-detail").click();
            }
        });
        
    });
    $("#lista-menus").delegate("li","dblclick",function(){
        var that = this;
        $(that).find(".menu-title").hide();
        $(that).find("input").blur(function(){
                $(this).hide();
                $(that).find(".menu-title").html($(this).val()).show();
                var this_menuid = $(this).closest(".list-group-item").attr("idmenu");
                var parametros = {id: this_menuid, "titulo": $(this).val()};
                $.post("<?php echo site_url(array("menus", "editar", $idcliente)) ?>", $.param(parametros), "json");
        });
        $(that).find("input").show().focus().keyup(function(e){
            if(e.keyCode == 13){
                $(this).hide();
                $(that).find(".menu-title").html($(this).val()).show();
                var this_menuid = $(this).closest(".list-group-item").attr("idmenu");
                var parametros = {id: this_menuid, "titulo": $(this).val()};
                $.post("<?php echo site_url(array("menus", "editar", $idcliente)) ?>", $.param(parametros), "json");
            } else  if(e.keyCode == 27) {
                $(this).hide().val($(that).text());
                $(that).find(".menu-title").show();
            }
        });
    });
    $("#btn_menus_add").click(function() {
                bootbox.prompt("Crear nuevo menú", function(data) {
                    if (data && data.length > 0) {
                        var parametros = {"titulo": data};
                        console.log(data);
                        $.post("<?php echo site_url(array("menus", "insert", $idcliente)) ?>", $.param(parametros), function(success) {
                            var li = $("#li_to_clone").clone().attr("id", "").removeClass("hidden").attr("idmenu", success.id);
                            li.find(".menu-title").html(success.titulo);
                            li.find(".menu-title-input").val(success.titulo);
                            $("#lista-menus").append(li);
                            li.find(".btn-menu-detail").click();
                            li.addClass("active");
                        }, "json");
                        $("#li_menus_empty").remove();
                    }
                });
            });
    $("#lista-menus").delegate(".btn-menu-detail", "click", function(e) {
        e.preventDefault();
        console.log($(this).closest(".list-group-item"));
        $(".list-group-item").removeClass("active");
        $(this).closest(".list-group-item").addClass("active");
        var tipo  = $(this).closest(".list-group-item").find(".menu-tipo").text();
        menuid = $(this).closest(".list-group-item").attr("idmenu");
        if (tipo == "html") {
            $("#menu_content").load("<?php echo site_url(array("tipo", "get")) ?>/" + menuid);
            $("#menu_content").css("display","inline");
            $("#sub-menu_content").css("display","none");
        } else {
            $("#sub-menu_content").load("<?php echo site_url(array("tipo", "get")) ?>/" + menuid);
            $("#menu_content").css("display","none");
            $("#sub-menu_content").css("display","inline");
        }
    });
       
            $.getJSON("<?php echo site_url(array("clients","getclient",$idcliente));?>", function(data){
               console.log(data.nombre); 
               $(".h3").text("Proyecto: "+ data.nombre);
            });

    $("#lista-menus").delegate(".btn_menus_eliminar", "click", function(e) {
                e.preventDefault();
                $('.btn_menus_titulo').removeClass('active');
                var this_menuid = $(this).closest(".list-group-item").attr("idmenu");
                var that = this;
                bootbox.confirm("Está seguro de eliminar el menú?", function(result) {
                    console.log("Confirmed: " + result);
                    if (result == true) {
                        $.get("<?php echo site_url(array("menus", "eliminar")) ?>/" + this_menuid);
                        $(that).closest(".list-group-item").remove();
                    }
                });
            });

$("#lista-menus li").first().find(".btn-menu-detail").click();
        </script>
</body>

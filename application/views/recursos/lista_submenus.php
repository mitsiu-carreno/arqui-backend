

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

<ul id="lista-submenus" class="list-block">
     <li id="li_submenus_empty">
                <small><i>No hay submenús, haga click en el siguiente botón para agregar uno</i></small>
            </li>
     
        <li id="li_menus_add">
            <button class="btn btn-success btn-block" id="btn_submenus_add">Nuevo submenú <span class="glyphicon glyphicon-plus"></span></button>
        </li>
         <li id="li_to_clone_sub" class="hidden list-group-item hola">
            <a href="#" class="btn-submenu-detail"><span class="submenu-title">Cras justo odio </span></a>
            <input type="text" value="Cras justo odio" class=" submenu-title-input" />
            <a href="#" class="btn_submenus_eliminar btn-menu-opcion"><span class="glyphicon glyphicon-trash"></span></a>
            <!--<a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-resize-vertical"></span></a>-->
                    <a href="#" class="btn-submenu-opcion dropdown-toggle pull-right" data-toggle="dropdown"><span class="submenu-tipo">
               video
                </span><span class="caret"></span></a>
            <ul class="dropdown-menu pull-right" role="menu">
                <li><a href="#" class="submenu-tipo-selectable">video</a></li>
                <li><a href="#" class="submenu-tipo-selectable">galeria</a></li>
                <li><a href="#" class="submenu-tipo-selectable">html</a></li>
            </ul>
        </li>
      
</ul>
 <script src="<?php echo base_url() ?>js/jquery-ui-1.10.4.sortable.min.js" type="text/javascript"></script>
<script>
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
    </script>
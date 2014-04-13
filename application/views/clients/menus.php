<style>
    #lista-menus {
        list-style: none;
        margin: 0px;
        padding: 0px;
    }
</style>
<div class="container">
    <!-- Single button -->
    <ul id="lista-menus"  class="list-inline">
        <?php foreach ($menus as $m): ?>
        <li class="li-menu" idmenu="<?php echo $m["id"] ?>">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn_menus_titulo">
                        <?php echo $m["titulo"] ?>
                    </button>
                    <button type="button" class="btn btn-default btn_menus_mover"><span class="glyphicon glyphicon-move"></span></button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href=""><span class="glyphicon glyphicon-remove-circle text-danger"></span>Eliminar</a></li>
                        <li><a href="<?php echo base_url();?>/menus/editar" class="btn_menus_editar"><span class="glyphicon glyphicon-edit"></span>Editar</a></li>
                    </ul>
                </div>
            </li>
        <?php endforeach; ?>
        <?php if (count($menus) == 0): ?>
            <li id="li_menus_empty">
                <small><i>No hay menús, haga click en el siguiente botón para agregar uno -></i></small>
            </li>
        <?php endif; ?>
        <li id="li_menus_add">
            <button class="btn btn-success" id="btn_menus_add"><span class="glyphicon glyphicon-plus"></span></button>
        </li>
    </ul>
</div>
<li id="li_to_clone" class="hidden li-menu" idmenu="">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn_menus_titulo">
                    </button>
                    <button type="button" class="btn btn-default btn_menus_mover"><span class="glyphicon glyphicon-move"></span></button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href=""><span class="glyphicon glyphicon-remove-circle text-danger"></span>Eliminar</a></li>
                        <li><a href="<?php echo base_url();?>/menus/editar" class="btn_menus_editar"><span class="glyphicon glyphicon-edit"></span>Editar</a></li>
                    </ul>
                </div>
            </li>
<script src="<?php echo base_url() ?>js/jquery-ui-1.10.4.sortable.min.js" type="text/javascript"></script>
<script>
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
        cancel: ''
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
            }
        });
    });
</script> 
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
        <li>
            <div class="btn-group">
                <button type="button" class="btn btn-default">
                    <?php echo $m["titulo"] ?>
                </button>
                <button type="button" class="btn btn-default btn_menus_mover"><span class="glyphicon glyphicon-move"></span></button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span><span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><span class="glyphicon glyphicon-remove-circle text-danger"></span>Eliminar</a></li>
                    <li><a href="#" class="btn_menus_editar"><span class="glyphicon glyphicon-edit"></span>Editar</a></li>
                </ul>
            </div>
        </li>
        <?php endforeach; ?>
        <?php if (count($menus) == 0): ?>
        <li>
            <small><i>No hay menús, haga click en el siguiente botón para agregar uno -></i></small>
        </li>
        <?php endif; ?>
        <li id="li_menus_add">
            <button class="btn btn-success" id="btn_menus_add"><span class="glyphicon glyphicon-plus"></span></button>
        </li>
    </ul>
</div>
<script src="<?php echo base_url() ?>js/jquery-ui-1.10.4.sortable.min.js" type="text/javascript"></script>
<script>
    $(".btn_menus_editar").click(function(e) {
        e.preventDefault();
        var nombreDelMenu = $(this).text();
        console.log(nombreDelMenu);
        bootbox.prompt({
            title: "Editar menú",
            value: "Menú 2",
            callback: function(result) {
                if (result === null) {
                    console.log("Prompt dismissed");
                } else {
                    console.log("Hi <b>" + result + "</b>");
                }
            }
        });
    });

    $("#lista-menus").sortable({
        handle: ".btn_menus_mover",
        cancel : ''
    }).disableSelection();
    
    $("#btn_menus_add").click(function(){
        bootbox.prompt("Crear nuevo menú", function(data){
            console.log(data);
            if(data && data.length > 0){
                var parametros = {"titulo" : data};
                $.post("<?php echo site_url(array("menus","insert",$idcliente)) ?>", $.param(parametros));
                var li = $("li").html(data);
                li.insertBefore("#lista-menus li:last");
            }
        });
    });
</script> 
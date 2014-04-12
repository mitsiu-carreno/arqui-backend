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
        <li>
            <div class="btn-group">
                <button type="button" class="btn btn-default">
                    Menú 1 
                </button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span><span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><span class="glyphicon glyphicon-remove-circle text-danger"></span>Eliminar</a></li>
                    <li><a href="#" class="btn_menus_editar"><span class="glyphicon glyphicon-edit"></span>Editar</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-move"></span>Mover</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="btn-group">
                <button type="button" class="btn btn-default">
                    Menú 2
                </button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span><span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><span class="glyphicon glyphicon-remove-circle text-danger"></span>Eliminar</a></li>
                    <li><a href="#" class="btn_menus_editar"><span class="glyphicon glyphicon-edit"></span>Editar</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-move"></span>Mover</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="btn-group">
                <button type="button" class="btn btn-default">
                    Menú 3
                </button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span><span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><span class="glyphicon glyphicon-remove-circle text-danger"></span>Eliminar</a></li>
                    <li><a href="#" class="btn_menus_editar"><span class="glyphicon glyphicon-edit"></span>Editar</a></li>
                    <li><a href="#" class="btn_menus_mover"><span class="glyphicon glyphicon-move"></span>Mover <small><i>Arrastre</i></small></a></li>
                </ul>
            </div>
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
        handle: ".btn_menus_mover"
    }).disableSelection();
</script> 
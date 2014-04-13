<style>
    #lista-menus {
        list-style: none;
        margin: 0px;
        padding: 0px;
    }
</style>
<div class="container">
    <!-- Single button -->
    <ul id="lista-menus">
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
            <li><a href="#"><span class="glyphicon glyphicon-move"></span>Mover</a></li>
        </ul>
    </div>
        </li>
    </ul>
</div>
<script src="<?php echo base_url() ?>js/core.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/mouse.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/widget.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/sortable.js" type="text/javascript"></script>
<script>
    $(".btn_menus_editar").click(function(e) {
        e.preventDefault();
        var nombreDelMenu = $(this).text();
        console.log(nombreDelMenu);
        bootbox.prompt({
            title : "Editar menú",
            value : "Menú 2",
            callback: function(result) {
                if (result === null) {
                    console.log("Prompt dismissed");
                } else {
                    console.log("Hi <b>" + result + "</b>");
                }
            }
        });
    });
    
    $("#lista-menus").sortable();
</script> 

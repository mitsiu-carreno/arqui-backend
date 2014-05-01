<style>
    .btn-menu-opcion{
        float: right;
        margin: 2px;
        margin-bottom: 5px;
    }
    
    .menu-title-input{
        display: none;
    }
</style>
<ul id="lista-menus" class="list-group col-md-4" style="margin: 20px">
    <li class="list-group-item"><span class="menu-title">Cras justo odio </span>
        <input type="text" value="Cras justo odio" class=" menu-title-input" />
        <a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-trash"></span></a>
        <a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-resize-vertical"></span></a>
        <a href="#" class="btn-menu-opcion dropdown-toggle pull-right" data-toggle="dropdown"><span class="menu-tipo">html</span><span class="caret"></span></a>
        <ul class="dropdown-menu pull-right" role="menu">
            <li><a href="#" class="menu-tipo-selectable">html</a></li>
            <li><a href="#" class="menu-tipo-selectable">submenu</a></li>
        </ul>
    </li>
    <li class="list-group-item"><span class="menu-title">Cras justo odio </span><input type="text" value="Cras justo odio" class=" menu-title-input" />
    <a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-trash"></span></a>
    <a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-resize-vertical"></span></a>
        <a href="#" class="btn-menu-opcion dropdown-toggle pull-right" data-toggle="dropdown"><span class="menu-tipo">html</span><span class="caret"></span></a>
        <ul class="dropdown-menu pull-right" role="menu">
            <li><a href="#" class="menu-tipo-selectable">html</a></li>
            <li><a href="#" class="menu-tipo-selectable">submenu</a></li>
        </ul>
    </li>
    <li class="list-group-item"><span class="menu-title">Cras justo odio </span><input type="text" value="Cras justo odio" class=" menu-title-input" />
    <a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-trash"></span></a>
    <a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-resize-vertical"></span></a>
        <a href="#" class="btn-menu-opcion dropdown-toggle pull-right" data-toggle="dropdown"><span class="menu-tipo">html</span><span class="caret"></span></a>
        <ul class="dropdown-menu pull-right" role="menu">
            <li><a href="#" class="menu-tipo-selectable">html</a></li>
            <li><a href="#" class="menu-tipo-selectable">submenu</a></li>
        </ul>
    </li>
    <li class="list-group-item"><span class="menu-title">Cras justo odio </span><input type="text" value="Cras justo odio" class=" menu-title-input" />
    <a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-trash"></span></a>
    <a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-resize-vertical"></span></a>
        <a href="#" class="btn-menu-opcion dropdown-toggle pull-right" data-toggle="dropdown"><span class="menu-tipo">html</span><span class="caret"></span></a>
        <ul class="dropdown-menu pull-right" role="menu">
            <li><a href="#" class="menu-tipo-selectable">html</a></li>
            <li><a href="#" class="menu-tipo-selectable">submenu</a></li>
        </ul>
    </li>
    <li class="list-group-item"><span class="menu-title">Cras justo odio </span><input type="text" value="Cras justo odio" class=" menu-title-input" />
    <a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-trash"></span></a>
    <a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-resize-vertical"></span></a>
        <a href="#" class="btn-menu-opcion dropdown-toggle pull-right" data-toggle="dropdown"><span class="menu-tipo">html</span><span class="caret"></span></a>
        <ul class="dropdown-menu pull-right" role="menu">
            <li><a href="#" class="menu-tipo-selectable">html</a></li>
            <li><a href="#" class="menu-tipo-selectable">submenu</a></li>
        </ul>
    </li>
</ul>
<small>De doble click en cualquier elemento para editar</small>
<script src="<?php echo base_url() ?>js/jquery-ui-1.10.4.sortable.min.js" type="text/javascript"></script>
<script>
    $("#lista-menus").sortable().disableSelection();
    $(".btn-menu-opcion").click(function(e){
        e.preventDefault();
    });
    
    $("#lista-menus").delegate(".menu-tipo-selectable","click",function(e){
        e.preventDefault();
//        console.log($(e.target).html());
        
        console.log($(this).closest(".list-group-item").find(".menu-tipo").html());
        $(this).closest(".list-group-item").find(".menu-tipo").html($(e.target).html());
    });
    $("#lista-menus").delegate("li","dblclick",function(){
        var that = this;
        $(that).find(".menu-title").hide();
        $(that).find("input").blur(function(){
                $(this).hide();
                $(that).find(".menu-title").html($(this).val()).show();
        });
        $(that).find("input").show().focus().keyup(function(e){
            if(e.keyCode == 13){
                $(this).hide();
                $(that).find(".menu-title").html($(this).val()).show();
            } else  if(e.keyCode == 27) {
                $(this).hide().val($(that).text());
                $(that).find(".menu-title").show();
            }
        });
    });
    </script>
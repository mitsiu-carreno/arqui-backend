<script>
$(function(){
    $("#form_nuevo_cliente").submit(function(e){
        e.preventDefault();
        
    });
});
</script>
<form method="post" action="<?php echo site_url(array("clients","insert")) ?>" id="form_nuevo_cliente">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Crear cuenta</h4>
</div>
<div class="modal-body">
        <div class="form-group">
            <label for="inp_nuevoNombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="inp_nuevoNombre" placeholder="Escriba el nombre la cuenta">
            <small>Escriba un nombre significativo y descriptivo</small>
        </div>
        <div class="form-group">
            <label for="inp_nuevoEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inp_nuevoEmail" placeholder="Escriba el email de la cuenta">
            <small>Este email servirá para ingresar a la plataforma junto con la contraseña</small>
        </div>
        <div class="form-group">
            <label for="inp_nuevoPassword">Contraseña</label>
            <input type="password" name="password" class="form-control" id="inp_nuevoPassword" placeholder="Escriba la contraseña">
            
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger glyphicon glyphicon-remove" data-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-success glyphicon glyphicon-ok">Crear</button>
</div>
    </form>

<script>
$(function(){
    $("#btn-nuevo-cliente").click(function(){
        $("#div_form_nuevo").toggle("flip");
        $("#tbl-list").toggle("flip");
    });
    $("#form_nuevo_cliente").submit(function(e){
        e.preventDefault();
        $.ajax({
            url : this.action,
            type : "POST",
            dataType: "json",
            data : $(this).serialize(),
            success : function(cliente){
                if(!(cliente.id > 0)){
                    console.log("error: " + cliente);
                } else {
                    var tr = $("<tr />");
                    tr.append($("<td />").html(cliente.id));
                    tr.append($("<td />").html(cliente.nombre));
                    tr.append($("<td />").html(cliente.email));
                    $("#tbl-list > tbody").append(tr);
                    console.log("bien: " + cliente);
                }
            }
        });
        
        $("#div_form_nuevo").toggle("flip");
        $("#tbl-list").toggle("flip");
    });
});
</script>
<style>
    #div_form_nuevo {
        display: none;
    }
</style>
<div class="container" style="margin-top: 80px;">
    <button class="btn btn-success glyphicon glyphicon-plus" id="btn-nuevo-cliente" >Registrar Cuenta</button>
    <table id="tbl-list">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div id="div_form_nuevo">
        <form method="post" action="<?php echo site_url(array("clients", "insert")) ?>" id="form_nuevo_cliente">
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
                <button type="submit" class="btn btn-success glyphicon glyphicon-ok">Crear</button>
            </div>
        </form>
    </div>
</div>
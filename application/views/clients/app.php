<script src="<?php echo base_url() ?>js/underscore-min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/backbone-min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/serializeObject.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/clients-app.js" type="text/javascript"></script>
<style>
    #div_form_nuevo {
        display: none;
    }
    #div_form_editar {
        display: none;
    }
</style>
<div class="container" id="clientsapp" style="margin-top: 80px;">
    <button class="btn btn-success" id="btn-nuevo-cliente" ><span class="glyphicon glyphicon-plus"></span> Nuevo Proyecto</button>
    <!--Table-->
    <table id="tbl-list" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>&nbsp;</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!--New Form-->
    <div id="div_form_nuevo">
        <form method="post" action="<?php echo site_url(array("clients", "insert")) ?>" id="form_nuevo_cliente">
            <div class="page-header">
                <h2>Crear proyecto</h2>
            </div>
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
                <button type="button" id="btn_nuevo_cancelar" class="btn btn-danger glyphicon glyphicon-remove">Cancelar</button>
                <button type="submit" class="btn btn-success glyphicon glyphicon-ok">Crear</button>
        </form>
    </div>
    <!--Edit form-->
    <div id="div_form_editar" >
    </div>
</div>
<script type="text/template" id="item-template">
                <td><%- id %></td>
                <td><a href="<?php echo site_url(array("proyectos","menus")) ?>/<%- id %>"><%- nombre %></a></td>
                <td><%- email %></td>
                <td><button class="btn-editar btn btn-primary">Editar</button></td>
                <td><button class="btn-eliminar btn btn-default tooltip-status"  data-toggle="tooltip" data-placement="left" title="eliminar" ><span class="glyphicon glyphicon-remove-circle text-danger"></span></button></td>
</script>
<script type="text/template" id="item-edit">
        <form method="post" action="<?php echo site_url(array("clients", "update")) ?>" id="form_editar_cliente">
            <div class="page-header">
                <h4>Editar Proyecto</h4>
            </div>
                <div class="form-group">
                    <label for="inp_editarNombre">Nombre</label>
                    <input type="text" value="<%- nombre %>" name="nombre" class="form-control" id="inp_editarNombre" placeholder="Escriba el nombre la cuenta">
                    <small>Escriba un nombre significativo y descriptivo</small>
                </div>
                <div class="form-group">
                    <label for="inp_editarEmail">Email</label>
                    <input type="email" value="<%- email %>" name="email" class="form-control" id="inp_editarEmail" placeholder="Escriba el email de la cuenta">
                    <small>Este email servirá para ingresar a la plataforma junto con la contraseña</small>
                </div>
                <div class="form-group">
                    <label for="inp_editarPassword">Contraseña <small>Dejar este campo en blanco para no editar la contraseña</small></label>
                    <input type="password" name="password" class="form-control" id="inp_editarPassword" placeholder="Dejar este campo en blanco para no editar la contraseña">

                </div>
                <button type="button" id="btn_editar_cancelar" class="btn btn-danger glyphicon glyphicon-remove">Cancelar</button>
                <button type="submit" class="btn btn-success glyphicon glyphicon-ok">Editar</button>
        </form>
</script>
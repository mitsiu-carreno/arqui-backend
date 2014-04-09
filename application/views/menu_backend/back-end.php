
        <!--
        <div id="encabezado" class="borde">
            <div class="fondo_1">
                <label>Encabezado</label>
            </div>
            <div id="imagen_logo" class="borde"></div>
            <div class="row">
                <div class="col-sm-7 col-sm-offset-1 borde">
                    <label>Cambiar</label>
                    <button type="button" class="btn btn-primary">Buscar</button>
                </div>
                <div class="col-sm-3  borde">
                    <!--<span class="glyphicon glyphicon-info-sign"></span>    ->
                    <label>Esta imagen debe ser de 1024 x 200</label>
                </div>
            </div>    
        </div>
        -->
        <script>        
        $(function(){
            $.getJSON("<?php echo site_url(array("contacto","get",$idcliente)) ?>", function(data){
                $("#inp_email").val(data.contacto);
            });
            $("#inp_email").keyup(function(){
                //alert("Cambio");
                $.post("<?php echo site_url(array("contacto","set",$idcliente)) ?>", $("#form_contacto").serialize());
            });
            $("#txt_contacto").change(function() {
            //$("#txt_contacto").change(function(){
                //alert("Cambio");
                $.post("<?php echo site_url(array("contacto","set",$idcliente)) ?>", $("#form_contacto").serialize());
            });
        });
                </script>
        <br>
        <div id="contacto" class="borde" style="height: 500px">
            <div class="fondo_1">
                <label>Contacto</label>
            </div>
            <div>
                <form role="form" id="form_contacto">
                    <div class="row">
                        <div class="col-sm-1 col-sm-offset-1 borde">
                            <div class="form-group">
                                <label for="for_email">Email</label>
                            </div>
                        </div>
                        <div class="col-sm-2 borde">
                            <input name="contacto" type="email" class="form-contro inp_contactol" id="inp_email" placeholder="Ingrese email">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-1 col-sm-offset-1 borde">
                            <label>Contenido</label>
                        </div>
                        <div class="col-sm-2 borde">
                            <textarea name="contacto_texto" id="txt_contacto" class="textarea inp_contacto" placeholder="Enter text ..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="menu">
            <div class="fondo_1">
                <label>Menús</label>
            </div>
            <div class="row">
                <div class="col-sm-offset-1 borde">
                    <ul id="menu_div" class="nav nav-tabs">
                        <li><a href="#" class="menu_cont">Menu1</a></li>
                        <li><input type="text" href="#" class="menu_cont" id="nuevo_menu"></a></li>
                    </ul>
                </div>
            </div>
        </div>

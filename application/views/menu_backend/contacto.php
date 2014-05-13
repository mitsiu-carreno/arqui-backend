<script src="<?php echo base_url() ?>js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" charset="utf-8">
        $(function(){
            tinymce.init({
                selector: ".textarea",
                width: 550,
                menubar : false,
                height: 200,
                language : 'es',
                image_advtab: true,
                plugins: [
                     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                     "save table contextmenu directionality emoticons template paste textcolor jbimages"
               ],
               toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
               relative_urls: false,
            remove_script_host: false

            });
 
                
            $.getJSON("<?php echo site_url(array("clients","getclient",$idcliente));?>", function(data){
               //console.log(data.nombre); 
               $(".h3").text("Proyecto: "+ data.nombre);
            });
            $("#form_contacto").submit(function(e){
                e.preventDefault();
                var parametros = {contacto: $("#inp_email").val(), contacto_texto:tinymce.get('txt_contacto').getContent()};
                        console.log($.param(parametros));
                        $.post("<?php echo site_url(array("contacto","set",$idcliente)) ?>", $.param(parametros));
                
            });
        })
    </script>
    
        <style type="text/css" media="screen">
            #encabezado{
                height: 400px;
            }
            
            #imagen_logo{
                height: 300px;
                width: 90%;
                margin: 0 auto;
                margin-top: 15px;
            }
            .titulo{
        width: 100%;
        height: 20%;
       border-top: 1px solid gray;
        border-bottom: 1px solid gray;
    }
    .h3{
        margin:1% 35%; 
    }
            #contacto{
                height: 100px;
            }
            .borde{
                border: 0px solid #000;
            }
            .fondo_1{
                background-color: #B8B8B8;
                height: 30px;
            }
            
            .fondo_2{
                background-color: #e4e4e4;
            }
            .btn.jumbo {
		font-size: 20px;
		font-weight: normal;
		padding: 14px 24px;
		margin-right: 10px;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
	}
        </style>

        <div class="container" style="margin-top: 80px">
        <br>
        <label class="titulo"><h3 class="h3"></h3></label>
        <div id="contacto" class="borde" style="height: 400px">
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
                            <input name="contacto" type="email" class="form-contro inp_contactol" id="inp_email" placeholder="Ingrese email" value="<?php echo $cliente["contacto"] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-1 col-sm-offset-1 borde">
                            <label>Contenido</label>
                        </div>
                        <div class="col-sm-2 borde">
                            <textarea name="contacto_texto" id="txt_contacto" class="textarea inp_contacto" placeholder="Enter text ...">
                                <?php echo $cliente["contacto_texto"] ?>
                            </textarea>
                        </div>
                    </div>
                    
                        <button type="submit" class="btn btn-success" >Guardar</button>
                </form>
            </div>
        </div>
        </div>

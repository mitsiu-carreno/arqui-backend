
<script src="<?php echo base_url() ?>js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" charset="utf-8">
        $(function(){
            tinymce.init({
    selector: ".textarea",
    width: 600,
    menubar : false,
    height: 300,
    language : 'es',
    image_advtab: true,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor jbimages"
   ],
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
   relative_urls: false
 });
                //$("#menu_body").hide();
                //                          $("#menu_body").load("menu_body.php");
                /*
                $("#btn-crear-registro").click(function(e){ 
                    e.preventDefault();
                    $("#form-persona").toggle();
                });
                */
               //$("#submenu_indice").hide();
               
               $("#submenu_html").hide();
               $("#contenido").hide();
               
               $('#tipo input').on('change', function() {
                    //alert($('input[name=radioName]:checked', '#myForm').val()); 
                    if($('input[name=tipo]:checked', '#tipo').val()=="html"){
                        $("#contenido").show();
                        
                        $("#submenu").hide();
                    }
                    else{
                        $("#submenu").show();
                        $("#contenido").hide();
                    }
                });
                
                $('#submenu_2 input').on('change', function() {
                    //alert($('input[name=radioName]:checked', '#myForm').val()); 
                    if($('input[name=tipo_2]:checked', '#submenu_2').val()=="indice"){
                        $("#submenu_indice").show();
                        $("#submenu_html").hide();
                    }
                    else{
                        $("#submenu_indice").hide();
                        $("#submenu_html").show();
                    }
                });
                
                $("#nuevo_menu").click(function(e){
                    alert("nuevo menu");
                    e.preventDefault();
                    //$('<li><input type="text" href="#"></a></li>').appendTo('#menu_div');
                    $('<li><input type="text" href="#" class="menu_cont" id="nuevo_menu"></a></li>').appendTo('#menu_div');
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

        <div id="selec_tipo" class="fondo_2">
                <br>
                <div class="row">
                    <div class="col-sm-1 col-sm-offset-1 borde">
                        <label>Tipo</label>
                    </div>
                    <div class="col-sm-2 borde">
                        <form id="tipo" role="form">
                            <div class="checkbox">
                                <input type="radio" name="tipo" value="submenu" checked> Submenú
                                <br>
                                <input type="radio" name="tipo" value="html"> HTML 
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
            <!--Submenú-->
            <div id="submenu">
                <br>
                <div class="row">
                    <div class="col-sm-1 col-sm-offset-1 borde">
                        <br>
                        <label>Submenú</label>
                    </div>  
                    <div class="col-sm-3 borde fondo_2">
                        <label><input type="text" placeholder="Submenú 1"></label>
                       <br>
                       <form id="submenu_2" role="form">
                            <div class="checkbox">
                                <input type="radio" name="tipo" value="video" checked> Video
                                <input type="radio" name="tipo" value="html" style="margin-left:20%"> HTML 
                            </div>
                            <input type="text" class="form-control" id="URL" placeholder="URL">
                                <div class="checkbox">
                                    <input type="radio" name="tipo_2" value="indice" checked> Índice 
                                    <input type="radio" name="tipo_2" value="html" style="margin-left:20%"> HTML 
                                </div>
                      <!-- </form>-->
                            <div id="submenu_indice">
                                <br>
                                <input type="time" name="hora_indice">
                                <br>
                                <br>
                                <input type="text" name="texto_boton" placeholder="Texto del botón"/>
                                <br>
                                <br>
                                <input type="time" name="hora_indice">
                                <br>
                                <br>
                                <input type="text" name="texto_boton" placeholder="Texto del botón"/>
                           </div>
                           <div id="submenu_html">
                               <br>
                            <!--<div class="fondo_1" style="height: 150px">-->
                                <br>
                                <!--<div class="container">-->
                                    <div class="hero-unit fondo_1" style="width: 305px; height: 350px;">
                                        <textarea class="textarea" placeholder="Enter text ..." style="width: 250px; height: 100px; margin-left: -30px"></textarea>
                                    </div>
                                <!--</div>--> 
                                <!--<textarea name="textarea" id="textarea" class="textarea" cols="40" rows="6"></textarea> -->
                            <!--</div>-->
                           </div>
                       </form>
                    </div>  
                    <div class="col-sm-5 col-sm-offset-1 borde fondo_2">
                        <!--label>Submenú</label>-->
                        <br>
                        <br>
                        <input type="text" placeholder="Nuevo Submenú"/>
                        <form role="form">
                            <div class="checkbox">
                                <input type="radio" name="tipo" checked/> Video
                                <input type="radio" name="tipo" style="margin-left:20%" checked/> HTML 
                            </div>
                        </form>
                        <div class="fondo_1">
                            <div class="container">
                                <div class="hero-unit" style="margin-top:40px">
                                    <textarea id="txt_contenido" class="textarea" placeholder="Enter text ..." style="width: 500px; height: 200px"></textarea>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div id="contenido">
                <br>
                <div class="row">
                    <div class="col-sm-1 col-sm-offset-1 borde">
                        <br>
                        <label>Contenido</label>
                    </div>  
                    <div class="col-sm-9 borde fondo_2">
                       <label>Texto HTML</label>
                       <br>
                       <div class="container">
                            <div class="hero-unit fondo_1" style="margin-top:20px">
                                    <textarea id="txt_contenido" class="textarea" placeholder="Enter text ..." style="width: 810px; height: 200px"></textarea>
                            </div>
                       </div> 
                    </div>     
                </div>
            </div>
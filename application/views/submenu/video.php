<style>
    #inp_file {
        display: none;
    }
    #error-message{
        display: none;
    }
    
    #success-message{
        display: none;
    }
    
    .btn-eliminar-imagen{
        float: right;
    }
    #ul_filelist {
        list-style: none;
        font-size: small;
    } 
    
    #btn_subir {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .indice-title-input{
        display: none;
    }
    .indice-contenido-input{
        display: none;
    }
    .btn-indice-opcion{
        float: right;
        margin-bottom: 5px;
    }
</style>
<div class="btn-group col-md-12">
    <form id="upload-video"  method="post" action="<?php echo base_url() ?>upload.php" enctype="multipart/form-data">
                        <input type="hidden" id="img_titulo" name="titulo" value="mil" />
                        <input type="file" id="inp_file" name="files[]" />
                        <div id="status"></div>
                        <button class="btn btn-primary btn-large btn-block" id="btn_subir"><span class="glyphicon glyphicon-circle-arrow-up"></span> Subir Video</button>
                        <div id="url_video"><a href="<?php echo $video ?>"><?php echo urldecode($nombre_video); ?></a></div>
                    </form>
</div>
<div class="btn-group col-md-12">
            <button class="btn btn-default btn_video <?php echo ($videosubmenu == 1) ? "active" : "" ?>"><span class="glyphicon glyphicon-th-list"></span> Índice</button>
            <button class="btn btn-default btn_video_html <?php echo ($videosubmenu == 2) ? "active" : "" ?>"><span class="glyphicon glyphicon-align-left"></span> HTML</button>
        </div>
<div id="panel_indice_video">
    <ul id="list_marcadores_video" class="list-group">
        <li><button class="btn btn-success btn-block" id="btn_agregar_indice_video"><span class="glyphicon glyphicon-plus"></span> Agregar Indice</button></li>
    </ul>
</div>
<!--Indices-->
            <ul id="lista-indices" class="list-group">
                    <?php foreach ($indices as $i): ?>
                    <!--<span><?php echo $i["contenido"]?></span>-->
                        <li class="list-group-item" idIndice="<?php echo $i["id"] ?>">
                            <a href="#" class="btn-indice-detail"><span class="indice-title"><?php echo floor($i["titulo"] /60); echo ":"; echo ($i["titulo"]%60 <10) ? "0":""; echo  $i["titulo"]%60 ?></span></a>
                            <input type="text" id="time" value="<?php echo floor($i["titulo"] /60); echo ":"; echo ($i["titulo"]%60 <10) ? "0":""; echo  $i["titulo"]%60?>" class="indice-title-input" />
                            <a href="#" class="btn-indice-detail2"><span class="indice-contenido"><?php echo $i["contenido"] ?></span></a>
                            <input type="text" id="inp-indice-contenido" value="<?php echo $i["contenido"] ?>" class=" indice-contenido-input" />
                            <a href="#" class="btn_indice_eliminar btn-indice-opcion"><span class="glyphicon glyphicon-trash"></span></a>
                            <!--<a href="#" class="btn-menu-opcion"><span class="glyphicon glyphicon-resize-vertical"></span></a>-->
<!--                            <a href="#" class="btn-menu-opcion dropdown-toggle pull-right" data-toggle="dropdown"><span class="menu-tipo"><?php echo $m["tipo"] == "0" ? "sub" : "html" ?></span><span class="caret"></span></a>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#" class="menu-tipo-selectable">html</a></li>
                                <li><a href="#" class="menu-tipo-selectable">sub</a></li>
                            </ul>-->
                        </li>

                    <?php endforeach; ?>
                    <?php if (count($indices) == 0): ?>
                        <li id="li_menus_empty">
                            <small><i>No hay indices, haga click en el siguiente botón para agregar uno -></i></small>
                        </li>
                    <?php endif; ?>
                   
                </ul>

<!--Fin-Indices-->
            </div><!--cierra el body-->
    </div><!--cierra el row-->
</div>

<li class="hidden" id="tpl_li_indice_video" idmarcador="">
<span class="col-md-6">Marcador:</span> <input type="time" class="col-md-6" step="1" name="txt_time_video" />
    <input type="type" class="col-md-12" name="txt_boton_video" />
</li>
<div class="hidden editor">
    <textarea  class="textarea" ></textarea>
</div>
<script>
    tinymce.init({selector:'.textarea',
   
});
    console.log(submenuid);
            $("#btn_subir").click(function() {

                            $("#inp_file").click();
        });

        $("#upload-video").submit(function(e) {
            
            e.preventDefault();
                        $("#status").empty();
        });
        $(".btn_video_html").click(function(){
        $(this).addClass('active');
          $(".btn_video").removeClass('active');
                var tipo=2;
           var parametros={'tipo': tipo};
           console.log("editorr video" + submenuid + tipo); 
           $.post("<?php echo site_url(array("submenu","set_tipo"))?>/"+ submenuid, $.param(parametros));
           if(tipo==2){
               $(".editor").removeClass('hidden');
               $(".editor").css("margin-top","20%");
               $("#panel_indice_video").addClass('hidden');
           }
   
        });
         $(".btn_video").click(function(){
                   $(this).addClass('active');
                  $(".btn_video_html").removeClass('active');
                   var tipo=1;
           var parametros={'tipo': tipo};
           console.log("editorr video" + submenuid + tipo); 
           $.post("<?php echo site_url(array("submenu","set_tipo"))?>/"+ submenuid, $.param(parametros));
           if(tipo==1){
               $(".editor").addClass('hidden');
               $("#panel_indice_video").removeClass('hidden');
           }
   
        });
//        
//         $(".btn-indice-detail2").click(function(){
//        //var that2 = this;
//        $(this).addClass("hidden");
//        $("#indice-contenido").show().closest().focus();
//        });
//        
//        $("#indice-contenido").keyup(function(e){
//            if(e.keyCode == 13){
//                $("#indice-contenido").hide();
//                $(".btn-indice-detail2").html($(this).val());
//                $(".btn-indice-detail2").removeClass("hidden");
//               // var this_idIndice = $(this).closest(".list-group-item").attr("idIndice");
//                //var parametros = {id: this_idIndice, "titulo": $(this).val()};
//                //$.post("http://cognosvideoapp.com.mx/index.php/menus/editar/5", $.param(parametros), "json");
//            } else  if(e.keyCode == 27) {
//                //console.log("entrooooooo");
//                $("#indice-contenido").hide(); 
//                $("#indice-contenido").val()
//                //$(this).hide().val($(that2).text());
//                $(".btn-indice-detail2").removeClass("hidden");
//            }
//        });
//        
//        $(".btn-indice-detail").click(function(){
//        //var that2 = this;
//        $(this).addClass("hidden");
//        $("#time").show().focus();
////        $(that2).find("time").blur(function(){
////                $(this).hide();
////               // $(that2).find(".indice-title").html($(this).val()).show();
//        });
//        
//        $("#time").keyup(function(e){
//            if(e.keyCode == 13){
//                $("#time").hide();
//                $(".btn-indice-detail").html($(this).val());
//                $(".btn-indice-detail").removeClass("hidden");
//               // var this_idIndice = $(this).closest(".list-group-item").attr("idIndice");
//                //var parametros = {id: this_idIndice, "titulo": $(this).val()};
//                //$.post("http://cognosvideoapp.com.mx/index.php/menus/editar/5", $.param(parametros), "json");
//            } else  if(e.keyCode == 27) {
//                //console.log("entrooooooo");
//                $("#time").hide(); 
//                $("#time").val()
//                //$(this).hide().val($(that2).text());
//                $(".btn-indice-detail").removeClass("hidden");
//            }
//        });
        
        $("#lista-indices").delegate("li","click",function(e){
        //$(".btn-indice-detail").click(function(){
        e.preventDefault();
        var that2 = this;
        $(that2).find(".indice-title").hide();
        $(that2).find("#time").blur(function(){
            console.log("encontrado");
                $(this).hide();
                $(that2).find(".indice-title").html($(this).val()).show();
        });
        
        $(that2).find("#time").show().focus().keyup(function(e){
            if(e.keyCode == 13){
                $(this).hide();
                $(that2).find(".indice-title").html($(this).val()).show();
                var this_indiceid = $(this).closest(".list-group-item").attr("idmenu");
                var parametros = {id: this_indiceid, "titulo": $(this).val()};
                //POST
            } else  if(e.keyCode == 27) {
                $(this).hide().val($(that2).text());
                $(that).find(".indice-title").show();
            }
        });
    });
    
</script>
<script src="<?php echo base_url(); ?>js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/upload-video.js" type="text/javascript"></script>

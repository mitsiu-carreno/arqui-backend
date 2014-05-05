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
<?php foreach ($indices as $i) : 
    echo $i;
endforeach;
?>

<?php echo $indices?>
            </div><!--cierra el body-->
    </div><!--cierra el row-->
</div>
<li class="hidden" id="tpl_li_indice_video" idmarcador="">
<span class="col-md-6">Marcador:</span> <input type="time" class="col-md-6" step="1" name="txt_time_video" />
    <input type="type" class="col-md-12" name="txt_boton_video" />
</li>
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

</script>
<script src="<?php echo base_url(); ?>js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/upload-video.js" type="text/javascript"></script>

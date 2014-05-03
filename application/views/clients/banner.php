<script src="<?php echo base_url(); ?>js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/upload-banner.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" >


    $(function() {
     
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
               
            });
            
        $("#btn_subir").click(function() {
            $("#inp_file").click();
        });

        $("#upload").submit(function(e) {
            e.preventDefault();
                        $("#status").empty();
        });
        idcliente=<?php echo $idcliente;?>;
                    $.getJSON("<?php echo site_url(array("clients","getclient"));?>/"+ idcliente, function(data){
               console.log(data.nombre); 
               $(".h3").text("Proyecto: "+ data.nombre);
            });

//    $("#inp_file").change(function(){
//        $("#alert_subir").fadeOut("slow");
//        
//        
//    });
    });
</script>
<style>
    #inp_file {
        display: none;
    }
    #error-message{
        display: none;
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
    #success-message{
        display: none;
    }
    
    #btn_subir{
        float: left;
        margin-top: 10px;
        margin-right: 10px;
    }
    #status {
        padding: 6px;
        margin-top: 10px;
        float: left;
        /*border: 1px solid black;*/
        width: 880px;
    } 
</style>
<div class="container" style="margin-top: 80px">
    <label class="titulo"><h3 class="h3"></h3></label>
    <form id="upload" method="post" action="<?php echo site_url(array("imagenes", "subir_banner", $idcliente)) ?>" enctype="multipart/form-data">
        <img id="img_banner" width="1024" height="227" src="<?php echo site_url(array("imagenes", "get_banner", $idcliente)) ?>" />
        <input type="file" id="inp_file" name="userfile" />
        <button class="btn btn-default btn-large" id="btn_subir"><span class="glyphicon glyphicon-circle-arrow-up"></span> Subir Imagen</button>
        
        <div id="status">
        </div>
    </form>
</div>
  <div class="col-sm-2 col-sm-offset-3 borde" style="margin-top:3%;">
                            <textarea name="contacto_texto" id="txt_contacto" class="textarea inp_contacto" placeholder="Enter text ..."></textarea>
                        </div>
    <div id="error-message" class="text-danger"><span class="glyphicon glyphicon-warning-sign" style="float:left;margin-right: 5px;"></span><i></i></div>
    <div id="success-message" class="text-success"><span class="glyphicon glyphicon-ok-circle" style="float:left;margin-right: 5px;"></span><i></i></div>
</div>
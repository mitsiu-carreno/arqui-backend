<script src="<?php echo base_url(); ?>js/jquery.knob.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/upload-banner.js" type="text/javascript"></script>
<script>
$(function(){

    $("#btn_subir").click(function(){
        $("#inp_file").click();
    });
    
    $("#inp_file").change(function(){
        $("#alert_subir").fadeOut("slow");
        var oFReader = new FileReader();
        oFReader.readAsDataURL(this.files[0]);
        oFReader.onload = function (oFREvent) {
            var img = new Image();
            img.src = oFREvent.target.result;
            img.onload = function () {
                if ((this.width != 1024) && (this.height != 227)) {
                    //that.value="";
                    $("#alert_subir").fadeIn("slow");
                }
        }
    }
        
    });
});
</script>
<style>
    #inp_file {
        display: none;
    }
    
    #alert_subir {
        display: none;
    }
</style>
<form id="upload" method="post" action="<?php echo site_url(array("imagenes","subir_banner")) ?>" enctype="multipart/form-data">
<img id="img_banner" width="1024" height="227" src="<?php echo base_url() ?>img/demo.png" />
<div class="alert alert-danger alert-dismissable" id="alert_subir">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>¡Error!</strong> Esta imagen debe de ser de 1024 x 227.
</div>
<input type="file" id="inp_file" />
<button class="glyphicon glyphicon-circle-arrow-up btn btn-default" id="btn_subir">Subir Imagen</button>
<div id="status"></div>
</form>
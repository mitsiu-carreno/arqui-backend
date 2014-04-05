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
                if ((this.width !== 1024) && (this.height !== 227)) {
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
<img id="img_banner" />
<div class="alert alert-danger alert-dismissable" id="alert_subir">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>¡Error!</strong> Esta imagen debe de ser de 1024 x 227.
</div>
<input type="file" id="inp_file" />
<button class="glyphicon glyphicon-circle-arrow-up btn btn-default" id="btn_subir">Subir Imagen</button>
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
    
    #btn_subir{
    }
    #status {
        padding: 6px;
        margin-top: 10px;
    } 
</style>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Galeria</h3>
                </div>
                <div class="panel-body" id="panel_list_files">
                    Panel content
                    <form id="upload"  method="post" action="<?php echo site_url(array("imagenes", "subir_galeria", $idcliente)) ?>" enctype="multipart/form-data">
                        <input type="file" id="inp_file" name="userfile" />
                        <div id="status"></div>
                        <button class="btn btn-default btn-large btn-block" id="btn_subir"><span class="glyphicon glyphicon-circle-arrow-up"></span> Subir Imagen</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12"></div>
    </div>
</div>
<script>
    var idcliente = <?php echo $idcliente; ?>;
            $("#btn_subir").click(function() {
            $("#inp_file").click();
        });

        $("#upload").submit(function(e) {
            e.preventDefault();
                        $("#status").empty();
        });
</script>
<script src="<?php echo base_url(); ?>js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/upload-galeria.js" type="text/javascript"></script>
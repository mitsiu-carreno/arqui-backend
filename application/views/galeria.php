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
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Galeria</h3>
                </div>
                <div class="panel-body" id="panel_list_files">
                    <ul id="ul_filelist" class="list-group">
                    </ul>
                    <form id="upload"  method="post" action="<?php echo site_url(array("imagenes", "subir_galeria", $idsubmenu)) ?>" enctype="multipart/form-data">
                        <input type="file" id="inp_file" name="userfile" />
                        <div id="status"></div>
                        <button class="btn btn-default btn-large btn-block" id="btn_subir"><span class="glyphicon glyphicon-circle-arrow-up"></span> Subir Imagen</button>
                    </form>
                </div>
            </div>
        </div>       
    </div>
</div>
<script>
    
            $("#btn_subir").click(function() {
            $("#inp_file").click();
        });

        $("#upload").submit(function(e) {
            e.preventDefault();
                        $("#status").empty();
        });
        
        var listOfFiles = function(){
            $("#ul_filelist").empty();
            $.getJSON("<?php echo site_url(array("imagenes","galeria_files",$idsubmenu)) ?>", function(data){
                var first = true;
                $.each(data.archivos, function(index, value){
                    $("#ul_filelist").append($("<li />").html(value.name).addClass("list-group-item").append($("<a />").attr("href","<?php echo site_url(array("imagenes","del_galeria")) ?>/").append($("<span />").addClass("glyphicon glyphicon-remove-circle btn-eliminar-imagen"))));
                    first = false;
                });
            });
        }
        listOfFiles();
</script>
<script src="<?php echo base_url(); ?>js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/upload-galeria.js" type="text/javascript"></script>

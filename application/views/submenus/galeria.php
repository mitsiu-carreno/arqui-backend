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
        <ul id="ul_filelist" class="list-group">
        </ul>
        <form id="galeria"  method="post" action="<?php echo site_url(array("imagenes", "subir_galeria", $idsubmenu)) ?>" enctype="multipart/form-data">
            <input type="hidden" id="img_titulo" name="titulo" value="" />
            <input type="file" id="inp_file" name="userfile" />
            <div id="status"></div>
            <button class="btn btn-default btn-large btn-block" id="btn_subir"><span class="glyphicon glyphicon-circle-arrow-up"></span> Subir Imagen</button>
        </form>
<script>

    $("#btn_subir").click(function() {
        $("#inp_file").click();
    });

    $("#galeria").submit(function(e) {
        e.preventDefault();
        console.log("este form no se debe de enviar");
        $("#status").empty();
    });

    var listOfFiles = function() {
        $("#ul_filelist").empty();
        $.getJSON("<?php echo site_url(array("imagenes", "galeria_files", $idsubmenu)) ?>", function(data) {
            $.each(data.archivos, function(index, value) {
                var titulo = $("<a />").html(value.titulo).attr("href", "<?php echo base_url() ?>galeria/" + value.submenu_id + "/" + value.id + ".png");
                var thumbnail = $("<a />").html(' <small> Thumbnail</small>').attr("href", "<?php echo base_url() ?>galeria/" + value.submenu_id + "/" + value.id + "_thumb.png");
                $("#ul_filelist").append($("<li />").addClass("list-group-item").append(titulo).append(thumbnail).append($("<a />").attr("href", "<?php echo site_url(array("imagenes", "del_galeria")) ?>/").append($("<span />").addClass("glyphicon glyphicon-remove-circle btn-eliminar-imagen"))));
            });
        });
    }
    listOfFiles();
</script>
<script src="<?php echo base_url(); ?>js/upload-galeria.js" type="text/javascript"></script>

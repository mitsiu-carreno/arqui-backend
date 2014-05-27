<form id="menu_html" action="#" >
    <textarea  class="textarea "><?php echo @$html ?></textarea>
    <input type="submit" value="Guardar" class="btn btn-success" />
</form>
<script>
    tinymce.remove('.textarea');
    tinymce.init({
        selector: ".textarea",
        language: 'es',
        image_advtab: true,
        height: 300,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor  jbimages"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify  link image",
        toolbar2: "bullist numlist outdent indent | print preview media | forecolor backcolor emoticons  jbimages",
        relative_urls: false,
        remove_script_host: false
    });
    $("#menu_html").submit(function(e) {
        e.preventDefault();
        var parametros = {contenido: tinymce.activeEditor.getContent()};
        console.log(parametros);
        $.post("<?php echo site_url(array("menus", "set_html", $idmenu)) ?>/", $.param(parametros)).done(function() {
            bootbox.alert("Datos guardados exitosamente!", function() {
            });
        });

    });
</script>
<form id="submenu_html" action="#" >
<textarea  class="textarea "><?php echo @$video_html?></textarea>
<input type="submit" value="Guardar" class="btn btn-success" />
</form>
<script>
    tinymce.remove('.textarea');
tinymce.init({selector:'.textarea',
    image_advtab: true,
                menubar : false,
                plugins: [
                     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                     "save table contextmenu directionality emoticons template paste textcolor jbimages"
               ],
               toolbar: "insertfile undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                           relative_urls: false,
                            remove_script_host: false,
});
    $("#submenu_html").submit(function(e){
        e.preventDefault();
        var parametros={contenido:tinymce.activeEditor.getContent()};
console.log(parametros);    
        $.post("<?php echo site_url(array("videos", "set_html",$idsubmenu)) ?>/", $.param(parametros)).done(function(){
            bootbox.alert("Datos guardados exitosamente!", function() {});
        });

    });
</script>
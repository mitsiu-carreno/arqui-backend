<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cognos App</title>
        <link href="<?php echo base_url() ?>css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>css/toggle-switch.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>css/ajax-loader.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url() ?>js/json2.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>js/jquery-1.11.0.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>js/bootbox.js" type="text/javascript"></script>
         <script src="<?php echo base_url() ?>js/moment.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        
<script src="<?php echo base_url(); ?>js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.fileupload.js" type="text/javascript"></script>
        <script type="text/javascript">
/* <![CDATA[ */
    var global_baseurl = "<?php echo base_url(); ?>";
/* ]]> */
</script> 
    </head>
    <body>
 <script src="<?php echo base_url() ?>js/tinymce/tinymce.min.js"></script>
    <script>
        $(function(){
            tinymce.init({
                selector: ".txtarea",
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
            remove_script_host: false

            });
            
        });
        </script>

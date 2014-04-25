    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Cognos</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                
                <li><a href="<?php echo site_url();?>/clients/index">inicio</a></li>
                <li><a href="<?php echo site_url(array("proyectos","menus",$idcliente)) ?>">menús</a></li>
                <li><a href="<?php echo site_url(array("proyectos","banner",$idcliente)) ?>">banner</a></li>
                <li><a href="<?php echo site_url(array("proyectos","contacto",$idcliente)) ?>">contacto</a></li>
            </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="<?php echo site_url(array("log","out")); ?>">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    <script>
        $(function(){
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
               relative_urls: false
            });
        })
        </script>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Cognos</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                
                <li><a href="<?php echo site_url();?>/clients/index">Inicio</a></li>
                <li><a href="<?php echo site_url(array("proyectos","banner",$idcliente)) ?>">Banner</a></li>
                <li><a href="<?php echo site_url(array("proyectos","contacto",$idcliente)) ?>">Contacto</a></li>
                <li><a href="<?php echo site_url(array("proyectos","menus",$idcliente)) ?>">Menús</a></li>
            </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="<?php echo site_url(array("log","out")); ?>">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
   
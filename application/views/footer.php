        <div id="ajax-loader-app">
            <div class="ajax-loader-inner">
                <img src="<?php echo base_url() ?>img/715.GIF" />
                <div>Cargando contenido...</div>
            </div>
        </div>
        <script>
            $.ajaxSetup({
            async: true,
            cache: false
//            beforeSend: function( xhr ) {
//                $( "#ajax-loader" ).show();
//              }
        });
            $( document ).ajaxStart(function() {
                $( "#ajax-loader-app" ).show();
                console.log("mostrando el cargador");
              });
              $( document ).ajaxStop(function() {
                $( "#ajax-loader-app" ).hide();
                console.log("ocultando el cargador");
              });
        </script>
    </body>
</html>

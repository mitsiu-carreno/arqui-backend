<textarea  class="textarea " id="texto" <?php echo $html?> ></textarea>
<script>
    tinymce.remove('.textarea');
tinymce.init({selector:'.textarea',
   
                  setup : function(editor){
                      editor.on('Init', function(ed) {

                      });
          
                    editor.on('keyup', function(e) {
                        
                         contenido_menu_html =  tinymce.get('texto').getContent();
                    
                      
                    });                 
               }
});

</script>
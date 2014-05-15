<textarea  class="textarea " id="texto" <?php echo @$html?> ></textarea>
<script>
    tinymce.remove('.textarea');
tinymce.init({selector:'.textarea',
    image_advtab: true,
                plugins: [
                     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                     "save table contextmenu directionality emoticons template paste textcolor jbimages"
               ],
               toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                           relative_urls: false,
                            remove_script_host: false,
   
                  setup : function(editor){
                      editor.on('Init', function(ed) {

                      });
          
                    editor.on('keyup', function(e) {
                        
                         contenido_menu_html =  tinymce.get('texto').getContent();
                    
                      
                    });                 
               }
});

</script>
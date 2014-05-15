$(function() {

    // Initialize the jQuery File Upload plugin
    $('#galeria').fileupload({
        // This element will accept file drag/drop uploading
        dropZone: $('#panel_list_files'),
        dataType: 'json',
        autoUpload: false,
        global: false,
        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function(e, data) {
            console.log(data);
            var progressBar = $("<div />").addClass("progress progress-striped active").attr("style", "width:328px")
                    .append('<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span>0%</span></div>');
            var jqXHR;
            bootbox.prompt("Título de la imagen",function(result) {
                    if (result === null) {
                        console.log("Prompt dismissed");
                    } else {
                        console.log("Titulo de la imagen "+result);
                        data.formData = {titulo: result};
                        jqXHR = data.submit().success(function(result, textStatus, jqXHR) {
                            console.log("subir imagen: " + textStatus);
                            if (result.hasOwnProperty("error")) {
                                $("#status").empty();
                                $("#error-message").clone().attr("id", "").appendTo($("#status")).find("i").html(result.error);
                            }

                            if (result.hasOwnProperty("upload_data")) {
                                $("#status").empty();
                                $("#success-message").clone().attr("id", "").appendTo($("#status")).find("i").html("<p>La imagen se ha subido con éxito</p>");

                                listOfFiles();
                            }

                        });
                    }
           });

            data.context = progressBar.appendTo($("#status"));

//            progressBar.find('span').click(function() {
//
//                if (tpl.hasClass('working')) {
//                    jqXHR.abort();
//                }
//
//                tpl.fadeOut(function() {
//                    tpl.remove();
//                });
//
//            });

            // Automatically upload the file once it is added to the queue

        },
        progress: function(e, data) {

            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
            data.context.find('span').html(progress + "%");
            data.context.find('div').attr("aria-valuenow", progress);
            data.context.find('div').attr("style", "width:" + progress + "%");

            if (progress == 100) {
                data.context.removeClass('working');
            }
        },
        fail: function(e, data) {
            // Something has gone wrong!
            data.context.addClass('error');
//                        $("#status").empty();
        }

    });


    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function(e) {
        e.preventDefault();
    });

});
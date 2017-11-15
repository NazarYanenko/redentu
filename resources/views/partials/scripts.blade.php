<script src="{{url('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{url('js/dropzone.js')}}"></script>

<script>
    Dropzone.options.myDropzone = {
        maxFiles: 1,
        paramName: "genesis_files",
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        autoProcessQueue: false
    };

    Dropzone.options.wmImage = {
        maxFiles: 1,
        paramName: "watermark",
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        autoProcessQueue: false
//        clickable:true
    }
//Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element
//
//    // The configuration we've talked about above
//    autoProcessQueue: false,
//    uploadMultiple: true,
//    parallelUploads: 100,
//    maxFiles: 1,
//    addRemoveLinks: true,
//    previewsContainer:'#previews',
//
//
//    // The setting up of the dropzone
//    init: function() {
//        var myDropzone = this;
//
//        // First change the button to actually tell Dropzone to process the queue.
//        this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
//            // Make sure that the form isn't actually being sent.
//            e.preventDefault();
//            e.stopPropagation();
//            myDropzone.processQueue();
//        });
//
//        // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
//        // of the sending event because uploadMultiple is set to true.
//        this.on("sendingmultiple", function() {
//            // Gets triggered when the form is actually being sent.
//            // Hide the success button or the complete form.
//        });
//        this.on("successmultiple", function(files, response) {
//            // Gets triggered when the files have successfully been sent.
//            // Redirect user or notify of success.
//        });
//        this.on("errormultiple", function(files, response) {
//            // Gets triggered when there was an error sending the files.
//            // Maybe show form again, and notify user of error
//        });
//    }
//
//}

//    test script

    init($('.image_picker'),$('.drop_target'),$('#inputFile'),$('.image_preview'),$('[data-action="remove_current_image"]'));
    init($('.image_picker1'),$('.drop_target'),$('#inputWaterMark'),$('.image_preview1'),$('[data-action="remove_current_image1"]'));
    function init($dropzone,$droptarget,$dropinput,$dropimg,$remover) {
        $dropzone.on('dragover', function() {
            $droptarget.addClass('dropping');
            return false;
        });

        $dropzone.on('dragend dragleave', function() {
            $droptarget.removeClass('dropping');
            return false;
        });

        $dropzone.on('drop', function(e) {
            $droptarget.removeClass('dropping');
            $droptarget.addClass('dropped');
            $remover.removeClass('disabled');
            e.preventDefault();

            var file = e.originalEvent.dataTransfer.files[0],
                reader = new FileReader();

            reader.onload = function(event) {
                $dropimg.css('background-image', 'url(' + event.target.result + ')');
            };

            console.log(file);
            reader.readAsDataURL(file);

            return false;
        });

        $dropinput.change(function(e) {
            $droptarget.addClass('dropped');
            $remover.removeClass('disabled');
            $('.image_title input').val('');

            var file = $dropinput.get(0).files[0],
                reader = new FileReader();

            reader.onload = function(event) {
                $dropimg.css('background-image', 'url(' + event.target.result + ')');
            }

            reader.readAsDataURL(file);
        });

        $remover.on('click', function() {
            $dropimg.css('background-image', '');
            $droptarget.removeClass('dropped');
            $remover.addClass('disabled');
            $('.image_title input').val('');
        });

        $('.image_title input').blur(function() {
            if ($(this).val() != '') {
                $droptarget.removeClass('dropped');
            }
        });

        $dropinput1 = $('#inputWaterMark');


        $dropzone.on('dragover', function() {
            $droptarget.addClass('dropping');
            return false;
        });

        $dropzone.on('dragend dragleave', function() {
            $droptarget.removeClass('dropping');
            return false;
        });

        $dropzone.on('drop', function(e) {
            $droptarget.removeClass('dropping');
            $droptarget.addClass('dropped');
            $remover.removeClass('disabled');
            e.preventDefault();

            var file = e.originalEvent.dataTransfer.files[0],
                reader = new FileReader();

            reader.onload = function(event) {
                $dropimg.css('background-image', 'url(' + event.target.result + ')');
            };

            console.log(file);
            reader.readAsDataURL(file);

            return false;
        });
    }

</script>

<script>
    $('.watermark_text').hide();
    $('#switchForm').on('change', function(){

        if($(this).is(':checked')) {
//            alert('1');
            $('.watermark_image').show();
            $('.watermark_text').hide();

        } else {
            $('.watermark_image').hide();
            $('.watermark_text').show();
        }
    });
</script>

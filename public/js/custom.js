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

$('.watermarkText').hide();
// $('.colorPicker').hide();

//        $('#setText').val('');

var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    var switchery = new Switchery(html);
});
var changeCheckbox = document.querySelector('.js-check-change')
    , changeField = document.querySelector('#switchForm');

changeCheckbox.onchange = function() {

    if($(this).is(':checked')) {
        $('.watermark_image').fadeIn();
        $('.watermarkText').fadeOut();
        // $('.colorPicker').fadeOut();
        $('#watermarkText').val('');
        $('#inputWaterMark').attr({ value: '',style:''});
        $('.image_preview1').attr({ style:''});
    } else {
        $('.watermark_image').fadeOut();
        $('.watermarkText').fadeIn();
        // $('.colorPicker').fadeIn();


    }
};


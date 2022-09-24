jQuery(document).ready(function($){

    var mediaUploader;

    $('#profile-img').on('click', function(e){

        e.preventDefault();
        if(mediaUploader){
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Chose a profile picture',
            button: {
                text: 'Upload'
            },
            multiple: false
        });

        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#profile-picture').val(attachment.url);
            $('#profile-picture-preview').css('background-image', 'url('+ attachment.url +')');
        });

        mediaUploader.open();

    });


    $('#delete-avatar').on('click', function(e){

        e.preventDefault();
        var answer = confirm("Are you sure you want to remove your profile picture?");
        if(answer == true){
            $('#profile-picture').val('');
            $('.delvoy-general-form').submit();
        }else{
            console.log('No, don\'t delete it');
        }
        return;
    });

});
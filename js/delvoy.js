jQuery(document).ready(function($){

/*Ajax functions*/
$(document).on('click', '.delvoy-load-more', function(){
    var that = $(this);
    var page = that.data('page');
    var newPage = page+1;
    var ajaxUrl = that.data('url');

    $.ajax({
        url: ajaxUrl,
        type: 'post',
        data : {
            page: page,
            action: 'delvoy_load_more'
        },
        error: function(response){
            console.log(response);
        },
        success: function(response){
            that.data('page', newPage);
            $('.delvoy-posts-container').append(response);
        }
    });
});

});
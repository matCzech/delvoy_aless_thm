jQuery(document).ready(function($){

revealPosts();

/*Ajax functions*/
$(document).on('click', '.delvoy-load-more:not(.loading)', function(){
    var that = $(this);
    var page = that.data('page');
    var newPage = page+1;
    var ajaxUrl = that.data('url');

    that.addClass('loading').find('.text').slideUp();
    that.find('.delvoy-loading').addClass('spin');

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
            that.removeClass('loading').find('.text').slideDown();
            that.find('.delvoy-loading').removeClass('spin');

            revealPosts();

        }
    });
});

/*HELPER FUNCTIONS*/

function revealPosts(){
    var posts = $('article:not(.reveal)');
    var i = 0;
    setInterval(function(){
        if(i >= posts.length) return false;

        var el = posts[i];
        $(el).addClass('reveal');

        i++;
    }, 200);
}

});
jQuery(document).ready(function($){

/*init functions*/    
revealPosts();

/*variable delcarationss*/
var lastScroll = 0;

/*ajax functions*/
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

$(window).scroll(function(){
    var scroll = $(window).scrollTop();

    if(Math.abs(scroll - lastScroll) > $(window).height()*0.1){
        lastScroll = scroll;

        $('.page-limit').each(function(index){
            if(isVisible($(this))){
                history.replaceState(null, null, $(this).attr("data-page"));
                return false;
            }
        });
    }
});

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

function isVisible(element){
    var scrollPos = $(window).scrollTop();
    var windowHeight = $(window).height();
    var elTop = $(element).offset().top;
    var elHeight = $(element).height();
    var elBottom = elTop + elHeight;

    return (elBottom - elHeight * 0.25 > scrollPos) && (elTop < (scrollPos + 0.5 * windowHeight));
}

});
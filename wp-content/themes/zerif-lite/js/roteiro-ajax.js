function BlogFilter( $author, $category, $order ) {
    var params = 'action=blog_filter';
    params += '&author=' + $author;

    jQuery.ajax({
        dataType: 'html',
        method: 'POST',
        url: RoteiroAjax.ajaxurl,
        data: params,
        beforeSend: function() {
            jQuery('.grid').empty();
            jQuery('html, body').animate({
                scrollTop: 0
            }, 500);
            jQuery('.grid').append('<div class="loading"><img src="'+ templateDir +'/images/icons/movie_countdown.gif" alt="loading gif" title="loading gif" /></div>');
        },
        success: function( data ) {
            jQuery('.grid').empty();

            var newItems = jQuery(data).appendTo('.grid');
            jQuery('.grid').isotope('appended', newItems);
            jQuery(window).resize();
        },
        complete: function() {

        }
    });
}

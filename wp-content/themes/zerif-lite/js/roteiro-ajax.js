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

function SubscriberMail( $email ) {
    var params = 'action=add_subscriber';
    params += '&email=' + $email;

    jQuery.ajax({
        dataType: 'json',
        method: 'POST',
        url: RoteiroAjax.ajaxurl,
        data: params,
        beforeSend: function() {
            jQuery('.subscriber-form').hide();
            jQuery('.subscriber-form').after('<div class="loading"><img src="'+ templateDir +'/images/icons/movie_countdown.gif" alt="loading gif" title="loading gif" /></div>');
        },
        success: function( data ) {
            jQuery('.loading').remove();

            if ( data.type == 'success' ) {
                jQuery('.subscriber-form').after('<div><p>Seu e-mail foi cadastrado com sucesso! <br> Agora você ficará nos trilhos com as novidades da Locomotiva!</p></div>');
            } else {
                jQuery('.subscriber-form').show();
            }
        }
    });
}

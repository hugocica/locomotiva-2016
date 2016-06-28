function BlogFilter( $author, $category, $order ) {
    jQuery.ajax({
        dataType: 'html',
        method: 'POST',
        url: RoteiroAjax.ajaxurl,
        data: {
            action: 'blog_filter'
        },
        beforeSuccess: function() {

        },
        success: function() {

        },
        complete: function() {

        }
    });
}

jQuery(document).ready(function($) {
    var totalHeight = $('header.header').outerHeight() + $('footer#footer').outerHeight() + $('.site-content').outerHeight();

    if ( totalHeight < $(window).height() ) {
        $('#content').css('min-height', $(window).height() - $('header.header').outerHeight() - $('footer#footer').outerHeight());
    } else {
        $('#content').css('min-height','1px');
    }

    // animação do label nos formulários
    $('.loco-input input, .loco-input textarea').on({
        focus: function() {
            $(this).parent().addClass('has-content');
        },
        blur: function() {
            if ( !$(this).val() ) {
                $(this).parent().removeClass('has-content');
            }
        },
        change: function() {
            if ( !$(this).val() ) {
                $(this).parent().removeClass('has-content');
            } else {
                $(this).parent().addClass('has-content');
            }
        }
    });

    $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        mansory: {
            columnWidth: '.grid-sizer'
        }
    });
});

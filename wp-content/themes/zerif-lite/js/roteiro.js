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

    // search icon on the menu
    $('.holder').on({
        mouseenter: function() {
            $this = $(this);

            $('input.search-query').val('');
            $('input.search-query').trigger('focus');

            if ($this.parent().hasClass('active')) {
                $this.fadeOut(500);
                setTimeout(function() {
                    $this.removeClass('active')
                }, 500);
                setTimeout(function() {
                    $this.fadeIn(500);
                }, 500);
            } else {
                $(this).parent().addClass('active');
            }
        },
        mouseleave: function() {
            $('.holder').parent().removeClass('active');
        }
    });

    // subscriber function
    $('#subscriber-email').blur(function() {
        if ( $(this).val().length == 0 ) {
            $(this).removeClass('not-empty');
        } else {
            $(this).addClass('not-empty');
        }
    });
    $('#subscriber-email').keypress(function(e) {
        if ( e.which == 13 ) {
            SubscriberMail( $(this).val() );
        }
    });
    $('#subscriber-btn').click(function() {
        SubscriberMail( $('#subscriber-email').val() );
    });

    // blog listing with isotope.js
    $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        mansory: {
            columnWidth: '.grid-sizer'
        }
    });
    setTimeout(
        function() {
            $('.grid').isotope();
        },
        100
    );

    // Blog filter
    $('#filter-by-autor, #filter-by-category, #blog-order').change(function() {
        BlogFilter(
            $('#filter-by-autor').val(),
            $('#filter-by-category').val(),
            $('#blog-order').val()
        );
    });
});

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
            if ( !$(this).val() )
                $(this).parent().removeClass('has-content');
        }
    });

    // tentativa menu
    $(function() {
        var $el, leftPos, newWidth,
            $mainNav = $("#menu-menu-principal");

        $mainNav.append("<li id='magic-line'></li>");
        var $magicLine = $("#magic-line");

        $magicLine
            .width($("current-menu-item").width())
            .css("left", $("current-menu-item a").position().left)
            .data("origLeft", $magicLine.position().left)
            .data("origWidth", $magicLine.width());

        $("#menu-menu-principal li a").hover(function() {
            $el = $(this);
            leftPos = $el.position().left;
            newWidth = $el.parent().width();
            $magicLine.stop().animate({
                left: leftPos,
                width: newWidth
            });
        }, function() {
            $magicLine.stop().animate({
                left: $magicLine.data("origLeft"),
                width: $magicLine.data("origWidth")
            });
        });
    });
});

jQuery(document).ready(function($) {
    var totalHeight = $('header.header').outerHeight() + $('footer#footer').outerHeight() + $('.site-content').outerHeight();

    if (totalHeight < $(window).height()){
        $('#content').css('min-height', $(window).height() - $('header.header').outerHeight() - $('footer#footer').outerHeight() );
    }else{
        $('#content').css('min-height','1px');
    }
});
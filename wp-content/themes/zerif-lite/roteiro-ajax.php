<?php

add_action( 'wp_ajax_blog_filter', 'prefix_ajax_blog_filter' );
add_action( 'wp_ajax_nopriv_blog_filter', 'prefix_ajax_blog_filter' );

function blog_filter() {
    $author = $_POST['author'];
    $category = $_POST['category'];

    echo 'teste';
    die();


    display_cards( $args );
}

function display_cards( $args ) {


    die();
}

?>

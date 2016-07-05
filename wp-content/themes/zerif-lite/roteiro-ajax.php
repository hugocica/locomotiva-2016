<?php

add_action( 'wp_ajax_blog_filter', 'blog_filter' );
add_action( 'wp_ajax_nopriv_blog_filter', 'blog_filter' );

function blog_filter() {
    $author = $_POST['author'];
    $category = $_POST['category'];

    $args = array(
            'post_type' => 'post',
        );

    if ( !empty($author) ) {
        $args['author'] = $author;
    }

    display_cards( $args );
}

function display_cards( $args ) {
    global $wp_query;
    $wp_query = new WP_Query( $args );

    if( $wp_query->have_posts() ):
        while ($wp_query->have_posts()) : $wp_query->the_post();

            array_push( $not_in, get_the_ID() );
            get_template_part( 'content', get_post_format() );

        endwhile;
        echo do_shortcode('[ajax_load_more post_type="post" repeater="default" posts_per_page="'.$posts_per_page.'" exclude="'. implode(',', $not_in) .'" transition="fade" pause="true" scroll="false" button_label="Carregar Mais"]');
        wp_reset_postdata();
    endif;

    die();
}

add_action( 'wp_ajax_add_subscriber', 'add_subscriber' );
add_action( 'wp_ajax_nopriv_add_subscriber', 'add_subscriber' );

function add_subscriber() {
    global $wpdb;
    $email = trim( $_POST['email'] );

    if ( !empty($email) ) {
        $wpdb->insert(
            'wp_subscribers',
            array(
                'email' => $email
            )
        );

        $results['type'] = 'success';
    } else {
        $results['type'] = 'E-mail em branco';
    }

    echo json_encode( $results );

    die();
}

?>

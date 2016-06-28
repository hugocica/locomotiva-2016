<?php

/*
 *  Locomotiva scripts
 */
add_action( 'wp_enqueue_scripts', 'locomotiva_enqueue_scripts' );
function locomotiva_enqueue_scripts() {
    wp_enqueue_style('roteiro_style', get_template_directory_uri() . '/css/roteiro.css');
    wp_enqueue_style('roteiro_responsivo_style', get_template_directory_uri() . '/css/roteiro-responsivo.css');

    wp_enqueue_script('roteiro_script', get_template_directory_uri() . '/js/roteiro.js', true);
    wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', true);
    wp_enqueue_script('rougeanus', get_template_directory_uri() . '/js/rougeanus.js', true);

    wp_enqueue_script( 'roteiro_ajax', get_template_directory_uri() . 'js/roteiro-ajax.js' );
	wp_localize_script( 'roteiro_ajax', 'RoteiroAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

show_admin_bar( false );

include_once get_template_directory().'/metaboxes/setup.php';
include_once get_template_directory().'/metaboxes/loco-spec.php';

remove_filter('the_content', 'wpautop');

/**
 * Add custom fields to users
 *
 * @param $user: the user object
 */
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) {

	?>

	<h3>Redes Sociais</h3>

	<table class="form-table">

		<tr>
			<th><label for="facebook">Facebook</label></th>

			<td>
				<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Digitar o link para o Facebook</span>
			</td>
		</tr>

		<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Digitar o nome de usuário do Twitter</span>
			</td>
		</tr>

	</table>

	<?php
}

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
}

?>

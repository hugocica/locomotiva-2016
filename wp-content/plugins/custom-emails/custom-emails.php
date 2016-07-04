<?php

/*
Plugin Name: Custom Emails
Description: Personalização dos emails do WordPress para algumas ações frequentes e importantes.
Version: 1.0
Author: Hugo Cicarelli
*/


// Incluir no cabeçalho do email o tipo de conteúdo HTML
if ( !function_exists('ewp_wp_mail_content_type') ) {
    add_filter( 'wp_mail_content_type', 'ewp_wp_mail_content_type' );
	function ewp_wp_mail_content_type() {
		return "text/html";

	}
}

if ( ! function_exists( 'wp_new_user_notification' ) ) :
	function wp_new_user_notification( $user_id, $deprecated = null, $notify = '' ) {
		$user = get_userdata( $user_id );

		$user_login = stripslashes( $user->user_login );
		$user_email = stripslashes( $user->user_email );
		$user_name = stripslashes( $user->display_name );
		$blogname = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );
		$subject = 'Bem-vindo ao ' . $blogname . ', ' . $user_name;


		// Vamos enviar um email simples ao administrador
		$message  = sprintf(__('New user registration on your site %s:'), $blogname) . "<br><br>";
		$message .= sprintf(__('Username: %s'), $user_login) . "<br>";
		$message .= sprintf(__('E-mail: %s'), $user_email);

		@wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), $blogname), $message);

		$key = get_password_reset_key( $user );

		/* Vamos enviar o email customizado para o usuário. */

		if ( $user->roles[0] == 'gestor' )
			$login_url = get_permalink( get_page_by_path('espaco-do-gestor') );
		else
			$login_url = site_url();

		ob_start();

		include( 'email_header.php' );

		?>

		<p style="text-transform: uppercase; font-size: 24px; color: #58595B; font-weight: 700; margin-bottom: 15px;"><span style="display: block; font-size: 14px; color: #939598;">Olá</span> <?php echo esc_html( $user_name ); ?>,</p>

		<span style="width: 70px; height: 4px; background-color: #F27C3C; display: block; margin-bottom: 30px;"></span>

		<p style="font-size: 16px; color: #58595B; font-weight: 100;">Obrigado por se juntar ao <?php echo $blogname; ?>!</p>

		<p style="font-size: 16px; color: #58595B; font-weight: 100;">O seu nome de usuário é <strong><?php echo esc_html( $user_login ); ?></strong> e, para definir sua senha, <a style="margin-top: 10px; padding: 8px 12px; background-color: #F27C3C; color: #fff; border-radius: 4px;" href="<?php echo get_permalink( get_page_by_path('redefinir-senha') ) . "?action=rp&key=".$key."&login=" . rawurlencode($user_login) ?>">Clique aqui</a>
		</p>

		<br><br>
		<p style="font-size: 16px; color: #58595B; font-weight: 100;">Para fazer seu login, <a href="<?php echo $login_url; ?>">clique aqui!</a></p>

		<?php

		include( 'email_footer.php' );

		$message = ob_get_contents();
		ob_end_clean();

		wp_mail( $user_email, $subject, $message );

	}
endif;

if ( !function_exists('custom_change_password_email') ) {
	add_filter( 'password_change_email', 'custom_change_password_email', 10, 3 );
	function custom_change_password_email( $pass_change_mail, $user, $userdata ) {
		ob_start();

		include( 'email_header.php' );

		?>

		<p style="text-transform: uppercase; font-size: 24px; color: #58595B; font-weight: 700; margin-bottom: 15px;"><span style="display: block; font-size: 14px; color: #939598;">Olá</span> ###USERNAME###,</p>

		<span style="width: 70px; height: 4px; background-color: #F27C3C; display: block; margin-bottom: 30px;"></span>

		<p style="font-size: 16px; color: #58595B; font-weight: 100;">Este aviso confirma que a sua senha foi alterada em ###SITENAME###.</p>

		<p style="font-size: 16px; color: #58595B; font-weight: 100;">Caso você não tenha alterado sua senha, contate o administrador enviando uma mensagem através da página <strong><a href="<?php echo get_permalink( get_page_by_path('duvidas-frequentes') ); ?>">Dúvidas Frequentes</a>.</strong></p>
		<?php

		include( 'email_footer.php' );

		$new_message_txt = ob_get_contents();
		ob_end_clean();

	    $pass_change_mail['message'] = $new_message_txt;
	    $pass_change_mail['message'] = str_replace( '###USERNAME###', $user['display_name'], $pass_change_mail['message'] );
		$pass_change_mail['message'] = str_replace( '###ADMIN_EMAIL###', get_option( 'admin_email' ), $pass_change_mail['message'] );
		$pass_change_mail['message'] = str_replace( '###EMAIL###', $user['user_email'], $pass_change_mail['message'] );
		$pass_change_mail['message'] = str_replace( '###SITENAME###', get_option( 'blogname' ), $pass_change_mail['message'] );
		$pass_change_mail['message'] = str_replace( '###SITEURL###', home_url(), $pass_change_mail['message'] );

	    return $pass_change_mail;
	}
}

if ( !function_exists('custom_change_email_email') ) {
	add_filter( 'email_change_email', 'custom_change_email_email', 10, 3 );
	function custom_change_email_email( $pass_change_mail, $user, $userdata ) {
		ob_start();

		include( 'email_header.php' );

		?>

		<p style="text-transform: uppercase; font-size: 24px; color: #58595B; font-weight: 700; margin-bottom: 15px;"><span style="display: block; font-size: 14px; color: #939598;">Olá</span> ###USERNAME###,</p>

		<span style="width: 70px; height: 4px; background-color: #F27C3C; display: block; margin-bottom: 30px;"></span>

		<p style="font-size: 16px; color: #58595B; font-weight: 100;">Este aviso confirma que o seu e-mail foi alterada em ###SITENAME###.</p>

		<p style="font-size: 16px; color: #58595B; font-weight: 100;">Caso você não tenha alterado seu e-mail, contate o administrador enviando uma mensagem através da página <strong><a href="<?php echo get_permalink( get_page_by_path('duvidas-frequentes') ); ?>">Dúvidas Frequentes</a>.</strong></p>
		<?php

		include( 'email_footer.php' );

		$new_message_txt = ob_get_contents();
		ob_end_clean();

	    $pass_change_mail['message'] = $new_message_txt;
	    $pass_change_mail['message'] = str_replace( '###USERNAME###', $user['display_name'], $pass_change_mail['message'] );
		$pass_change_mail['message'] = str_replace( '###ADMIN_EMAIL###', get_option( 'admin_email' ), $pass_change_mail['message'] );
		$pass_change_mail['message'] = str_replace( '###EMAIL###', $user['user_email'], $pass_change_mail['message'] );
		$pass_change_mail['message'] = str_replace( '###SITENAME###', get_option( 'blogname' ), $pass_change_mail['message'] );
		$pass_change_mail['message'] = str_replace( '###SITEURL###', home_url(), $pass_change_mail['message'] );

	    return $pass_change_mail;
	}
}

if ( !function_exists('send_mails_on_publish') ) {
	add_action( 'transition_post_status', 'send_mails_on_publish', 10, 3 );
	function send_mails_on_publish( $new_status, $old_status, $post ) {
        global $wpdb;

	    if ( $new_status !== 'publish' || $old_status === 'publish' || get_post_type( $post ) !== 'post' )
	        return;

		$blogname = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );
		$subject = '[' . $blogname . '] Novo Artigo Disponível';
	    $subscribers = $wpdb->get_results( 'SELECT * FROM wp_subscribers' );
	    $emails = array ();

	    foreach ( $subscribers as $subscriber )
	        $emails[] = 'BCC: ' . $subscriber->email;

		ob_start();

		include( 'email_header.php' );
		?>

		<p style="text-transform: uppercase; font-size: 24px; color: #58595B; font-weight: 700; margin-bottom: 15px;"><span style="display: block; font-size: 14px; color: #939598;">Olá</span> Gestor!</p>

		<span style="width: 70px; height: 4px; background-color: #F27C3C; display: block; margin-bottom: 30px;"></span>

		<p style="font-size: 16px; color: #58595B; font-weight: 100;">Há um novo documento disponível para você: <strong><?php echo $post->post_title; ?></strong></p>

		<p style="font-size: 16px; color: #58595B; font-weight: 100;">Para ter acesso a este e mais documentos, <a href="<?php echo get_permalink( get_page_by_path( 'espaco-do-gestor' ) ); ?>">clique aqui!</a></p>

		<?php
		include( 'email_footer.php' );

		$message = ob_get_contents();
		ob_end_clean();

	    // $emails = array('hugo.cicarelli@grupoi9.com');
		// var_dump($emails);
		// die();
	    wp_mail( '', $subject, $message, $emails );
	}
}

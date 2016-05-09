<?php
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

	if ( $template_file == 'template-empresa.php' ) {
		$locodivos_mb = new WPAlchemy_MetaBox(
						array (
							'id' => '_locomodivos_metabox',
							'title' => 'Lista de Membros',
							'types' => array('page'), // added only for pages and to custom post type "events"
							'context' => 'normal', // same as above, defaults to "normal"
							'priority' => 'high', // same as above, defaults to "high"
							'template' => get_stylesheet_directory() . '/metaboxes/membros-meta.php'
						)
					);
		$empresa_mb = new WPAlchemy_MetaBox(
						array(
							'id' => '_empresa_metabox',
							'title' => 'Informações de Destaque',
							'types' => array('page'),
							'context' => 'normal',
							'priority' => 'high',
							'template' => get_stylesheet_directory() . '/metaboxes/destaques-meta.php'
						)
					);
	} elseif ( $template_file == 'template-projetos.php' ) {
		$projetos_mb = new WPAlchemy_MetaBox(
							array(
								'id' => '_projetos_metabox',
								'title' => 'Projetos',
								'types' => array('page'),
								'context' => 'normal',
								'priority' => 'high',
								'template' => get_stylesheet_directory() . '/metaboxes/projetos-meta.php'
							)
						);
		$destaque_mb = new WPAlchemy_MetaBox(
						array(
							'id' => '_destaque_metabox',
							'title' => 'Informações de Destaque',
							'types' => array('page'),
							'context' => 'normal',
							'priority' => 'high',
							'template' => get_stylesheet_directory() . '/metaboxes/destaques-meta.php'
						)
					);
	} elseif ( $template_file == 'template-contato.php' ) {
		$contato_config_mb = new WPAlchemy_MetaBox(
							array(
								'id' => '_contato_config_metabox',
								'title' => 'Configurações de Contato',
								'types' => array('page'),
								'context' => 'normal',
								'priority' => 'high',
								'template' => get_stylesheet_directory() . '/metaboxes/contato-meta.php'
							)
						);
	} elseif ( $template_file == 'template-home.php' ) {
		$home_config = new WPAlchemy_MetaBox(
							array(
								'id' => '_home_config_metabox',
								'title' => 'Configurações do Slider',
								'types' => array('page'),
								'context' => 'normal',
								'priority' => 'high',
								'template' => get_stylesheet_directory() . '/metaboxes/homepage-meta.php'
							)
						);
	}
?>

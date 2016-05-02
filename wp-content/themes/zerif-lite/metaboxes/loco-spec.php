<?php
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
?>

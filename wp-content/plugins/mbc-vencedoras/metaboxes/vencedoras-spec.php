<?php
    /**
    **  Arquivo responsável por todas as metaboxes que serão criadas para utilização da página de eventos
    **  Cada metabox possui um template específico, nomeado semelhante, contido nesta mesma pasta
    */
    $postconfigMetabox = new WPAlchemy_MetaBox(array (
            'id'        => '_vencedoras_config_metabox',
            'title'     => 'Configuração da Empresa Vencedora',
            'types'     => array('vencedoras'),
            'context'   => 'normal',
            'priority'  => 'high',
            'template'  => dirname(__FILE__) . '/vencedoras-config.php'
        ));
    $postconfigMetabox = new WPAlchemy_MetaBox(array (
            'id'        => '_vencedoras_nacional_metabox',
            'title'     => 'Vencedora Nacional',
            'types'     => array('vencedoras'),
            'context'   => 'side',
            'priority'  => 'high',
            'template'  => dirname(__FILE__) . '/vencedora-nacional.php'
        ));
    $postconfigMetabox = new WPAlchemy_MetaBox(array (
            'id'        => '_vencedoras_ciclo_metabox',
            'title'     => 'Ciclo',
            'types'     => array('vencedoras'),
            'context'   => 'side',
            'priority'  => 'high',
            'template'  => dirname(__FILE__) . '/vencedoras-ciclo.php'
        ));
     
?>
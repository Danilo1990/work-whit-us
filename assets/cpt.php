<?php
if (!defined('ABSPATH')) {
    exit;
}

function wws_post_type_annunci() {
    register_taxonomy('aree', 'annuncio', array(
        'labels' => array(
            'name'              => 'Aree',
            'singular_name'     => 'Area',
            'search_items'      => 'Cerca aree',
            'all_items'         => 'Tutte le aree',
            'edit_item'         => 'Modifica area',
            'update_item'       => 'Aggiorna area',
            'add_new_item'      => 'Aggiungi nuova area',
            'new_item_name'     => 'Nuova area',
            'menu_name'         => 'Aree',
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => false,
        'show_in_rest'      => false,
        
    ));
    
    register_post_type('annuncio', array(
        'labels' => array(
            'name'               => 'Annunci',
            'singular_name'      => 'Annuncio',
            'add_new'            => 'Aggiungi nuovo',
            'add_new_item'       => 'Aggiungi annuncio',
            'edit_item'          => 'Modifica annuncio',
            'new_item'           => 'Nuovo annuncio',
            'view_item'          => 'Vedi annuncio',
            'search_items'       => 'Cerca annunci',
            'not_found'          => 'Nessun annuncio trovato',
            'not_found_in_trash' => 'Nessun annuncio nel cestino',
            'menu_name'          => 'Annunci',
        ),
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'annunci'),
        'supports'           => array('title', 'editor'),
        'show_in_rest'       => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-megaphone',
        'taxonomies'         => array('tipologia'),
    ));
}
add_action('init', 'wws_post_type_annunci');

// Deregister Gutenberg for annunci
add_filter('use_block_editor_for_post_type', function ($use_block_editor, $post_type) {
    if ($post_type === 'annuncio') {
        return false;
    }
    return $use_block_editor;
}, 10, 2);
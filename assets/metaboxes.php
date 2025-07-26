<?php
if (!defined('ABSPATH')) exit;

/**
 * Aggiunge metaboxes per 'annuncio'
 */
function wws_annuncio_add_metaboxes() {
    if (get_option('wwu_show_expiry_date', '1') === '1') {
        add_meta_box(
            'annuncio_expiry_date',
            __('Announcement deadline:', 'wwu-plugin'),
            'wws_annuncio_expiry_date_callback',
            'annuncio',
            'normal',
            'core'
        );
    }
    if (get_option('wwu_show_salary', '1') === '1') {
        add_meta_box(
            'annuncio_salary',
            __('RAL', 'wwu-plugin'),
            'wws_annuncio_salary_callback',
            'annuncio',
            'normal',
            'core'
        );
    }
    if (get_option('wwu_show_luogo', '1') === '1') {
        add_meta_box(
            'annuncio_luogo',
            __('Luogo', 'wwu-plugin'),
            'wws_annuncio_luogo_callback',
            'annuncio',
            'normal',
            'core'
        );
    }
    if (get_option('wwu_show_luogo', '1') === '1') {
        add_meta_box(
            'wwu_show_postazione',
            __('Workstation', 'wwu-plugin'),
            'wws_annuncio_postazione_callback',
            'annuncio',
            'normal',
            'core'
        );
    }
    if (get_option('wwu_show_contract', '1') === '1') {
        add_meta_box(
            'wwu_show_contract',
            __('Contract', 'wwu-plugin'),
            'wws_annuncio_contract_callback',
            'annuncio',
            'normal',
            'core'
        );
    }
}
add_action('add_meta_boxes', 'wws_annuncio_add_metaboxes');

/**
 * Callback per la data di scadenza
 */
function wws_annuncio_expiry_date_callback($post) {
    wp_nonce_field('wws_annuncio_save_meta', 'wws_annuncio_nonce');
    $value = get_post_meta($post->ID, '_annuncio_expiry_date', true);
    echo '<input style="width:100%;" type="date" id="annuncio_expiry_date" name="annuncio_expiry_date" value="' . esc_attr($value) . '" />';
}
/**
 * Callback per lo stipendio
 */
function wws_annuncio_salary_callback($post) {
    wp_nonce_field('wws_annuncio_save_meta', 'wws_annuncio_nonce');
    $value = get_post_meta($post->ID, '_annuncio_salary', true);
    echo '<input style="width:100%;" type="number" id="annuncio_salary" name="annuncio_salary" value="' . esc_attr($value) . '" placeholder="e.g. 25000" />';
}
/**
 * Callback per luogo
 */
function wws_annuncio_luogo_callback($post) {
    wp_nonce_field('wws_annuncio_save_meta', 'wws_annuncio_nonce');
    $value = get_post_meta($post->ID, '_annuncio_luogo', true);
    echo '<input style="width:100%;" type="text" id="annuncio_luogo" name="annuncio_luogo" value="' . esc_attr($value) . '" placeholder="Luogo" />';
}
/**
 * Callback per postazione
 */
function wws_annuncio_postazione_callback($post) {
    wp_nonce_field('wws_annuncio_save_meta', 'wws_annuncio_nonce');
    $values = get_post_meta($post->ID, '_annuncio_postazione', true);

    // Se il valore non è un array (per retrocompatibilità), lo trasformiamo in array
    if (!is_array($values)) {
        $values = !empty($values) ? array($values) : array();
    }

    $options = array(
        'remote'   => __('Remote', 'wwu-plugin'),
        'onsite'   => __('On-site', 'wwu-plugin'),
        'hybrid'   => __('Hybrid', 'wwu-plugin'),
    );

    foreach ($options as $key => $label) {
        $checked = in_array($key, $values) ? 'checked' : '';
        echo '<label style="display:block; margin-bottom:4px;">';
        echo '<input type="checkbox" name="annuncio_postazione[]" value="' . esc_attr($key) . '" ' . $checked . '> ';
        echo esc_html($label);
        echo '</label>';
    }
}

/**
 * Callback per contract
 */
function wws_annuncio_contract_callback($post) {
    wp_nonce_field('wws_annuncio_save_meta', 'wws_annuncio_nonce');
    $values = get_post_meta($post->ID, '_annuncio_contract', true);

    if (!is_array($values)) {
        $values = !empty($values) ? array($values) : array();
    }
    $options = [
        'permanent'     => __('Permanent', 'wwu-plugin'),
        'fixed_term'    => __('Fixed-term', 'wwu-plugin'),
        'part_time'     => __('Part-time', 'wwu-plugin'),
        'full_time'     => __('Full-time', 'wwu-plugin'),
        'internship'    => __('Internship', 'wwu-plugin'),
        'freelance'     => __('Freelance', 'wwu-plugin'),
    ];

    foreach ($options as $key => $label) {
        $checked = in_array($key, $values) ? 'checked' : '';
        echo '<label style="display:block; margin-bottom:4px;">';
            echo '<input type="checkbox" name="annuncio_contract[]" value="' . esc_attr($key) . '" ' . $checked . '> ';
            echo esc_html($label);
        echo '</label>';
    }
}

/**
 * Salvataggio dei meta dati
 */
function wws_annuncio_save_meta($post_id) {
    if (!isset($_POST['wws_annuncio_nonce']) || !wp_verify_nonce($_POST['wws_annuncio_nonce'], 'wws_annuncio_save_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Salva la data
    if (isset($_POST['annuncio_expiry_date'])) {
        update_post_meta($post_id, '_annuncio_expiry_date', sanitize_text_field($_POST['annuncio_expiry_date']));
    }
    // Salva lo stipendio
    if (isset($_POST['annuncio_salary'])) {
        update_post_meta($post_id, '_annuncio_salary', sanitize_text_field($_POST['annuncio_salary']));
    }
    // Salva luogo
    if (isset($_POST['annuncio_luogo'])) {
        update_post_meta($post_id, '_annuncio_luogo', sanitize_text_field($_POST['annuncio_luogo']));
    }
    // Salva postaione
    if (isset($_POST['annuncio_postazione'])) {
        $postazione = array_map('sanitize_text_field', (array) $_POST['annuncio_postazione']);
        update_post_meta($post_id, '_annuncio_postazione', $postazione);
    } else {
        delete_post_meta($post_id, '_annuncio_postazione');
    }
    // Salva contract
    if (isset($_POST['annuncio_contract'])) {
        $contract = array_map('sanitize_text_field', (array) $_POST['annuncio_contract']);
        update_post_meta($post_id, '_annuncio_contract', $contract);
    } else {
        delete_post_meta($post_id, '_annuncio_contract');
    }
}
add_action('save_post', 'wws_annuncio_save_meta');

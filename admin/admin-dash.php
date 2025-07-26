<?php

if (!defined('ABSPATH')) exit;

function wwu_render_admin_page() {
    
    if (isset($_POST['wwu_metabox_toggle_nonce']) && wp_verify_nonce($_POST['wwu_metabox_toggle_nonce'], 'wwu_metabox_toggle_action')) {
        update_option('wwu_show_salary',         isset($_POST['wwu_show_salary']) ? '1' : '0');
        update_option('wwu_show_luogo',          isset($_POST['wwu_show_luogo']) ? '1' : '0');
        update_option('wwu_show_postazione',     isset($_POST['wwu_show_postazione']) ? '1' : '0');
        update_option('wwu_show_expiry_date',    isset($_POST['wwu_show_expiry_date']) ? '1' : '0');
        update_option('wwu_show_contract',       isset($_POST['wwu_show_contract']) ? '1' : '0');
        echo '<div class="updated"><p>Impostazioni salvate.</p></div>';
    }

    // Recupera opzioni attuali
    $salary     = get_option('wwu_show_salary', '1');
    $luogo      = get_option('wwu_show_luogo', '1');
    $postazione = get_option('wwu_show_postazione', '1');
    $expiry     = get_option('wwu_show_expiry_date', '1');
    $contract    = get_option('wwu_show_contract', '1');
    ?>
    <div class="wrap">
        <div class="head-dash">
            <h1>Work With Us</h1>
        </div>
        <div class="contenitor-admin-ann">
            <h1>Show metabox</h1>
            <form method="post">
                <?php wp_nonce_field('wwu_metabox_toggle_action', 'wwu_metabox_toggle_nonce'); ?>

                <?php
                $salary     = get_option('wwu_show_salary', '1');
                $luogo      = get_option('wwu_show_luogo', '1');
                $postazione = get_option('wwu_show_postazione', '1');
                $expiry     = get_option('wwu_show_expiry_date', '1');
                $contract      = get_option('wwu_show_contract ', '1');
                $filter_text = get_option('wwu_text_filter_button_submit', '');

                ?>

                <div class="toggle-label">
                    <label class="toggle-switch">
                        <input type="checkbox" name="wwu_show_salary" value="1" <?php checked('1', $salary); ?> />
                        <span class="slider-switch"></span>
                    </label>
                    Active RAL
                </div>

                <div class="toggle-label">
                    <label class="toggle-switch">
                        <input type="checkbox" name="wwu_show_luogo" value="1" <?php checked('1', $luogo); ?> />
                        <span class="slider-switch"></span>
                    </label>
                    Active Place
                </div>

                <div class="toggle-label">
                    <label class="toggle-switch">
                        <input type="checkbox" name="wwu_show_postazione" value="1" <?php checked('1', $postazione); ?> />
                        <span class="slider-switch"></span>
                    </label>
                    Active Workstation
                </div>

                <div class="toggle-label">
                    <label class="toggle-switch">
                        <input type="checkbox" name="wwu_show_expiry_date" value="1" <?php checked('1', $expiry); ?> />
                        <span class="slider-switch"></span>
                    </label>
                    Active Expiry Date
                </div>

                <div class="toggle-label">
                    <label class="toggle-switch">
                        <input type="checkbox" name="wwu_show_contract" value="1" <?php checked('1', $contract); ?> />
                        <span class="slider-switch"></span>
                    </label>
                    Active contract
                </div>

                <br>
                <input type="submit" class="button button-primary" value="Save change">
            </form>
        </div>
    </div>
    <?php
}

function wwu_render_templates_page() {
    if (isset($_POST['wwu_import_submit']) && check_admin_referer('wwu_import_template')) {
        $file = sanitize_file_name($_POST['wwu_template_file']);
        $path = plugin_dir_path(dirname(__FILE__)) . 'elementor/templates/' . $file;

        if (file_exists($path)) {
            $json = file_get_contents($path);
            $data = json_decode($json, true);

            if (!empty($data)) {
                $content = isset($data['content']) ? $data['content'] : $data;

                $post_id = wp_insert_post([
                    'post_title'   => sanitize_text_field($data['title'] ?? basename($file, '.json')),
                    'post_type'    => 'elementor_library',
                    'post_status'  => 'publish',
                ]);

                if ($post_id && !is_wp_error($post_id)) {
                    update_post_meta($post_id, '_elementor_edit_mode', 'builder');
                    update_post_meta($post_id, '_elementor_template_type', 'single');
                    update_post_meta($post_id, '_elementor_data', json_encode($data['content']));

                    echo '<div class="notice notice-success">';
                        echo '<p>Template successfully imported!</p>';
                        echo '<a href="'.admin_url("post.php?post={$post_id}&action=elementor").'">Go template</a>';
                    echo '</div>';

                } else {
                    echo '<div class="notice notice-error"><p>Errore nella creazione del post template.</p></div>';
                }
            } else {
                echo '<div class="notice notice-error"><p>Il file JSON non è valido o è vuoto.</p></div>';
            }
        } else {
            echo '<div class="notice notice-error"><p>File non trovato.</p></div>';
        }
    }
    ?>
    <div class="wrap">
    <h1>Import template</h1>
    <?php 
    if (!defined('ELEMENTOR_PRO_VERSION') && !defined('PROELEMENTS_VERSION')) {
        echo '<div class="notice notice-error"><p><strong>Attention:</strong> Elementor Pro is not active. Some functions may not function correctly. <b>You cannot import templates</b></p></div>';
    } else {  ?>
    <div class="notice notice-info">
        <p>Elementor does not automatically create instances when importing templates. You need to manually apply the imported template to specific pages or sections.</p>
    </div>
    <div class="wwu-template-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
            <?php foreach (wwu_get_template_list() as $file => $label): 
                $thumbnail = plugin_dir_url(dirname(__FILE__)) . 'elementor/templates/' . basename($file, '.json') . '.jpg';
                $template_name = esc_html($label);
            ?>
                <div class="template-card">
                    <div class="template-card-img" style="background-image: url(<?php echo esc_url($thumbnail); ?>)"><h4><?php echo $template_name; ?></h4></div>

                    <div>
                        <form method="post">
                            <?php wp_nonce_field('wwu_import_template'); ?>
                            <input type="hidden" name="wwu_template_file" value="<?php echo esc_attr($file); ?>">
                            <div class="template-card-btn">
                                <a href="<?php echo esc_url($thumbnail); ?>" target="_blank" class="button button-secondary">Preview</a>
                                <button type="submit" name="wwu_import_submit" class="button button-primary" value="Importa">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php }

}


function wwu_get_template_list() {
    $template_dir = plugin_dir_path( dirname(__FILE__) ) . 'elementor/templates/';
    $files = scandir($template_dir);
    $templates = [];

    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'json') {
            $templates[$file] = ucfirst(str_replace(['-', '_', '.json'], [' ', ' ', ''], $file));
        }
    }

    return $templates;
}


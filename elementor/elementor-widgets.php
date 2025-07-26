<?php
if (!defined('ABSPATH')) {
    exit;
}

function register_widget_custom() {
    require_once(plugin_dir_path(__FILE__) . '/widgets/widget-all-annunci.php');
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Widget_All_Annunci());
}
add_action('elementor/widgets/widgets_registered', 'register_widget_custom');


add_action('elementor/dynamic_tags/register_tags', function($dynamic_tags) {
	require_once plugin_dir_path(__FILE__) . '/dynamic-tags/class-metabox-field-tag.php';
	$dynamic_tags->register_tag('Elementor\Metabox_Field_Tag');
});


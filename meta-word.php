<?php

/**
 * Plugin Name: metaWord
 * Description: Add Wordpress classes to meta tag
 * Version: 1
 */

register_activation_hook(__FILE__, function () {
    error_log('plugin activated');
});

register_deactivation_hook(__FILE__, function () {
    error_log('plugin deactivated');
});

/**
 * Add meta tag with taxonomy class names for Zephr
 */
add_action('wp_head', 'mw_meta_wp_head');

function mw_meta_wp_head()
{
    $separator = ' ';
    $metaName = 'mw-class';
    $metaContent = '';

    if (is_archive()) {
        $bodyClassList = get_body_class();
        $metaContent = implode($separator, $bodyClassList);
    } else if (is_single()) {
        $postClassList = get_post_class();
        $metaContent = implode($separator, $postClassList);
    }
    printf("<meta name='%s' content='%s'/>", $metaName, $metaContent);
}

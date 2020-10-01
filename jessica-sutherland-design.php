<?php

/*
Plugin Name: Jessica Sutherland Worker Toolkit
Plugin URI: https://jessicasutherland.com.au
Description: Do not deactivate - your site will break. Get support on https://jsjsjs.atlassian.net/servicedesk/
Author: Jessica Sutherland Design
Version: 1.1
Author URI: https://jessicasutherland.com.au/
 */

/*
 *Jessica Sutherland Design Worker Management Plugin for WordPress
 *For more information, please visit jessicasuther.land.
 *If your website goes down - please visit https://jsjsjs.atlassian.net/servicedesk/
 *This plugin collects no information. If you have any concerns about the privacy policy of Jessica Sutherland Design please visit https://jessicasutherland.com.au/privacy/.
 */

/*
 *Link CSS File
 */
function jsdm_admin_theme() {
    wp_enqueue_style('my-admin-theme', plugins_url('wp-admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'jsdm_admin_theme');
add_action('login_enqueue_scripts', 'jsdm_admin_theme');


require_once plugin_dir_path(__FILE__) . 'includes/jsdm-functions.php';

?>
<?php

/*
*jessica-sutherland-design
*/

/*
 * JS Manager Menu Item Addition to Admin Control Panel (ACP)
 */

    // Hook the 'admin_menu' action hook, run the function named 'jsdm_add_menu_link_primary_page'
    add_action( 'admin_menu', 'jsdm_add_menu_link_primary_page' );
 
    // Add a new top level menu link to the ACP
    function jsdm_add_menu_link_primary_page()
    {
        add_menu_page(
        'Jessica Sutherland Design',
        'Jessica Sutherland Design',
        'manage_options',
        'jessica-sutherland-design/includes/jsdm-primary-page.php'
        );
    }

/*
 * JS Contact Support Toolbar/Quicklinks Addition
 */

    // Hook the 'admin_bar_menu action hook, run the function named 'jsdm_add_toolbar_item_supportlink'
    add_action('admin_bar_menu', 'jsdm_add_toolbar_item_supportlink', 999);

    // Add 'Contat Support' tool bar item
    function jsdm_add_toolbar_item_supportlink($wp_admin_bar) {
        $wp_admin_bar->add_node( array(
        'id'		=> 'supportlink',
        'title' => 'Contact Support',
        'href' => 'https://jsjsjs.atlassian.net/servicedesk/customer/portal/1',
    ) );
    }

/*
 * JS Dashboard Widget
 */

     // Hook the 'wp_dashboard_setup' action hook, run the function named 'jsdm_Add_Dashboard_Widget'
    add_action('wp_dashboard_setup', 'jsdm_Add_Dashboard_Widget');
    
    function jsdm_Add_Dashboard_Widget() {
    global $wp_meta_boxes;
    
    // Add 'Jessica Sutherland  Support' dashboard widget
    wp_add_dashboard_widget('custom_help_widget', 'Jessica Sutherland Design', 'custom_dashboard_help');
    }
    
    function custom_dashboard_help() {
    echo '<p>Welcome to your website. Need help? Contact us for support <a href="https://jsjsjs.atlassian.net/servicedesk/customer/portal/1">here.</a></p>';
    }

/*
 * JS Custom Footer Text
 */

    function jsdm_change_footer_admin () {  
 
        echo 'Made with 💕, ☕ and 🎶 in Victoria, Australia by <a href="https://jessicasutherland.com.au">Jessica Sutherland.</a>';  
       
      }  
       
      add_filter('admin_footer_text', 'jsdm_change_footer_admin');

/*
 * JS Change Greeting from Howdy, to Hey there,
 */

    add_filter('gettext', 'jsdm_change_howdy', 10, 3);
    
        function jsdm_change_howdy($translated, $text, $domain) {
        
            if (!is_admin() || 'default' != $domain)
                return $translated;
        
            if (false !== strpos($translated, 'Howdy'))
                return str_replace('Howdy', 'Hey there', $translated);
        
            return $translated;
        }

/*
 * JS Custom Dashboard Logo
 */

    function jsdm_custom_logo() {
        echo '
        <style type="text/css">
        #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
        background-image: url(https://jessicasutherland.com.au/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2Fbfe0bd4c-14d3-4f86-92c9-0d97513794fd%2FJessica_Sutherland_-_Short.png?table=block&id=372efdec-3d38-40ed-a0a7-ac636d061c59&width=250&userId=&cache=v2) !important;
        background-position: 0 0;
        color:rgba(0, 0, 0, 0);
        background-repeat: no-repeat;
        background-size: contain;
        }
        #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
        background-position: 0 0;
        }
        </style>
        ';
        }
        
        //hook into the administrative header output
        add_action('wp_before_admin_bar_render', 'jsdm_custom_logo');

/*
 * Change login logo link to https://jessicasutherland.com.au/
 */

    function jsdm_url_login(){
        return "https://jessicasutherland.com.au/";
    }
    add_filter('login_headerurl', 'jsdm_url_login');

?>
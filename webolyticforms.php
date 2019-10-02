<?php
$apiTitle='Webolytics Wordpress Forms Plugin';
$apiVersion='1.0.0';
/*
Plugin Name: Webolytics Forms  
Version: 1.0.0
Author: Webosaurus
Plugin URI: https://www.webosaurus.co.uk/
Description: Webolytics form plugin, for adding webolytics forms to wordpress posts and pages. The Shortcode to use this Plugin: [webolyticsform id="ID_VALUE_HERE"] 
Author: Webosaurus
Author URI: www.webosaurus.co.uk/
*/
 
 // function to create the DB / Options / Defaults					
function ss_options_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "webolytics_form";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
		  `wp_form_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
		  `cgid` VARCHAR(255) NOT NULL,
		  `fsid` VARCHAR(255) NOT NULL,
		  `next_button` VARCHAR(100) NOT NULL,
		  `previous_button` VARCHAR(100) NOT NULL,
		  `finish_button` VARCHAR(100) NOT NULL,
		  `form_title` VARCHAR(255) NOT NULL,
		  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  PRIMARY KEY (`wp_form_id`),
		  UNIQUE INDEX `wp_form_id_UNIQUE` (`wp_form_id` ASC)
		  )
		  $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'ss_options_install');

/*function prefix_plugin_update_message( $data, $response ) {
    if( isset( $data['upgrade_notice'] ) ) {
        printf(
            '<div class="update-message">%s</div>',
            wpautop( $data['upgrade_notice'] )
        );
    }
}
add_action( 'in_plugin_update_message-your-plugin/your-plugin.php', 'prefix_plugin_update_message', 10, 2 );*/



add_action("admin_menu", "webolytics_admin_menu");
define("ROOTDIR", plugin_dir_path(__FILE__)); 
require_once(ROOTDIR . "lang/en.php");
require_once(ROOTDIR . "webolyticsVars.php");
require_once(ROOTDIR . "webolyticsConnect.php");

function webolytics_admin_menu() {
    add_menu_page("Webolytics Forms", //page title
            "Webolytics Forms", //menu title
            "manage_options", //capabilities
            "Webolytics-Forms", //menu slug
            "listpage" //function
    );
    add_submenu_page("Webolytics-Forms", //parent slug
    		"Webolytics Forms", //page title
            "Webolytics Forms", //menu title
            "manage_options", //capabilities
            "Webolytics-Forms", //menu slug
            "listpage" //function
    );
    add_submenu_page("Webolytics-Forms", // parent slug
    		"Add New Webolytics Forms", //page title
            "Add New Webolytics Forms", //menu title
            "manage_options", //capabilities
            "Add-New-Webolytics-Forms", //menu slug
            "addform" //function
    );

    add_submenu_page(null,  // parent slug
    		"Edit Webolytics Forms", //page title
            "Edit Webolytics Forms", //menu title
            "manage_options", //capabilities
            "Edit-Webolytics-Forms", //menu slug
            "editform" //function
    );
}

add_action('init', 'register_webolytics_scripts');
function register_webolytics_scripts() {
	wp_register_script( 'webolytics_form_script', plugins_url('/js/webolytics.js', __FILE__), array('jquery'), '2.5.1' );
	//wp_register_script( 'webolytics_form_script', plugins_url('/js/webolytics.js', __FILE__), false, '1.0.0', 'all');
    
    //wp_register_style( 'webolytics_form_style_bootstrap', plugins_url('/css/bootstrap.min.css', __FILE__), false, '1.0.0', 'all');

    wp_register_style( 'webolytics_form_style_bootstrap', plugins_url('/css/webolytics-bootstrap-grid.css', __FILE__), false, '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'enqueue_webolytics_style');

function enqueue_webolytics_style(){
	wp_enqueue_script('webolytics_form_script');
   wp_enqueue_style( 'webolytics_form_style_bootstrap' );
}

add_shortcode("webolyticsform", "webolytics_get_form");

/*function wpa_inspect_styles(){
    global $wp_styles;
    var_dump( $wp_styles );
} */
 

?>
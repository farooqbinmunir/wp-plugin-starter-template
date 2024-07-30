<?php
	/**
	 * Plugin Name: Code Manager
	 * Plugin URI: https://farooqbinmunir.github.io/
	 * Author: Farooq Bin Munir
	 * Author URI: https://farooqbinmunir.github.io/
	 * Version: 1.0
	 * License: GNU General Public License v2
	 * Description: A Simple Plugin starter template with all required steps packaged
	 * Text Domain: fbm-domain
	*/

	/*  
		# Backend
			* Backend CSS
				write in 'assets/css/backend/backend.css'
			* Backend JavaScript/jQuery
				write in 'assets/js/backend/backend.js'
		
		# Frontend
			* Frontend CSS
				write in 'assets/css/frontend/frontend.css'
			* Frontend JavaScript/jQuery
				write in 'assets/js/frontend/frontend.js'
	*/

	// Exit the users if they try to access the plugin directly
	if(!defined('ABSPATH')){ 
		exit;
	}

	// Defining CONSTANT to store important information to be available throught the plugin
	global $wpdb;
	// define('FBM_PLUGIN_NAME', 'fbm-starter'); // You plugin folder name
	define('FBM_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
	define('FBM_PLUGIN_DIR_NAME', plugin_basename(dirname(__FILE__)));
	define('FBM_PLUGIN_TITLE', 'Code Manager by Farooq Bin Munir');
	define('FBM_PLUGIN_MENU_NAME', 'Code Manager');
	define('FBM_PLUGIN_TABLE', $wpdb->prefix . 'code_manager'); // Change table name as per your requirement and customize the table below
	define('FBM_PLUGIN_NONCE', 'code_manager_ajax_nonce');

	// Including functions.php file to use it's functions here
	require_once(FBM_PLUGIN_DIR . 'inc/functions.php');
	require_once(FBM_PLUGIN_DIR . 'inc/ajax.php');
	require_once(FBM_PLUGIN_DIR . 'inc/shortcodes.php');
	require_once(FBM_PLUGIN_DIR . 'inc/actions.php');

	// Do something when user activates the plugin
	register_activation_hook( __FILE__, 'fbm_activate');

	// Create a table in database to store plugin data when user activate the plugin
	function fbm_activate(){

		$query = "CREATE TABLE FBM_PLUGIN_TABLE (
			id int(11) NOT NULL AUTO_INCREMENT,
			name VARCHAR(255) NOT NULL,
			PRIMARY KEY (id)
		)";

		require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
		maybe_create_table(FBM_PLUGIN_TABLE, $query);
		flush_rewrite_rules();
	}

	// Do something when user deactivates the plugin
	register_deactivation_hook( __FILE__, 'fbm_deactivate');

	// Delete the previously created database table when user deactivate the plugin
	function fbm_deactivate(){
		$sql = "DROP TABLE IF EXISTS FBM_PLUGIN_TABLE";
		$wpdb->query($sql);
		flush_rewrite_rules();
	}





	

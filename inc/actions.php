<?php


	// Including functions.php file to use it's functions here
	require_once(FBM_PLUGIN_DIR . 'inc/functions.php');
	
	// Add Menu to admin menu bar
	add_action('admin_menu', 'fbm_admin_menu_callback');

	// Enqueue scripts & styles for backend
	add_action('admin_enqueue_scripts', 'fbm_backend_enqueues');

	// Enqueue scripts and styles for frontend
	add_action('wp_enqueue_scripts', 'fbm_frontend_enqueues');

	// Do stuff on wordpress init, like creating a post type
	add_action('init', 'fbm_init_callback');
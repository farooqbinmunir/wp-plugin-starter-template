<?php

	/* Wiselogix - Custom Plugin functions */

	// Including utility functions to be available in this file
	require_once(FBM_PLUGIN_DIR . 'inc/utilities.php');

	// Enqueue scripts & styles for backend use
	function fbm_backend_enqueues(){

		// Enqueue Styles
		wp_enqueue_style('fbm_backend_styles', plugins_url(FBM_PLUGIN_DIR_NAME) . '/assets/css/backend/backend.css', '', time(), 'all');
		wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', '', '1.0', 'all');

		// Enqueue Scripts
		wp_enqueue_script('fbm_backend_scripts', plugins_url(FBM_PLUGIN_DIR_NAME) . '/assets/js/backend/backend.js', ['jquery'], time(), true);
		wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', 'jquery', '1.0', false);

		wp_localize_script('fbm_backend_scripts', 'fbm_ajax', array(
			'url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce(FBM_PLUGIN_NONCE),
			'path' => $GLOBALS['path'],
		));

	}

	// Enqueue scripts & styles which are used by the plugin
	function fbm_frontend_enqueues(){

		// Enqueue Styles
		wp_enqueue_style('fbm_frontend_styles', plugins_url(FBM_PLUGIN_DIR_NAME) . '/assets/css/frontend/frontend.css', '', time(), 'all');
		wp_enqueue_style('slick_css', plugins_url(FBM_PLUGIN_DIR_NAME) . '/assets/css/frontend/slick.css', '', '1.0', 'all');

		// Enqueue Scripts
		wp_enqueue_script('slick_js', plugins_url(FBM_PLUGIN_DIR_NAME) . '/assets/js/frontend/slick.min.js', ['jquery'], '1.0');
		wp_enqueue_script('frontend_js', plugins_url(FBM_PLUGIN_DIR_NAME) . '/assets/js/frontend/frontend.js', ['jquery'], time(), true);
		
	}

	// Perform actions on wordpress admin init - hook
	function fbm_admin_menu_callback(){

		add_menu_page( 
			FBM_PLUGIN_TITLE, 
			FBM_PLUGIN_MENU_NAME, 
			'manage_options', 
			sanitize_title_with_dashes(FBM_PLUGIN_MENU_NAME), 
			'fbm_menupage_callback',
			null,
			6
		);

		add_submenu_page( 
			sanitize_title_with_dashes(FBM_PLUGIN_MENU_NAME), 
			'FBM Submenu Page',
			'FBM Submenu Page',
			'manage_options', 
			'fbm-submenu',
			'fbm_submenu_callback'
		);

	}

	// Render the html on plugin menu page
	function fbm_menupage_callback(){ ?>

		<div class="wrap">

			<div id="fbm_ui">

				<div class="fbm_ui_wrap">
					<div class="fbm_ui_header">
						<h2 class="fbm_header_page_title"><?php echo get_admin_page_title(); ?></h2>
					</div>

					<hr class="fbm_line" />

					<div class="fbm_ui_body">
						<!-- Write your html for plugin page here -->
						<p>Your html output will go come here... Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem accusamus illo fugit dicta quibusdam laborum iusto aspernatur nobis at nulla, ad aliquam magni sit ratione veniam adipisci ea facilis tenetur.</p>
					</div>

				</div>
			</div>
		</div>
	<?php }

	// Submenu page for CPTs
	function fbm_submenu_callback(){ ?>
	
		<div class="wrap">

			<div id="fbm_ui">

				<div class="fbm_ui_wrap">
					<div class="fbm_ui_header">
						<h2 class="fbm_header_page_title"><?php echo get_admin_page_title(); ?></h2>
					</div>

					<hr class="fbm_line" />

					<div class="fbm_ui_body">
						<!-- Write your html for plugin page here -->
						<p>Your html output will go come here... Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem accusamus illo fugit dicta quibusdam laborum iusto aspernatur nobis at nulla, ad aliquam magni sit ratione veniam adipisci ea facilis tenetur.</p>
					</div>

				</div>
			</div>
		</div>

	<?php }

	// Perform actions on wordpress init - hook
	function fbm_init_callback() {
		flush_rewrite_rules();
	}





<?php


	function printArray($arr){
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}

	// Custom Function for registering Custom Post Types
	function fbm_register_cpt($postTypeTitle, $singularName = 'Item', $menuPosition = 5, $hasTaxonomy = true, $taxonomyName = 'Categories'){

	    $cpt_name = ucwords(str_replace(['-', '_'], ' ', $postTypeTitle), ' ');
	    $cpt_slug = sanitize_title_with_dashes($cpt_name);
	    $taxonomy = $hasTaxonomy == true ? "{$cpt_slug}-cat" : '';
	    if(!post_type_exists($cpt_slug)){
	        $labels = [
	            'name' => $cpt_name,
	            'add_new' => "Add New " . ucwords(str_replace(['-', '_'], ' ', $singularName), ' '),
	        ];
	        $args = [
	            'labels' => $labels,
	            'public' => true,
	            'has_archive' => true,
	            'show_in_rest' => true,
	            'menu_position' => $menuPosition,
	            'taxonomies' => [$taxonomy],
	            'supports' => [
	                'title',
	                'editor',
	                'thumbnail',
	                'excerpt',
	                'page-attributes',
	                'trackbacks',
	                'revisions',
	                'custom-fields',
	                'author',
	                'comments',
	                'post-formats',
	            ]
	        ];
	        register_post_type($cpt_slug, $args);
	        if($hasTaxonomy == true){
	            $tax_args = array(
	                'labels'            => ['name' => ucwords(str_replace(['-', '_'], ' ', $taxonomyName), ' ')],
	                'hierarchical'      => true,
	                'public'            => true,
	                'show_ui'           => true,
	                'show_admin_column' => true,
	                'query_var'         => true,
	                'show_in_rest'      => true,
	            );
	            register_taxonomy($taxonomy , $cpt_slug, $tax_args);
	        }
	        flush_rewrite_rules();
	    }
	}


	$host = $_SERVER['HTTP_HOST'];
	$path = '';
	if($host === 'localhost'){
		$path = $_SERVER['PHP_SELF'];
		$path = explode('wp-admin', $path)[0];
	}else{
		$path = '/';
	}
	$GLOBALS['path'] = $path;
	
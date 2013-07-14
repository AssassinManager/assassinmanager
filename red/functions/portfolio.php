<?php
/*
Custom Post Types - Portfolio
*/

	// register slides as custom post type
	add_action('init', 'register_portfolio_custom_post');
	
	function register_portfolio_custom_post() {
		register_post_type('portfolio', array(
			'supports' => array('title','editor','thumbnail','excerpt','comments'),
			'labels' => array(
				'name' => "Portfolio",
				'singular_name' => "All Portfolio",
				'add_new' => "Add New",
				'add_new_item' => "Add New Portfolio",
				'edit_item' => "Edit Portfolio",
				'new_item' => "Add New Portfolio",
				'view_item' => "View Portfolio",
				'search_items' => "Search Portfolio",
				'not_found' => "No Portfolio found",
				'not_found_in_trash' => "No Portfolio found in trash"
				),
			'public' => true,
			'query_var' => "portfolio",
			'rewrite' => array (
				'slug' => "portfolio",
			),
			'menu_icon' => admin_url() . 'images/media-button-image.gif'
		));
	}

	//register custom taxomony for portfolio      
    $portfolio_args = array(  
        'labels'                        => array (
			'name'                          => __( 'Portfolio Categories', 'mpt' ),  
			'singular_name'                 => __( 'Portfolio Category', 'mpt' ),  
			'search_items'                  => __( 'Search Portfolio Categories', 'mpt' ),  
			'popular_items'                 => __( 'Popular Portfolio Categories', 'mpt' ),  
			'all_items'                     => __( 'All Portfolio Categories', 'mpt' ),  
			'parent_item'                   => __( 'Parent Portfolio Category', 'mpt' ),  
			'edit_item'                     => __( 'Edit Portfolio Category', 'mpt' ),  
			'update_item'                   => __( 'Update Portfolio Category', 'mpt' ),  
			'add_new_item'                  => __( 'Add New Portfolio Category', 'mpt' ),  
			'new_item_name'                 => __( 'New Portfolio Category', 'mpt' ),  
			'separate_items_with_commas'    => __( 'Separate portfolio categories with commas', 'mpt' ),  
			'add_or_remove_items'           => __( 'Add or remove portfolio categories', 'mpt' ),  
			'choose_from_most_used'         => __( 'Choose from most used portfolio categories', 'mpt' ) 
			),  
        'public'                        => true,  
        'hierarchical'                  => true,  
        'show_ui'                       => true,  
        'show_in_nav_menus'             => true,  
        'query_var'                     => true, 
		'rewrite'						=> array ('slug' => "portfolio/category",)	
    );  
      
    register_taxonomy( 'portfolio-category', 'portfolio', $portfolio_args );  
	
	// add meta boxes to portfolio page template
	
	add_filter( 'cmb_meta_boxes', 'metaboxes_for_portfolio' );
	
	function metaboxes_for_portfolio( array $meta_boxes ) {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_mpt_';
	
		$meta_boxes[] = array(
			'id'         => 'portfolio_page_metabox',
			'title'      => 'Portfolio Page Options',
			'pages'      => array( 'page', ), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			'show_on'    => array( 'key' => 'page-template', 'value' => 'page-portfolio.php' ), // Specific page template to display this metabox
			'fields' => array(
				array(
					'name' => 'Page Layout',
					'desc' => 'Select the layout you want to display in this portfolio page',
					'id' => $prefix . 'page_layout',
					'type' => 'select',
					'options' => array(
						array('name' => '2 Columns', 'value' => '2col'),
						array('name' => '3 Columns', 'value' => '3col'),
						array('name' => '4 Columns', 'value' => '4col')				
					),
					'std'  => '3col'
				),
				array(
					'name' => 'Number of entries',
					'desc' => 'Select the number of entries that should appear (per page).',
					'id' => $prefix . 'page_entries',
					'type' => 'select',
					'options' => array(
						array('name' => '2', 'value' => '2'),
						array('name' => '3', 'value' => '3'),
						array('name' => '4', 'value' => '4'),		
						array('name' => '5', 'value' => '5'),
						array('name' => '6', 'value' => '6'),		
						array('name' => '7', 'value' => '7'),
						array('name' => '8', 'value' => '8'),		
						array('name' => '9', 'value' => '9'),
						array('name' => '10', 'value' => '10'),	
						array('name' => '11', 'value' => '11'),
						array('name' => '12', 'value' => '12'),	
						array('name' => '13', 'value' => '13'),
						array('name' => '14', 'value' => '14'),	
						array('name' => '15', 'value' => '15'),
						array('name' => '16', 'value' => '16'),	
						array('name' => '17', 'value' => '17'),
						array('name' => '18', 'value' => '18'),	
						array('name' => '19', 'value' => '19'),
						array('name' => '20', 'value' => '20')
					),
					'std'  => '9'
				),
			)
		);

		// metaboxes for portfolio (single)
		$meta_boxes[] = array(
			'id'         => 'portfolio_info_metabox',
			'title'      => 'Portfolio Info',
			'pages'      => array( 'portfolio', ), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => 'Client Name',
					'desc' => '',
					'id' => $prefix . 'portfolio_info_client',
					'type' => 'text'
				),
				array(
					'name' => 'Technology',
					'desc' => '',
					'id' => $prefix . 'portfolio_info_tech',
					'type' => 'text'
				),
				array(
					'name' => 'Project URL',
					'desc' => '',
					'id' => $prefix . 'portfolio_info_project_url',
					'type' => 'text'
				),
			)
		);

		$meta_boxes[] = array(
			'id'         => 'portfolio_other_metabox',
			'title'      => 'Other Options',
			'pages'      => array( 'portfolio', ), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => 'Show Comments',
					'desc' => '',
					'id' => $prefix . 'portfolio_single_show_comments',
					'type' => 'checkbox'
				),
			)
		);

		// Add other metaboxes as needed
		return $meta_boxes;
	}


	// load portfolio (based on selected category)

	function load_portfolio_selected_category($category,$current_page,$col,$showpost) {
		$entries = get_option('mpt_portfolio_page_entries');
		$span = load_portfolio_class_selected_layout($col);
		$counter = load_counter_selected_layout($col);
		$query_arg = array (
				'showposts' => $showpost,
				'post_type' => 'portfolio',
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio-category',
						'terms' => $category,
						'field' => 'term_id',
					) 
				),
				'paged' => $current_page
			);
		query_posts( $query_arg );
		$count = 1;

		if (have_posts()) : while (have_posts()) : the_post();

			echo '<div class="'.$span.'">';

			if (has_post_thumbnail( $post->ID ) ) :

				$fullimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

				if ($col == '2col') {
					$imagesize = 'tb-860';
					$style = ' style="max-width: 560px;"';
				} else {
					$imagesize = 'tb-360';
					$style = '';
				}

				echo '<div class="image-box"'.$style.'>';
				echo the_post_thumbnail($imagesize);
				echo '<div class="hover-block">';
				echo '<div class="btn-group">';
				echo '<a href="'.$fullimage[0].'" rel="prettyPhoto[portfolio-cat-'.$category.']"><button class="btn"><i class="icon-zoom-in"></i></button></a>';
				echo '<a href="'.get_permalink().'"><button class="btn"><i class="icon-file"></i></button></a>';
				echo '</div>';
				echo '</div>';
				echo '</div>'; 

			endif;

			echo '<div class="clear padding10"></div>';

			echo '<div class="align-center">';
			echo '<a href="'.get_permalink().'"><h4 class="post-title">'.get_the_title().'</h4></a>';
			echo '</div>';

			echo '</div>';

			if ($count == $counter) {
				$count = 0;
				echo '</div>';
				echo '<div class="clear padding20"></div>';
				echo '<div class="row-fluid">';
			}

			$count++;

		endwhile; endif;

		wp_reset_query();
	}


	// load portfolio class based on selected layout
	function load_portfolio_class_selected_layout($col) {
		switch ($col) {

			case '2col':
				return 'span6';
				break;

			case '3col':
				return 'span4';
				break;

			case '4col':
				return 'span3';
				break;
			
			default:
				return 'span4';
				break;
		}

	}

	// load counter based on selected layout
	function load_counter_selected_layout($col) {
		switch ($col) {

			case '2col':
				return '2';
				break;

			case '3col':
				return '3';
				break;

			case '4col':
				return '4';
				break;
			
			default:
				return '3';
				break;
		}
	}

?>
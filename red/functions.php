<?php
	// Admin functions
	require_once(TEMPLATEPATH . '/admin/admin-functions.php');
	require_once(TEMPLATEPATH . '/admin/admin-interface.php');
	require_once(TEMPLATEPATH . '/admin/theme-settings.php');
	require_once(TEMPLATEPATH . '/admin/admin-custom-functions.php');

	// register metaboxes
	require_once(TEMPLATEPATH . '/functions/post-metabox.php');
	require_once(TEMPLATEPATH . '/functions/page-metabox.php');

	// register individual custom post type functions
	require_once(TEMPLATEPATH . '/functions/portfolio.php');

	//add shortcodes functions
	require_once(TEMPLATEPATH . '/functions/shortcodes.php');

	//Register Aqua Page Builder 
	require_once(TEMPLATEPATH . '/functions/aqua-page-builder/aq-page-builder.php');

	//Register Revolution Slider 
	require_once(TEMPLATEPATH . '/functions/tgm-plugin-activation/revslider.php');

	// register CSS 
	function mpt_register_style() {
		wp_enqueue_style('prettyphoto-style', get_template_directory_uri() . '/css/prettyPhoto.css', null, null);
		wp_enqueue_style('hoveralls-style', get_template_directory_uri() . '/css/hoveralls.css', null, null);
	}
	add_action('wp_enqueue_scripts', 'mpt_register_style');

	// register JS
	function mpt_register_js(){
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));
		wp_enqueue_script('filterablejs', get_template_directory_uri() . '/js/filterable.js', array('jquery'));
		wp_enqueue_script('prettyphotojs', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'));
		wp_enqueue_script('hoveralljs', get_template_directory_uri() . '/js/jquery.hoveralls.min.js', array('jquery'));
		wp_enqueue_script('jeasingjs', get_template_directory_uri() . '/js/jquery.easing.1.3.min.js', array('jquery'));
	}
	add_action('wp_enqueue_scripts', 'mpt_register_js');

	// register menu
	if(function_exists('register_nav_menus')){
		register_nav_menus(array(
		'headermenu' => 'Header Menu'
				)
			);
	}

	// add sidebar
	if(function_exists('register_sidebar')){
			register_sidebar(array(
				'name' => 'Sidebar',
				'id' => 'sidebar',
				'description' => 'Widgets in this area will be shown on the right-hand side.',
				'before_widget' => '<div class="well well-small">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="page-header">',
				'after_title' => '</h4>'
			)
		);

			register_sidebar(array(
				'name' => 'Footer One',
				'id' => 'footer-one',
				'description' => 'First Footer Widget',
				'before_widget' => '',
				'after_widget' => '',
				'before_title' => '<h4 class="page-header"><span>',
				'after_title' => '</span></h4>'
			)
		);
			register_sidebar(array(
				'name' => 'Footer Two',
				'id' => 'footer-two',
				'description' => 'Second Footer Widget',
				'before_widget' => '',
				'after_widget' => '',
				'before_title' => '<h4 class="page-header"><span>',
				'after_title' => '</span></h4>'
			)
		);
			register_sidebar(array(
				'name' => 'Footer Three',
				'id' => 'footer-three',
				'description' => 'Three Footer Widget',
				'before_widget' => '',
				'after_widget' => '',
				'before_title' => '<h4 class="page-header"><span>',
				'after_title' => '</span></h4>'
			)
		);				
	}
	
	// add post type support to page
	add_action( 'init', 'add_extra_metabox' );
	function add_extra_metabox() {
		 add_post_type_support( 'page', 'excerpt' );
		 add_post_type_support( 'page', 'thumbnail' );
		 add_post_type_support( 'post', 'excerpt');
		 add_post_type_support( 'post', 'custom-fields');
		 add_post_type_support( 'post', 'comments');
	}
	
	// add thumbnail support to theme
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
	}

	// add additional image size
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'tb-360', 360, 270, true );
		add_image_size( 'tb-860', 860, 300, true );
	}

	// set excerpt lenght to custom character length
	function the_excerpt_max_charlength($charlength) {
		$excerpt = get_the_excerpt();
		$charlength++;

		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
			} else {
				echo $subex;
			}
			echo '[...]';
		} else {
			echo $excerpt;
		}
	}
		
/**
 * Initialize the metabox class.
 */

	add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
	 
	function cmb_initialize_cmb_meta_boxes() {

		if ( ! class_exists( 'cmb_Meta_Box' ) )
			require_once(TEMPLATEPATH . '/functions/metabox/init.php');

	}

/**
 *  Extended Walker class for use with the Twitter Bootstrap toolkit Dropdown menus in Wordpress.
 *  Special thanks to johnmegahan for providing this wonderful piece of code.
 *  The code originated from https://gist.github.com/1597994
 */
	
	add_action( 'after_setup_theme', 'bootstrap_setup' );

	if ( ! function_exists( 'bootstrap_setup' ) ):

		function bootstrap_setup(){

			class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

				
				function start_lvl( &$output, $depth ) {

					$indent = str_repeat( "\t", $depth );
					$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";
					
				}

				function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
					
					$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

					$li_attributes = '';
					$class_names = $value = '';

					$classes = empty( $item->classes ) ? array() : (array) $item->classes;
					$classes[] = ($args->has_children) ? 'dropdown' : '';
					$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
					$classes[] = 'menu-item-' . $item->ID;


					$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
					$class_names = ' class="' . esc_attr( $class_names ) . '"';

					$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
					$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

					$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

					$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
					$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
					$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
					$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
					$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

					$item_output = $args->before;
					$item_output .= '<a'. $attributes .'>';
					$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
					$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
					$item_output .= $args->after;

					$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				}

				function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
					
					if ( !$element )
						return;
					
					$id_field = $this->db_fields['id'];

					//display this element
					if ( is_array( $args[0] ) ) 
						$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
					else if ( is_object( $args[0] ) ) 
						$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
					$cb_args = array_merge( array(&$output, $element, $depth), $args);
					call_user_func_array(array(&$this, 'start_el'), $cb_args);

					$id = $element->$id_field;

					// descend only when the depth is right and there are childrens for this element
					if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

						foreach( $children_elements[ $id ] as $child ){

							if ( !isset($newlevel) ) {
								$newlevel = true;
								//start the child delimiter
								$cb_args = array_merge( array(&$output, $depth), $args);
								call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
							}
							$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
						}
							unset( $children_elements[ $id ] );
					}

					if ( isset($newlevel) && $newlevel ){
						//end the child delimiter
						$cb_args = array_merge( array(&$output, $depth), $args);
						call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
					}

					//end this element
					$cb_args = array_merge( array(&$output, $element, $depth), $args);
					call_user_func_array(array(&$this, 'end_el'), $cb_args);
					
				}
				
			}

		}

	endif;
	
/* End functions. */
	
?>
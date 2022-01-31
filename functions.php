<?php
/**
 * young-foundation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package young-foundation
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'young_foundation_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function young_foundation_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on young-foundation, use a find and replace
		 * to change 'young-foundation' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'young-foundation', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'young-foundation' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'young_foundation_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'young_foundation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function young_foundation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'young_foundation_content_width', 640 );
}
add_action( 'after_setup_theme', 'young_foundation_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function young_foundation_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'young-foundation' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'young-foundation' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Publications', 'young-foundation' ),
			'id'            => 'publications',
			'description'   => esc_html__( 'Add widgets here.', 'young-foundation' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Projects', 'young-foundation' ),
			'id'            => 'projects',
			'description'   => esc_html__( 'Add widgets here.', 'young-foundation' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'People', 'young-foundation' ),
			'id'            => 'people',
			'description'   => esc_html__( 'Add widgets here.', 'young-foundation' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Vacancies', 'young-foundation' ),
			'id'            => 'vacancies',
			'description'   => esc_html__( 'Add widgets here.', 'young-foundation' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog', 'young-foundation' ),
			'id'            => 'blog',
			'description'   => esc_html__( 'Add widgets here.', 'young-foundation' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'News', 'young-foundation' ),
			'id'            => 'news',
			'description'   => esc_html__( 'Add widgets here.', 'young-foundation' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Features', 'young-foundation' ),
			'id'            => 'features',
			'description'   => esc_html__( 'Add widgets here.', 'young-foundation' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Events', 'young-foundation' ),
			'id'            => 'events',
			'description'   => esc_html__( 'Add widgets here.', 'young-foundation' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Family', 'young-foundation' ),
			'id'            => 'family',
			'description'   => esc_html__( 'Add widgets here.', 'young-foundation' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'young-foundation' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Add widgets here.', 'young-foundation' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'young_foundation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function young_foundation_scripts() {
	wp_enqueue_style( 'young-foundation-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'young-foundation-style', 'rtl', 'replace' );

	wp_enqueue_style( 'icons', get_template_directory_uri() . '/css/icons.css' );
	wp_enqueue_style( 'yf', get_template_directory_uri() . '/css/yf.css' );

	//wp_enqueue_script( 'young-foundation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_deregister_script( 'jquery' );
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true);
	wp_enqueue_script( 'general', get_template_directory_uri() . '/js/general.js', array( 'jquery' ), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'young_foundation_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/** 
 * CUSTOM FUNCTIONS FOR YF 
 */

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

// add excerpts to pages
add_post_type_support( 'page', 'excerpt' );

// custom excerpt length
function custom_excerpt_length( $length ) {
   return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Add custom menus 
function custom_menu() {
  register_nav_menus(
    array(
      'sub-menu' => __( 'Sub menu' ),
      'prn-menu' => __( 'PRN menu' ),
      'legals-menu' => __( 'Legals menu' )
    )
  );
}
add_action( 'init', 'custom_menu' );


// Create custom taxonomies
add_action( 'init', 'create_role_nonhierarchical_taxonomy', 0 );
 
function create_role_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Roles', 'taxonomy general name' ),
    'singular_name' => _x( 'Role', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Roles' ),
    'popular_items' => __( 'Popular Roles' ),
    'all_items' => __( 'All Roles' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Role' ), 
    'update_item' => __( 'Update Role' ),
    'add_new_item' => __( 'Add New Role' ),
    'new_item_name' => __( 'New Role Name' ),
    'separate_items_with_commas' => __( 'Separate roles with commas' ),
    'add_or_remove_items' => __( 'Add or remove roles' ),
    'choose_from_most_used' => __( 'Choose from the most used roles' ),
    'menu_name' => __( 'Roles' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('roles','books',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'roles' ),
  ));
}


// Create custom post types
function create_posttype() {
 
    register_post_type( 'news',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'News' )
            ),
            'label'	=> ('news'),
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
            'taxonomies' => array('category'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'insights/news'),
            'show_in_rest' => true,
            'hierarchical' => true,
 
        )
    );
 
    register_post_type( 'features',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Features' ),
                'singular_name' => __( 'Feature' ),
                'edit_item' => __( 'Edit feature' ), 
			    'update_item' => __( 'Update feature' ),
			    'add_new_item' => __( 'Add new feature' ),
			    'view_item' => __( 'View feature' ),
            ),
            'label'	=> ('case study'),
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
            'taxonomies' => array('category'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'insights/features'),
            'show_in_rest' => true,
            'hierarchical' => true,
 
        )
    );
 
    register_post_type( 'impact-stories',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Impact stories' ),
                'singular_name' => __( 'Impact story' ),
                'edit_item' => __( 'Edit impact story' ), 
			    'update_item' => __( 'Update impact story' ),
			    'add_new_item' => __( 'Add new impact story' ),
			    'view_item' => __( 'View impact story' ),
            ),
            'label'	=> ('impact story'),
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
            'taxonomies' => array('category'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'our-work/impact-stories'),
            'show_in_rest' => true,
            'hierarchical' => true,
 
        )
    );
 
    register_post_type( 'publications',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Publications' ),
                'singular_name' => __( 'Publication' )
            ),
            'label'	=> ('publication'),
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
            'taxonomies' => array('category'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'our-work/publications'),
            'show_in_rest' => true,
            'hierarchical' => true,
 
        )
    );
 
    register_post_type( 'projects',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Projects' ),
                'singular_name' => __( 'Project' )
            ),
            'label'	=> ('project'),
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
            'taxonomies' => array('category'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'peer-research-network/projects'),
            'show_in_rest' => true,
            'hierarchical' => true,
 
        )
    );
 
    register_post_type( 'event',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' )
            ),
            'label'	=> ('event'),
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
            'taxonomies' => array('category'),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'hierarchical' => true,
 
        )
    );
 
    register_post_type( 'people',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'People' ),
                'singular_name' => __( 'Person' )
            ),
            'label'	=> ('People'),
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
            'taxonomies' => array('roles'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'about-us/who-we-are/people'),
            'show_in_rest' => true,
            'hierarchical' => true,
 
        )
    );
 
    register_post_type( 'vacancies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Vacancies' ),
                'singular_name' => __( 'Vacancy' )
            ),
            'label'	=> ('news'),
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'vacancies'),
            'show_in_rest' => true,
            'hierarchical' => true,
 
        )
    );

}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

// Include custom post types on archive pages
function add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'nav_menu_item', 'case-studies', 'publications', 'news'
        ));
      return $query;
    }
}
add_filter( 'pre_get_posts', 'add_custom_types' );


/* Events templates */
function my_em_custom_formats( $array ){
	$my_formats = array('dbem_single_event_format','dbem_event_excerpt_format','dbem_event_list_item_format'); //the format you want to override, corresponding to file above.
	return $array + $my_formats; //return the default array and your formats.
}
add_filter('em_formats_filter', 'my_em_custom_formats', 1, 1);

/* Mirror event dates for use in search and filter pro */
function shadow_event_dates( $post_id, $post ) {
    
    // Only set for post_type = event! , make sure to change it if it is different custom post type
    if ( 'event' !== $post->post_type ) {
        return;
    }

    // here we are getting values from date fields and converting the date format into YYYYMMDD
    $event_start_date = date("Ymd", strtotime(get_post_meta( $post_id, '_event_start_date', true )));
    $event_end_date = date("Ymd", strtotime(get_post_meta( $post_id, '_event_end_date', true )));

    // here we are creating/updating the shadow field for events date fields.
    // use _shadow_event_start_date & _shadow_event_end_date for filtering inside the S&F Pro
    // use date format as YYYYMMDD(ACF) inside the S&F Pro settings
    update_post_meta( $post_id, '_shadow_event_start_date', $event_start_date);
    update_post_meta( $post_id, '_shadow_event_end_date', $event_end_date);

    
}
add_action( 'save_post', 'shadow_event_dates',10,2 );


/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . home_url( '/' ) . '" >
	    <div class="fields">
		    <label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
		    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" />
		    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
	    </div>
    	<a href="/advanced-search/" class="advanced">Advanced search</a>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );


/* Hide admin bar for non editors/admins */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	$user = wp_get_current_user();
	$allowed_roles = array( 'editor', 'administrator', 'author' );
	if ( ! array_intersect( $allowed_roles, $user->roles ) ) {
	   show_admin_bar(false);
	}
}

// Redirect to homepage after logging out 
add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
function logout_without_confirm($action, $result)
{
    /**
     * Allow logout without confirmation
     */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : '/peer-research-network/';
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}


/*
 * Register Helper fields
 *
 */

// We have to put everything in a function called on init, so we are sure Register Helper is loaded.
function my_pmprorh_init() {
	// Don't break if Register Helper is not loaded.
	if ( ! function_exists( 'pmprorh_add_registration_field' ) ) {
		return false;
	}


	$field = new PMProRH_Field(
		"intro",            
        "html",                    
        array(
            "html" => "<p>To add you to our network, we also like to ask a few questions about you. We do this because some research opportunities are only open to certain groups of people, or to people in certain parts of the country. We also know that some people are particularly keen to do research on issues of which they have very direct lived experience. You do not have to answer these questions but it will help us make sure we send you relevant information. </p>" 
        )
	);
	pmprorh_add_registration_field('checkout_boxes',$field);

	pmprorh_add_checkout_box("personal", "About you");
	pmprorh_add_checkout_box("experience", "Peer research experience");
	pmprorh_add_checkout_box("comms", "Communication preferences");

	// Define the fields.
	$fields = array();

	$fields[] = new PMProRH_Field(
		'first_name',
		'text',
		array(
			'label'		=> 'First name',
			'profile'	=> 'true',
			'levels'	=> array(1,2),
		)
	);
	$fields[] = new PMProRH_Field(
		'last_name',
		'text',
		array(
			'label'		=> 'Last name',
			'profile'	=> 'true',
			'levels'	=> array(1,2),
		)
	);
	$fields[] = new PMProRH_Field(
		'organisation',
		'text',
		array(
			'label'		=> 'Organisation',
			'profile'	=> 'true',
			'levels'	=> 2,
		)
	);
	$fields[] = new PMProRH_Field(
		'dob',
		'text',
		array(
			'label'		=> 'Date of birth',
			'hint'		=> 'dd/mm/yyyy',
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
		'country',
		'select',
		array(
			'label'		=> 'Country',
			'options' => array(	
				''		=> '',	
				'England'	=> 'England',
				'Wales'	=> 'Wales',
				'Scotland'	=> 'Scotland',
				'NI'	=> 'NI',
				'outside'	=> 'Outside the UK',
			),
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
		'eng_county',
		'select',
		array(
			"depends"=>array(array('id' => "country", 'value' => "England")),
			'label'		=> 'County',
			'options' => array(	
				''		=> '',	
				'Bournemouth'	=> 'Bournemouth',
				'Bristol, Bath and NE Somerset'	=> 'Bristol, Bath and NE Somerset',
				'Cheshire'	=> 'Cheshire',
				'Christchurch'	=> 'Christchurch',
				'Cleveland'	=> 'Cleveland',
				'Cornwall'	=> 'Cornwall',
				'County Durham'	=> 'County Durham',
				'Cumbria'	=> 'Cumbria',
				'Darlington'	=> 'Darlington',
				'Derbyshire'	=> 'Derbyshire',
				'Devon'	=> 'Devon',
				'Dorset'	=> 'Dorset',
				'East Riding of Yorkshire'	=> 'East Riding of Yorkshire',
				'Glourcestershire'	=> 'Glourcestershire',
				'Greater Manchester'	=> 'Greater Manchester',
				'Herefordshire'	=> 'Herefordshire',
				'Hertfordshire'	=> 'Hertfordshire',
				'Isles of Scilly'	=> 'Isles of Scilly',
				'Lancashire'	=> 'Lancashire',
				'Leicestershire'	=> 'Leicestershire',
				'Lincolnshire (not N and NE Lincs)'	=> 'Lincolnshire (not N and NE Lincs)',
				'Merseyside'	=> 'Merseyside',
				'Middlesborough'	=> 'Middlesborough',
				'Northamptonshire'	=> 'Northamptonshire',
				'North and North East Lincolnshire'	=> 'North and North East Lincolnshire',
				'North Somerset'	=> 'North Somerset',
				'Northumberland'	=> 'Northumberland',
				'North Yorkshire'	=> 'North Yorkshire',
				'Nottinghamshire'	=> 'Nottinghamshire',
				'Plymouth'	=> 'Plymouth',
				'Poole'	=> 'Poole',
				'Rutland'	=> 'Rutland',
				'Shropshire'	=> 'Shropshire',
				'Somerset'	=> 'Somerset',
				'South Gloucestershire'	=> 'South Gloucestershire',
				'South Yorkshire'	=> 'South Yorkshire',
				'Staffordshire'	=> 'Staffordshire',
				'Stockton on Tees'	=> 'Stockton on Tees',
				'Swindon'	=> 'Swindon',
				'Torbay'	=> 'Torbay',
				'Tyne and Wear'	=> 'Tyne and Wear',
				'Warwickshire'	=> 'Warwickshire',
				'West Midlands'	=> 'West Midlands',
				'West Yorkshire'	=> 'West Yorkshire',
				'Wiltshire'	=> 'Wiltshire',
				'Worcestershire'	=> 'Worcestershire',
			),
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
		'wal_county',
		'select',
		array(
			"depends"=>array(array('id' => "country", 'value' => "Wales")),
			'label'		=> 'County',
			'options' => array(	
				''		=> '',	
				'Blaenau Gwent'	=> 'Blaenau Gwent',
				'Bridgend'	=> 'Bridgend',
				'Caerphilly'	=> 'Caerphilly',
				'Cardiff'	=> 'Cardiff',
				'Carmarthenshire'	=> 'Carmarthenshire',
				'Ceredigion'	=> 'Ceredigion',
				'Conwy'	=> 'Conwy',
				'Denbighshire'	=> 'Denbighshire',
				'Flintshire'	=> 'Flintshire',
				'Gwynedd'	=> 'Gwynedd',
				'Isle of Anglesey'	=> 'Isle of Anglesey',
				'Merthyr Tydfil'	=> 'Merthyr Tydfil',
				'Monmouthshire'	=> 'Monmouthshire',
				'Neath Port Talbot'	=> 'Neath Port Talbot',
				'Newport'	=> 'Newport',
				'Pembrokeshire'	=> 'Pembrokeshire',
				'Powys'	=> 'Powys',
				'Rhondda Cynon Taf'	=> 'Rhondda Cynon Taf',
				'Swansea'	=> 'Swansea',
				'Torfaen'	=> 'Torfaen',
				'Vale of Glamorgan'	=> 'Vale of Glamorgan',
				'Wrexham'	=> 'Wrexham',
			),
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
		'scot_county',
		'select',
		array(
			"depends"=>array(array('id' => "country", 'value' => "Scotland")),
			'label'		=> 'County',
			'options' => array(	
				''		=> '',	
				'Aberdeen'	=> 'Aberdeen',
				'Aberdeenshire'	=> 'Aberdeenshire',
				'Angus'	=> 'Angus',
				'Argyll and Bute'	=> 'Argyll and Bute',
				'Clackmannanshire'	=> 'Clackmannanshire',
				'Dumfries and Galloway'	=> 'Dumfries and Galloway',
				'Dundee'	=> 'Dundee',
				'Edinburgh'	=> 'Edinburgh',
				'East Ayrshire'	=> 'East Ayrshire',
				'East Dunbartonshire'	=> 'East Dunbartonshire',
				'East Lothian'	=> 'East Lothian',
				'East Renfrewshire'	=> 'East Renfrewshire',
				'Falkirk'	=> 'Falkirk',
				'Fife'	=> 'Fife',
				'Glasgow'	=> 'Glasgow',
				'Highland'	=> 'Highland',
				'Inverclyde'	=> 'Inverclyde',
				'Midlothian'	=> 'Midlothian',
				'Moray'	=> 'Moray',
				'Na h-Eileanan Siar'	=> 'Na h-Eileanan Siar',
				'North Ayrshire'	=> 'North Ayrshire',
				'North Lanarkshire'	=> 'North Lanarkshire',
				'Orkney'	=> 'Orkney',
				'Perth and Kinross'	=> 'Perth and Kinross',
				'Renfrewshire'	=> 'Renfrewshire',
				'South Ayrshire'	=> 'South Ayrshire',
				'Stirling'	=> 'Stirling',
				'Scottish Borders'	=> 'Scottish Borders',
				'Shetland'	=> 'Shetland',
				'South Lanarkshire'	=> 'South Lanarkshire',
				'West Dunbartonshire'	=> 'West Dunbartonshire',
				'West Lothian'	=> 'West Lothian',
			),
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
		'ni_county',
		'select',
		array(
			"depends"=>array(array('id' => "country", 'value' => "NI")),
			'label'		=> 'County',
			'options' => array(	
				''		=> '',	
				'Antrim and Newtownabbey'	=> 'Antrim and Newtownabbey',
				'Ards and North Down'	=> 'Ards and North Down',
				'Armagh City, Banbridge and Craigavon'	=> 'Armagh City, Banbridge and Craigavon',
				'Belfast'	=> 'Belfast',
				'Causeway Coast and Glens'	=> 'Causeway Coast and Glens',
				'Derry and Strabane'	=> 'Derry and Strabane',
				'Fermanagh and Omagh'	=> 'Fermanagh and Omagh',
				'Lisburn and Castlereagh'	=> 'Lisburn and Castlereagh',
				'Mid and East Antrim'	=> 'Mid and East Antrim',
				'Mid Ulster'	=> 'Mid Ulster',
				'Newry, Mourne and Down'	=> 'Newry, Mourne and Down',
			),
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
		'country_other',
		'text',
		array(
			"depends"=>array(array('id' => "country", 'value' => "outside")),
			'label'		=> 'Country (other)',
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
		'postcode',
		'text',
		array(
			'label'		=> 'Postcode',
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
        'lang',             
        'radio',                    
        array(
			'label'		=> 'Do you speak a first language other than English?',
            'options' => array(      
                'yes' => 'Yes',
                'no' => 'No',
            ),
			'profile'	=> 'true',
			'levels'	=> 1,  
        )
    );
	$fields[] = new PMProRH_Field(
		'langs',
		'text',
		array(
			"depends"=>array(array('id' => "lang", 'value' => "yes")),
			'label'		=> 'If yes, please write in',
			'profile'	=> 'true',
			'required'	=> false,
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
		'ethnicity',
		'text',
		array(
			'label'		=> 'How do you describe your ethnicity?',
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
		'gender',
		'select',
		array(
			'label'		=> 'Gender',
			'options' => array(	
				''		=> '',	
				'Male'	=> 'Male',	
				'Female'	=> 'Female',	
				'Non-binary'	=> 'Non-binary',	
				'In another way'	=> 'In another way',	
				'Prefer not to say'	=> 'Prefer not to say',
			),
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
        'conditions',             
        'checkbox_grouped',                    
        array(
			'label'		=> 'Do you have any of the following?',
            'options' => array(      
                'long-term-condition' => 'Long-term physical health condition',
                'sensory-impairment' => 'Sensory impairment (e.g. hearing or sight loss)',
                'mental-health-condition' => 'Mental health condition',
            ), 
			'profile'	=> 'true',
			'levels'	=> 1, 
        )
    );
	$fields[] = new PMProRH_Field(
        'lived_exp',             
        'checkbox_grouped',                    
        array(
			'label'		=> 'Do you have lived experience of any of the following?',
            'options' => array(      
                'carer' => 'Acting as a carer',
                'care-system' => 'The Care system',
                'homelessness' => 'Homelessness',
                'criminal-justice-system' => 'The criminal justice system',
                'refugee-asylum' => 'Being a refugee or asylum seeker',
                'traveller-communities' => 'Being part of the Gypsy, Roma or Traveller communities',
            ),  
			'profile'	=> 'true',
			'levels'	=> 1,  
        )
    );

	// Add the fields into a new checkout_boxes are of the checkout page.
	foreach ( $fields as $field ) {
		pmprorh_add_registration_field(
			'personal',				// location on checkout page
			$field							// PMProRH_Field object
		);
	}

	// Define the fields.
	$fields = array();

	$fields[] = new PMProRH_Field(
        'experience',             
        'radio',                    
        array(
			'label'		=> 'Have you previously worked as a peer researcher?',
            'options' => array(      
                'yes' => 'Yes',
                'no' => 'No',
            ),   
			'profile'	=> 'true',
			'levels'	=> 1, 
        )
    );
	$fields[] = new PMProRH_Field(
		'exp_details',
		'text',
		array(
			"depends"=>array(array('id' => "experience", 'value' => "yes")),
			'label'		=> 'If yes: For which organisations did you work? By this we mean the organisation which employed and/or trained you.',
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
		'why', 
		'textarea', 
		array(
			'label'=>'Why do you want to join the peer research network? If you are interested in researching specific topics or issues, please also tell us about that here.',
			'profile'=>'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
		"quals_intro",            
        "html",                    
        array(
            "html" => "<p>There are no qualifications required to become a peer researcher and it is important to us to make sure that we reflect the diversity of our communities. We ask this question for monitoring purposes. </p>" ,
			'profile'	=> 'true',
			'levels'	=> 1,
        )
	);
	$fields[] = new PMProRH_Field(
		'qual_level',
		'select',
		array(
			'label'		=> 'What is your highest level of education?',
			'options' => array(	
				''		=> '',	
				'postgrad'	=> 'Post-graduate (e.g. Masters or PhD)',
				'undergard'	=> 'Bachelors degree',
				'postsec'	=> 'Post-secondary (e.g. HND, HNC)',
				'postsecondary'	=> 'Post-secondary (e.g. HND, HNC)',
				'secondary'	=> 'Secondary education',
				'other'	=> 'Other',
			),
			'profile'	=> 'true',
			'levels'	=> 1,
		)
	);
	$fields[] = new PMProRH_Field(
        'lived_exp',             
        'checkbox_grouped',                    
        array(
			'label'		=> 'In what capacity are you involved with peer research?',
            'options' => array(      
                'training-support' => 'Training and supporting peer researchers',   
                'design-delivery' => 'The design and delivery of peer research projects',   
                'comissioning' => 'Commissioning peer research',   
                'user' => 'User of peer research',   
                'other' => 'Other',
            ),  
			'profile'	=> 'true',
			'levels'	=> 2,  
        )
    );
	$fields[] = new PMProRH_Field(
		'qual_level',
		'select',
		array(
			'label'		=> 'Which sector do you work in?',
			'options' => array(	
				''		=> '',	
				'academia '	=> 'Academia ',
				'central-gov'	=> 'Central government',
				'local-gov'	=> 'Local government',
				'health'	=> 'NHS/health services',
				'other-public-sector'	=> 'Other public sector',
				'voluntary-sector'	=> 'Community and voluntary sector',
				'other'	=> 'Other',
			),
			'profile'	=> 'true',
			'levels'	=> 2,
		)
	);
	$fields[] = new PMProRH_Field(
        'lived_exp',             
        'checkbox_grouped',                    
        array(
			'label'		=> 'Please select the policy/thematic areas of most interest to you',
            'options' => array(      
                'communities-society' => 'Communities and society',
                'criminal-justice' => 'Criminal justice',
                'education-employment' => 'Education and employment',
                'evironment-climate' => 'Environment and climate',
                'equality-diversity-inclusion' => 'Equality, diversity and inclusion',
                'health-service' => 'Health services',
                'mental-health' => 'Mental health',
                'housing-regeneration' => 'Housing and regeneration',
                'local-economies' => 'Local economies',
                'public-services' => 'Public services',
                'youth-work' => 'Youth work',
                'other' => 'Other',
            ),  
			'profile'	=> 'true',
			'levels'	=> 2,  
        )
    );

	// Add the fields into a new checkout_boxes are of the checkout page.
	foreach ( $fields as $field ) {
		pmprorh_add_registration_field(
			'experience',				// location on checkout page
			$field							// PMProRH_Field object
		);
	}

	// Define the fields.
	$fields = array();

	$fields[] = new PMProRH_Field(
        'comms_pref',             
        'checkbox_grouped',                    
        array(
			'label'		=> 'Finally, please confirm your communication preferences.',
            'options' => array(      
                'newsletters' => 'I wish to receive newsletters and updates from the peer research network',
                'training' => 'I wish to be informed about training opportunities',
                'prwork' => 'I wish to be considered for work as a peer researcher ',
            ),
			'profile'	=> 'true',   
			'levels'	=> array(1,2),  
        )
    );
	$fields[] = new PMProRH_Field(
		'comms_req', 
		'text', 
		array(
			'label'=>'If you have any other communication needs or preferences, please tell us about them here.',
			'profile'=>'true',
			'levels'	=> array(1,2),
		)
	);
	$fields[] = new PMProRH_Field(
		'how_hear',
		'select',
		array(
			'label'		=> 'And how did you hear about the peer research network?',
			'options' => array(	
				''		=> '',	
				'Young Foundation social media'	=> 'Young Foundation social media',
				'Young Foundation newsletter'	=> 'Young Foundation newsletter',
				'Institute for Community Studies social media'	=> 'Institute for Community Studies social media',
				'Institute for Community Studies newsletter'	=> 'Institute for Community Studies newsletter',
				'From a member of Young Foundation or ICS staff'	=> 'From a member of Young Foundation or ICS staff',
				'Referral from a colleague or friend'	=> 'Referral from a colleague or friend',
				'Online search'	=> 'Online search',
				'Other'	=> 'Other',
			),
			'profile'	=> 'true',
			'levels'	=> array(1,2),
		)
	);
	$fields[] = new PMProRH_Field(
		'how_other',
		'text',
		array(
			"depends"=>array(array('id' => "how_hear", 'value' => "Other")),
			'label'		=> 'Other - please tell us more',
			'profile'	=> 'true',
			'levels'	=> array(1,2),
		)
	);
	$fields[] = new PMProRH_Field(
		"gdpr",            
        "html",                    
        array(
            "html" => "<p>By submitting this form you are registering to join the Peer Research Network and agree that we can contact in relation to its activities. We will not use your data for any other purpose. You can change your details or cancel or your membership at any time from your membership home page. Our full privacy notice can be found <a href='/privacy-notice/'>here</p>",
			'profile'	=> 'true',
			'levels'	=> array(1,2),
        )
	);

	// Add the fields into a new checkout_boxes are of the checkout page.
	foreach ( $fields as $field ) {
		pmprorh_add_registration_field(
			'comms',				// location on checkout page
			$field							// PMProRH_Field object
		);
	}

	// That's it. See the PMPro Register Helper readme for more information and examples.
}
add_action( 'init', 'my_pmprorh_init' );


function my_remove_approvals_confirmation() { remove_filter( 'pmpro_confirmation_message', array( 'PMPro_Approvals', 'pmpro_confirmation_message' ) ); } add_action( 'init', 'my_remove_approvals_confirmation' );


/*
Add bcc for PMPro admin emails
*/
function my_pmpro_email_headers_admin_emails($headers, $email)
{		
	//bcc emails already going to admin_email
        if(strpos($email->template, "_admin") !== false)
	{
		//add bcc
		$headers[] = "Bcc:" . "victoria.boelman@youngfoundation.org";		
	}
 
	return $headers;
}
add_filter("pmpro_email_headers", "my_pmpro_email_headers_admin_emails", 10, 2);


//Let Contributor Role to Upload Media
if ( current_user_can('contributor') && !current_user_can('upload_files') )
    add_action('admin_init', 'allow_contributor_uploads');
function allow_contributor_uploads() {
    $contributor = get_role('contributor');
    $contributor->add_cap('upload_files');
}



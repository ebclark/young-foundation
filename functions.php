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
			'name'          => esc_html__( 'Resources', 'young-foundation' ),
			'id'            => 'resources',
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


// Add custom menus 
function custom_menu() {
  register_nav_menus(
    array(
      'sub-menu' => __( 'Sub menu' ),
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
 
    register_post_type( 'resources',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Resources' ),
                'singular_name' => __( 'Resource' )
            ),
            'label'	=> ('resource'),
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
            'taxonomies' => array('category'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'peer-research-network/resources'),
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
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : '/';
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}


// Change comment code
function young_foundation_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
        <h4 class="comment-author vcard"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] ); 
            } 
            printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
        </h4><?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
        } ?>
        <p class="date comment-meta commentmetadata">
            <?php
                /* translators: 1: date, 2: time */
                printf( 
                    __('%1$s at %2$s'), 
                    get_comment_date(),  
                    get_comment_time() 
                ); ?>
            <?php 
            edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
        </p>
 
        <div class="comment-text"><?php comment_text(); ?></div>
 
        <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}






<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package young-foundation
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
	$heading = get_field('heading_type');
	$colour = get_field('colour');
	$logo = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="logo"><img src="' . get_template_directory_uri() . '/images/yf-logo.svg" alt="The Young Foundation" /></a>';

	global $post;
    /* Get an array of Ancestors and Parents if they exist */
    $parents = get_post_ancestors( $post->ID );
    /* Get the top Level page->ID count base 1, array base 0 so -1 */
    $id = ($parents) ? $parents[count($parents)-1]: $post->ID;
    /* Get the parent and set the $class with the page slug (post_name) */
    $parent = get_post( $id );
    $page = $parent->post_name;

    if ( $page == 'peer-research-network' || is_post_type_archive( 'resources' ) || ( get_post_type( get_the_ID() ) == 'resources' ) ) : 
    	$logo = '<a href="/peer-research-network/" rel="home" class="logo"><img src="' . get_template_directory_uri() . '/images/pr-logo.svg" alt="The Young Foundation" /></a>';
    endif;
?>

<div id="page" class="site <?php if ( $heading == 'solid' && ( is_single() || is_page() ) ) : echo 'solid '; elseif ( $heading == 'plain' || is_archive() || is_home() ) : echo 'plain '; endif; if ( $colour ) : echo $colour; else : echo 'red'; endif; ?>">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'young-foundation' ); ?></a>

	<header id="masthead">
		<div class="container">
			<?php echo $logo; ?>
			<div class="menu-controls">
				<button class="toggle-search" aria-controls="search" aria-expanded="false"><span class="screen-reader-text"><?php esc_html_e( 'Search', 'young-foundation' ); ?></span><span class="icon-search"></span></button>
				<button class="toggle-menu" aria-controls="primary-menu" aria-expanded="false"><span class="screen-reader-text"><?php esc_html_e( 'Menu', 'young-foundation' ); ?></span><span class="icon-menu"></span></button>
			</div>
			<nav id="site-navigation">
				<div class="menu-search-container">
					<?php
					if ( $page == 'peer-research-network' || is_post_type_archive( 'resources' ) || ( get_post_type( get_the_ID() ) == 'resources' ) ) : 
						wp_nav_menu(
							array(
								'theme_location' => 'prn-menu',
								'menu_id'        => 'prn-menu',
							)
						);
					else :
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
					endif;
					?>
					<button class="toggle-search" aria-controls="search" aria-expanded="false"><span class="screen-reader-text"><?php esc_html_e( 'Search', 'young-foundation' ); ?></span><span class="icon-search"></span></button>
				</div>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'sub-menu',
						'menu_id'        => 'sub-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
			<?php get_search_form(); ?>
		</div>

	</header><!-- #masthead -->

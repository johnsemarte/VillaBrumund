<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!-- Henter inn script som brukes i menyen -->
<script type="text/javascript" src="<?php echo bloginfo(template_url); ?>/js/jquery-1.2.3.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo(template_url); ?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo(template_url); ?>/js/jquery.lavalamp.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#topmenu").lavaLamp({
            fx: "backout",
            speed: 350,
            click: function(event, menuItem) {
                 return false;
            }
        });
    });
    </script>
    <link rel="stylesheet" href="<?php echo bloginfo(template_url); ?>/css/lavalamp_test.css" media="screen">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">
<?php do_action( 'before' ); ?>
	<header>
		<div id="logo">
		<hgroup>
			<h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>
		</div>

		<nav>
			<!-- MENY -->
			<ul class="menu" id="topmenu">
			<?php 
  			$pages = get_pages();
 			foreach ( $pages as $menu_title ) {
				$menu = $menu_title->post_parent;
				$link = get_permalink($menu_title->ID);
				if ($menu == 0 ) {
				$menu = $menu_title->post_title;
				$parent = get_the_title($post->post_parent);
				if ( $menu == get_the_title() || $menu == $parent) {
				echo "<li class=\"current\"><a href=\"$link\" onClick=\"parent.location='$link'\">".$menu."</a></li>\n";
				}
				else { echo "<li><a href=\"$link\" onClick=\"parent.location='$link'\">".$menu."</a></li>\n"; }
				}
  			}
 			?>
 				<!-- SØKE SKJEMA -->
 				<span class="sok">
    					<?php get_search_form(); ?>
   				 </span>

 			</ul>
		</nav>

	</header>

	<div id="main">
		
		
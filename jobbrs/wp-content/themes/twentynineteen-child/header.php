<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'twentynineteen'); ?></a>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<div class="container">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php $params = array(
					'theme_location' => 'menu-2',
					'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
					'container_class' => 'collapse navbar-collapse',
					'container_id' => 'navbar1',
					'menu_class' => 'navbar-nav'
				);
				wp_nav_menu($params);
				?>

			</div>
		</nav>
		<div class="container-fluid bg-overlay">

			<div class="row text-center">

				<div class="hero-text-fooldal">
					<h4>Test Blog</h4>
					<span>News on Modern Video Streaming</span>

				</div>
			</div>
		</div>
		<div id="content" class="site-content">
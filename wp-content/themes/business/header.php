<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<section class="welcome-section">

		<header id="masthead" class="site-header" role="banner">
			<div class="container d-flex justify-content-between align-items-center">
				<div class="site-logo d-flex align-items-center">
					<?php the_custom_logo( array ('class'=> 'img-fluid')); ?>
					<i class="fa fa-phone fa-2x" aria-hidden="true"></i><p class="phone-num"><?php echo get_theme_mod('phone_header'); ?></p>
				</div>
				<button id="button-menu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<nav class="nav-wrapp">
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'd-flex main-nav', 'container' => 'ul'  ) ); ?>
				</nav>
			</div>
		</header>

		<div class="slider-main container">
			<?php
			$args = array(
				'post_type' => 'Top slider'
			);
			$the_query = new WP_Query($args);
			if ($the_query->have_posts()) :?>
				<?php while ($the_query->have_posts()) : ?>
					<?php $the_query->the_post(); ?>
					<div class="slider-item">
						<h2><?php the_title(); ?></h2>
						<span><?php the_content(); ?></span>
						<div class="p-style"><?php the_excerpt(); ?></div>
						<a href="<?php the_permalink() ?>" class="btn-slider">Read More</a>
					</div>
				<?php endwhile; ?>
			<?php else : //no posts ?>
			<?php endif; wp_reset_postdata(); ?>
		</div>


	</section>


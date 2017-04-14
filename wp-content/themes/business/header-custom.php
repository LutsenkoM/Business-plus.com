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
<section class="header-custom">

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



</section>


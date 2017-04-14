<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business
 */

?>
	<footer id="colophon" class="site-footer d-flex" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="footer-logo col-sm-12 col-md-4 d-flex flex-column justify-content-center">
					<?php the_custom_logo() ?>
					<p><?php echo get_theme_mod('copyright')?></p>
					<?php
					$social_links_facebook = the_field('social_links_facebook');
					$social_links_twitter = get_theme_mod('social_links_twitter');
					$social_links_google = get_theme_mod('social_links_google');
					$social_links_linkedin = get_theme_mod('social_links_linkedin');

					if( $social_links_facebook || $social_links_twitter || $social_links_linkedin || $social_links_google  ){ ?>
						<ul class="social-icons d-flex">
							<?php if($social_links_facebook){ ?>
								<li><a target="_blank" href="<?php echo esc_url($social_links_facebook) ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<?php } ?>
							<?php if($social_links_google){ ?>
								<li><a target="_blank" href="<?php echo esc_url($social_links_google) ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<?php } ?>
							<?php if($social_links_twitter){ ?>
								<li><a target="_blank" href="<?php echo esc_url($social_links_twitter) ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<?php } ?>
							<?php if($social_links_linkedin){ ?>
								<li><a target="_blank" href="<?php echo esc_url($social_links_linkedin) ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
				<div class="footer-nav col-sm-12 col-md-2">
					<p class="foot-title">Navigation</p>
					<?php wp_nav_menu( array('theme_location' => 'menu-2', 'menu_id' => 'header-menu', 'menu_class' => 'footer-nav', 'container' => 'ul') ); ?>
				</div>
				<div class="footer-form offset-md-1 col-sm-12 col-md-5">
					<p class="foot-title">Quick contact us</p>
					<?php echo do_shortcode('[contact-form-7 id="158" title="My contacnt form"]')?>
				</div>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>

</body>
</html>

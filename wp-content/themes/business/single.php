<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package business
 */

get_header('custom'); ?>

	<div id="primary" class="content-area blog-page">
		<main id="main" class="site-main container" role="main">
			<h2 class="title"><?php echo get_theme_mod('blog_title'); ?></h2>
			<p class="subtitle"><?php echo get_theme_mod('blog_subtitle'); ?></p>

		<?php
		while ( have_posts() ) : the_post(); ?>

			<div class="blog-item d-flex">
				<div class="avatar-author"><?php echo get_avatar('', '', '', '', array('class'=>'img-fluid'));?></div>
				<div>
					<h3><?php the_title(); ?></h3>
					<p>Posted dy: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a>, <!--вывод автора в ссылке -->
						<?php the_time('F j, Y'); ?></p>
					<!--                        Вывод категорий-->
					<p>Posted in: <?php
						$categories = get_the_category();
						$separator = ", ";
						$output = '';
						if ($categories) {
							foreach ($categories as $category) {
								$output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' .$separator;
							}

							echo trim($output, $separator) ;
						}
						?></p>


					<?php the_post_thumbnail('full',array('class'=>'img-fluid margin-bottom')); ?>
					<article><?php the_excerpt(); ?></article>
					<article><?php the_content(); ?></article>
					<div class="info-author d-flex">
						<div class="ava-author"><?php echo get_avatar('', '', '', '', array('class'=>'img-fluid'));?></div>
						<div class="info-author-title">
							<h4><?php the_author(); ?></h4>
							<p><?php  echo get_the_author_meta( 'description'); ?></p>
						</div>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>



<?php
get_footer();

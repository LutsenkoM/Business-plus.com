<?php
get_header('custom'); ?>
	<div class="container blog-page">
		<?php
		if ( have_posts() ) :
			?>

			<h2><?php
				if (is_category()) {
					single_cat_title();
				} elseif (is_tag()) {
					single_tag_title();
				} elseif (is_author()) {
					the_post();
					echo 'Author Archive:' . get_the_author();
					rewind_posts();
				} elseif (is_day()) {
					echo 'Daily Archive:' .get_the_date();
				} elseif (is_month()) {
					echo 'Monthly Archive:' .get_the_date('F Y');
				} else {
					echo 'Archives:';
				}
				?>
			</h2>

			<?php
			/* Start the Loop */
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
						<!--                        Вывод категорий конец-->
						<?php the_post_thumbnail('full',array('class'=>'img-fl"uid margin-bottom')); ?>
						<article><?php the_excerpt(); ?></article>
						<a href="<?php the_permalink(); ?>" class="link-style float-right">Read more</a>
					</div>
				</div>

			<?php endwhile;
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		<!--            PAGINATION-->
		<div class="pag-wrap col-sm-12 center-xs d-flex justify-content-center">
			<?php
			global $wp_query;

			$big = 999999999; // need an unlikely integer

			echo paginate_links(array(
				'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format' => '?paged=%#%',
				'total' => $wp_query->max_num_pages,
				'prev_text' => '',
				'next_text' => ''
			));
			?>
		</div>
		<!--            PAGINATION END-->
	</div>
<?php
get_footer();
<?php
/* Template name: Home page*/

get_header(); ?>
<section class="about">
    <?php
    $business_page = '';
    $business_page_array = get_pages();
    if(is_array($business_page_array)){
        $business_page = $business_page_array[0]->ID;
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="about-left col-sm-12 col-md-5">
                <h2 class="h2"><?php echo get_theme_mod ('about_title'); ?></h2>
                <p class="p"><?php echo get_theme_mod ('about_subtitle'); ?></p>
            </div>
            <div class="about-right col-sm-12 col-md-7">
                <article><?php echo get_theme_mod ('about_article'); ?></article>
                <a class="link-style" href="<?php echo get_permalink(get_theme_mod('about_page', $business_page)) ?>">Read More</a>
            </div>
        </div>
    </div>
</section>
<section class="service">
    <div class="container">
        <h2 class="h2"><?php echo get_theme_mod ('service_title'); ?></h2>
        <p class="p"><?php echo get_theme_mod ('service_subtitle'); ?></p>
        <ul class="serrvice-posts d-flex flex-wrap">
            <?php
            $args = array(
                'post_type' => 'service',
                'posts_per_page' => 100
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>
                    <li class="service-post col-md-6 d-flex">
                        <div class="service-icon"><?php the_post_thumbnail('full') ?></div>
                        <div class="service-descrip">
                            <h2><?php the_title(); ?></h2>
                            <article><?php the_content(); ?></article>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php else : //no posts ?>
            <?php endif; wp_reset_postdata(); ?>
        </ul>
        <a class="link-style" href="<?php echo get_permalink(get_theme_mod('service_page', $business_page)) ?>">View more</a>
    </div>
</section>
<section class="clients">
    <div class="container">
        <h2 class="h2"><?php echo get_theme_mod ('clients_title'); ?></h2>
        <p class="p"><?php echo get_theme_mod ('clients_subtitle'); ?></p>
        <ul class="slider-clients">
            <?php
            $args = array(
                'post_type' => 'clients',
                'posts_per_page' => 100
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>
                    <li class="client-post col-xs-4 d-flex flex-column justify-content-between">
                        <article><?php the_content(); ?></article>
                        <div class="client-descrip d-flex">
                            <div class="client-icon"><?php the_post_thumbnail('full') ?></div>
                            <div class="client-name">
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_excerpt() ?></p>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php else : //no posts ?>
            <?php endif; wp_reset_postdata(); ?>
        </ul>
    </div>
</section>
<section class="partners">
    <div class="container">
        <h2 class="h2"><?php echo get_theme_mod ('partners_title'); ?></h2>
        <p class="p"><?php echo get_theme_mod ('partners_subtitle'); ?></p>
<!--        Test to load image-->
        <?php
        $image = get_theme_mod('partner_image');
        ?>
        <img alt="" src="<?php echo $image; ?>">

<!--        --><?php //var_dump($image); ?>
<!--        Test to load image-->
        <ul class="slider-partners">
            <?php
            $args = array(
                'post_type' => 'partners',
                'posts_per_page' => 100
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>
                    <li class="partner-post">
                        <a class="partner-icon" target="_blank" href="<?php echo (get_post_meta($post->ID, 'partner_link', true)); ?>"><?php the_post_thumbnail('full') ?></a>
<!--                        --><?php //the_field('link'); ?><!-- -->
                    </li>
                <?php endwhile; ?>
            <?php else : //no posts ?>
            <?php endif; wp_reset_postdata(); ?>
        </ul>
    </div>
</section>
<?php
get_footer();

<?php
/**
 * business functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package business
 */

if ( ! function_exists( 'business_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function business_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on business, use a find and replace
	 * to change 'business' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'business', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'business' ),
	) );

    register_nav_menus( array(
        'menu-2' => esc_html__( 'Footer', 'business' ),
    ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'business_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    //Load logo
    add_theme_support( 'custom-logo' );
    //Load logo end

}
endif;
add_action( 'after_setup_theme', 'business_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_content_width', 640 );
}
add_action( 'after_setup_theme', 'business_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'business' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'business' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'business_widgets_init' );



// Change position of commetn forms
add_filter( 'comment_form_fields', 'example_order_comment_form_fields' );

function example_order_comment_form_fields( $fields ) {

    $comment = $fields['comment'];

    unset( $fields['comment'] );

    $fields['comment'] = $comment;

    return $fields;

}
// Change position of commetn forms end

//delete 'website field'
//function remove_comment_fields($fields) {
//    unset($fields['url']);
//    return $fields;
//
//
//}
//
//add_filter('comment_form_default_fields', 'remove_comment_fields');
//delete 'website field'

//Add new fields to comment form
add_filter('comment_form_default_fields', 'custom_fields_comments');
function custom_fields_comments($fields) {
//
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
//
    $fields[ 'author' ] = '<p class="comment-form-author">'.
        '<label for="author">' . __( '' ) . '</label>'.
        ( $req ? '<span class="required"></span>' : '' ).
        '<input id="author" name="author" placeholder="Name*" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
        '" size="30" tabindex="1"' . $aria_req . ' /></p>';

    $fields[ 'email' ] = '<p class="comment-form-email">'.
        '<label for="email">' . __( '' ) . '</label>'.
        ( $req ? '<span class="required"></span>' : '' ).
        '<input id="email" name="email" placeholder="Email Address *" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
        '" size="30"  tabindex="2"' . $aria_req . ' /></p>';

//    $fields[ 'url' ] = '<p class="comment-form-url">'.
//        '<label for="url">' . __( 'Website' ) . '</label>'.
//        '<input id="url" name="url" type="text" value="'. esc_attr( $commenter['comment_author_url'] ) .
//        '" size="30"  tabindex="3" /></p>';


    $fields[ 'phone' ] = '<p class="comment-form-phone">'.
        '<label for="phone">' . __( '' ) . '</label>'.
        '<input id="phone" name="phone" placeholder="Phone number*" type="text" size="30"  tabindex="4" /></p>';

    return $fields;
}
//Add new fields to comment form end

//Comment Block
function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body row">
            <?php endif; ?>
            <div class="avatar col-1">
                <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </div>
            <div class="comment-block col-10">
                <div class="comment-author vcard row">
                    <?php printf( __( '<p class="fn">%s</p>' ), get_comment_author_link() ); ?>
                    <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                            <?php
                            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
                        ?>


                </div>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
                    <br />
                <?php endif; ?>



                <?php comment_text(); ?>

                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text'=> 'hey', ) ) ); ?>
                </div>
            </div>
            <?php if ( 'div' != $args['style'] ) : ?>
        </div>
    <?php endif; ?>
    <?php
}
//Comment Block END

// Custom post types
function post_types_init() {
//Slider-intro
    $slider_main = array(
        'label' => 'Top slider',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'top-slider'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('Top slider', $slider_main);
    //Slider-intro end

    //Service posts
    $service = array(
        'label' => 'Service',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'service'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('Service', $service);
    //Service posts

    //Clients posts
    $service = array(
        'label' => 'Clients',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'clients'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('Clients', $service);
    //Clients posts

    //Partners posts
    $partners = array(
        'label' => 'Partners',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'partners'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('Partners', $partners);
    //Partners posts
}

add_action('init', 'post_types_init');
// Custom post types end
/**
 * Enqueue scripts and styles.
 */
function business_plus_scripts() {
    wp_enqueue_style('bootstrap.min.css', get_template_directory_uri() . '/style/stylesheets/lib/bootstrap.min.css');
    wp_enqueue_style('slick.css', get_template_directory_uri() . '/style/stylesheets/lib/slick.css');
    wp_enqueue_style('slick-theme.css', get_template_directory_uri() . '/style/stylesheets/lib/slick-theme.css');
    wp_enqueue_style('font-awesome.min.css', get_template_directory_uri() . '/style/stylesheets/lib/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style( 'business-plus-style', get_stylesheet_uri() );

    wp_enqueue_script('jquery-3.2.0.min.js', get_template_directory_uri() . '/js/lib/jquery-3.2.0.min.js');
    wp_enqueue_script('bootstrap.min.js', get_template_directory_uri() . '/js/lib/tether.min.js');
    wp_enqueue_script('bootstrap.min.js', get_template_directory_uri() . '/js/lib/bootstrap.min.js');
    wp_enqueue_script('slick.min.js', get_template_directory_uri() . '/js/lib/slick.min.js');
    wp_enqueue_script('custom.js', get_template_directory_uri() . '/js/custom.js');
    wp_enqueue_script( 'business-plus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    wp_enqueue_script( 'business-plus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'business_plus_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

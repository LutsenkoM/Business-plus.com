<?php
/**
 * business Theme Customizer
 *
 * @package business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $business_page = '';
    $business_page_array = get_pages();
    if(is_array($business_page_array)){
        $business_page = $business_page_array[0]->ID;
    }

//Home page panel
    $wp_customize->add_panel ('Home page panel',
        array(
            'title' => __('Home page panel'),
            'priority' => 10,
        )
    );
//Header section
    $wp_customize->add_section ( 'header',
        array(
            'title' => __('Header'),
            'priority' => 10,
            'panel' => 'Home page panel'
        )
    );

    $wp_customize->add_setting(
        'phone_header',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'phone_header',
            array(
                'settings'		=> 'phone_header',
                'section'		=> 'header',
                'type'			=> 'text',
                'label'	        => __( 'Phone number' )
            )
        )
    );
//About section
    $wp_customize->add_section ( 'about',
        array(
            'title' => __('About'),
            'priority' => 10,
            'panel' => 'Home page panel'
        )
    );

    $wp_customize->add_setting(
        'about_title',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'about_title',
            array(
                'settings'		=> 'about_title',
                'section'		=> 'about',
                'type'			=> 'text',
                'label'	        => __( 'Title' )
            )
        )
    );

    $wp_customize->add_setting(
        'about_subtitle',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'about_subtitle',
            array(
                'settings'		=> 'about_subtitle',
                'section'		=> 'about',
                'type'			=> 'text',
                'label'	        => __( 'Subtitle' )
            )
        )
    );

    $wp_customize->add_setting(
        'about_article',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'about_article',
            array(
                'settings'		=> 'about_article',
                'section'		=> 'about',
                'type'			=> 'textarea',
                'label'	        => __( 'Article' )
            )
        )
    );

    $wp_customize->add_setting(
        'about_pages',
        array(
//            'default'			=> $business_page,
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,'about_page',
            array(
                'settings'		=> 'about_pages',
                'section'		=> 'service',
                'type'			=> 'dropdown-pages',
                'label'			=> __( 'Select a Page' )
            )
        )
    );


////About section end
//Service section
    $wp_customize->add_section ( 'service',
        array(
            'title' => __('Service'),
            'priority' => 10,
            'panel' => 'Home page panel'
        )
    );

    $wp_customize->add_setting(
        'service_title',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'service_title',
            array(
                'settings'		=> 'service_title',
                'section'		=> 'service',
                'type'			=> 'text',
                'label'	        => __( 'Title' )
            )
        )
    );

    $wp_customize->add_setting(
        'service_subtitle',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'service_subtitle',
            array(
                'settings'		=> 'service_subtitle',
                'section'		=> 'service',
                'type'			=> 'text',
                'label'	        => __( 'Subtitle' )
            )
        )
    );

    $wp_customize->add_setting(
        'service_page',
        array(
            'default'			=> $business_page,
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'about_page',
        array(
            'settings'		=> 'service_page',
            'section'		=> 'service',
            'type'			=> 'dropdown-pages',
            'label'			=> __( 'Select a Page' )
        )
    );
//Service section end
//Clients
    $wp_customize->add_section ( 'clients',
        array(
            'title' => __('Clients'),
            'priority' => 10,
            'panel' => 'Home page panel'
        )
    );

    $wp_customize->add_setting(
        'clients_title',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'clients_title',
            array(
                'settings'		=> 'clients_title',
                'section'		=> 'clients',
                'type'			=> 'text',
                'label'	        => __( 'Title' )
            )
        )
    );

    $wp_customize->add_setting(
        'clients_subtitle',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'clients_subtitle',
            array(
                'settings'		=> 'clients_subtitle',
                'section'		=> 'clients',
                'type'			=> 'text',
                'label'	        => __( 'Subtitle' )
            )
        )
    );
// Clients end
//Partners
    $wp_customize->add_section ( 'partners',
        array(
            'title' => __('Partners'),
            'priority' => 10,
            'panel' => 'Home page panel'
        )
    );
// IMAGE SETTINGS
    $wp_customize->add_setting(
		'partner_image',
		array(
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'partner_image',
			array(
				'settings'		=> 'partner_image',
				'section'		=> 'partners',
				'label'			=> __( 'Upload Clients Logos')
			)
		)
	);

// IMAGE SETTINGS END
    $wp_customize->add_setting(
        'partners_title',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'partners_title',
            array(
                'settings'		=> 'partners_title',
                'section'		=> 'partners',
                'type'			=> 'text',
                'label'	        => __( 'Title' )
            )
        )
    );

    $wp_customize->add_setting(
        'partners_subtitle',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'partners_subtitle',
            array(
                'settings'		=> 'partners_subtitle',
                'section'		=> 'partners',
                'type'			=> 'text',
                'label'	        => __( 'Subtitle' )
            )
        )
    );
//Partners end
//BLOG
    $wp_customize->add_panel ('Blog page panel',
        array(
            'title' => __('Blog page panel'),
            'priority' => 10,
        )
    );
    $wp_customize->add_section ( 'blog',
        array(
            'title' => __('Blog'),
            'priority' => 10,
            'panel' => 'Blog page panel'
        )
    );

    $wp_customize->add_setting(
        'blog_title',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'blog_title',
            array(
                'settings'		=> 'blog_title',
                'section'		=> 'blog',
                'type'			=> 'text',
                'label'	        => __( 'Title' )
            )
        )
    );

    $wp_customize->add_setting(
        'blog_subtitle',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'blog_subtitle',
            array(
                'settings'		=> 'blog_subtitle',
                'section'		=> 'blog',
                'type'			=> 'text',
                'label'	        => __( 'Subtitle' )
            )
        )
    );
//BLOG END
//Footer section
    $wp_customize->add_section ( 'footer',
        array(
            'title' => __('Footer'),
            'priority' => 10,
            'panel' => 'Home page panel'
        )
    );

    $wp_customize->add_setting(
        'copyright',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'copyright',
            array(
                'settings'		=> 'copyright',
                'section'		=> 'footer',
                'type'			=> 'text',
                'label'	        => __( 'Copyright' )
            )
        )
    );
    //Footer social links
    $wp_customize->add_setting(
        'social_links_facebook',
        array(
            'default'			=> 'https://facebook.com',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'social_links_facebook',
        array(
            'settings'		=> 'social_links_facebook',
            'section'		=> 'footer',
            'type'			=> 'url',
            'label'	        => __( 'Facebook Url' )
        )
    );

    $wp_customize->add_setting (
        'social_links_twitter',
        array(
            'default'			=> 'https://twitter.com',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control (
        'social_links_twittwer',
        array(
            'settings'		=> 'social_links_twitter',
            'section'		=> 'footer',
            'type'			=> 'url',
            'label'	        => __( 'Twitter Url' )
        )
    );


    $wp_customize->add_setting (
        'social_links_google',
        array(
            'default'			=> 'https://google.com',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control (
        'social_links_google',
        array(
            'settings'		=> 'social_links_google',
            'section'		=> 'footer',
            'type'			=> 'url',
            'label'	        => __( 'Google+ Url' )
        )
    );

    $wp_customize->add_setting (
        'social_links_linkedin',
        array(
            'default'			=> 'https://linkedin.com',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control (
        'social_links_linkedin',
        array(
            'settings'		=> 'social_links_linkedin',
            'section'		=> 'footer',
            'type'			=> 'url',
            'label'	        => __( 'Linkedin Url' )
        )
    );

    //Footer social links end

}
add_action( 'customize_register', 'business_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_customize_preview_js() {
	wp_enqueue_script( 'business_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'business_customize_preview_js' );

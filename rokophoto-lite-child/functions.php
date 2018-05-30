<?php
function rokophoto_child_enqueue_styles() {

$rokophoto_disable_animation = get_theme_mod( 'rokophotolite_disable_animation' );

	wp_enqueue_style( 'rokophoto_font', '//fonts.googleapis.com/css?family=Open+Sans:400,600' );
	wp_enqueue_style( 'rokophoto_bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'rokophoto_animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'rokophoto_font_awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	
	$parent_style = 'parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	
	
	wp_enqueue_style( 'rokophoto_responsiveness', get_template_directory_uri() . '/css/responsiveness.css' );

	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'rokophoto_modernizr', get_template_directory_uri() . '/js/modernizr.custom.js' );
	wp_enqueue_script( 'rokophoto-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'rokophoto_bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '', true );
	if ( isset( $rokophoto_disable_animation ) && $rokophoto_disable_animation != 1 ) {
		wp_enqueue_script( 'rokophoto_wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '', true );
	}
	wp_enqueue_script( 'rokophoto_smooth_scroll', get_template_directory_uri() . '/js/SmoothScroll.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_animate_header', get_template_directory_uri() . '/js/cbpAnimatedHeader.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_jqBootstrapValidation', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js' );
	wp_enqueue_script( 'rokophoto_respond', get_template_directory_uri() . '/js/respond.min.js' );
	wp_script_add_data( 'rokophoto_html5shiv, rokophoto_respond', 'conditional', 'lt IE 9' );
	wp_script_add_data( 'rokophoto_respond', 'conditional', 'lt IE 9' );

	$slider_speed = array(
		'slider_speed' => get_theme_mod( 'rokophotolite_slider_speed', 3000 ),
	);

	wp_localize_script( 'rokophoto_main', 'slider_speed', $slider_speed );

	if ( is_front_page() ) :

		$rokophoto_contact_shortcode = get_theme_mod( 'rokophotolite_contact_shortcode' );
		if ( empty( $rokophoto_contact_shortcode ) ) {
			wp_enqueue_script( 'rokophoto_contact', get_template_directory_uri() . '/js/contact.js', array( 'jquery' ), '', true );

			$site_parameters = array(
				'contact_script' => get_template_directory_uri() . '/inc/submit.php',
				'email_script'   => get_theme_mod( 'rokophotolite_contact_email', get_bloginfo( 'admin_email' ) ),
			);

			wp_localize_script( 'rokophoto_contact', 'SiteParameters', $site_parameters );

		}

	endif;

wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    
}
add_action( 'wp_enqueue_scripts', 'rokophoto_child_enqueue_styles' );
?>
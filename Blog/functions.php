<?php
    
    if(! isset($content_width)) {
        $content_width = 660;
    }

    function sbeaty_setup() {
        
        add_theme_support('post-thumbnails');
        
        add_theme_support('automatic-feed-links');
        add_theme_support('title_tag');
        
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'tranquilwp' ),
            'footer' => __( 'Footer Menu', 'tranquilwp' ),
        ) );
    }

    add_action('after_setup_theme', 'sbeaty_setup');

    function sbeaty_scripts() {
        /* add styles */
        wp_enqueue_style('bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css');
        /* MIGHT need to change custom to shopStyle */
        wp_enqueue_style('custom', get_template_directory_uri() . '/sbeatyStyle.css');
        
        /* add scripts */
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), true);
    }

    add_action('wp_enqueue_scripts', 'sbeaty_scripts');

    function wpdocs_excerpt_more( $more ) {
        return '...';
    }
    add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar_blog',
		'before_widget' => '<div class="sidebar-module ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

?>
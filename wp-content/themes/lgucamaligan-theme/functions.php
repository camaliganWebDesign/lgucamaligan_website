<?php
if ( ! function_exists( 'lgucamaligan_blocktheme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support for post thumbnails.
     */
    function lgucamaligan_blocktheme_setup() {
        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support( 'automatic-feed-links' );
 
        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support( 'post-thumbnails' );
 
        add_theme_support( 'editor-styles' );
 
        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'lgucamaligan_blocktheme_setup' );
 
/**
 * Enqueue theme scripts and styles.
 */
function lgucamaligan_blocktheme_scripts() {
    wp_enqueue_style( 'lgucamaligan_blocktheme_styles', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'lgucamaligan_blocktheme_scripts' );

/**
 * Adding menu locations and widget area
 */
if( !function_exists('lgucamaligan_blocktheme_widgets_init') ) {
    function lgucamaligan_blocktheme_widgets_init() {
        // menu registration
        register_nav_menus( array(
            'main_nav'  => __( 'Main Menu', 'lgucamaligantheme_td' ),
            'aux_nav'   => __( 'Auxiliary Menu', 'lgucamaligantheme_td' ),
        ) );

        // sidebar registration
        $sidebar_name1 = array("upper", "lower");
        $sidebar_name2 = array("left", "right");

        foreach( $sidebar_name1 as $name1 ) {
            foreach( $sidebar_name2 as $name2 ) {
                register_sidebar( array(
                    'name'          => __( ucwords($name1) .' ' .ucwords($name2) .' Corner', 'lgucamaligantheme_td' ),
                    'id'            => $name1 .'-' .$name2 .'-corner',
                    'before_widget' => '<div class="widget-container">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h3 class="widget-title">',
                    'after_title'   => '</h3>',
                ));
            }
        }

        register_sidebar( array(
            'name'          => __( 'Main Widget Area', 'lgucamaligantheme_td' ),
            'id'            => 'main-widget-area',
            'before_widget' => '<div class="widget-container">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Sidebar Widget Area', 'lgucamaligantheme_td' ),
            'id'            => 'sidebar-widget-area',
            'before_widget' => '<div class="widget-container">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
}
add_action( 'widgets_init', 'lgucamaligan_blocktheme_widgets_init' );

if( !function_exists( 'lgu_hide_widget_areas_to_certain_users' ) ) {
    function lgu_hide_widget_areas_to_certain_users() {
        if( current_user_can( 'page-admin' ) ) {
            unregister_sidebar( 'upper-left-corner' );
            unregister_sidebar( 'lower-left-corner' );
            unregister_sidebar( 'upper-right-corner' );
            unregister_sidebar( 'lower-right-corner' );
            unregister_sidebar( 'main-widget-area' );
        }
    }
}
add_action( 'widgets_init', 'lgu_hide_widget_areas_to_certain_users', 11 );
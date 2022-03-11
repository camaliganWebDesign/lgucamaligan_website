<?php
//==============================================================================================================
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support for post thumbnails.
 */
    if ( ! function_exists( 'lgucamaligan_blocktheme_setup' ) ) :
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
//==============================================================================================================
/**
 * enqueue scripts and styles
 */
    if( !function_exists( 'lgucamaligan_blocktheme_scripts_and_styles' ) ) {
        function lgucamaligan_blocktheme_scripts_and_styles() {
            //reload scripts and styles depending if the site is in development mode or is live
            $site_mode = str_contains( get_home_url(), 'localhost' ) ? 'DEV' : 'LIVE';
            $version = ($site_mode=='DEV') ? time() : ( defined(WP_JS_CSS_VERSION) ? WP_JS_CSS_VERSION : '1.0.0' );
            //scripts
            wp_enqueue_script('vue', 'https://unpkg.com/vue@3', [], '3');
            wp_enqueue_script('lgucamaligan_blocktheme_scripts', get_stylesheet_directory_uri() .'/js/main.js', [], $version, true );
            //styles
            wp_enqueue_style( 'lgucamaligan_blocktheme_styles', get_stylesheet_directory_uri() .'/css/index.css', [], $version );
            //variable localization - allows javascripts to access variables declared in here
            wp_localize_script( 'lgucamaligan_blocktheme_scripts', 'lguLocalizedVars',
                [
                    'nonce' => wp_create_nonce('wp_rest'),
                ]
            );
        }
        add_action( 'wp_enqueue_scripts', 'lgucamaligan_blocktheme_scripts_and_styles' );
    }
//==============================================================================================================
/**
 * Add header (php template) after the body open tag
 */
    if( !function_exists( 'lgu_add_site_header' ) ) {
        function lgu_add_site_header(){
            include_once(get_template_directory() . '/template-parts/header.php');
        }
        add_action('wp_body_open', 'lgu_add_site_header', 10, 0);
    }
//==============================================================================================================
/**
 * Add footer (php template) before the body close tag
 */
    if( !function_exists( 'lgu_add_site_footer' ) ) {
        function lgu_add_site_footer() {
            include_once(get_template_directory() . '/template-parts/footer.php');
        }
        add_action('wp_footer', 'lgu_add_site_footer');
    }
//==============================================================================================================
/**
 * Adding menu locations and widget area
 */
    if( !function_exists('lgucamaligan_blocktheme_widgets_init') ) {
        function lgucamaligan_blocktheme_widgets_init() {
            // menu registration
            register_nav_menus( array(
                'main_nav'  => __( 'Main Menu', 'lgucamaliganbtheme_td' ),
                'aux_nav'   => __( 'Auxiliary Menu', 'lgucamaliganbtheme_td' ),
            ) );

            // sidebar registration
            $sidebar_name1 = array("upper", "lower");
            $sidebar_name2 = array("left", "right");

            foreach( $sidebar_name1 as $name1 ) {
                foreach( $sidebar_name2 as $name2 ) {
                    register_sidebar( array(
                        'name'          => __( ucwords($name1) .' ' .ucwords($name2) .' Corner', 'lgucamaliganbtheme_td' ),
                        'id'            => $name1 .'-' .$name2 .'-corner',
                        'before_widget' => '<div class="widget-container">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3 class="widget-title">',
                        'after_title'   => '</h3>',
                    ));
                }
            }

            register_sidebar( array(
                'name'          => __( 'Main Widget Area', 'lgucamaliganbtheme_td' ),
                'id'            => 'main-widget-area',
                'before_widget' => '<div class="widget-container">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ) );

            register_sidebar( array(
                'name'          => __( 'Sidebar Widget Area', 'lgucamaliganbtheme_td' ),
                'id'            => 'sidebar-widget-area',
                'before_widget' => '<div class="widget-container">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ) );
        }
    }
    add_action( 'widgets_init', 'lgucamaligan_blocktheme_widgets_init' );
//==============================================================================================================
/**
 * Only show sidebar widget area when the user editing the page is a page-admin
 */
    if( !function_exists( 'lgu_hide_widget_areas_to_certain_users' ) ) {
        function lgu_hide_widget_areas_to_certain_users() {
            if( current_user_can( 'page_administrator' ) ) {
                unregister_sidebar( 'upper-left-corner' );
                unregister_sidebar( 'lower-left-corner' );
                unregister_sidebar( 'upper-right-corner' );
                unregister_sidebar( 'lower-right-corner' );
                unregister_sidebar( 'main-widget-area' );
            }
        }
    }
    add_action( 'widgets_init', 'lgu_hide_widget_areas_to_certain_users', 11 );
//==============================================================================================================
/**
 * Adds Updates Custom Role named 'page_administrator'
 */
    if( !function_exists( 'lgu_add_page_admin_role' ) ) {
        function lgu_add_page_admin_role() {
            update_option( 'page_admin_role_version', 0 );
            remove_role( 'page_administrator' );
            if ( get_option( 'page_admin_role_version' ) < 1 ) {
                add_role(
                    'page_administrator',
                    'Page Administrator',
                    array( 
                        'edit_theme_options'   => true,
                        'edit_pages'           => true,
                        'edit_published_pages' => true,
                        'edit_posts'           => true,
                        //'publish_posts'        => true,
                        'publish_pages'        => true,
                        'edit_published_pages' => true,
                        'moderate_comments'    => true,
                        'publish_posts'        => true,
                        'upload_files'         => true,
                        'read'                 => true,
                        'delete_posts'         => true,
                        'manage_options'       => true,
                        'customize'            => true,
                    )
                );
                update_option( 'page_admin_role_version', 1 );
            }
        }
    }
    add_action( 'init', 'lgu_add_page_admin_role' );
//==============================================================================================================
// Custom Rest APIs and Authentications
require get_template_directory() . '/inc/api-fetcher.php';
//==============================================================================================================
// enqueued script tag modifier
function script_type_module( $tag, $handle, $src ) {
    if ( 'lgucamaligan_blocktheme_scripts' === $handle ) {
        $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    }
 
    return $tag;
}
add_filter( 'script_loader_tag', 'script_type_module', 10, 3 );
//==============================================================================================================

























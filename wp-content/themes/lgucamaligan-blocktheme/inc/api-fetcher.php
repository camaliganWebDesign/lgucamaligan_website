<?php /* Functions for Utilizing Rest API of Wordpress */ ?>

<?php
// Requires authentication for all Rest API requests
add_filter( 'rest_authentication_errors', function( $result ) {
    // If a previous authentication check was applied,
    // pass that result along without modification.
    if ( true === $result || is_wp_error( $result ) ) {
        return $result;
    }
 
    // No authentication has been performed yet.
    // Return an error if user is not logged in.
    if ( ! is_user_logged_in() ) {
        return new WP_Error(
            'rest_not_logged_in',
            __( 'You are not currently logged in.' ),
            array( 'status' => 401 )
        );
    }
 
    // Our custom authentication check should have no effect
    // on logged-in requests
    return $result;
});

// create new custom endpoint for nav menus - optionally accepts Menu slugs (Menu name converted to slug format)
function lgu_get_wp_menus() {
    $menuNames = array();
    if( isset($_GET['name']) ) :
        array_push( $menuNames, $_GET['name']  );
    else :
        $menuNames = get_registered_nav_menus();
        //return $menuNames;
    endif;

    $menus = [];
    foreach( $menuNames as $menu_id => $menu_name ) {
        $menu_slug = str_replace(" ", "-", strtolower($menu_name));
        $menu_content = wp_get_nav_menu_items( $menu_slug, [ 'orderby' => 'menu_order' ]);
        $filtered_content = [];
        if( is_array($menu_content) && count($menu_content) > 0 ) :
            foreach( $menu_content as $content ) {
                array_push( $filtered_content, (object)[
                    'title'            => $content->title,
                    'ID'               => $content->ID,
                    'menu_item_parent' => $content->menu_item_parent,
                    'menu_item_number' => $content->menu_item_number,
                    'url'              => $content->url,
                ]);
            }
        endif;

        // TODO: create script that will group nav menus
        /*$current_group = $filtered_content;
        $grouped_content = [];
        foreach( $filtered_content as $content ) {
            if( $parent_id = $content->menu_item_parent != "0" ):
                foreach( $grouped_content as $new_content ) {
                    $current_group = $new_content;
                    while(1) {
                        if( $current_group->ID == $parent_id ) :
                            if( array_key_exists( 'menu_children', $new_content ) ) :
                                $current_group = $new_content->
                    }


                    if( $new_content->ID == $parent_id ) :

                        if( array_key_exists( 'menu_children', $new_content ) ) :

                            while(1)
                }
            else :
                array_push($grouped_content, $content);
            endif;
        }*/

        
        $menus[$menu_name] = $filtered_content;

    }
    return $menus;
    //return wp_get_nav_menu_items('');
}
add_action( 'rest_api_init', function () {
        register_rest_route( 'custom-routes', '/wp-menus', array(
        'methods' => 'GET',
        'callback' => 'lgu_get_wp_menus',
    ) );
} );
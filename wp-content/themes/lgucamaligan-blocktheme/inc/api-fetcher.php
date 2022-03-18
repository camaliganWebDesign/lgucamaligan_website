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
    $menu_names = array();
    if( isset($_GET['name']) ) :
        array_push( $menu_names, $_GET['name']  );
    else :
        $menus = get_terms('nav_menu');
        foreach( $menus as $menu ) {
            array_push($menu_names, $menu->slug);
        }
    endif;

    $menus = [];
    foreach( $menu_names as $menu_name ) {
        $menu_content = wp_get_nav_menu_items( $menu_name, [ 'orderby' => 'menu_order' ]);
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
        $menus[$menu_name] = array_group_organizer( $filtered_content, 'ID', 'menu_item_parent' );
    }
    return $menus;
}
add_action( 'rest_api_init', function () {
        register_rest_route( 'custom-routes', '/wp-menus', array(
        'methods' => 'GET',
        'callback' => 'lgu_get_wp_menus',
    ) );
} );

function array_group_organizer( $array_to_sort, $item_id_key, $parent_id_key ) {
    $cg_matrix = [ [] ];
    $cg_matrix_c_index = [ 0 ];
    $matrix_step = 0;
    $matrix_c_index_start = 0;
    while( count( $array_to_sort ) > 0 ) {
        for( $a = 0; $a < count( $array_to_sort ); $a++ ) {
            if( !isset( $array_to_sort[$a]->$parent_id_key ) ||
                (int)$array_to_sort[$a]->$parent_id_key <= 0 ||
                $array_to_sort[$a]->$parent_id_key == "" ):
                array_push( $cg_matrix[0], $array_to_sort[$a] );
                array_splice( $array_to_sort, $a, 1 );
                break;
            else:
                for( $b = $matrix_c_index_start; $b < count( $cg_matrix[$matrix_step] ); $b++ ) {
                    $current_g = $cg_matrix[ $matrix_step ];
                    if( $current_g[$b]->ID == $array_to_sort[$a]->$parent_id_key ):
                        if( !isset( $current_g[$b]->children ) ):
                            $current_g[$b]->children = [];
                        endif;
                        array_push( $current_g[$b]->children, $array_to_sort[$a] );
                        array_splice( $array_to_sort, $a, 1 );
                        $cg_matrix[$matrix_step] = $current_g;
                        $matrix_c_index_start = 0;
                        $matrix_step = 0;
                        for( $c = count( $cg_matrix ) - 2; $c >= 0; $c-- ) {
                            $cg_matrix[ $c ][ $cg_matrix_c_index[ $c ] ]->children = $cg_matrix[ $c + 1 ];
                            array_splice( $cg_matrix, $c + 1, 1 );
                            array_splice( $cg_matrix_c_index, $c + 1, 1 );
                        }
                        break 2;
                    else:
                        $matrix_count = count( $cg_matrix );
                        $cg_matrix_c_index[ $matrix_step ] = $b;
                        if( isset( $current_g[ $b ]->children ) ):
                            $cg_matrix[ $matrix_count ] = $current_g[ $b ]->children;
                            $matrix_step += 1;
                            $matrix_c_index_start = 0;
                        else:
                            $last_array = $matrix_count - 1;
                            $current_index = $b;
                            if( $current_index + 1 < count( $cg_matrix[ $last_array ] ) ):
                                $matrix_c_index_start = $current_index + 1;
                            else:
                                $steps_to_back = 0;
                                for( $d = $matrix_count - 1; $d > 0; $d-- ) {
                                    if( count( $cg_matrix[$d] ) - 1 <= $cg_matrix_c_index[$d] ):
                                        $steps_to_back++;
                                    else:
                                        break;
                                    endif;
                                }
                                $matrix_step -= $steps_to_back;
                                for( $e = count( $cg_matrix ) - 2; $e >= 0; $e-- ) {
                                    if( $steps_to_back == 0 ):
                                        break;
                                    endif;
                                    $cg_matrix[ $e ][ $cg_matrix_c_index[ $e ] ]->children = $cg_matrix[ $e + 1 ];
                                    array_splice( $cg_matrix, $e + 1, 1 );
                                    array_splice( $cg_matrix_c_index, $e + 1, 1 );
                                    $steps_to_back--;
                                }
                                $matrix_c_index_start = $cg_matrix_c_index[ $matrix_step ] + 1;
                            endif;
                        endif;
                        $a = -1;
                        break;
                    endif;
                }
            endif;
        }
    }

    return $cg_matrix[0];
}
<?php



/* --------------------------------------------------------- */
/*  !Includes */
/* --------------------------------------------------------- */
include_once get_template_directory() . '/inc/helpers.php';
include_once get_template_directory() . '/inc/classes.php';
include_once get_template_directory() . '/inc/actions.php';
include_once get_template_directory() . '/inc/filters.php';
	



/* --------------------------------------------------------- */
/*  !Scripts */
/* --------------------------------------------------------- */
//DO NOT enqueue scripts in functions.php, use the enqueue_scripts function in inc/actions.php instead.

/* --------------------------------------------------------- */
/*  !Actions */
/* --------------------------------------------------------- */
add_action_msc( array(
    'after_setup_theme',
    'init',
    'wp_enqueue_scripts'
) );
remove_action( 'wp_head', 'webp_uploads_render_generator' );


/* --------------------------------------------------------- */
/*  !Filters */
/* --------------------------------------------------------- */
add_filter_msc( array(
    'body_class',
    [ 'excerpt_length', 999 ],
    [ 'excerpt_more', 999 ],
    [ 'get_the_excerpt', 10, 2 ],
    [ 'nav_menu_css_class', 10, 3 ],
    [ 'nav_menu_item_id', 10, 2 ],
    [ 'nav_menu_link_attributes', 10, 4 ],
    'wp_img_tag_add_auto_sizes',
    [ 'wp_nav_menu_container_allowedtags', 10, 1 ],
    ['get_the_archive_title', 10, 2],
    ['facetwp_map_marker_args', 10, 2],
    ['facetwp_map_init_args',10,2],
    ['facetwp_query_args', 10,2],
    ['allowed_block_types_all', 10, 2],
    'facetwp_facet_dropdown_show_counts'
) );
remove_filter( 'wp_robots', 'wp_robots_max_image_preview_large' );

// Add custom column to admin list table
add_filter( 'manage_location_posts_columns', 'add_location_name_column' );
function add_location_name_column( $columns ) {
    // Create a new array and insert "Location Name" before the "Date" column
    $new_columns = [];

    foreach ( $columns as $key => $value ) {
        if ( $key === 'date' ) {
            $new_columns['location_name'] = 'Location Name';
        }
        $new_columns[ $key ] = $value;
    }

    return $new_columns;
}

// Display the custom field value in the column
add_action( 'manage_location_posts_custom_column', 'show_location_name_column', 10, 2 );
function show_location_name_column( $column, $post_id ) {
    if ( 'location_name' === $column ) {
        echo esc_html( get_post_meta( $post_id, 'location_name', true ) );
    }
}

// Remove Cross-sell products from Woo Commerce cart page
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

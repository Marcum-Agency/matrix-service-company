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
    ['get_the_archive_title', 10, 2]
) );
remove_filter( 'wp_robots', 'wp_robots_max_image_preview_large' );
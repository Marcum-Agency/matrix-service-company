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
wp_enqueue_script( 'ScrollMagic js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array( 'jquery' ), date('Y-m-d'), true );
wp_enqueue_script( 'animationgsap js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js', array( 'jquery' ), date('Y-m-d'), true );
wp_enqueue_script( 'scrollmagicindicators js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array( 'jquery' ), date('Y-m-d'), true );
wp_enqueue_script( 'gsap js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js', array( 'jquery' ), date('Y-m-d'), true );



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
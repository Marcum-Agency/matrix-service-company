<?php



function body_class_msc( $classes ){
    $classes_new = ['view'];
    global $post;
    if( is_404() ):
        $classes_new[] = 'view--404';
    elseif( is_single() ):
        $classes_new[] = 'single';
        if( isset( $post->post_type) ):
            $classes_new[] = 'single--'. strtolower($post->post_type);
        endif;
        if( isset( $post->post_title ) ):
            $classes_new[] = 'view--'. strtolower($post->post_name);
        endif;
    elseif( is_home() || is_archive() || is_author() ):
        $classes_new[] = 'archive';
        if( is_archive() && is_tax() ):
            $classes_new[] = 'taxonomy taxonomy--' .get_queried_object()->slug;
        elseif( is_archive() && is_category() ):
            $classes_new[] = 'category category--' .get_queried_object()->slug;
        elseif( is_author() ):
            $classes_new[] = 'author';
        elseif( is_home() ):
            $classes_new[] = 'archive--posts';
        endif;
    elseif( is_singular() ):
        if( isset( $post->post_title ) ):
            $classes_new[] = 'view--'. strtolower($post->post_name);
        endif;
        if( (bool) get_post()->post_parent ):
            $classes_new[] = 'view--is-child';
        endif;
        if( get_featured_image_attrs( has_post_thumbnail( $post->ID ), get_post_thumbnail_id( $post->ID ) ) ):
            $classes_new[] = 'view--has-img';
        endif;
        if( is_page_template() ):
            foreach( explode( '/', get_page_template_slug( get_queried_object_id() ) ) as $part ):
                $classes_new[] = 'tmpl--' . str_replace( 'template--', '', basename( $part, '.php' ) );
            endforeach;
        else:
            $classes_new[] = 'tmpl--default';
        endif;
    endif;
    if( isset( $post->ID ) && !empty( $post->ID ) ):
        $classes_new[] = 'view--'. $post->ID;
    endif;
    return $classes_new;
};



function excerpt_length_msc( $length ){
    if( is_admin() ):
        return $length;
    endif;
    return 16;
};



function excerpt_more_msc( $more ){
    if( is_admin() ):
        return $more;
    endif;
    return '&hellip;';
};



function get_the_excerpt_msc( $excerpt, $post ){
    if( has_excerpt( $post ) ):
        $excerpt_length = apply_filters( 'excerpt_length', 10 );
        $excerpt_more = apply_filters( 'excerpt_more', ' ' . '&hellip;' );
        $excerpt = wp_trim_words( $excerpt, $excerpt_length, $excerpt_more );
    endif;
    return $excerpt;
};



function nav_menu_css_class_msc( $classes, $item, $args ){
    $sanitized_classes = array( "nav-menu-item" );
    if( !empty( array_search( "current-menu-item", $classes ) ) ):
        $sanitized_classes[] = "active";
    endif;
    if( !empty( $classes[0] ) ):
        $sanitized_classes[] = $classes[0];
    endif;
    return $sanitized_classes;
};



function nav_menu_item_id_msc( $item, $args ){
    return "";
};



function nav_menu_link_attributes_msc( $atts, $item, $args, $depth ){
    $atts['class'] = '';
    $atts['id'] = '';
    if( $atts['aria-current'] ):
        unset( $atts['aria-current'] );
    endif;
    return $atts;
};



function wp_img_tag_add_auto_sizes_msc( $add_auto_sizes ){
    return false;
};



function wp_nav_menu_container_allowedtags_msc( $array ){
    $array[] = "nav";
    return $array;
};

function get_the_archive_title_msc ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
};
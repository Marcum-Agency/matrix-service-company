<?php



function sanitize_wysiwyg( $input = "No content provided", $filter = 'the_content' ){
    return str_replace(
        array( "\r", "\n" ),
        "",
        normalize_whitespace(
            apply_filters(
                $filter,
                $input
            )
        )
    );
};



function get_featured_image_attrs( $is_valid = false, $thumbnail_id = null ){
    $featured_image_attrs = false;
    if( $is_valid ):
        $featured_image_attrs = array(
            "s" => wp_get_attachment_image_src( $thumbnail_id )[0],
            "m" => wp_get_attachment_image_src( $thumbnail_id, "large" )[0],
            "l" => wp_get_attachment_image_src( $thumbnail_id, "full" )[0],
            "alt" => get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true )
        );
    endif;
    return $featured_image_attrs;
};



function add_action_msc( $actions ){
    for( $i = 0; $i < count( $actions ); $i++ ):
        $action = $actions[$i];
        if( is_array( $action ) ):
            $num_indices = count( $action );
            if( $num_indices === 2 ):
                add_action( $action[0], $action[1]. '_msc' );
            else:
                add_action( $action[0], $action[0]. '_msc' );
            endif;
        else:
            add_action( $action, $action. '_msc' );
        endif;
    endfor;
};



function add_filter_msc( $filters ){
    for( $i = 0; $i < count( $filters ); $i++ ):
        $filter = $filters[$i];
        if( is_string( $filter ) ):
            add_filter( $filter, $filter. '_msc' );
            continue;
        endif;
        $num_filter_args = count( $filter );
        if( $filter[1] === '__return_false' ):
            add_filter( $filter[0], '__return_false' );
        elseif( is_string( $filter[1] ) ):
            if( $num_filter_args === 4 ):
                add_filter( $filter[0], $filter[1]. '_msc', $filter[2], $filter[3] );
            elseif( $num_filter_args === 3 ):
                add_filter( $filter[0], $filter[1]. '_msc', $filter[2] );
            elseif( $num_filter_args === 2 ):
                add_filter( $filter[0], $filter[1]. '_msc' );
            endif;
        elseif( $num_filter_args > 1 ):
            if( $num_filter_args === 3 ):
                add_filter( $filter[0], $filter[0]. '_msc', $filter[1], $filter[2] );
            else:
                add_filter( $filter[0], $filter[0]. '_msc', $filter[1] );
            endif;
        endif;
    endfor;
};
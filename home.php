<?php

get_header();

if( have_posts() ):
    while( have_posts() ):
        the_post(); ?><!-- POST PREVIEW --><?php
    endwhile;
else:
    ?><p>No <em><?php echo get_the_title( get_option('page_for_posts', true) ); ?></em> posts are published at this time, sorry!</p><?php
endif;

get_footer();
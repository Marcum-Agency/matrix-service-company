<?php

get_header();

if( have_posts() ):
    while( have_posts() ):
        the_post(); get_template_part( 'partials/loop/post' );
    endwhile;
else:
    ?><p>No default <em>archive</em> template available</p><?php
endif;

get_footer();
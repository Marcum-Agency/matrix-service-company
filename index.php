<?php

get_header();

if( have_posts() ):
    while( have_posts() ):
        the_post(); echo PHP_EOL; get_template_part( 'partials/default' );
    endwhile;
endif;

get_footer();
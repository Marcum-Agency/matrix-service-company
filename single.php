<?php

get_header();

if( have_posts() ):
    while( have_posts() ): the_post(); ?>
    <!-- SINGLE THINGZ -->
    <?php
    //We're only getting the header if there are parent pages. This will probably need to be adjusted once we start having more complex single pages.
    if( !has_block('mrcm/hero-slider')) {
    get_template_part( 'partials/header' );
    } ?>
    <article class="single">
        <?php the_content(); ?>

    </article>
    <?php endwhile;
else:
    ?><p>No <code>single.php</code> template available.</p><?php
endif;

get_footer();
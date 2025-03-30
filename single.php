<?php

get_header();

if( have_posts() ):
    while( have_posts() ): the_post(); ?>
    <!-- SINGLE THINGZ -->
    <?php
    //We're only getting the header if there are parent pages. This will probably need to be adjusted once we start having more complex single pages.
     if (wp_get_post_parent_id(get_the_ID())):
        get_template_part( 'partials/header' );
     endif; ?>
    <article class="single">
        <?php the_content(); ?>

    </article>
    <?php endwhile;
else:
    ?><p>No <code>single.php</code> template available.</p><?php
endif;

get_footer();
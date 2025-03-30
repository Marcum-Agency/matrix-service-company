<?php

get_header();

if( have_posts() ):
    while( have_posts() ): the_post(); ?>
    <!-- SINGLE THINGZ -->
    <?php get_template_part( 'partials/header' ); ?>
    <article class="single">
        <?php the_content(); ?>

    </article>
    <?php endwhile;
endif;

get_footer();
<?php

get_header();

if( have_posts() ):
    while( have_posts() ): the_post(); ?>
    <!-- SINGLE THINGZ -->
    <article class="single">
    <div class="post-thumbnail">
            <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail('full');
            } ?>
        </div>
        <header>
            <p class="categories"><?php the_category(' '); ?></p>
            <h1><?php the_title(); ?></h1>
            <p><time><?php echo get_the_date(); ?></time> | <span class="author"><?php the_author(); ?></span></p>
            
        </header>

        <?php the_content(); ?>
    </article>
    <div class="next-post">
        <span>Up Next</span>
        <?php $next_post = get_previous_post();
            if ( is_a( $next_post , 'WP_Post' ) ) : ?>
                <h2><?php echo get_the_title( $next_post->ID ); ?></h2>
                <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="btn btn-outline">Read Article</a>
            <?php endif; ?>  
              
    </div>
    <?php endwhile;
else:
    ?><p>No <code>single.php</code> template available.</p><?php
endif;

get_footer();
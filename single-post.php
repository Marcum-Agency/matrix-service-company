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
endif; ?>
<div class="footer_blocks">
<?php 
echo do_blocks( 
    '<!-- wp:mrcm/cta-image-banner {
        "name": "mrcm/cta-image-banner",
        "data": {
            "green_header": "Let\'s Talk:",
            "_green_header": "field_67d79c2436dc1",
            "white_header_text": "Invitation to bid",
            "ctas_0_magic-cta_type": "link",
            "ctas_0_magic-cta_link": {
                "title": "Submit",
                "url": "/contact/"
            },
            "ctas_0_magic-cta": "",
            "ctas": 1,
            "_ctas": "field_67d79b3e9c3a6",
            "media_type": "image",
            "background_image": 225
        },
        "mode": "auto"
    } /-->'
); 
?>    <?php echo do_blocks(
    '<!-- wp:mrcm/fifty-fifty-no-media {
        "name": "mrcm/fifty-fifty-no-media",
        "data": {
            "title": "Explore Careers",
            "description": "<p>Great people make a company great. We\'re looking for people who are ready to make a difference, deliver results, and live our values.</p>",
            "ctas_0_magic-cta_type": "link",
            "ctas_0_magic-cta_link": {
                "title": "Careers",
                "url": "/careers/"
            },
            "ctas_0_magic-cta": "",
            "ctas": 1,
            "call_out_header": "We Want You",
            "block_visuals_orientation": "r2l",
            "block_visuals_arrow_direction": "arrow-left",
            "block_visuals_hide_arrow": "0",
            "block_visuals": "",
            "_block_visuals": "field_67eecd6578834"
        },
        "mode": "auto",
        "className": "explore-career"
    } /-->'
    ); ?>
</div>
<?php get_footer();
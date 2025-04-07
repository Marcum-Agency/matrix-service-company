<?php

get_header();
get_template_part( 'partials/header' ); 


?>
<div class="filter-container">
    <div class="container--site">
        <div class="filter-container__inner--left">
            <h1 class="filter-container__inner--left__title">Filter</h1>
        </div>
        <div class="filter-container__inner--right">
            <?php echo do_shortcode( '[facetwp facet="search_blog"]' ); ?>
            <?php echo do_shortcode( '[facetwp facet="categories"]' ); ?>
            <button value="Reset" onclick="FWP.reset()" class="btn facet-reset">Reset</button>
        </div>
    </div>
</div>
<div class='container--site'>
    <div class="archive-container">
        <?php if( have_posts() ):
            while( have_posts() ): the_post();
            
            $post_type = get_post_type();
            get_template_part( 'partials/card', $post_type );
            endwhile;
        else:
            ?><p>No Posts Found</p><?php
        endif; ?>
    </div>
    
</div>
<?php echo do_shortcode( '[facetwp facet="load_more"]' ); ?>
<?php get_footer();
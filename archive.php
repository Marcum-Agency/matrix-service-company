<?php

get_header();
get_template_part( 'partials/header' ); 


?>

<div class='container--site'>
    <div class="archive-post-container">
    <?php if( have_posts() ):
        while( have_posts() ): the_post();
        
        $post_type = get_post_type();
        get_template_part( 'partials/card', $post_type );
        endwhile;
    else:
        ?><p>No default <em>archive</em> template available</p><?php
    endif; ?>
    </div>
</div>

<?php get_footer();
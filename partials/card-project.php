<div <?php post_class('card'); ?>>
    <div class='card-image'>
        <?php the_post_thumbnail('medium'); ?>
    </div>
    <div class='card-details'>
        <!-- Market -->
        <?php $market = get_field('market_category');		
        if ( $market && ! is_wp_error( $market ) ) : ?>
            <span class="project__capability"><?php echo $market[0]->post_title; ?></span>
        <?php endif; ?>

        <!-- Title -->
         <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <!-- Location -->
        <span class="location"><?php the_field('project_location'); ?></span>
    </div>
</div>
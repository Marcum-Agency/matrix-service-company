<div <?php post_class('card'); ?>>
    <div class='card-image'>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
    </div>
    <div class='card-details'>
        <!-- Market -->
        <?php $market = get_field('market_category');		
        if ( $market && ! is_wp_error( $market ) ) : ?>
            <span class="category"><?php echo $market[0]->post_title; ?></span>
        <?php endif; ?>

        <!-- Title -->
         <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <!-- Location -->
        <span class="location"><?php the_field('project_location'); ?></span>
    </div>
</div>
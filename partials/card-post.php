<div <?php post_class('card'); ?>>
    <div class='card-image'>
        <?php the_post_thumbnail('medium'); ?>
    </div>
    <div class='card-details'>
        <!-- Category -->
        <span class="category">
            <?php $categories = get_the_category($post->ID);
            if ( ! empty( $categories ) ) {
                echo esc_html( $categories[0]->name );	
            } ?>
        </span>

        <!-- Title -->
         <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <!-- Location -->
        <date><?php echo get_the_date( 'F j, Y', $post->ID); ?></date>
    </div>
</div>
<div <?php post_class('card'); ?>>
    <div class='card-image'>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
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
    </div>
</div>
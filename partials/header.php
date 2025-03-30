<section class="project__header">
    <figure><?php //echo get_image_from_id( array( 'id' => get_post_thumbnail_id(), 'is_element' => true ) ); ?>
        <?php the_post_thumbnail('full'); ?>
    </figure>
    <div class="project__header--content">
        <div class="container--site">
            <div class="">
                <?php $market = get_field('market_category');		
                if ( $market && ! is_wp_error( $market ) ) : ?>
                    <span class="project__capability"><?php echo $market[0]->post_title; ?></span>
                <?php endif; ?>
                <div class="project__header--info">
                    <h1 class="headline"><?php the_title(); ?></h1>
                    <?php if(get_post_type() == 'project'): ?>
                        <div class="project-details">
                            <span class="location"><?php the_field('project_location'); ?></span>
                            <?php $departments = get_field('performed_by'); 
                            if($departments): ?>
                                <span class="performed_by">Performed By:</span>
                                <ul class='departments'>
                                <?php foreach($departments as $department):
                                    echo "<li>" . $department['label'] . "</li>";
                                endforeach;
                                    echo "</ul>";
                            endif;?>
                            </span>
                        </div>
                        
                    <?php endif; ?>
                </div>
                <?php generateBreadcrumb(); ?>
            </div>
        </div>  
    </div>
</section>
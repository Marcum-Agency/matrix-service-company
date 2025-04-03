<?php

if(is_archive()):
    $title = get_the_archive_title();
elseif( is_home() ):
    $title = get_the_title(get_option('page_for_posts', true));
else:
    $title = get_the_title();
endif;
?>
<section class="page__header project__header">
    <figure>
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
                    <h1 class="headline"><?php echo $title; ?></h1>
                    <?php if(get_post_type() == 'project' && is_singular() ): ?>
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
                <?php 
                if(is_singular() ):
                    generateBreadcrumb();
                endif; ?>
            </div>
        </div>  
    </div>
</section>
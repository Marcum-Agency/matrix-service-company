<?php
get_header();

get_template_part( 'partials/header' );

global $wp_query;
?>
<section class="filter-container">
          <div class="container--site">
              <div class="filter-container__inner">
                  <div class="filter-group">
                      <?php echo get_search_form( ); ?> 
                      <?php echo facetwp_display( 'facet',"categories" ); ?>
                      <button value="Reset" onclick="FWP.reset()" class="btn facet-reset">Reset</button>
                  </div>
                  <?php echo facetwp_display( 'facet',"sort_" ); ?>
              </div>
          </div>
      </div>
</section>
<section class='content container--site'>
      <div class='search-result--container'>


        <?php if (!have_posts()): ?>
            <div class="alert alert-warning">
            <?php echo 'Sorry, no results were found.' ?>
            </div>
        <?php 
        else: 
          global $wp_query;
          $total =  number_format($wp_query->found_posts); ?>
          <div class='search-result__number'>
            <?php echo "<p>We found <strong>$total</strong> results matching your search for <strong>" . get_search_query() . "</strong></p>"; ?>
          </div>
      <?php endif;

        while(have_posts()): the_post(); ?>
            <article <?php post_class('search-result'); ?>>
                <span><?php echo get_post_type(); ?></span>
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt( ); ?>
                <div class="link-container"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More <i class='fas fa-arrow-right'></i></a></div>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer();
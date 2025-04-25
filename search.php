<?php
get_header();

get_template_part( 'partials/header' );
?>
  <div class='container--site'>
    <div class="content">
      <div class='flex flex-wrap xxl:w-3/4 mx-auto'>
        <?php if (!have_posts()): ?>
            <div class="alert alert-warning mx-auto lg:w-3/4 text-center">
            <?php echo 'Sorry, no results were found.' ?>
            </div>

            <form role="search" method="get" class="search-form flex my-1 mx-auto w-full lg:w-3/4 my-10" action="<?php echo esc_url( home_url( '/' ) ) ?>">
            <label class='w-3/4'>
                <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
                <input type="search" class="search-field w-full bg-grey p-2 border-grey-darker border-2" placeholder="{!! esc_attr_x( 'Search &hellip;', 'placeholder' ) !!}" value="<?php echo get_search_query() ?>" name="s" />
            </label>
            <button type="submit" class="search-submit ml-5 border-2 border-white hover:border-primary" value="<?php echo esc_attr_x( 'Search ', 'submit button' ) ?>" />
                Search <i class='fas fa-search'></i>
            </button>
            </form>
        <?php endif;
        while(have_posts()): the_post(); ?>
            <article <?php post_class('search_result'); ?>>
                <span><?php echo get_post_type(); ?></span>
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <p><?php the_excerpt(  ); ?></p>
                <a href="">Read More <i class='fas fa-arrow-right'></i></a>
            </article>
        <?php endwhile; ?>
    </div>
  </div>
</div>

<?php get_footer();
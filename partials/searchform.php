<form role="search" method="get" class="search-form flex my-1" action="<?php echo esc_url( home_url( '/' ) ) ?>">
  <label class='w-3/4'>
    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
    <input type="search" class="search-field" placeholder="{!! esc_attr_x( 'Search &hellip;', 'placeholder' ) !!}" value="<?php echo get_search_query() ?>" name="s" />
  </label>
  <button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search ', 'submit button' ) ?>" >
    Search <i class='fas fa-search'></i>
  </button>
</form>
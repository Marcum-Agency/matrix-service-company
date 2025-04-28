<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php
/*
    DON'T add stylesheets or JavaScript files in the HTML directly.
        Instead, enqueue them the "WordPress way" via the ./inc/actions.php
        script like the others have been added.
*/
?><meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<link rel="icon" href="/favicon.ico">
<link rel="icon" href="/icon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="manifest" href="/manifest.webmanifest">
<?php
    /*
        if you must edit CSS through wp-admin (e.g. if it's an emergency),
        do so in the "blame.css" stylesheet!
    */
    if( is_front_page() ):
        $body_id = "site-home";
    elseif( is_page() ):
        $body_id = "site-page";
    elseif( is_author() ):
        $body_id = "site-author";
    elseif( is_archive() ):
        $body_id = "site-archive";
    elseif( is_single() ):
        $body_id = "site-" .strtolower( $post->post_type );
    elseif( is_home() ):
        $body_id = "site-posts";
    elseif( is_404() ):
        $body_id = "site-404";
    elseif( is_search() ):
        $body_id = "site-search";
    endif;
    wp_head();
?>


</head>
<body style='background-color:oklab(.45 .01 0)' id="<?php echo $body_id; ?>" <?php body_class(); ?>>
<noscript>
    <div id="check-js" class="notification notification--js">
        <div class="notification-wrap"></div>
        <section class="notification-body">
            <p>This website requires the use of JavaScript to run. Please <a href="https://enable-javascript.com/" target="_blank">enable it</a>, and then refresh this page to continue.</p>
        </section>
    </div>
</noscript>
<header id="site-header" class="chrome--site header--site">
    <div class="container--site">
        <?php wp_nav_menu(
            array(
                'menu' => "Site Header",
                'theme_location' => "site-header",
                'container' => 'nav',
                'container_id' => "site-header-nav",
                'container_class' => "header--site__component nav--chrome nav--header nav--header--site",
                'menu_id' => "site-header-nav-list",
                'menu_class' => 'nav-header__list nav-header--site__list',
                'item_spacing' => 'discard',
				'after' => '<span class="arrow">arrow</span>',
                'items_wrap' => '<a href="/" class="escape-hatch"><svg data-src="'. get_stylesheet_directory_uri() .'/assets/svg/logo.svg" class="logo--header dark"></svg><svg data-src="'. get_stylesheet_directory_uri() .'/assets/svg/logo--reversed.svg" class="logo--header light"></svg></a><ul role="list" id="%1$s" class="%2$s">%3$s</ul><button onclick="this.parentElement.classList.toggle(\'is-engaged\')" id="trigger-mega-menu" class="btn--naked"><span></span><svg data-src="'. get_stylesheet_directory_uri() .'/assets/svg/font-awesome/bars--solid.svg"></svg></button>'
            )
        );echo PHP_EOL; ?>
        <div class="search-button--container">
        <button id='searchToggle' class="desktop-search-toggle" data-search-toggle="closed" aria-label="Search Button">
            <svg class="svg-icon  search-icon" aria-hidden="true" role="img" focusable="false" width="23" height="23" viewBox="0 0 23 23">
            <path d="M38.710696,48.0601792 L43,52.3494831 L41.3494831,54 L37.0601792,49.710696 C35.2632422,51.1481185 32.9839107,52.0076499 30.5038249,52.0076499 C24.7027226,52.0076499 20,47.3049272 20,41.5038249 C20,35.7027226 24.7027226,31 30.5038249,31 C36.3049272,31 41.0076499,35.7027226 41.0076499,41.5038249 C41.0076499,43.9839107 40.1481185,46.2632422 38.710696,48.0601792 Z M36.3875844,47.1716785 C37.8030221,45.7026647 38.6734666,43.7048964 38.6734666,41.5038249 C38.6734666,36.9918565 35.0157934,33.3341833 30.5038249,33.3341833 C25.9918565,33.3341833 22.3341833,36.9918565 22.3341833,41.5038249 C22.3341833,46.0157934 25.9918565,49.6734666 30.5038249,49.6734666 C32.7048964,49.6734666 34.7026647,48.8030221 36.1716785,47.3875844 C36.2023931,47.347638 36.2360451,47.3092237 36.2726343,47.2726343 C36.3092237,47.2360451 36.347638,47.2023931 36.3875844,47.1716785 Z" transform="translate(-20 -31)"></path>
            </svg>
            <svg class="svg-icon hidden close-search" aria-hidden="true" role="img" preserveAspectRatio="none" width="23" height="23" viewBox="0 0 48 48">
            <path d="M45.5 0L24 21.5L2.5 0L0 2.5L21.5 24L0 45.5L2.5 48L24 26.5L45.5 48L48 45.5L26.5 24L48 2.5L45.5 0Z"/>
            </svg>
        </button>
        </div>
    </div><?php echo get_mega_menus(); ?>




</header>
<!-- Search Bar -->
<div class='search-modal'>
    <button id="searchToggleClose" data-search-toggle="open" aria-label="Close Search"><i class="fa-solid fa-xmark"></i></button>
  <div class='search-modal__inner'>
   <?php get_search_form(); ?>
    <div class='row'>
        <div class='col'>
            <h2>Quick Links</h2>
        </div>
        <div class='col'>
            <?php
            //List of quick links
            $links = get_field('quick_links', 'options');
            if( $links ) {
                echo '<ul class="quick-links">';
                foreach( $links as $link ) {
                    echo '<li><a href="'. get_permalink( $link->ID ) . '">'. esc_html($link->post_title) .' <i class="fa-solid fa-arrow-right"></i></a></li>';
                }
                echo '</ul>';
            } else {
                echo '<p>No quick links available.</p>';
            }
            ?>
        </div>
    </div>
  </div>
</div>
<!-- Mobile Nav -->
 <div id="MobileNav" class="mobile-nav">
    <div class="mobile-nav__inner">
    <?php wp_nav_menu(
            array(
                'menu' => "Site Header",
                'theme_location' => "site-header",
                'container' => 'nav',
                'container_id' => "mobile-header-nav",
                'container_class' => "header--site__component nav--header nav--header--site",
                'menu_id' => "site-header-nav-list",
                'menu_class' => 'nav-header__list nav-header--site__list',
                'item_spacing' => 'discard',
				'after' => '<span class="arrow">arrow</span>',
                'items_wrap' => '<ul role="list" id="%1$s" class="%2$s">%3$s</ul>'
            )
        );echo PHP_EOL; ?>       
    </div>
</div>
<section id="site-main" class="main--site">
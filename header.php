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
                'items_wrap' => '<a href="/" class="escape-hatch"><svg data-src="'. get_stylesheet_directory_uri() .'/svgs/logo.svg" class="logo--header dark"></svg><svg data-src="'. get_stylesheet_directory_uri() .'/svgs/logo--reversed.svg" class="logo--header light"></svg></a><ul role="list" id="%1$s" class="%2$s">%3$s</ul><button onclick="this.parentElement.classList.toggle(\'is-engaged\')" id="trigger-mega-menu" class="btn--naked"><span></span><svg data-src="'. get_stylesheet_directory_uri() .'/svgs/font-awesome/bars--solid.svg"></svg></button>'
            )
        );echo PHP_EOL; ?>
    </div><?php echo get_mega_menus(); ?>




</header>
<section id="site-main" class="main--site">
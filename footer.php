
</section>
<footer id="site-footer" class="chrome--site footer--site" role="contentinfo">
    <div class='container--site'>
        <div class='footer-nav__wrap'>
        <?php wp_nav_menu( array( 
                'theme_location' => 'site-footer',
                'menu_class'        => "footer--site__nav",
                'container'         => ""
        ) ); ?>
        
        <div class="footer--site__social">
            <ul role='list' class='list--social'>
                <li class='list-item--social'>
                    <a href='<?php the_field('linkedin', 'options'); ?>' rel="nofollow" target="_blank" class='list-item-anchor--social'><svg data-src='<?php echo get_stylesheet_directory_uri() ?>/svgs/font-awesome/linkedin.svg' class='list-item-vector--social'></svg></a>
                </li>
                <li class='list-item--social'>
                    <a href='<?php the_field('facebook', 'options'); ?>' rel="nofollow" target="_blank" class='list-item-anchor--social'><svg data-src='<?php echo get_stylesheet_directory_uri() ?>/svgs/font-awesome/facebook.svg' class='list-item-vector--social'></svg></a>
                </li>
                <li class='list-item--social'>
                    <a href='<?php the_field('instagram', 'options'); ?>' rel="nofollow" target="_blank" class='list-item-anchor--social'><svg data-src='<?php echo get_stylesheet_directory_uri() ?>/svgs/font-awesome/instagram.svg' class='list-item-vector--social'></svg></a>
                </li>
                <li class='list-item--social'>
                    <a href='<?php the_field('youtube', 'options'); ?>' rel="nofollow" target="_blank" class='list-item-anchor--social'><svg data-src='<?php echo get_stylesheet_directory_uri() ?>/svgs/font-awesome/youtube.svg' class='list-item-vector--social'></svg></a>
                </li>
                <li class='list-item--social'>
                    <a href='<?php the_field('twitterx', 'options'); ?>' rel="nofollow" target="_blank" class='list-item-anchor--social'><svg data-src='<?php echo get_stylesheet_directory_uri() ?>/svgs/font-awesome/twitter.svg' class='list-item-vector--social'></svg></a>
                </li>           
            </ul>
        </div>
        </div>
        <p class="mrcm-link">© <?php echo Date('Y') . ' ' . get_bloginfo( 'name' ); ?>. All Rights Reserved. Website by <a href="https://marcum.agency" target="_blank" class="">marcum</a>.</p>

    </div>
</footer>
<div id="check-browser" class="notification notification--browser">
    <div class="notification-wrap"></div>
    <section class="notification-body">
        <p>This website is designed for <em>modern</em> browsers. Unfortunately, your browser is not that. Please download or open a <a href="https://outdatedbrowser.com" target="_blank">modern browser</a>, or <button onclick="MRCM.setCookie('outdated-browser--disregard', 'true');MRCM.getById('check-browser').style.display='none'">disregard this message</button> and continue anyway.</p>
    </section>
</div>
<dialog id='lightbox' class='lightbox'>
    <section id='lightbox-container' class='lightbox-container'>
        <div id='lightbox-contents' class='lightbox-contents'><!--  --></div>
        <button id='lightbox-close-btn' class='lightbox-close-btn'><svg class='lightbox-close-btn-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></button>
    </section>
</dialog>



<?php /*
    DON'T add JavaScript files in the HTML directly.
        Instead, enqueue them the "WordPress way" via the
        ./inc/actions.php script like the others have been added. */
wp_footer(); ?>


</body>
</html>
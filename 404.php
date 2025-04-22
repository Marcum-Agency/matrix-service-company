<?php
get_header();

get_template_part( 'partials/header' );
?>
<div class="content container--site__sub">
    <h2 class="headline">We cant seem to Find that.</h2>
    <p>The page you were looking for doesnt exist. It might have been moved or deleted. Please check the URL for any typos or try the navigation menu to find what youre looking for.</p>
    <p>Otherwise, you can return to our homepage by clicking the button below.</p>
    <div>
        <a href="<?php echo bloginfo('url'); ?>" class="cta--magic btn btn-outline">Go to Homepage</a>
    </div>
</div>

<?php get_footer();
<?php

$ID = get_the_ID();
$slug = $post->post_name;
$featured_image_attrs = get_featured_image_attrs( has_post_thumbnail(), get_post_thumbnail_id( $ID ) );
$title = get_the_title();
$html = !empty( get_the_content() ) ? sanitize_wysiwyg( get_the_content() ) : "<p><em>There is no content to show for this page at this time.</em></p>";

?><div class="content container--site__sub">
        <?php echo $html; ?>
    </div>
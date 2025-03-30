<?php

$ID = get_the_ID();
$featured_image_attrs = get_featured_image_attrs( has_post_thumbnail(), get_post_thumbnail_id( $ID ) );
$title = get_the_title();
echo PHP_EOL;

?>
<?php the_content(); ?>
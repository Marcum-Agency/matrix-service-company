<article <?php post_class(); ?>>
    <div class="quote-container">
        <blockquote>
            <?php the_content(); ?>
            <cite>
                <?php echo esc_html( get_the_title() ); ?>,
                <?php echo esc_html( get_field( 'author' ) ); ?>
            </cite>
        </blockquote>
    </div>
</article>
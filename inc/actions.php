<?php



function after_setup_theme_msc(){
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form' ) );
    //show_admin_bar( false );
};



function init_msc(){
    register_nav_menu('site-header', __( 'Site Header' ) );
    register_nav_menu('site-footer', __( 'Site Footer' ) );
};



function wp_enqueue_scripts_msc(){
    wp_enqueue_style(
        'frg-fonts',
        'https://use.typekit.net/wjj8cei.css',
        array(),
        null
    );
    /*wp_enqueue_style(
        'msc-google-fonts',
        'https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,300;0,600;1,300;1,600&family=Barlow:ital,wght@0,300;0,500;0,700;1,300;1,500;1,700&display=swap',
        array(),
        null
    );*/
    wp_enqueue_style(
        'style',
        get_template_directory_uri() . '/style.css?v=' .rand(10000, 99999)
    );
    wp_enqueue_style(
        'blame',
        get_template_directory_uri() . '/blame.css'
    );
    wp_enqueue_script(
        'svg-loader',
        'https://unpkg.com/external-svg-loader@latest/svg-loader.min.js',
        array(),
        false,
        array(
            'strategy' => 'async',
            'in_footer' => false
        )
    );
    wp_enqueue_script(
        'mrcm',
        get_template_directory_uri(). '/javascript/mrcm.js?v' .rand(10000, 99999),
        array(),
        false,
        true
    );
    wp_enqueue_script(
        'app',
        get_template_directory_uri(). '/javascript/app.js?v' .rand(10000, 99999),
        array( 'mrcm' ),
        false,
        true
    );
    wp_enqueue_script(
        'swiperjs',
        "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js",
        array(),
        false,
        true
    );   
    wp_enqueue_script(
        'odometer',
        get_template_directory_uri(). '/javascript/odometer.min.js?v' .rand(10000, 99999),
        array(),
        false,
        true
    ); 
    wp_localize_script(
        'app',
        'MAGIC',
        array(
            'appName' => 'MSC',
            'apiUrl' => admin_url( 'admin-ajax.php' )
        )
    );
    wp_enqueue_script( 'ScrollMagic js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array( 'jquery' ), date('Y-m-d'), true );
    wp_enqueue_script( 'animationgsap js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js', array( 'jquery' ), date('Y-m-d'), true );
    wp_enqueue_script( 'scrollmagicindicators js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array( 'jquery' ), date('Y-m-d'), true );
    wp_enqueue_script( 'gsap js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js', array( 'jquery' ), date('Y-m-d'), true );
    
    wp_enqueue_script(
        'custom js',
        get_template_directory_uri() . '/javascript/custom.js',
        array( 'jquery' ),
        date('Y-m-d'),
        true
    );
    
    



    wp_dequeue_style( 'classic-theme-styles' );
    // wp_dequeue_style( 'global-styles' );
    // wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
};

function generateBreadcrumb() {

    if (!function_exists('get_home_url')) {
        return;
    }
    
    global $post;
    $breadcrumb = [];
    
    if(is_singular( array('project','capability','market') )) {

        $post_type = get_post_type_object(get_post_type());
        $archive_link = get_post_type_archive_link($post_type->name);
        $slug = $post_type->rewrite;
        $parent_id  = $post->post_parent;


        $breadcrumb[] = "<a href='" . $archive_link . "'>" . $post_type->labels->singular_name . "</a>";
        if($parent_id != 0) {
            $parent = get_post($parent_id);
            $breadcrumb[] = "<a href='" . get_permalink($parent) . "'>" . $parent->post_title . "</a>";
        }

        $breadcrumb[] = "<span>" . get_the_title() . "</span>";
    } elseif (is_single()) {

    } elseif (is_single()) {
        $categories = get_the_category();
        if ($categories) {
            $category = $categories[0];
            $breadcrumb[] = "<a href='" . esc_url(get_category_link($category->term_id)) . "'>" . esc_html($category->name) . "</a>";
        }
        $breadcrumb[] = "<span>" . get_the_title() . "</span>";
    } elseif (is_page() && !is_front_page()) {
        $parents = get_post_ancestors($post);
        if ($parents) {
            $parents = array_reverse($parents);
            foreach ($parents as $parent) {
                $breadcrumb[] = "<a href='" . esc_url(get_permalink($parent)) . "'>" . esc_html(get_the_title($parent)) . "</a>";
            }
        }
        $breadcrumb[] = "<span>" . get_the_title() . "</span>";
    } elseif (is_category()) {
        $breadcrumb[] = "<span>" . single_cat_title('', false) . "</span>";
    } elseif (is_tag()) {
        $breadcrumb[] = "<span>" . single_tag_title('', false) . "</span>";
    } elseif (is_archive()) {
        $breadcrumb[] = "<span>" . get_the_archive_title() . "</span>";
    } elseif (is_search()) {
        $breadcrumb[] = "<span>Search results for: " . get_search_query() . "</span>";
    } elseif (is_404()) {
        $breadcrumb[] = "<span>Page Not Found</span>";
    }
    
    echo "<div class='breadcrumbs'>" . implode(' > ', $breadcrumb) . "</div>";
}

<?php
add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');
function child_theme_enqueue_styles()
{

    $parent_style = 'jobbrs-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style('bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-style', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('roboto-style', 'https://fonts.googleapis.com/css?family=Roboto&display=swap');
    wp_enqueue_script('jquery-version', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array('jquery'));
    wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'));
}
/**
 *  Custom Post Type additions.
 */
require get_stylesheet_directory() . '/inc/custom_post_type.php';
// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more)
{
    global $post;
    return '<br><br><a class="moretag" href="' . get_permalink($post->ID) . '"> Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

if (!file_exists(get_stylesheet_directory() . '/class-wp-bootstrap-navwalker.php')) {
    // File does not exist... return an error.
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
    // File exists... require it.
    require_once get_stylesheet_directory() . '/class-wp-bootstrap-navwalker.php';
}
register_nav_menus(
    array(
        'menu-2' => __('Top', 'twentynineteen'),
    )
);
function custom_type_archive_display($query)
{
    global $wp_query;
    if ((is_post_type_archive('news') && ($query->is_main_query())) || ($query->is_tax('news-tag') && ($query->is_main_query()))) {
        $query->set('posts_per_page', 2);
        $query->set('orderby', 'date');
        $query->set('order', 'DESC');
        return;
    }
    wp_reset_query();
}
add_action('pre_get_posts', 'custom_type_archive_display');

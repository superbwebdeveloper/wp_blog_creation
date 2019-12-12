<?php
function jobbrs_post_type()
{
    //register taxonomy for custom post tags
    register_taxonomy(
        'news-tag', //taxonomy 
        'news', //post-type
        array(
            'hierarchical'  => false,
            'label'         => __('News Tags', 'News Tag'),
            'singular_name' => __('Tag', 'News Tag'),
            'rewrite'       => true,
            'query_var'     => true
        )
    );
    $labels = array(
        'name'               => __('News'),
        'singular_name'      => __('News'),
        'add_new'            => __('Add New News'),
        'add_new_item'       => __('Add New News'),
        'edit_item'          => __('Edit News'),
        'new_item'           => __('Add New News'),
        'view_item'          => __('View News'),
        'search_items'       => __('Search News'),
        'not_found'          => __('No News found'),
        'not_found_in_trash' => __('No News found in trash')
    );
    $supports = array(
        'title',
        'thumbnail',
        'page-attributes',
        'revisions',
        'editor'
    );
    $args = array(
        'labels'               => $labels,
        'supports'             => $supports,
        'public'               => true,
        'capability_type'      => 'post',
        'rewrite'              => array('slug' => 'news'),
        'has_archive'          => true,
        'menu_position'        => 30,
        'menu_icon'            => 'dashicons-camera-alt',
        'taxonomies'           => array('news-tag')
    );
    register_post_type('news', $args);
}
add_action('init', 'jobbrs_post_type');

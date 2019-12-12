<?php
$args_sidebar = array('post_type' => 'news',  'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 10);
$the_query_sidebar = new WP_Query($args_sidebar);
?>
<?php if ($the_query_sidebar->have_posts()) {
    ?>
    <h4>RECOMENDED POSTS</h4>
    <ul class="news_post_list">
        <?php
            $count_post = 1;
            while ($the_query_sidebar->have_posts()) : $the_query_sidebar->the_post();
                $current_class = (($current_id == $the_query_sidebar->post->ID) || ($count_post == "1")) ? 'class="current"' : '';
                ?>
            <li><a <?php if ($current_class) echo $current_class; ?> href="<?php echo get_permalink($the_query_sidebar->post->ID); ?>"><?php echo  $the_query_sidebar->post->post_title; ?></a></li>
        <?php
                $count_post++;
            endwhile;
            ?>
    </ul>
<?php
}
?>

<h4>Tags</h4>
<ul class="news_tag_list">
    <?php
    $tags = get_tags(array('taxonomy' => 'news-tag'));
    if ($tags) :
        foreach ($tags as $tag) : ?>
            <li><a href="<?php echo esc_url(get_tag_link($tag->term_id));
                                    ?>" title="<?php echo esc_attr($tag->name); ?>"><?php echo esc_html($tag->name); ?></a></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
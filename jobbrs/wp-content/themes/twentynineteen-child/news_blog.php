<?php
/* Template Name: News Blog */
get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-xl-8 news_block">
            <?php
            //  global $the_query_p;
            $paged2 = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args_p = array('post_type' => 'news', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => '2', 'paged' => $paged2);
            $the_query_p = new WP_Query($args_p);
            // echo $the_query_p->request;
            ?>
            <?php if ($the_query_p->have_posts()) {
                $count_home_banner = $the_query_p->post_count;
                $feat_image = "";
                while ($the_query_p->have_posts()) : $the_query_p->the_post();
                    ?>
                    <!-- Blog Post -->
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-9 pl-0">
                                    <h3><?php echo  $the_query_p->post->post_title; ?></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-7 pl-0">
                                    <span class="author_link"><i class="fa fa-square fa-2x" aria-hidden="true"></i>
                                        <?php echo get_the_author_link($the_query_p->post->ID); ?></span>
                                    <div class="card-text"><?php echo get_the_excerpt($the_query_p->post->ID); ?></div>
                                </div>
                                <div class="col-xl-5 pl-0">
                                    <?php
                                            if (has_post_thumbnail()) {
                                                $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($the_query_p->post->ID), 'photos-list');
                                                $p_image = $feat_image[0];
                                                ?>
                                        <div class="col-xl-11 <?php echo $the_query_p->post->ID; ?> <?php echo $the_query_p->post->post_title; ?>">
                                            <img class="card-img-top" src="<?php echo $p_image; ?>" alt="" />
                                        </div>
                                    <?php
                                            }
                                            ?>

                                </div>
                            </div>
                        </div>

                    </div>
                <?php
                    endwhile;
                    ?>
                <div class="news_pagination float-right"><?php
                                                                echo paginate_links(array(
                                                                    "current" => $paged2,
                                                                    "total" => $the_query_p->max_num_pages
                                                                ));
                                                                ?>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-xl-4 news_sidebar">

            <?php get_sidebar('news'); ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>
<?php
get_header();
global $wp_query;
?>
<div class="container">
    <div class="row">
        <div class="col-xl-8 news_block">
            <?php
            $paged2 = (get_query_var('paged')) ? get_query_var('paged') : 1;
            if (have_posts()) {
                $feat_image = "";
                while (have_posts()) : the_post();
                    ?>
                    <!-- Blog Post -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-9 pl-0">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-7 pl-0">
                                    <span class="author_link"><i class="fa fa-square fa-2x" aria-hidden="true"></i>
                                        <?php the_author_link(); ?></span>
                                    <div class="card-text"><?php echo the_excerpt(); ?></div>
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
                                                                    "total" => $wp_query->max_num_pages
                                                                ));
                                                                ?>
                </div>
            <?php
            }
            wp_reset_query();
            ?>
        </div>
        <div class="col-xl-4 news_sidebar">
            <?php get_sidebar('news'); ?>
        </div>
        <?php
        get_footer();
        ?>
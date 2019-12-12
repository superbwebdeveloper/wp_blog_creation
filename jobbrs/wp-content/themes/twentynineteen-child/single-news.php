<?php
get_header();
$current_id = $post->ID;
?>
<div class="container">
    <div class="row">
        <div class="col-xl-12 news_block">
            <?php if (have_posts()) {

                $feat_image = "";
                while (have_posts()) : the_post();
                    ?>
                    <!-- Blog Post -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-9 pl-0">
                                    <h3><?php the_title() ?></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-7 pl-0">
                                    <span class="author_link"><i class="fa fa-square fa-2x" aria-hidden="true"></i>
                                        <?php echo get_the_author($post->ID); ?></span>
                                    <div class="card-text"><?php echo the_content(); ?></div>
                                </div>
                                <div class="col-xl-5 pl-0">
                                    <?php
                                            if (has_post_thumbnail()) {
                                                $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'photos-list');
                                                $p_image = $feat_image[0];
                                                ?>
                                        <div class="col-xl-11 <?php echo $post->ID; ?> <?php echo get_the_title($post->ID); ?>">
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
            }
            ?>
        </div>

    </div>
</div>
<?php
get_footer();
?>
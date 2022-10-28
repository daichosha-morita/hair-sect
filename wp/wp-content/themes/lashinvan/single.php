<?php get_header(); ?>
<ul class="pankuzu clearfix container">
    <li><a href="../index.html"><i class="fa fa-home" aria-hidden="true"></i></a> </li>
    <li><a href="../wp">ブログ</a></li>
    <li><?php the_title(); ?></li>
</ul>
<div class="blog">
    <h2>BLOG</h2>
    <div class="container">




        <div class="row blog_post">

            <div class="col-md-8 col-sm-8">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="bg_content">
                        <p class="tit"><?php the_title(); ?></p>
                        <p class="day"><?php echo get_the_date(); ?>｜
                            <?php
                            $str = '';
                            foreach ((get_the_category()) as $cat) {
                                $str .= $cat->cat_name . ', ';
                            }
                            echo rtrim($str, ", ");
                            ?>
                        </p>

                        <ul class="post-categories">
                            <?php $categories = get_the_category();
                            if ($categories) {
                                foreach ($categories as $category) {
                                    echo '<li class="' . $category->slug . '">' . $category->cat_name . '</li>';
                                }
                            }; ?>
                        </ul>

                        <p class="thumb"> <?php the_post_thumbnail('blog_thumbnail_02'); ?></p>
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>

                        <?php if (function_exists("wp_social_bookmarking_light_output_e")) {
                            wp_social_bookmarking_light_output_e();
                        } ?>

                    </div>

                <?php endwhile; ?>




            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
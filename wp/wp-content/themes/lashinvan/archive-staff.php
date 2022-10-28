<?php get_header(); ?>




<ul class="pankuzu clearfix container">
    <li><a href="../index.html"><i class="fa fa-home" aria-hidden="true"></i></a> </li>
    <li>スタッフ</li>
</ul>
<div class="staff">
    <h2>STAFF</h2>
    <div class="container">

        <div class="row">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="col-md-12">
                        <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>


        <div class="pagenavi">
            <?php if (function_exists('wp_pagenavi')) {
                wp_pagenavi();
            } ?>
        </div>

    </div>
</div>



<?php get_footer(); ?>
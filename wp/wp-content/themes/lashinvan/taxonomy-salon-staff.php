<?php get_header(); ?>

<!-- メインビジュアル -->

<h1 class="main_visual"><img src="<?php bloginfo('template_directory'); ?>/img/staff/ph_main.jpg" height="800" width="2160" alt="STAFF" class="img-responsive"></h1>
<!-- メインビジュアルここまで -->

<div class="container-fluid">
    <div class="row staff">
        <h2><img src="<?php bloginfo('template_directory'); ?>/img/staff/ttl01.png" width="512" alt="STAFF INTRODUCTION"/><span>スタッフ紹介</span></h2>
        <h3 class="col-md-12">
            <?php single_term_title('', true); ?>
        </h3>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <a href="<?php the_permalink(); ?>">
        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 matchHeight">
            <p class="ph">
                <?php the_post_thumbnail('staff_thumbnail'); ?>
            </p>
            <p class="position">
                <?php the_field('肩書',$post->ID); ?>
            </p>
            <p class="name">
                <?php the_title(); ?>
            </p>
           <?php if(get_post_meta($post->ID, 'ブログurl', true)): ?>
            <p class="blog"><a href="<?php the_field('ブログurl',$post->ID); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/staff/bt_blog.png" alt="BLOG" class="img-responsive"/></a></p>
            <?php endif; ?>

            <?php if(get_post_meta($post->ID, '予約url', true)): ?>
            <p class="reserve"><a href="<?php the_field('予約url',$post->ID); ?>" target="_blank" onClick="ga('send', 'event', 'reserve', 'click', 'staff',0);"><img src="<?php bloginfo('template_directory'); ?>/img/staff/bt_staff_reserve.gif" alt="指名予約をする" class="img-responsive"/></a></p>
            <?php endif; ?>

        </div>
        <a>
        <?php endwhile; endif; ?>
        <div class="col-md-12" style="clear: both;">
            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
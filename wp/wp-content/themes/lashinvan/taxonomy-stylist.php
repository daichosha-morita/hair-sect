<?php get_header(); ?>

<ul class="pankuzu clearfix container">
    <li><a href="/index.html"><i class="fa fa-home" aria-hidden="true"></i></a> </li>
    <li><a href="/wp/style/">スタイル</a></li>
    <li>
        <?php single_tag_title(); ?>
    </li>
</ul>
<div class="style">
    <h2>STYLE</h2>
    <div class="container">
        <ul class="snav clearfix">
            <li><a href="/wp/style">全てのスタイル</a></li>
            <li><a href="/wp/length/short">ショートスタイル</a></li>
            <li><a href="/wp/length/medium">ミディアムスタイル</a></li>
            <li><a href="/wp/length/long">ロングスタイル</a></li>
        </ul>
        <p class="cat_tit">
            <?php single_tag_title(); ?>
        </p>
        <div class="row style_list">
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <div class="col-md-4 col-sm-4 col-xs-6 matchHeight">
                <p class="ph"><a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('style_thumbnail'); ?>
                    </a></p>
                <p class="tit">
                    <?php the_title(); ?>
                </p>
                <p class="name">担当：
                    <?php the_field('担当',$post->ID); ?>
                </p>
            </div>
            <?php endwhile; endif; ?>
        </div>
        <div class="pagenavi">
            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

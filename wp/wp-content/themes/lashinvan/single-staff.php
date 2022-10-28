

<?php get_header(); ?>


<ul class="pankuzu clearfix container">
    <li><a href="../index.html"><i class="fa fa-home" aria-hidden="true"></i></a> </li>
    <li>スタッフ</li>
    <li><?php the_title(); ?></li>
</ul>
<div class="staff">
    <h2>STAFF</h2>
    <div class="container">
        <div class="row staff_data">
            <div class="col-md-5 col-md-offset-1 col-sm-6 col-xs-12">
                <p class="ph"><?php the_post_thumbnail('staff_thumbnail'); ?></p>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12 data">


                <p class="position"><?php
if ($terms = get_the_terms($post->ID, 'salon-staff')) {
    foreach ( $terms as $term ) {
        echo '' . esc_html($term->name) . '';
    }
}
?><?php the_field('肩書',$post->ID); ?></p>
                <h3 class="tit"><?php the_title(); ?></h3>
                <p class="ruby"><?php the_field('読み仮名',$post->ID); ?></p>
                <dl class="prof">
                    <dt>誕生日</dt>
                    <dd><?php the_field('誕生日',$post->ID); ?></dd>
                    <dt>趣味</dt>
                    <dd><?php the_field('趣味',$post->ID); ?></dd>

                    <?php if(get_post_meta($post->ID, '得意なスタイル', true)): ?>
                    <dt>得意なスタイル</dt>
                    <dd><?php the_field('得意なスタイル',$post->ID); ?></dd>
                     <?php endif; ?>
                </dl>
                <?php if(get_post_meta($post->ID, 'ブログ', true)): ?>
                <p class="blog"><a href="<?php the_field('ブログ',$post->ID); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> BLOG</a></p>
                <?php endif; ?>
                <?php if(get_post_meta($post->ID, 'インスタグラム', true)): ?>
                <p class="blog"><a href="<?php the_field('インスタグラム',$post->ID); ?>"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></p>
                <?php endif; ?>
                <?php if(get_post_meta($post->ID, '指名予約', true)): ?>
                <p class="blog"><a href="<?php the_field('指名予約',$post->ID); ?>"><i class="fa fa-hand-o-right" aria-hidden="true"></i> 指名して予約</a></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row intro">
            <dl class="col-md-5 col-md-offset-1 col-sm-6 col-xs-12">
                <dt>INTRODUCTION</dt>
                <dd><?php the_field('コメント',$post->ID); ?></dd>
            </dl>
            <?php if(get_post_meta($post->ID, '動画url', true)): ?>
            <div class="movie col-md-5 col-sm-6 col-xs-12">
 <iframe width="420" height="315" src="https://www.youtube.com/embed/<?php the_field('動画url',$post->ID); ?>" frameborder="0" allowfullscreen></iframe></div>
       <?php endif; ?>
        </div>
        <div class="row other_style">




             <?php while (have_posts()) : the_post(); ?>
             <?php the_content(); ?>
             <?php endwhile; ?>


        </div>
    </div>
</div>








<?php get_footer(); ?>
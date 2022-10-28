 <?php get_header(); ?>
 <ul class="pankuzu clearfix container">
    <li><a href="../index.html"><i class="fa fa-home" aria-hidden="true"></i></a> </li>
    <li><a href="/wp/style/">スタイル</a></li>
    <li><?php the_title(); ?></li>
</ul>
<div class="style">
    <h2>STYLE</h2>
    <div class="container">
        <div class="row style_data">
            <div class="col-md-5 col-md-offset-1 col-sm-6 col-xs-12">
                <p class="ph"><?php the_post_thumbnail('style_thumbnail'); ?></p>






                <div class="row sub_ph">

                <?php if(get_post_meta($post->ID, 'サブ画像01', true)): ?>
                    <p class="col-md-4 col-sm-4 col-xs-6 ph"><?php
    $attachment_id = get_field('サブ画像01');
    $size = "style_thumbnail"; // (thumbnail, medium, large, full or custom size)
    $image = wp_get_attachment_image_src( $attachment_id, $size );
    $attachment = get_post( get_field('サブ画像01') );
    $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', false);
    $image_title = $attachment->post_title;
?>
                <img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" class="img-responsive" /></p>

<?php endif; ?>

<?php if(get_post_meta($post->ID, 'サブ画像02', true)): ?>

                    <p class="col-md-4 col-sm-4 col-xs-6 ph"><?php
    $attachment_id = get_field('サブ画像02');
    $size = "style_thumbnail"; // (thumbnail, medium, large, full or custom size)
    $image = wp_get_attachment_image_src( $attachment_id, $size );
    $attachment = get_post( get_field('サブ画像02') );
    $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', false);
    $image_title = $attachment->post_title;
?>
                <img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" class="img-responsive" /></p>
<?php endif; ?>

<?php if(get_post_meta($post->ID, 'サブ画像03', true)): ?>
                    <p class="col-md-4 col-sm-4 col-xs-6 ph"><?php
    $attachment_id = get_field('サブ画像03');
    $size = "style_thumbnail"; // (thumbnail, medium, large, full or custom size)
    $image = wp_get_attachment_image_src( $attachment_id, $size );
    $attachment = get_post( get_field('サブ画像03') );
    $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', false);
    $image_title = $attachment->post_title;
?>
                <img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" class="img-responsive" /></p>

<?php endif; ?>





                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12 data">
                <h3 class="tit"><?php the_title(); ?></h3>
                <p class="txt"><?php the_field('コメント',$post->ID); ?></p>
                <p class="stylist">担当：<?php the_field('担当',$post->ID); ?></p>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<?php get_header(); ?>

<div class="blog">
    <div class="container">

        <div class="row blog_post" id="contactForm">

            <div class="col-md-8 col-md-offset-2">
             <?php while (have_posts()) : the_post(); ?>
                <div class="bg_content">
                    <p class="tit"><?php the_title(); ?></p>
                <?php
$str = '';
foreach((get_the_category()) as $cat){
	$str .= $cat->cat_name . ', ';
}
echo rtrim($str, ", ");
?>
            </p>
                 
                <?php the_category(''); ?>
           
                    <p class="thumb"> <?php the_post_thumbnail('blog_thumbnail_02' ); ?></p>
                    <div class="post-content">
                         <?php the_content(); ?>
                    </div>
                    
                    <?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e();}?>
                    
                </div>
                
                 <?php endwhile; ?>
                 
                 
                 
                 
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
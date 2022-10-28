<?php get_header(); ?>  

  <ul class="pankuzu clearfix container">
   <li><a href="/index.html"><i class="fa fa-home" aria-hidden="true"></i></a> </li>
   <li>ブログ</li>
</ul>
<div class="blog">
<h2>BLOG</h2>
<div class="container">
    <div class="row blog_list">
        <?php if($monthnum||$year||$cat){ ?>
        <?php if($cat){ ?>
        <?php
	$cat = get_the_category();
	$cat = $cat[0];
?>
        <div class="col-md-12">
            <p class="cat_tit">
                <?php single_cat_title(); ?>
                <?php }elseif($monthnum||$year){ ?>
            
            <div class="col-md-12">
                <p class="cat_tit"><?php echo $year.'年'; ?>
                    <?php if($monthnum){ echo $monthnum.'月';} } ?>
                </p>
            </div>
            <?php } ?>
            <div class="col-md-8 col-sm-8">
                <?php while (have_posts()) : the_post(); ?>
                <div class="row article clearfix">
                    <p class="ph col-md-3 col-sm-3 col-xs-3"><a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('blog_thumbnail_01' ); ?>
                        </a></p>
                    <div class="data col-md-9 col-sm-9 col-xs-9">
                        <p class="tit"><a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                            </a></p>
                        <?php echo get_the_date(); ?>
						<ul class="post-categories">
							<?php $categories = get_the_category();
           if($categories){
           foreach($categories as $category) {
              echo '<li class="'.$category->slug.'">'.$category->cat_name.'</li>' ;}
      };?>
						</ul>
                        <p class="txt"><?php echo mb_substr(strip_tags($post->post_content), 0, 100); ?>...</p>
                        <p class="more"><a href="<?php the_permalink(); ?>">MORE</a></p>
                    </div>
                </div>
                <?php endwhile; ?>
                <div class="pagenavi">
                    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
                </div>
            </div>
            
            <?php get_sidebar(); ?>
            
        </div>
    </div>
</div>

<?php get_footer(); ?>
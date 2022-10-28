<div class="sidebar col-md-4 col-sm-4">
                <h3><i class="fa fa-pencil" aria-hidden="true"></i> NEW</h3>
                <ul class="new_post clearfix">
                    <?php query_posts('posts_per_page=3'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <li class="row clearfix"> <a href="<?php the_permalink(); ?>">
                        <div class="ph col-md-4 col-sm-4 col-xs-3"><?php the_post_thumbnail('blog_thumbnail_01' ); ?></div>
                        <dl class="col-md-8 col-sm-8 col-xs-9">
                            <dt>
                                <?php the_title(); ?>
                            </dt>
                            <dd><?php echo mb_substr(strip_tags($post->post_content), 0, 100); ?>..</dd>
                        </dl>
                        </a></li>
                    <?php endwhile;?>
                </ul>
                <h3><i class="fa fa-pencil" aria-hidden="true"></i> CATEGORY</h3>
                <ul class="archive">
                    <?php wp_list_categories('orderby=count&order=desc&title_li='); ?>
                </ul>
                <h3><i class="fa fa-pencil" aria-hidden="true"></i> ARCHIVES</h3>
                <ul class="archive">
                    <?php wp_get_archives('type=monthly'); ?>
                </ul>
            </div>
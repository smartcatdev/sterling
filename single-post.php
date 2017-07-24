<?php
get_header(); ?>

	<div id="primary" class="content-area"> 
		<main id="main" class="site-main">

                    <div id="single-post-container" class="container">
                        
                        <div class="row">
                            
                            <div id="single-post" class="col-md-9">
                        
                                <?php while ( have_posts() ) : the_post(); ?>
                                
                                    <div id="single-post-title">

                                        <div id="single-post-title-img" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) center;">
                                            <?php echo get_the_post_thumbnail(); ?>
                                        </div>

                                        <div id="single-post-title-text">

                                            <h4><?php echo get_the_title(); ?></h4>

                                            <a href="<?php echo get_the_author_meta('user_url'); ?>">
                                                By <?php echo get_the_author_meta('display_name'); ?>
                                            </a>

                                            <span></span>

                                            <p><?php echo get_the_date('m/d/Y'); ?></p>

                                            <span></span>

                                            <a href="<?php echo get_comment_link(); ?>">
                                                <?php echo get_comments_number() . ' '; ?>Comments
                                            </a>

                                        </div>

                                    </div>
                                    <div id="single-post-content">

                                        <?php echo get_the_content(); ?>

                                    </div>

                                    <span id="content-divider"></span>

                                    <div id="single-post-tags">

                                        <?php $tags = get_the_tags(); ?> 

                                        Tags: 

                                        <?php foreach ( $tags as $tag ) : ?>

                                            <a class="btn btn-warning"
                                               href="<?php bloginfo('url');?>/tag/<?php echo ($tag->slug);?>">
                                                     <?php echo ($tag->name); ?>
                                            </a> 

                                        <?php endforeach; ?>

                                    </div>

                                    <div id="single-post-author-info">
                                        <div id="single-post-author-img" style="background: url(<?php echo ltrim(get_avatar_url(the_author_meta('ID'), 64), '1'); ?>)">
                                        </div>
                                    </div>

                                    <?php // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                            comments_template();
                                    endif;

                                endwhile; // End of the loop. ?>
                        
                            </div>
                            
                            <div id="single-post-sidebar" class="col-md-3">
                                
                                <?php get_sidebar(); ?>
                                
                            </div>
                            
                        </div>    
                            
                    </div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
sterling_get_custom_footer();
get_footer();
<?php
/*
Template Name: News
*/
?>

<?php get_header(); ?>
            
            
            
            <div id="content" class="clearfix">
            
                <div id="main" class="col664 clearfix" role="main">

                    <?php $first_query = new WP_Query( 'post_type=post' ); // get posts
                    while($first_query->have_posts()) : $first_query->the_post(); ?>

                    
                    <div id="thepost" class="clearfix">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                        <div id="date"><h3><?php echo get_the_date('m-d-Y'); ?></h3></div>
                        <div id="postcontent">
                                <?php the_post_thumbnail('medium');?>
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                    
                                    <div class="entry-summary">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
                                        <?php 
                                        global $more;    // Declare global $more (before the loop).
                                        $more = 0;       // Set (inside the loop) to display content above the more tag.
                                        the_content("More...");
                                        ?>
                                    </div><!-- .entry-summary -->
                        
                                <footer>
                                <!--<?php echo do_shortcode('[fbcomments width="375" count="off" num="3" countmsg=" comments!"]'); ?>-->
                                </footer>
                        </div>
                                </article><!-- #post-## -->
                        </div> <!-- end theposts div -->
                        
                    <?php endwhile; ?>

                                
                </div> <!-- end #main -->
    
                <?php get_sidebar(); // sidebar 1 ?>
    
            </div> <!-- end #content -->

<?php get_footer(); ?>
<?php get_header(); ?>
<?php 
    /**
     * Home.php is the Blog template. If the 
     * static home page option is not chosen,
     * this will be the template used for the home page
    */
?>

<?php 
    /**
     * Custom pagination arguments
     * Will override the "Blog pages show at most"
     * in the reading settings of the site to 5 max
     */
    // $currentPage = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1; // Get a valid 'paged' var or return 1
    // $args = array('posts_per_page' => 5, 'paged' => $currentPage);
    // query_posts($args); // This query is closed at the bottom of code
    
    // $currentPage = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // Get a valid 'paged' var or return 1
    // $args = array(
    //   'posts_per_page' => 5,
    //   'paged'          => $currentPage
    // );

    $the_query = new WP_Query( $args );    
    // Start the post loop
    if( have_posts() ):
        while(have_posts()): the_post();
        	get_template_part( 'post-formats/content', get_post_format() );
        endwhile; ?>
        
        <?php
        /**
         * Pagination
         */
         ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    
                    <ul class="pager">
                        <?php if( get_previous_posts_link() ): ?>
                            <li class="previous"><?php previous_posts_link( 'Newer Posts' ); ?></li>
                        <?php else: ?>
                            <li class="previous disabled" ><a href="#">Newer Posts</a></li>
                        <?php endif; ?>

                        <?php if( get_next_posts_link() ): ?>
                            <li class="next"><?php next_posts_link( 'Older Posts' ); ?></li>
                        <?php else: ?>
                            <li class="next disabled" ><a href="#">Older Posts</a></li>
                        <?php endif; ?>
                        
                    </ul>
                    
                </div>
            </div>
        </div>
        
    <?php endif;
    //wp_reset_postdata();
?>

<?php get_footer(); ?>
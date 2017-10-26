<?php get_header(); ?>
<?php 
    /**
     * Single.php is the template for single posts
    */
?>
<?php 
    if( have_posts() ):
        while(have_posts()): the_post();
        
            if( get_post_format() ){
        	    get_template_part( 'post-formats/content',  get_post_format() );
            }else{
                get_template_part( 'post-formats/content',  'single' );
            } ?>
            
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php if ( comments_open() || get_comments_number() ) {
				        comments_template();
	                }?>
                </div><!--/.col-->
            </div><!--/.row-->
        </div><!--/.container-->
			
        <?php endwhile;
    endif; ?>

<?php get_footer(); ?>
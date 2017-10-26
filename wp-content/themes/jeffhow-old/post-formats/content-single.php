<?php
/**
 * Post format for viewing single posts
 */
?>
<div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <div class="col-xs-12">
            	<header class="entry-header">
                     <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
                    <div>
                        <small>
                            Posted on: <?php the_time('F j, Y'); ?> | 
                            Categories: <?php the_category(', '); ?>
                            <?php the_tags('| Tags: '); ?>
                        </small>
                    </div>
                </header>
            </div><!-- /.col -->
        </div><!-- /.row -->
    
        <div class="row">
            <div class="col-xs-12">
                <?php  if( has_post_thumbnail() ): ?>
                    <div class="pull-right"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
                <?php endif; ?>
                <?php the_content(); ?>
                <?php edit_post_link( 
                    $text = 'Edit', 
                    $before = '(', 
                    $after = ')', 
                    $id = 0, 
                    $class = 'post-edit-link' ); ?>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </article>
</div><!-- /.container -->


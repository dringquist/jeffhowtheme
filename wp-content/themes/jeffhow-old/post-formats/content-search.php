<?php
/**
 * Search results template
 */
?>
<div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <div class="col-xs-12">
            	<header class="entry-header">
                     <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="well well-sm">
                        <small>
                            <a class="search-link" href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a> |
                            Posted on: <?php the_time('F j, Y'); ?> | 
                            Categories: <?php the_category(', '); ?>
                            <?php the_tags('| Tags: '); ?>
                        </small>
                    </div><!--/.well -->
                </header>
            </div><!-- /.col -->
        </div><!-- /.row -->
    
        <div class="row">
            <div class="col-xs-12">
                <?php  if( has_post_thumbnail() ): ?>
                    <div class="pull-right"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
                <?php endif; ?>
                <?php the_excerpt(); ?>
                <?php edit_post_link( 
                    $text = 'Edit', 
                    $before = '(', 
                    $after = ')', 
                    $id = 0, 
                    $class = 'post-edit-link' ); ?>
                <hr/>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </article>
</div><!-- /.container -->


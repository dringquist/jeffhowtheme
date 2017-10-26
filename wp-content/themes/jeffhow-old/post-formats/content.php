<?php
/**
 * Generic content format for posts
 */
?>
<div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <div class="col-xs-12">
            	<header class="entry-header">
                     <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
                    <small><?php the_time('F j, Y'); ?> | <?php the_category(', '); ?></small>
                </header>
            </div><!-- /.col -->
        </div><!-- /.row -->
    
        <div class="row">
            
            <?php 
            $col_width = 'col-sm-12';
            if( has_post_thumbnail() ): $col_width = 'col-sm-9'; ?>
            <div class="col-xs-12 col-sm-3">
                <div class="thumbnail-img"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
            </div><!-- /.col -->
            <?php endif; ?>
            
            <div class="col-xs-12 <?php echo $col_width; ?>"><?php the_content(); ?></div>
        </div><!-- /.row -->
    </article>
    <?php
    /**
    <div>
        <?php get_sidebar( 'sidebar-1' ); ?>
    </div>
    */
    ?>
</div><!-- /.container -->


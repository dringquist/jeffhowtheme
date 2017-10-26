<h3><?php the_title(); ?></h3>
        
<?php
/**
 * Only print dates on posts
 */
 ?>
 
<?php if( ! is_page() ): ?> 
    <small>Posted on <?php the_time('F j, Y'); ?> in <?php the_category(); ?></small>
<?php endif; ?>

<div class="thumbnail-img"><?php the_post_thumbnail( 'thumbnail' ); ?></div>

<?php the_content(); ?>
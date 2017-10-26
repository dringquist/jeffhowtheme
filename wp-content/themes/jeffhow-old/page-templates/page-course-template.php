<?php 
/*
    Template Name: Page Course Template
**/
?>

<?php get_header(); ?>

<?php if( have_posts() ): ?>
    
    <?php while(have_posts()): the_post(); ?>
        
        <h3><?php the_title(); ?></h3>

        <small>Posted on: <?php the_time('F j, Y'); ?></small>

        <?php the_content(); ?>
            
    <?php endwhile; ?>
    
<?php endif; ?>

<?php get_footer(); ?>
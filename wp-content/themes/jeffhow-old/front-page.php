<?php
/**
 * Front-page.php is the custom homepage for this site
 * It will be used if the static home page option is chosen.
 * 
 * Static Home Page outline
 * 1. Header
 *    a. Brand
 *    b. Primary Nav
 * 2. How do I... Jumbotron (About me)
 * 3. three col Course-Page links
 * 4. two col 'latest'
 *    a. four rows of latest posts from non-course categories
 *    b. one latest lesson post
 * 5. Footer
 *    a. Secondary menu
 *    b. copyright
 *    c. social links
 */
?>
<?php 
//===========================================
//               Header 
//===========================================
?>
<?php get_header(); ?>

<?php 
//===========================================
//               Jumbotron 
//===========================================
?>

<?php
$howblog = new WP_Query( 'page_id=18' ); // ID of the 'how do i...' page
if( $howblog->have_posts() ):
    while( $howblog->have_posts() ): $howblog->the_post(); ?>
        <div class="container">
            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="jumbotron text-center" style="background-image: url('<?php echo $backgroundImg[0]; ?>'); background-position: 50% 25%;">
                <h1><?php the_title(); ?></h1>
        
                <?php the_excerpt(); ?>
                
                <p><a class="btn btn-primary btn-lg" href="<?php the_permalink(); ?>" role="button">Read more</a></p>
                
            </div><!-- /.jumbotron -->
        </div><!-- /.container -->
    <?php endwhile; ?>
<?php endif; 
wp_reset_postdata(); ?>


<?php 
//===========================================
//               3 col Course-Page links 
//===========================================
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 home-section-header">
            <hr/><h4>Courses</h4>
        </div>
    </div>
    
    <?php // $categories = get_categories(); print_r($categories); ?>
    <?php $courses = array( 'exploring-programming-course' ,'wordpress-course', 'gamedev-course'); ?>
    <div class="row">
        <?php foreach($courses as $course): 
            $howcoursepost = new WP_Query( 'pagename='.$course );
            while( $howcoursepost->have_posts() ): $howcoursepost->the_post(); ?>
                <div class="col-xs-12 col-sm-4">
                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                    <div class="panel panel-default course-panel" style="background-image: url('<?php echo $backgroundImg[0]; ?>'); background-position: 50% 35%;">
                        <div class="panel-body">
                            <div class="course-circle">&nbsp;</div>
                            <h3 class="course-title text-center"><?php the_title(); ?></h3>
                        </div><!-- /.panel-body -->
                        <div class="panel-footer">
                            <!-- Bottom Part -->
                            <small>Posted on: <?php the_time('F j, Y'); ?></small>
                            <?php the_excerpt(); ?>
                            <p><a class="btn btn-primary btn-sm" href="<?php the_permalink(); ?>" role="button">View Course</a></p>
                        </div><!-- /.panel-footer -->
                    </div><!-- /.panel -->
                </div>            
            <?php
            endwhile;
            wp_reset_postdata();
        endforeach; ?>
    </div><!-- /.row -->
    
</div><!-- /.container -->

<?php 
//===========================================
//               2 col latests **** 
//===========================================
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 home-section-header">
            <hr/><h4>Latest Posts</h4>
        </div>
    </div>

    <div class="row">
        <?php // four rows of posts ?>
        <div class="col-xs-12 col-sm-7">
            <?php
                $how_noncourse_post = new WP_Query( 'type=post&posts_per_page=4&category__not_in=7' ); //four latest posts, excluding courses
                if( $how_noncourse_post->have_posts() ):
                    while( $how_noncourse_post->have_posts() ): $how_noncourse_post->the_post(); ?>
                        <div class="row home-post-row">
                            <div class="col-xs-12 home-outer-post">
                                <div class="home-inner-post">
                                    <h3><a href="<?php the_permalink(); ?>" class="home-post-link"><?php the_title(); ?></a></h3>
                
                                    <small>Posted on: <?php the_time('F j, Y'); ?></small>
                            
                                    <?php // the_content(); ?>
                                </div><!-- /.home-inner-post -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    <?php endwhile; ?>
                <?php endif; 
                wp_reset_postdata() ?>
        </div><!-- /.col -->
        
        <?php // one post ?>
        <div class="col-xs-12 col-sm-5">
        <?php
            $latestblog = new WP_Query( 'type=post&posts_per_page=1&category__in=7' ); //One latest post from a course
            if( $latestblog->have_posts() ):
                while( $latestblog->have_posts() ): $latestblog->the_post(); ?>
                <div class="panel panel-default home-latest-lesson">
                    <div class="panel-heading">
                        <h3><?php the_title(); ?></h3>
                        <small>Posted on: <?php the_time('F j, Y'); ?></small>
                    </div><!-- /.panel-header -->
                    <div class="panel-body">
                        <?php the_excerpt(); ?>
                        <p><a class="btn btn-primary btn-sm" href="<?php the_permalink(); ?>" role="button">View Lesson</a></p>
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
                <?php endwhile; ?>
            <?php endif; 
            wp_reset_postdata(); 
        ?>
        </div><!-- /.col -->
    </div><!-- /.row -->

</div><!-- /.container -->

<?php 
//===========================================
//               Footer 
//===========================================
?>
<?php get_footer(); ?>
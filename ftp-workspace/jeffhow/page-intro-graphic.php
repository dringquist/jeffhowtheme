<?php
    /**
     * Template Name: Page with Intro Graphic
     * @package WordPress
     * @subpackage JeffHow
     */
?>
<?php get_header(); ?>

  <div class="row">
    <div class="col-sm-7 site-content">

      <?php
        if( has_post_thumbnail() ): ?>
          <div class="row hidden-xs"><div class="col-sm-12 intro-graphic"><?php the_post_thumbnail('full','class=img-responsive'); ?></div></div>
      <?php endif; ?>

<?php
  if( have_posts() ):
    while(have_posts()): the_post();

      get_template_part( 'post-formats/content',  'page' ); ?>



      <div class="row">
        <div class="col-xs-12">
          <?php if ( comments_open() || get_comments_number() ):
	          comments_template();
          endif; ?>
        </div><!--/.col-->
      </div><!--/.row-->

    <?php endwhile;

  endif; ?>

  </div><!--/.col site-content -->

  <div class="col-sm-5 widget-column">
    <?php get_sidebar('adsense'); ?>
  </div><!-- /.col sidebar -->

</div><!-- /.row -->

<?php get_footer(); ?>

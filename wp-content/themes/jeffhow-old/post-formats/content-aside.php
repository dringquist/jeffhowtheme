<?php
/**
 * Aside post format
 */
 ?>
<div class="container">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
      <div class="col-xs-12">
        
      <?php if( is_singular() ): ?>
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
      <?php endif; ?>
        
        <div class="aside-panel">
          <?php the_content(); ?>
        </div><!--/.aside-panel-->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </article>
</div><!-- /.container -->
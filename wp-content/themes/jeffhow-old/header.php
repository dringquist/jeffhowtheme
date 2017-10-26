<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>
    
  </head>
  
  <?php
    /**
     * Defines custom class for front page
     */
    $jeffhow_custom_class = array();
    if( is_front_page() ):
      $jeffhow_custom_class = array('jeff-how-static-home');
    endif;
  ?>
  
  <body <?php body_class($jeffhow_custom_class); ?> >
    <div class="container">

          <nav class="navbar navbar-default">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                      <span class="jeff">Jeff</span><span class="how">.how</span>
                    </a>
                  </div><!-- /.navbar-header -->
                  <?php 
                    /**
                     * Primary menu hook
                     * Defined in 'functions.php'
                     */
                    //wp_nav_menu( array( 'theme_location'=>'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right' ) );
                    
                    /**
                     * Hook for primary nav with Bootstrap Walker Class
                     */
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                    
                  ?>
                  
          </nav>

    </div><!-- /.container -->
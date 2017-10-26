<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8128545837359878",
    enable_page_level_ads: true
  });
</script>
<?php include_once( get_template_directory() . "/inc/analyticstracking.php" ) ; ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

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
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#jeffhow-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <span class="navbar-brand">
                <a class="stroke-double" href="<?php echo get_site_url( home_url( '/' ) ); ?>" title="jeff.how">
                  <?php include get_template_directory() . '/inc/jeffhowpaths.php'; ?>
                </a>
              </span>
              
            </div><!-- /.navbar-header -->
            
            <?php
              /**
               * Hook for primary nav with Bootstrap Walker Class
               */
              wp_nav_menu( array(
                  'menu'              => 'primary',
                  'theme_location'    => 'primary',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse',
                  'container_id'      => 'jeffhow-navbar-collapse',
                  'menu_class'        => 'nav navbar-nav',
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new wp_bootstrap_navwalker())
              );
              
            ?>
            
          </nav>

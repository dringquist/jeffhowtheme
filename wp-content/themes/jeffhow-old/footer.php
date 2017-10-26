    <div class="container">  
      <footer>
        <div class="row">
          <div class="col-xs-12">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <p class="navbar-text">&copy; 2016 Jeff.how</p>
                <?php 
                  /**
                   * Secondary nav menu hook
                   * Defined in 'functions.php'
                   */
                  wp_nav_menu(array('theme_location'=>'secondary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right' ) ); 
                ?>
              </div><!-- /.container-fluid -->
            </nav>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </footer>
    </div><!-- /.container -->
    
    <?php wp_footer(); ?>
  </body>
</html>
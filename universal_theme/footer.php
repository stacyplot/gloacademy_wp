    <footer class="footer">
      <div class="container">
        <div class="footer-menu-bar">
          <?php dynamic_sidebar( 'sidebar-footer' ); ?>
        </div>
        <div class="footer-info">
          <?php

          if(has_custom_logo()){
            echo '<div class="logo">' . get_custom_logo() . '</div>';
          } else {
            echo '<span class="logo-name">' . get_bloginfo('name') . '</span>';
          }

          wp_nav_menu( [
            'theme_location'  => 'footer_menu',
            'container'       => 'nav',
            'container_class' => 'footer-nav-wrapper', 
            'menu_class'      => 'footer-nav', 
            'echo'            => true,
          ] ); 
           
          $instance = array(
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'instagram' => 'https://instagram.com',
            'youtube' => 'https://youtube.com',
            'title' => '',
          );
          $args = array(
            'before_widget' => '<div class="footer-social">',
            'after_widget' => '</div>',
          );
          
          the_widget( 'Socials_Widget', $instance, $args );?>
        </div>
        <div class="footer-text-wrapper">
          <?php dynamic_sidebar( 'sidebar-footer-text' ); ?>
          <span class="footer-copyright"><?php echo date('Y') . ' &copy; ' . get_bloginfo('name');?></span>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
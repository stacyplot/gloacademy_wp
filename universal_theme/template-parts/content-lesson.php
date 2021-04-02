<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <!-- Шапка поста -->
  <header class="entry-header <?php echo get_post_type();?>-header" style="background: linear-gradient(0deg, rgba(38, 45, 51, 0.75), rgba(38, 45, 51, 0.75))">
    <div class="container">
      <div class="post-header-wrapper">
        <div class="post-header-nav">
          <?php
          foreach (get_the_category() as $category) {
            printf(
              '<a href="%s" class="category-link %s">%s</a>',
              esc_url(get_category_link($category)),
              esc_html($category -> slug),
              esc_html($category -> name),
            );
          }
          ?>
        </div>
        <div class="video">
          <iframe width="100%" height="450" src="https://www.youtube.com/embed/<?php
          $video_link =get_field('video_link');
          if($video_link){
            $tmp = explode('?v=', get_field('video_link'));
            echo end($tmp);
          }
          ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          
        </div>
        <div class="lesson-header-title-wrapper">
          <?php
          // проверяем, точно ли мы на странице поста
          if ( is_singular() ) :
            the_title( '<h1 class="lesson-header-title">', '</h1>' );
          else :
            the_title( '<h2 class="lesson-header-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
          endif;?>
        </div>
        
        <div class="post-header-info">
          <span class="post-header-date"><?php the_time( 'j F' )?></span>
        </div>
        
      </div>
    </div>
  </header><!-- .entry-header -->
  <!-- Содержимое поста -->
  <div class="container">
    <div class="entry-content">
      <?php
      // выводим содержимое поста
      the_content(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'universal_example' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          wp_kses_post( get_the_title() )
        )
      );

      wp_link_pages(
        array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'universal_example' ),
          'after'  => '</div>',
        )
      );
      ?>
    </div><!-- содержимое поста -->
  </div>

  <footer class="entry-footer">
    <div class="container">
      <?php 
        $tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'universal_example' ) );
        if ( $tags_list ) {
          /* translators: 1: list of tags. */
          printf( '<span class="tags-links">' . esc_html__( '%1$s', 'universal_example' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
        //  Ссылки на соц сети
        meks_ess_share();
      ?>
    </div>
    <!-- Секция с остальными постами из этой же рубрики -->
    <div class="other-posts">
      <div class="container">
        <ul class="other-posts-list">
          <?php
          global $post;
          $myposts = get_posts([ 
            'numberposts' => 4,
            'category_name' => 'java-script',
            'exclude' => '28',
          ]);

          if( $myposts ){
            foreach( $myposts as $post ){
              setup_postdata( $post );
              ?>
              <!-- Вывода постов, функции цикла: the_title() и т.д. -->
              <li class="other-posts-item">
                <a class="other-posts-permalink" href="<?php echo get_the_permalink();?>">
                  <div class="other-posts-img">
                    <img src="<?php 
                      if( has_post_thumbnail() ) {
                        echo get_the_post_thumbnail_url();
                      }
                      else {
                        echo get_template_directory_uri().'/assets/images/img-default.png" />';
                      }
                      ?>" alt="">
                  </div>
                  <h4 class="other-posts-title"><?php echo mb_strimwidth(get_the_title(), 0, 68, '...');?></h4>
                  <div class="author-info">
                    <div class="comments">
                      <svg width="13.5" height="13.5" class="icon comments-icon" fill="#BCBFC2">
                        <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#comment'?>"></use>
                      </svg>
                      <span class="comments-counter"><?php comments_number('0', '1', '%');?></span>
                    </div>
                    <div class="likes">
                      <svg width="13" height="12" class="icon likes-icon" fill="#BCBFC2">
                        <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#heart'?>"></use>
                      </svg>
                      <span class="likes-counter"><?php comments_number('0', '1', '%')?></span>
                    </div>
                  </div>
                </a>
              </li>
          <?php 
              } 
            } else {
              ?> <p>Постов нет</p> <?php
            }
            wp_reset_postdata(); // Сбрасываем $post
            ?>
        </ul>
      </div>
    </div>
	</footer><!-- .entry-footer -->
</article>
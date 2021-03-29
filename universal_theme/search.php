<?php get_header(); ?>
  <div class="article-secondary">
    <div class="container">
      <h1 class="search-title">Результаты поиска по запросу</h1>
      <div class="article-secondary-boxwrap">
        <div class="search-wrapper">
          <ul class="article-secondary-list">
            <?php while ( have_posts() ){ the_post(); ?>
              <li class="article-secondary-post">
                <a class="article-secondary-post-permalink" href="<?php echo get_the_permalink();?>">
                  <img src="<?php 
                    if( has_post_thumbnail() ) {
                      echo get_the_post_thumbnail_url();
                    }
                    else {
                      echo get_template_directory_uri().'/assets/images/img-default.png"';
                    }
                    ?>" alt="" class="article-secondary-post-img" width="336" height="195">
                  <div class="article-secondary-post-wrp">
                    
                    <h3 class="article-secondary-post-title"><?php echo mb_strimwidth(get_the_title(), 0, 68, '...');?></h3>
                    <p class="article-secondary-post-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0, 150, '...');?></p>
                    <div class="author-info">
                      <span class="date"><?php the_time( 'j F' )?></span>
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
                  </div>
                </a>
              </li>
            <?php } ?>
            <?php if ( ! have_posts() ){ ?>
              Записей нет.
            <?php } ?>
          </ul>
          <?php 
          $args = array(
            'prev_text' => '&larr; Назад',
            'next_text' => 'Вперед &rarr;',
          );
          the_posts_pagination($args)?>
        </div>
        <?php get_sidebar('home-bottom');?>
      </div>
      
    </div>
  </div>
  <div class="container">
    <?php get_footer();?>
  </div>

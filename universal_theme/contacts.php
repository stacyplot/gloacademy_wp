<?php
/*
Template Name: Страница контакты
Template Post Type: page
*/

get_header(); ?>
<section class="section-dark">
  <div class="container">
    <?php the_title('<h1 class="page-title">', '</h1>', true);?>
    <div class="contacts-wrapper">
      <div class="left">
        <h2 class="contacts-title">Через форму обратной связи</h2>
        <!-- <form action="#" class="contacts-form" method="POST">
          <input name="contact_name" type="text" class="input contacts-input" placeholder="Ваше имя">
          <input name="contact_email" type="email" class="input contacts-input" placeholder="Ваш email">
          <textarea name="contact_comment" id="" class="textarea contacts-textarea" placeholder="Ваш вопрос"></textarea>
          <button type="submit" class="button more">Отправить</button>
        </form> -->
        <?php echo do_shortcode('[contact-form-7 id="194" title="Контактная форма"]');?>
      </div>
      <div class="right">
        <h2 class="contacts-title">Или по этим контактам</h2>
        <?php
        $email = get_post_meta( get_the_ID( ), 'email', true );
        if ($email) {echo '<a href="mailto:' . $email . '" class="contacts-info">' . $email . '</a>'; }
         
        $address = get_post_meta( get_the_ID( ), 'address', true );
        if ($address){ echo '<address class="contacts-info">' . $address . '</address>'; }
        
        $phone = get_post_meta( get_the_ID( ), 'phone', true );
        if ($phone){ echo '<a href="tel:' . $phone . '" class="contacts-info">' . $phone . '</a>' ; }

        the_field('date');
        ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer();
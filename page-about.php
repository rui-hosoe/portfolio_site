<? get_header(); ?>

<main>
  <section class="l-profile u-js-fade">
    <div class="l-profile__inner l-inner">
      <div class="l-profile__mv">
        <div class="c-profile-img c-profile-img--big">
          <h2 class="c-page-title c-profile-img__title">About</h2>
          <img src="<?php echo get_template_directory_uri() ?>/img/about-img.jpg" alt="" />
        </div>
      </div>
      <div class="l-profile__introduction">
        <div class="c-profile">
          <div class="c-profile__name">
            <p class="c-profile__name-romaji">Hosoe Rui</p>
            <p class="c-profile__name-kanji">細江 瑠衣</p>
          </div>
          <p class="c-profile__intro">
            <?php if (have_posts()) : the_post(); ?>
              <?php the_content(); ?>
            <?php endif; ?>
          </p>
        </div>
      </div>
    </div>
  </section>
  <div class="l-biography-wrapper">
    <section class="l-biography l-section u-title-bar">
      <div class="l-biography__inner l-inner">
        <div class="c-section-heading l-biography__heading">
          <h2 class="c-section-heading__main">Webコーダーをめざすまで</h2>
          <p class="c-section-heading__sub">Biography</p>
        </div>
        <div class="l-biography__content">
          <div class="p-bio">
            <?php
            $args = array(
              'post_type' => 'bio',
              'posts_per_page' => -1,
              'orderby' => 'date',
              'order' => 'ASC',
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) : ?>
              <div class="p-bio__content">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <div class="p-bio__timeline">
                    <?php
                    $icon_type = get_field('bio_icon');

                    if ($icon_type === 'company') {
                      echo '<div class="p-bio__timeline-icon p-bio__timeline-icon--company"></div>';
                    } else {
                      echo '<div class="p-bio__timeline-icon"></div>';
                    }
                    ?>
                    <div class="p-bio__timeline-content c-timeline-content">
                      <p class="c-timeline-content__date"><?php echo get_field('bio_date'); ?></p>
                      <p class="c-timeline-content__title"><?php echo get_field('bio_title'); ?></p>
                      <p class="c-timeline-content__text"><?php echo get_field('bio_content'); ?></p>
                    </div>
                  </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </section>
  </div>
  <section class="l-strength l-section u-title-bar u-js-fade">
    <div class="l-strength__inner l-inner">
      <div class="c-section-heading l-strength__heading">
        <h2 class="c-section-heading__main">わたしのつよみ</h2>
        <p class="c-section-heading__sub">Strength</p>
      </div>
      <?php
      $args = array(
        'post_type'      => 'strength',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'ASC',
      );
      $query = new WP_Query($args);

      if ($query->have_posts()) : ?>
        <div class="p-strength-cards l-strength__content">
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="c-strength-card p-strength-cards__card">
              <div class="c-strength-card__img">
                <?php the_post_thumbnail(); ?>
              </div>
              <p class="c-strength-card__title"><?php the_title(); ?></p>
              <p class="c-strength-card__text">
                <?php the_content(); ?>
              </p>
            </div>
          <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
    </div>
  </section>

  <?php get_footer(); ?>

<?php get_header(); ?>

<main>
  <section class="l-mv">
    <div class="p-mv">
      <div class="p-mv__img"></div>
      <h2 class="p-mv__text js-hero-text">
        L'homme est un roseau pensant <br />
        - Rui Portfolio / Web Coder -
      </h2>
      <div class="p-mv__overlay">
        <p class="p-mv__overlay-text">
          限りある力でも、思考が可能性を広げる。<br />
          考え抜いた工夫で、快適なWebをつくる。<br />
          私も、考え続ける者でありたい。
        </p>
      </div>
    </div>
  </section>

  <section class="l-about l-section u-js-fade">
    <div class="l-about__inner l-inner">
      <div class="p-about">
        <div class="p-about__content p-about-content">
          <div class="c-section-heading p-about-content__heading">
            <h2 class="c-section-heading__main">
              わたしの<br class="u-sp-hidden" />こと
            </h2>
            <p class="c-section-heading__sub">About</p>
          </div>
          <div class="p-about-content__name">
            <span class="p-about-content__name-romaji">Hosoe Rui</span>
            <span class="p-about-content__name-kanji">細江 瑠衣</span>
          </div>
          <p class="p-about-content__text">
            1999年1月生まれ、愛知県育ち。<br />
            前職では品質保証部にてサプリメントの品質管理業務に従事し、新しい分析手法の導入を主導。その後、社内プロジェクトのリーダーとして業務推進や外部発信に携わる中でITの可能性を実感し、本格的にWeb制作の学習を開始。お客様の要望を形にし、より良いWebを提供するため、学び続けるコーダーとして成長していきます。
          </p>
        </div>
        <img class="p-about__img" src="<?php echo get_template_directory_uri() ?>/img/about.jpg" alt="" />
        <a href="<?php echo home_url('/about') ?>" class="c-arrow-link p-about__link">
          <span class="c-arrow-link__text">view profile</span>
          <span class="c-arrow-link__arrow">→</span>
        </a>
      </div>
    </div>
  </section>
  <section class="l-works l-section u-title-bar u-js-fade">
    <div class="l-works__inner l-inner">
      <div class="p-works">
        <div class="c-section-heading p-works__heading">
          <h2 class="c-section-heading__main">せいさくじっせき</h2>
          <p class="c-section-heading__sub">Works</p>
        </div>
        <!-- スワイパー -->
        <div class="swiper-container p-works__swiper">
          <div class="swiper-wrapper">
            <?php
            $args = array('posts_per_page' => 3);
            $recent_posts = new WP_Query($args);
            if ($recent_posts->have_posts()) :
              while ($recent_posts->have_posts()) : $recent_posts->the_post();
            ?>
                <a class="swiper-slide u-hover-opacity" href="<?php the_permalink(); ?>">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['class' => 'p-works__img']); ?>
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri() ?>/img/works-test.png" alt="">
                  <?php endif; ?>
                </a>
            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </div>
        </div>
        <!-- スワイパー -->
        <div class="p-works__text-link-container">
          <div class="c-work-text">
            <p class="c-work-text__1">知識を活かし、試しながら形にする。</p>
            <p class="c-work-text__2">
              試行錯誤重ねて組み上げたWeb制作の記録。
            </p>
            <p class="c-work-text__3">
              これまでの制作実績をぜひご覧ください。
            </p>
          </div>
          <a href="<?php echo home_url('/works') ?>" class="c-arrow-link p-works__link">
            <span class="c-arrow-link__text">view more</span>
            <span class="c-arrow-link__arrow">→</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section id="skills" class="l-skills l-section u-title-bar u-js-fade">
    <div class="l-section-inner l-inner">
      <div class="p-skills">
        <div class="c-section-heading p-skills__heading">
          <h2 class="c-section-heading__main">できること</h2>
          <p class="c-section-heading__sub">Skills</p>
        </div>
        <div class="p-skills__cards">
          <div class="c-skill-card">
            <div class="c-skill-card__icon c-skill-card__icon--small">
              <img
                src="<?php echo get_template_directory_uri() ?>/img/html-5-logo-5121.png"
                alt=""
                class="c-skill-card__icon-img c-skill-card__icon-img--small" />
              <img
                src="<?php echo get_template_directory_uri() ?>/img/css-1.png"
                alt=""
                class="c-skill-card__icon-img c-skill-card__icon-img--small" />
            </div>
            <div class="c-skill-card__text">
              <p class="c-skill-card__text-heading">HTML/CSS</p>
              <p class="c-skill-card__text-description">
                BEM設計を採用し、一貫性のあるCSS構築が可能です。Sassを活用し、保守性を高めた管理を実現できます。FLOCSSで拡張性の高い設計を行い、レスポンシブ対応で最適なレイアウトを実装できます。
              </p>
            </div>
          </div>
          <div class="c-skill-card">
            <div class="c-skill-card__icon">
              <img
                src="<?php echo get_template_directory_uri() ?>/img/java-script-logo-1.png"
                alt=""
                class="c-skill-card__icon-img" />
            </div>
            <div class="c-skill-card__text">
              <p class="c-skill-card__text-heading">Javascript/jQuery</p>
              <p class="c-skill-card__text-description">
                スライダーやドロワーメニューを実装し、操作性を向上できます。アコーディオンやページ内リンクを導入し、スムーズなナビゲーションなどの動きをWebサイトに実装できます。
              </p>
            </div>
          </div>
          <div class="c-skill-card">
            <div class="c-skill-card__icon">
              <img
                src="<?php echo get_template_directory_uri() ?>/img/word-press-logotype-wmark-1.png"
                alt=""
                class="c-skill-card__icon-img" />
            </div>
            <div class="c-skill-card__text">
              <p class="c-skill-card__text-heading">WordPress/PHP</p>
              <p class="c-skill-card__text-description">
                静的サイトをWordPressの自作テーマとして構築し、柔軟にカスタマイズできます。PHPを活用して管理を効率化し、更新しやすいサイトを実装できます。
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>

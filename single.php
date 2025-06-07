<? get_header(); ?>

<main>
  <section class="l-works-page-mv u-js-fade">
    <div class="l-works-page-mv__inner l-inner">
      <div class="p-display-card">
        <div class="c-display">
          <div class="c-display__wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>//img/pc-frame.png" alt="" class="c-display__frame" />
            <div class="c-display__content">
              <?php
              for ($i = 1; $i <= 6; $i++) {
                $pc_display = get_field('pc_display_' . $i);
                if ($pc_display) :
              ?>
                  <img src="<?php echo $pc_display ?>" alt="" />
              <?php endif;
              } ?>
            </div>
          </div>
        </div>
      </div>
      <div class=" p-display-card__text">
        <div class="c-meta">
          <p class="c-meta__genre">Type:</p>
          <p class="c-meta__date">
            <?php
            $categories = get_the_category();
            if ($categories) {
              echo esc_html($categories[0]->name);
            }
            ?>
          </p>
        </div>
        <div class="c-meta">
          <p class="c-meta__genre">Projects:</p>
          <p class="c-meta__date">
            <?php
            $tags = get_the_tags();
            if ($tags && isset($tags[0])) {
              echo esc_html($tags[0]->name);
            }
            ?>
          </p>
        </div>
      </div>
    </div>
    </div>
  </section>

  <section class="l-works-spec l-section u-js-fade">
    <div class="l-works-spec__inner l-inner">
      <div class="p-works-summary l-works-spec__summary">
        <div class="p-works-summary__content">
          <div class="c-display c-display--sp p-works-summary__display">
            <div class="c-display__wrapper c-display__wrapper--sp">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/SP-frame.png"
                alt=""
                class="c-display__frame c-display__frame--sp" />
              <div class="c-display__content c-display__content--sp">
                <?php
                for ($i = 1; $i <= 8; $i++) {
                  $sp_display = get_field('sp_display_' . $i);
                  if ($sp_display) :
                ?>
                    <img src="<?php echo $sp_display ?>" alt="" />
                <?php endif;
                } ?>
              </div>
            </div>
          </div>
          <div class="c-spec p-works-summary__spec">
            <dl class="c-kv c-spec__list">
              <dt class="c-kv__key">概要</dt>
              <dd class="c-kv__val"><?php the_field("summary") ?></dd>
            </dl>
            <dl class="c-kv c-spec__list">
              <dt class="c-kv__key">制作期間</dt>
              <dd class="c-kv__val"><?php the_field("production_period") ?></dd>
            </dl>
            <dl class="c-kv c-spec__list">
              <dt class="c-kv__key">作業範囲</dt>
              <dd class="c-kv__val">
                <?php the_field("work_scope") ?>
              </dd>
            </dl>
            <dl class="c-kv c-spec__list">
              <dt class="c-kv__key">使用ツール</dt>
              <dd class="c-kv__val"><?php the_field("tools") ?></dd>
            </dl>
            <dl class="c-kv c-spec__list">
              <dt class="c-kv__key">URL</dt>
              <dd class="c-kv__val u-hover-opacity">
                <?php
                $url = get_field("url");
                if ($url):
                ?>
                  <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer">
                    <?php echo esc_html($url); ?>
                  </a>
                <?php endif; ?>
              </dd>
            </dl>
          </div>
        </div>
        <dl class="c-kv p-works-summary__text">
          <dt class="c-kv__key">制作時のこだわり</dt>
          <dd class="c-kv__val">
            <?php the_field("focus") ?>
          </dd>
        </dl>
      </div>
    </div>
  </section>

  <section class="l-works-design l-section u-title-bar u-js-fade">
    <div class="l-works-design__inner l-inner">
      <div class="c-section-heading l-works-design__heading">
        <h2 class="c-section-heading__main">でざいん</h2>
        <p class="c-section-heading__sub">Design</p>
      </div>

      <div class="swiper p-design-swiper l-works-design__swiper">
        <div class="swiper-wrapper p-design-swiper__wrapper">
          <?php
          for ($i = 1; $i <= 10; $i++) {
            $image = get_field('design_' . $i);
            if ($image) :
          ?>
              <div class="swiper-slide p-design-swiper__slide">
                <img src="<?php echo $image ?>" alt="">
              </div>
          <?php endif;
          } ?>
        </div>
        <div class="swiper-pagination p-design-swiper__pagination"></div>
      </div>
    </div>
  </section>


  <?php get_footer(); ?>

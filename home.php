<? get_header(); ?>

<main>
  <section class="l-works-mv u-js-fade">
    <div class="l-works-mv__inner">
      <div class="l-works-mv__img">
        <div class="c-profile-img c-profile-img--big">
          <h2 class="c-page-title c-profile-img__title">Works</h2>
          <img src="<?php echo get_template_directory_uri(); ?>/img/works-img.jpg" alt="" />
        </div>
      </div>
    </div>
  </section>

  <section class="l-all-works l-section u-title-bar u-js-fade">
    <div class="l-all-works__inner l-inner">
      <div class="c-section-heading l-all-works__heading">
        <h2 class="c-section-heading__main">じっせきいちらん</h2>
        <p class="c-section-heading__sub">All Works</p>
      </div>
      <div class="p-tab-menu l-all-works__content">
        <div class="p-tab-menu__tabs">
          <h2 class="p-tab-menu__tab is-active" data-tab="all">All</h2>
          <h2 class="p-tab-menu__tab" data-tab="portfolio-site">Portfolio</h2>
          <h2 class="p-tab-menu__tab" data-tab="corporate-site">Corporate Site</h2>
          <h2 class="p-tab-menu__tab" data-tab="lp-site">LP</h2>
        </div>
        <div class="p-tab-menu__contents">
          <!-- ALL：全投稿表示用（タブ1番目） -->
          <div class="p-tab-menu__content is-active" data-category="all">
            <div class="p-works-group">
              <?php
              $all_args = array(
                'post_type'      => 'post',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
              );
              $all_query = new WP_Query($all_args);
              if ($all_query->have_posts()) :
                while ($all_query->have_posts()) : $all_query->the_post(); ?>
                  <a href="<?php the_permalink(); ?>" class="c-works-card p-works-group__card u-hover-opacity">
                    <div class="c-works-card__img"><?php the_post_thumbnail(); ?></div>
                    <div class="c-works-card__text">
                      <p class="c-works-card__title"><?php the_title(); ?></p>
                      <div class="c-works-card__meta">
                        <?php
                        $categories = get_the_category();
                        if ($categories) {
                          echo '<p class="c-works-card__category">' . esc_html($categories[0]->name) . '</p>';
                        }
                        ?>
                        <p class="c-works-card__type">
                          <?php
                          $tags = get_the_tags();
                          if ($tags && isset($tags[0])) {
                            echo esc_html($tags[0]->name);
                          }
                          ?>
                        </p>
                      </div>
                    </div>
                  </a>
              <?php
                endwhile;
                wp_reset_postdata();
              endif;
              ?>
            </div>
          </div>

          <!-- カテゴリごとの投稿表示 -->
          <?php
          $categories = get_categories();
          foreach ($categories as $category) :
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => -1,
              'category__in' => array($category->term_id),
              'orderby' => 'date',
              'order' => 'DESC',
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
          ?>
              <div class="p-tab-menu__content" data-category="<?php echo esc_attr($category->slug); ?>">
                <div class="p-works-group">
                  <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="c-works-card p-works-group__card u-hover-opacity">
                      <div class="c-works-card__img"><?php the_post_thumbnail(); ?></div>
                      <div class="c-works-card__text">
                        <p class="c-works-card__title"><?php the_title(); ?></p>
                        <div class="c-works-card__meta">
                          <p class="c-works-card__category"><?php echo esc_html($category->name); ?></p>
                          <p class="c-works-card__type">
                            <?php
                            $tags = get_the_tags();
                            if ($tags && isset($tags[0])) {
                              echo esc_html($tags[0]->name);
                            }
                            ?>
                          </p>
                        </div>
                      </div>
                    </a>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                </div>
              </div>
          <?php endif;
          endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>

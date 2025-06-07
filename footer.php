<footer id="contact" class="l-footer">
  <div class="l-footer__inner">
    <div class="p-footer">
      <div class="p-footer__wrapper">
        <div class="p-footer__nav">
          <div class="c-section-links">
            <ul class="c-section-links__list">
              <?php
              wp_nav_menu(array(
                'theme_location' => 'footer', // 登録したメニューのスラッグ
                'container'      => false,           // 余計なラッパーを出力しない
                'items_wrap'     => '%3$s',          // デフォルトの <ul> を出力させず、項目のみ出力
                'walker'         => new Walker_Section_Links_Only_LI(),
              ));
              ?>
            </ul>
          </div>
        </div>
        <div class="p-footer__contact-links">
          <p class="p-footer__contact-links-title">Contact</p>
          <div class="c-contact-links">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'footer_contact',
              'container'      => false,    // <div>ラッパーは不要
              'items_wrap'     => '%3$s',   // <ul> を出力せず、<li>と<a>だけにする
              'depth'          => 1,        // 子階層は不要なら 1
            ));
            ?>
          </div>
        </div>
      </div>
      <small class="p-footer__copyright">
        &copy;All Rights Reserved 2025 ©︎ Rui Hosoe
      </small>
    </div>
  </div>
</footer>

<div class="c-page-top-btn" id="js-pagetop">
  <a href="/"><img src="<?php echo get_template_directory_uri() ?>/img/page-top-btn.png" alt="" /></a>
</div>
</main>

<!-- GSAP -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<!-- SplitType（テキスト分割） -->
<script src="https://unpkg.com/split-type"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/script.js"></script>
<?php if (is_front_page()) : ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/frontpage-animation.js"></script>
<?php endif; ?>
</body>

</html>

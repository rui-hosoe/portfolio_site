// ドロワーメニュー
jQuery("#js-header-btn").on("click", function () {
  jQuery(this).toggleClass("is-checked");
  jQuery("#js-drawer").toggleClass("is-open");
  jQuery("body").toggleClass("is-fixed");
});

// スムーススクロール時にドロワーを閉じる　※スムーススクロール実装時のみ
jQuery('#js-drawer a[href^="#"]').on("click", function (e) {
  jQuery("#js-header-btn").removeClass("is-checked");
  jQuery("#js-drawer").removeClass("is-open");
  jQuery("body").toggleClass("is-fixed");
  var speed = 1000;
  var href = $(this).attr("href");
  var target = $(href == "#" || href == "" ? "html" : href);
  var position = target.offset().top;
  $("html, body").animate({ scrollTop: position }, speed, "swing");
  return false;
});

// スワイパー（トップページ）
const swiper = new Swiper(".p-works__swiper", {
  loop: true, // スライドのループ再生
  speed: 6000, // スライドのスピード
  allowTouchMove: true, // タッチ操作を有効にする
  slidesPerView: 1, // スライド表示数
  spaceBetween: 20, // スライド間の余白
  autoplay: {
    delay: 0, // 途切れなくループ
  },
  breakpoints: {
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
      loop: false,
      autoplay: false,
    },
    900: {
      spaceBetween: 40,
      slidesPerView: 3,
      spaceBetween: 40,
      loop: false,
      autoplay: false,
    },
  },
});

const worksSwiper = new Swiper(".p-design-swiper", {
  loop: true,
  speed: 6000, // ループの時間
  allowTouchMove: true, // スライドのタッチ操作を有効にする
  slidesPerView: 1, // スライド表示数
  spaceBetween: 20, // スライド間の余白
  autoplay: {
    delay: 0, // 途切れなくループ
  },

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },
});

// pagetopボタン
jQuery(document).ready(function () {
  var $pagetop = jQuery("#js-pagetop").hide(); // 最初は非表示にする
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 300) {
      // 300px以上スクロールしたら
      $pagetop.fadeIn(); // ボタンをフェードイン
    } else {
      $pagetop.fadeOut(); // ボタンをフェードアウト
    }
  });
  $pagetop.click(function () {
    jQuery("html, body").animate({ scrollTop: 0 }, 800); // 800msかけてトップへスクロール
    return false;
  });
});

// スクロールトリガー
const target = document.querySelector(".p-bio__content");
if (target) {
  gsap.registerPlugin(ScrollTrigger);

  // .p-bio__content のスクロール可能距離を計算
  const bioContent = document.querySelector(".p-bio__content");
  const scrollDistance = bioContent.scrollHeight - bioContent.clientHeight;

  // GSAP アニメーション設定：.p-bio__content を上方向にスクロールさせる
  // For responsive start position based on viewport width
  const startPosition =
    window.innerWidth < 768 ? "center center" : "center center";

  gsap.to(bioContent, {
    y: -scrollDistance,
    ease: "none",
    scrollTrigger: {
      trigger: ".l-biography", // ピン留めの対象
      start: startPosition, // spサイズの場合 "top top"、それ以外は "center center"
      end: () => "+=" + scrollDistance, // 内部スクロール分だけスクロールが必要
      scrub: true, // スクロールに合わせたアニメーション
      pin: true, // .l-biography をピン留めする
    },
  });
}

//すべてのtab要素を取得し、変数tabsに格納する
const tabs = document.querySelectorAll(".p-tab-menu__tab");
//すべてのcontent要素を取得し、変数contentsに格納する
const contents = document.querySelectorAll(".p-tab-menu__content");

tabs.forEach(function (tab, index) {
  //タブにクリックイベントを追加
  tab.addEventListener("click", toggleClass);

  //タブがクリックされたときに実行する関数
  function toggleClass() {
    //すべてのタブとコンテンツからis-activeクラスを削除する
    tabs.forEach(function (tab) {
      tab.classList.remove("is-active");
    });
    contents.forEach(function (content) {
      content.classList.remove("is-active");
    });
    //クリックされたtab要素にactiveクラスを追加する
    tab.classList.add("is-active");
    //クリックされたtab要素と同じインデックスを持つcontent要素にactiveクラスを追加する
    contents[index].classList.add("is-active");
  }
});

// フェードイン
jQuery(function () {
  function fadeInOnScroll() {
    const winH = jQuery(window).height();
    const scroll = jQuery(window).scrollTop();

    jQuery(".u-js-fade").each(function () {
      const $this = jQuery(this);
      const pos = $this.offset().top;

      if (scroll + winH * 0.9 > pos) {
        $this.addClass("is-visible");
      }
    });
  }

  jQuery(window).on("load scroll", fadeInOnScroll);

  jQuery(window).on("resize", fadeInOnScroll);
});

// test
document.addEventListener("DOMContentLoaded", () => {
  gsap.from("body", {
    opacity: 0,
    filter: "blur(20px)",
    duration: 3,
    ease: "power2.out",
  });

  // 背景ズームアウト（.p-mv__img）
  gsap.fromTo(
    ".p-mv__img",
    { scale: 1.2 },
    { scale: 1, duration: 3, ease: "power2.out" }
  );

  // キャッチコピー：文字単位で分割してアニメーション
  const splitText = new SplitType(".js-hero-text", { types: "chars" });

  gsap.from(splitText.chars, {
    opacity: 0,
    y: 20,
    stagger: 0.04,
    filter: "blur(4px)",
    duration: 1,
    ease: "power2.out",
    delay: 1.5,
  });

  // オーバーレイテキスト（下の文章）
  gsap.from(".p-mv__overlay-text", {
    opacity: 0,
    y: 20,
    duration: 1.2,
    ease: "power2.out",
    delay: 1.8,
  });
});

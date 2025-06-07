// ロード時のアニメーション
document.addEventListener("DOMContentLoaded", () => {
  // bodyに front-page クラスがあるときだけ実行

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

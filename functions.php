<?php
add_theme_support('post-thumbnails');

function my_menu_init()
{
  register_nav_menus(
    array(
      'global' => 'ヘッダーメニュー',
      'footer' => 'フッターメニュー',
      'drawer' => 'ドロワーメニュー',
      'footer_contact' => 'フッターコンタクトメニュー',
    )
  );
}
add_action('init', 'my_menu_init');

// aタグのみを出力するカスタムウォーカー
class Walker_Simple_Menu extends Walker_Nav_Menu
{
  function start_lvl(&$output, $depth = 0, $args = array()) {}
  function end_lvl(&$output, $depth = 0, $args = array()) {}

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $classes = implode(' ', $item->classes);
    $output .= '<a href="' . esc_url($item->url) . '" class="p-drawer__menu">' . esc_html($item->title) . '</a>';
  }

  function end_el(&$output, $item, $depth = 0, $args = array()) {}
}

class Walker_Section_Links_Only_LI extends Walker_Nav_Menu
{
  // サブメニューの開始・終了は不要なので空にしておく
  function start_lvl(&$output, $depth = 0, $args = array()) {}
  function end_lvl(&$output, $depth = 0, $args = array()) {}

  // 各メニュー項目（li + a）の開始
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $output .= '<li class="c-section-links__item">';
    $output .= '<a href="' . esc_url($item->url) . '" class="c-section-links__link u-hover-opacity--black">';
    $output .= esc_html($item->title);
    $output .= '</a>';
  }

  // 各メニュー項目の終了
  function end_el(&$output, $item, $depth = 0, $args = array())
  {
    $output .= '</li>';
  }
}

// functions.php に追加
function add_contact_link_classes($atts, $item, $args)
{
  if ($args->theme_location === 'footer_contact') {
    // 全リンクにこのクラスを付与
    $atts['class'] = 'c-contact-links__item u-hover-opacity--black';
    // （アイコンメニューなら $item->title を <i>…</i> の HTML にしておけば出力可能）
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'add_contact_link_classes', 10, 3);



?>

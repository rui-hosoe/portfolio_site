<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rui Portfolio</title>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico" type="image/x-icon" />
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Yeseva+One&display=swap"
    rel="stylesheet" />
  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css" />

  <?php wp_head(); ?>
</head>

<body>
  <div class="l-header p-header">
    <div class="p-header_inner">
      <h1 class="p-header_logo">
        <a href="<?php echo get_home_url() ?>">
          RUI<br />
          HOSOE
        </a>
      </h1>
      <button type="button" class="p-header_btn" id="js-header-btn">
        <span class="p-header_btn-line"></span>
        <span class="p-header_btn-line"></span>
        <span class="p-header_btn-line"></span>
      </button>
    </div>
  </div>

  <div class="l-drawer p-drawer" id="js-drawer">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'drawer',
      'container' => false,
      'items_wrap' => '%3$s', // <ul> を出力させない
      'walker' => new Walker_Simple_Menu()
    ));
    ?>
  </div>

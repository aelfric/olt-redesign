<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="<?php bloginfo('charset'); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
<header class='main-header flex flex-row flex-start' style="background-image: url('<?php header_image() ?>');">
    <nav class="full-width">
      <ul class="flex centered-container">
        <li class="nav-link">
          <button type="button" class="menu-open">About</button>

          <div class="sub-menu">
            <button type="button" class="menu-close">close</button>

            <?php wp_nav_menu( array( 'theme_location' => 'about-menu' ) ); ?>
          </div>
        </li>
        <li class="nav-link">
          <a href="#productions">Tickets</a>
        </li>
        <li class="nav-link">
          <a href="#productions">Productions</a>
        </li>
        <li class="nav-logo">
          <a href="/"><img src="<?= get_template_directory_uri() ?>/cropped-OLT-BW-Logo-Thick21 (1).png"></a>
        </li>
        <li class="nav-link">
          <a href="#auditions">Auditions</a>
        </li>
        <li class="">
          <a href="mailto:info@oldlibrarytheatre.net">Contact Us</a>
        </li>
        <li><a href="<?= get_theme_mod('olt_donate_link'); ?>" class="btn btn-primary">
            Donate Now</a>
        </li>
      </ul>
    </nav>
    <div class="header-container centered-container flex">
      <div class="header-block half">
        <h1 class="text-flourish text-xxl"><?= get_bloginfo('name') ?></h1>
        <p class="text-display text-xl"><?= get_bloginfo('description') ?></p>
        <p class="text-l">Showcasing talented artists, creators, and performers who represent the full spectrum of the human experience at all stages of development.</p>
        <a href='#productions' class="btn btn-primary">BROWSE SHOWS</a>
      </div>
    </div>
  </header>
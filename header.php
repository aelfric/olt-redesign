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
            <ul>
              <li><a href="#">ABOUT OLT</a></li>
              <li><a href="#">OUR MISSION</a></li>
              <li><a href="#">DIRECTIONS</a></li>
              <li><a href="#">EXECUTIVE BOARD</a></lid="menu-item-88">
              <li><a href="#">STAFF</a></lid="menu-item-1017">
              <li><a href="#">SUPPORT OLT</a></li>
              <li><a href="#">AWARDS AND NOMINATIONS</a></li>
              <li><a href="#">DOWNLOADS</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-link">
          <a href="#">Tickets</a>
        </li>
        <li>
          <button type="button" class="menu-open">Productions</button>
          <div class="sub-menu">
            <button type="button" class="menu-close">close</button>
            <ul>
              <li><a href="#">2021 Season</a></li>
              <li><a href="#">NEWS AND REVIEWS</a></li>
              <li><a href="#">PAST PRODUCTIONS</a></li>
              <li><a href="#">READER’S THEATRE</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-logo">
          <a href="/"><img src="<?= get_template_directory_uri() ?>/cropped-OLT-BW-Logo-Thick21 (1).png"></a>
        </li>
        <li class="nav-link">
          <a href="#">Auditions</a>
        </li>
        <li class="">
          <a href="#">Contact Us</a>
        </li>
        <li><a href="#" class="btn btn-primary">
            Donate Now</a>
        </li>
      </ul>
    </nav>
    <div class="centered-container flex">
      <div class="header-block half">
        <h1 class="text-flourish text-xxl">Old Library Theatre</h1>
        <p class="text-display text-xl">QUALITY ENTERTAINMENT AT AN AFFORDABLE COST IN BERGEN COUNTY</p>
        <p class="text-l">Showcasing talented artists, creators, and performers who represent the full spectrum of the human experience at all stages of development.</p>
        <a href=# class="btn btn-primary">BROWSE SHOWS</a>
      </div>
    </div>
  </header>
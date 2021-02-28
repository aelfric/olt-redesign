<? get_header(); ?>
<section class='our-mission'>
  <p class="margin-text margin-text--right">Old Library Theatre</p>
  <div class="centered-container flex flex-top">
    <div class="half">
      <div class="image-h-purple">
        <?php echo the_post_thumbnail('hero-image') ?>
      </div>
    </div>
    <div class="half">
      <h2 class="text-flourish text-xl text-purple">
        <?php
        if (get_field('supertitle')) :
          echo the_field('supertitle');
        else :
          echo "Announcement";
        endif;
        ?>
      </h2>
      <p class="text-display text-xl"><?= the_title() ?></p>
      <div class="content">
        <?= the_content() ?>
      </div>
      <!-- <p><a href="#" class="btn btn-primary">Read More</a></p> -->
    </div>
    <?php if (get_field("footer_image")) : ?>
      <div class="spacer" style="width: 220px; height: 320px;"></div>
      <div class="image-v-purple" style="max-width: 1280px;">
        <img src="<?= get_field("footer_image")["sizes"]["footer-image"] ?>" />
      </div>
    <?php endif; ?>
  </div>
</section>
<section class='upcomming' id="productions">
  <p class="margin-text  margin-text--left">Featured Shows</p>
  <div class="centered-container">
    <h2 class="text-flourish text-purple text-xl">What's On</h2>
    <p class="text-display text-xl">Upcomming Performances</p>
  </div>
  <div class="flex centered-container">
    <?php
    $args = array(
      'post_type' => 'production',
      'posts_per_page' => 4,
      'ignore_sticky_posts' => 1,
      'meta_key' => 'start_date',
      'orderby' => 'meta_value_num',
      'meta_type' => 'DATE',
      'order' => 'ASC'
    );
    $productions_query = new WP_Query($args);
    if ($productions_query->have_posts()) : while ($productions_query->have_posts()) : $productions_query->the_post(); ?>
        <article class="upcomming-production">
          <div class='production--image'>
            <?php echo the_post_thumbnail('production-marquee') ?>
          </div>
          <hr />
          <h3 class="text-display"><?= the_title() ?></h3>
          <p style="text-transform: uppercase;"><?= get_field("start_date") ?> - <?= get_field("end_date") ?></p>
          <a href="<?= the_permalink() ?>">More Information</a>
        </article>
      <?php endwhile;
    else : ?>
      <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
  </div>
</section>
<section class='auditions' id="auditions">
  <h2 class="text-flourish text-centered text-xl">Participate</h2>
  <p class="subtitle text-centered text-xl text-display">Upcomming Auditions</p>
  <?php
  $args = array(
    'post_type' => 'audition',
    'posts_per_page' => 4,
    'ignore_sticky_posts' => 1
  );
  $auditions_query = new WP_Query($args);
  if ($auditions_query->have_posts()) : while ($auditions_query->have_posts()) : $auditions_query->the_post(); ?>
      <article class="audition flex flex-row centered-container">
        <div class='audition--image'>
          <?= the_post_thumbnail('audition-thumb') ?>
        </div>
        <div>
          <h3 class="text-display"><?= the_title() ?></h3>
          <p>Some brief description of the show</p>
        </div>
        <a href="<?= the_permalink() ?>" class="btn btn-primary">Register Now</a>
      </article>
    <?php endwhile;
  else : ?>
    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>
</section>
<section class="news">
  <p class="margin-text">News and Updates</p>
  <h2 class="text-flourish text-centered text-xl text-purple ">Let's Read</h2>
  <p class="subtitle text-centered text-xl text-display">News and Updates</p>
  <div class="flex flex-top centered-container">
    <?php
    $args = array(
      'posts_per_page' => 3,
      'ignore_sticky_posts' => 1
    );
    $posts_query = new WP_Query($args);
    if ($posts_query->have_posts()) : while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
        <article class="news-article">
          <!-- <img class="news-image" src="https://via.placeholder.com/490x490" /> -->
          <div class='news-article--image'>
            <?php echo the_post_thumbnail('featured-image') ?>
          </div>
          <time><?= get_the_date() ?></time>
          <hr />
          <h3 class="text-l text-display"><?= the_title() ?></h3>
          <?= the_excerpt() ?>
          <a class="read-more" href="<?= the_permalink() ?>">Read More</a>
        </article>
      <?php endwhile;
    else : ?>
      <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
  </div>
  <div class="centered-container">
    <div class="centered">
      <form action="/">
        <input type="hidden" name="s" />
        <button type="submit" class="btn btn-primary">View All</button>
      </form>
    </div>
    </p>
  </div>
</section>
<section class="support">
  <h2 class="text-flourish text-centered text-xl">Support Us</h2>
  <div class="centered-container">
    <div class="flex centered-container" style="max-width: 1290px; justify-content: space-around;">
      <div class="become-a-donor text-white bg-purple" style="position: relative;">

        <svg viewbox="0 0 640 470" preserveAspectRatio="none" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
          <defs>
            <filter id="f1" x="0%" y="0%" width="100%" height="100%">
              <feColorMatrix id="greyscaler" type="matrix" values="0.21 0.72 0.072 0 0 0.21 0.72 0.072 0 0 0.21 0.72 0.072 0 0 0 0 0 1 0 "></feColorMatrix>
          </defs>

          <image x="0" y="0" width="1280" height="470" filter="url(#f1)" xlink:href="<?= wp_get_attachment_url(get_theme_mod('olt_settings_friend_image')) ?>" />
          <rect x="0" y="0" width="1280" height="470" style="opacity:0.819355;fill:#66348d;stroke-width: 0;" />
        </svg>

        <h3 class="text-display text-xl ">Become a Donor</h3>
        <p class="flex-grow">
          <?php echo get_theme_mod('olt_settings_donate_text'); ?>
        </p>
        <a href="#" class="btn btn-white">Donate Now</a>
      </div>
      <div class="become-a-friend bg-white text-black" style="position: relative;">
        <svg viewbox="640 0 640 470" preserveAspectRatio="none" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
          <defs>
            <filter id="f1" x="0%" y="0%" width="100%" height="100%">
              <feColorMatrix id="greyscaler" type="matrix" values="0.21 0.72 0.072 0 0 0.21 0.72 0.072 0 0 0.21 0.72 0.072 0 0 0 0 0 1 0 "></feColorMatrix>
          </defs>
          <image x="0" y="0" width="1280" height="470" filter="url(#f1)" xlink:href="<?= wp_get_attachment_url(get_theme_mod('olt_settings_friend_image')) ?>" />
          <rect x="0" y="0" width="1280" height="470" fill="66348d" style="opacity:0.819355;fill:#f0f0f0;stroke-width: 0;" />
        </svg>

        <h3 class="text-display text-xl">Become a Friend</h3>
        <p class="flex-grow">
          <?php echo get_theme_mod('olt_settings_friend_text'); ?>
        </p>
        <a href="#" class="btn btn-primary">Become a Friend</a>
      </div>
    </div>
  </div>

</section>
<section class="past-productions" style="min-height: 100vh;">
  <p class="margin-text">Performances</p>
  <h2 class="text-flourish text-centered text-xl text-purple">Our Gallery</h2>
  <p class="subtitle text-centered text-xl text-display">Past Performances</p>
  <div class="centered-container">
    <ul class="timeline">
      <li>2009</li>
      <li>2010</li>
      <li>2011</li>
      <li>2012</li>
      <li>2013</li>
      <li>2014</li>
      <li>2015</li>
      <li>2016</li>
      <li>2017</li>
      <li>2018</li>
      <li>2019</li>
      <li>2020</li>
    </ul>
    <div class="centered">
      <div class="album">
        <?php
        $args = array(
          'post_type' => 'timeline-year',
          'posts_per_page' => 1
        );
        $gallery_query = new WP_Query($args);
        if ($gallery_query->have_posts()) : while ($gallery_query->have_posts()) :
            $gallery_query->the_post(); ?>
            <?= the_content() ?>
          <?php endwhile;
        else : ?>
          <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <a hef="#" class="btn btn-primary">View All</a>
      </div>
    </div>
  </div>
</section>
<?= get_footer(); ?>
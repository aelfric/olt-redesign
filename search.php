<? get_header(); ?>
    <section class="news">
    <p class="margin-text">News and Updates</p>
    <h2 class="text-flourish text-centered text-xl text-purple ">Let's Read</h2>
    <p class="subtitle text-centered text-xl text-display">News and Updates</p>
    <div class="flex flex-top centered-container">
      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'posts_per_page' => 18,
        'ignore_sticky_posts' => 1,
        'paged' => $paged
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
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
        <?= the_posts_pagination() ?>
      </div>
      </p>
    </div>
  </section>
  <?php 
  get_footer();
  ?>

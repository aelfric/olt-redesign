
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
          if(get_field('supertitle')):
            echo the_field('supertitle');
          else: 
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
      <?php if(get_field("footer_image")): ?>
      <div class="spacer" style="width: 220px; height: 320px;"></div>
      <div class="image-v-purple">
        <img src="<?= get_field("footer_image")["sizes"]["footer-image"] ?>" />
      </div>
      <?php endif; ?>
    </div>
  </section>
  <section class='upcomming'>
    <p class="margin-text  margin-text--left">Featured Shows</p>
    <div class="centered-container">
      <h2 class="text-flourish text-purple text-xl">What's On</h2>
      <p class="text-display text-xl">Upcomming Performances</p>
    </div>
    <div class="flex centered-container">
      <article class="upcomming-production">
        <img src="https://via.placeholder.com/360x480/000000/" style="height: 480px; width: 350px" />
        <h3 class="text-display">Show Name</h3>
        <p>11 NOV - 15 NOV</p>
        <a href="#">More Information</a>
      </article>
      <article class="upcomming-production">
        <img src="https://via.placeholder.com/360x480/000000/" style="height: 480px; width: 350px" />
        <h3 class="text-display">Show Name</h3>
        <p>11 NOV - 15 NOV</p>
        <a href="#">More Information</a>
      </article>
      <article class="upcomming-production">
        <img src="https://via.placeholder.com/360x480/000000/" style="height: 480px; width: 350px" />
        <h3 class="text-display">Show Name</h3>
        <p>11 NOV - 15 NOV</p>
        <a href="#">More Information</a>
      </article>
      <article class="upcomming-production">
        <img src="https://via.placeholder.com/360x480/000000/" style="height: 480px; width: 350px" />
        <h3 class="text-display">Show Name</h3>
        <p>11 NOV - 15 NOV</p>
        <a href="#">More Information</a>
      </article>
    </div>
  </section>
  <section class='auditions'>
    <h2 class="text-flourish text-centered text-xl">Participate</h2>
    <p class="subtitle text-centered text-xl text-display">Upcomming Auditions</p>
    <article class="audition flex flex-row centered-container">
      <img src="https://via.placeholder.com/150x150" style="height: 150px; width: 150px;" />
      <div>
        <h3 class="text-display">2020 - A Perfect Year for Magical Thinking</h3>
        <p>Some brief description of the show</p>
      </div>
      <a href="#" class="btn btn-primary">Register Now</a>
    </article>
    <article class="audition flex flex-row centered-container">
      <img src="https://via.placeholder.com/150x150" style="height: 150px; width: 150px;" />
      <div>
        <h3 class="text-display">2020 - A Perfect Year for Magical Thinking</h3>
        <p>Some brief description of the show</p>
      </div>
      <a href="#" class="btn btn-primary">Register Now</a>
    </article>
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
        <a hef="#" class="btn btn-primary">View All</a>
      </div>
      </p>
    </div>
  </section>
  <section class="support">
    <h2 class="text-flourish text-centered text-xl">Support Us</h2>
    <div class="centered-container">
      <div class="flex centered-container">
        <div class="become-a-donor text-white bg-purple">
          <h3 class="text-display text-xl ">Become a Donor</h3>
          <p class="flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-white">Donate Now</a>
        </div>
        <div class="become-a-friend bg-white text-black">
          <h3 class="text-display text-xl">Become a Friend</h3>
          <p class="flex-grow">Friendship runs by calendar year: January 1 – December 31.
            Friendship becomes active once payment notification is received by Old
            Library Theatre. Anyone over the age of 18 is eligible to become a
            Friend of Old Library Theatre. For $30, Friends receive guaranteed
            tickets for all season productions for $15 – up to 35% off regular
            ticket prices. Friends are voting members of OLT and are automatically
            added to OLT’s mailing list, invited to monthly meetings and are
            eligible for election to executive board positions (see the
            Constitution and Bylaws for additional information).</p>
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
        <div class="album-grid">
          <img class="grid-1x1" src="https://via.placeholder.com/490x320" />
          <img class="grid-1x1" src="https://via.placeholder.com/490x320" />
          <img class="grid-1x2" src="https://via.placeholder.com/490x690" />
          <img class="grid-1x1" src="https://via.placeholder.com/490x320" />
          <img class="grid-1x1" src="https://via.placeholder.com/490x320" />
        </div>
        <a hef="#" class="btn btn-primary">View All</a>
      </div>
      </p>
    </div>
  </section>
  <section class="social">
    <h2 class="text-flourish text-centered text-xl text-purple">Updates</h2>
    <p class="subtitle text-centered text-xl text-display">Follow Us on Social Media</p>
    <div class="flex centered-container">
      <img src="https://via.placeholder.com/360x370" />
      <img src="https://via.placeholder.com/360x370" />
      <img src="https://via.placeholder.com/360x370" />
      <img src="https://via.placeholder.com/360x370" />
    </div>
  </section>
<?=  get_footer(); ?>

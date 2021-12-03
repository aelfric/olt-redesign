<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?php bloginfo('charset'); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="small-header">
        <a href="/"><img src="<?= get_template_directory_uri() ?>/cropped-OLT-BW-Logo-Thick21 (1).png"></a>
    </div>
    <section class='our-mission'>
        <p class="margin-text margin-text--right">Old Library Theatre</p>
        <div class="centered-container flex flex-top">
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
                    <? if (null !== get_field("register_link")) { ?>
                        <a href="<?= get_field("register_link") ?>" class="btn btn-primary">Register Now</a>
                    <? } ?>
                    <?= the_content() ?>
                </div>
            </div>
            <div class="half">
                <div class="image-h-purple">
                    <?php echo the_post_thumbnail('hero-image') ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
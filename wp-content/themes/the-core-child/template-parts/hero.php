<?php
if ($hero_image = carbon_get_post_meta(get_the_ID(), 'crb_hero_image')) {
    $hero_image_url = wp_get_attachment_image_url($hero_image, 'full');
    $hero_image_mob = carbon_get_post_meta(get_the_ID(), 'crb_hero_image_mob');
    $hero_image_url_mob = wp_get_attachment_image_url($hero_image_mob, 'full');
?>
    <section class="hero-section">
        <picture>
            <source srcset="<?php echo $hero_image_url_mob ?>" media="(max-width: 576px)">
            <img src="<?php echo $hero_image_url ?>" alt="<?php echo bloginfo('name') ?>">
        </picture>

    </section>
<?php

}


?>
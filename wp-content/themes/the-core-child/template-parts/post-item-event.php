<div class="post-item swiper-slide events-slide">
    <?php
    if ($thumb_imgs = carbon_get_post_meta(get_the_ID(), 'crb_event_images')) {
    ?>
        <div class="event-thumb__imgs">
        <?php
        foreach ($thumb_imgs as $thumb_img) {
            $image_item = $thumb_img['crb_event_thumb_img'];
            $image_item_url = wp_get_attachment_image_url($image_item, 'full');
        ?>
            <a data-fancybox="gallery" href="<?php echo $image_item_url ?>"> <img src="<?php echo $image_item_url  ?>" alt="<?php echo the_title() ?>"></a>
        <?php
        }
        ?>
        </div>
    <?php
    } elseif ((has_post_thumbnail())) {
        echo '<a href="<?php the_permalink() ?>" class="post-item__thumb">';
        the_post_thumbnail();
        echo '</a>';
    } else {
        echo '<a href="<?php the_permalink() ?>" class="post-item__thumb">';
        echo '<img src="' . get_stylesheet_directory_uri() . '/images/svg/placeholder.svg" />';
        echo '</a>';
    }
    ?>
    

    <?php
    if (has_category('events-reports')) {
    ?>
        <a href="<?php the_permalink() ?>">
            <h3 style="text-align: center;" class="post-item__heading"><?php the_title() ?></h3>
        </a>
    <?php
    } else {
    ?>
        <a href="<?php the_permalink() ?>">
            <h3 class="post-item__heading"><?php the_title() ?></h3>
        </a>
    <?php
    }
    ?>
    <div class="post-item__date"><?php echo the_date() ?></div>

</div>
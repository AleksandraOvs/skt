<section class="section-directions">
    <div class="container">
        <?php if ($block_head = carbon_get_post_meta(get_the_ID(), 'crb_directions')) {
            echo '<h2 class="title color-accent">' . $block_head . '</h2>';
        }
        ?>
        <?php
        if ($directions = carbon_get_post_meta(get_the_ID(), 'crb_directions_list')) {
        ?>
            <ul class="directions-list">
                <?php
                foreach ($directions as $dir) {
                    $dir_icon = $dir['crb_direction_icon'];
                    $dir_icon_url = wp_get_attachment_image_url($dir_icon, 'full');
                ?>
                    <li class="dir-list__item">
                        <div class="dir-list__item__img">
                            <img src="<?php echo $dir_icon_url ?>" alt="<?php echo $dir['crb_direction_head'] ?>">
                        </div>
                        <h3 class="dir-list__item__head"><?php echo $dir['crb_direction_head'] ?></h3>
                        <div class="dir-list__item__desc"><?php echo $dir['crb_direction_desc'] ?></div>
                    </li>
                <?php
                }
                ?>
            </ul>
        <?php
        }

        ?>
    </div>
</section>
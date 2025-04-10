 <section class="section-purpose">
     <div class="container">
         <?php
            if ($block_head = carbon_get_post_meta(get_the_ID(), 'crb_purpose')) {
                echo '<h2 class="title">' . $block_head . '</h2>';
            }
            ?>

         <div class="section-purpose__inner">
             <div class="section-purpose__inner__pic">
                 <?php
                    if ($block_image = carbon_get_post_meta(get_the_ID(), 'crb_purpose_img')) {
                        $block_mage_url = wp_get_attachment_image_url($block_image, 'full');
                        echo '<div class="section-purpose__inner__img"><img src="' . $block_mage_url . '" alt="' . $block_head . '" /></div>';
                    } else {
                        echo '<div class="section-purpose__inner__img _purpose-img"><img src="' . get_stylesheet_directory_uri() . '/images/img1.jpg" alt="' . $block_head . '" /></div>';
                    }
                    ?>
             </div>


             <div class="section-purpose__inner__right">
                 <?php
                        if ($block_text = carbon_get_post_meta(get_the_ID(), 'crb_purpose_text')) {
                            echo '<div class="block-text">'.$block_text.'</div>';
                        }
                    ?>
             </div>

         </div>
     </div>
 </section>
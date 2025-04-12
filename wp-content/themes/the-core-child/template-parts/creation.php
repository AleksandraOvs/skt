<section class="section-creation">
     <div class="container">
         <?php
            if ($block_head = carbon_get_post_meta(get_the_ID(), 'crb_creation_head')) {
                echo '<h2 class="title color-accent">' . $block_head . '</h2>';
            }
            ?>

         <div class="section-creation__inner">
             <div class="section-creation__inner__pic">
                 <?php
                    if ($block_image = carbon_get_post_meta(get_the_ID(), 'crb_creation_image')) {
                        $block_image_url = wp_get_attachment_image_url($block_image, 'full');
                        echo '<img src="' . $block_image_url . '" alt="' . $block_head . '" />';
                    }
                    ?>
             </div>

             <div class="section-creation__inner__right">
                 <?php
                        if ($block_text = carbon_get_post_meta(get_the_ID(), 'crb_creation_text')) {
                            echo '<div class="block-text">'.$block_text.'</div>';
                        }
                    ?>

                    <?php 
                        if ($link = carbon_get_post_meta(get_the_ID(), 'crb_creation_link')) {
                            $lint_text = carbon_get_post_meta(get_the_ID(), 'crb_creation_link_text');
                            echo '<a class="btn-link" href="'.$link.'">'.$lint_text.'</a>';
                        }
                    ?>
             </div>

         </div>
     </div>
 </section>
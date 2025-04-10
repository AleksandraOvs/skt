<div class="post-item swiper-slide">
<a href="<?php the_permalink() ?>" class="post-item__thumb">
    <?php 
        
        if( has_post_thumbnail() ) {
           
            the_post_thumbnail();
          
        }
        else {
            echo '<img src="'.get_stylesheet_directory_uri().'/images/svg/placeholder.svg" />';
        }
    ?>
</a>
    <a href="<?php the_permalink() ?>"><h3 class="post-item__heading"><?php the_title() ?></h3></a>

    <?php
   
        if ( get_post_type(get_the_ID()) === 'fw-event' ){
            if ($event_date = carbon_get_post_meta(get_the_ID(), 'crb_event_date')){

               echo '<div class="post-item__date"><span>Дата проведения: </span>'.date('d-m-Y').'</div>';
            }
        }else {
            ?>
            <div class="post-item__date"><?php echo the_date() ?></div>
            <?php
        }
    
    ?>

    </div>
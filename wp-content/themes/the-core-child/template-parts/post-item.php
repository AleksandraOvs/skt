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

<?php 
   if (has_category('events-reports')){
    ?>
    <a href="<?php the_permalink() ?>"><h3 style="text-align: center;" class="post-item__heading"><?php the_title() ?></h3></a>
    <?php
   } else{
    ?>
    <a href="<?php the_permalink() ?>"><h3 class="post-item__heading"><?php the_title() ?></h3></a>
    <?php
   }
?>
    

    <?php
   
        if ( get_post_type(get_the_ID()) === 'fw-event'  ){
           
            if ($event_date = carbon_get_post_meta(get_the_ID(), 'crb_event_date') && !has_category('events-reports')){

               echo '<div class="post-item__date"><span>Дата проведения: </span>'.date('d-m-Y').'</div>';
            }else {
                ?>
                     <div class="post-item__date" style="display: block; margin: 0 auto;"><?php echo the_date() ?></div>
                <?php
            }
        }else {
            ?>
            <div class="post-item__date"><?php echo the_date() ?></div>
            <?php
        }
    ?>

    </div>
<?php
$args = array(
    'post_type' => 'fw-event',
    'cat' => 9,
    'posts_per_page' => 15,
    'orderby' => 'date',
    'order' => 'DESC'
);

$query = new WP_Query($args);
?>
<?php
// Цикл
if ($query->have_posts()) {
?>
    <section class="section-reports">
        <div class="container">
            <h2 class="title color-accent">Отчеты о мероприятиях</h2>

        <?php
        echo '<div class="swiper news-slider"><div class="swiper-wrapper news-slider-wrapper">';
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/post-item');
        }
        echo '</div></div>';
    } else {
        
    }
    wp_reset_postdata();
        ?>

        <?php
        $category_id = get_cat_ID('Отчеты о мероприятиях');
        $category_link = get_category_link($category_id);
        ?>
       
        <a class="btn-link" href="<?php echo $category_link ?>">Смотреть все</a>
      
        </div>
    </section>
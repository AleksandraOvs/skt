<section class="section-news">
    <div class="container">
        <h2 class="title color-main">Новости</h2>
        <?php
        $args = array(
            'category_name' => 'all',
            'posts_per_page' => 10,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $query = new WP_Query($args);
        ?>

        <?php
        // Цикл
        if ($query->have_posts()) {
        ?>

        <?php
            echo '<div class="swiper news-slider"><div class="swiper-wrapper news-slider-wrapper">';
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part('template-parts/post-item');
            }
            echo '</div></div>';
        } else {
            // Постов не найдено
        }
        // Возвращаем оригинальные данные поста. Сбрасываем $post.
        wp_reset_postdata();
        ?>
    <?php
// Получим ID категории
$category_id = get_cat_ID( 'Все новости' );

// Теперь, получим УРЛ категории
$category_link = get_category_link( $category_id );
?>
        <!-- выведем ссылку на категорию -->
        <a class="btn-link" href="<?php echo $category_link ?>">Все новости</a>
    </div>
</section>
<section class="section-events">
    <div class="container">
        <h2 class="title color-accent">Мероприятия</h2>
        <?php
        $args = array(
            'post_type' => 'fw-event',
            'posts_per_page' => 15,
            'orderby' => 'date',
            'order' => 'DESC',
            'category__not_in' => [9]
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

        <!-- выведем ссылку на категорию -->
        <a class="btn-link" href="<?php echo get_post_type_archive_link('fw-event'); ?>">Все новости</a>

    </div>
</section>
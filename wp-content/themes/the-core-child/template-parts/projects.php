<?php
if ($crb_cats = carbon_get_post_meta(get_the_ID(), 'crb_post_types')) {
    foreach ($crb_cats as $key => $crb_cat) {
        //print_r ( $crb_cats );
        $posts_cat = "'" . $crb_cat['id'] . "'";


        $args = array(
            'cat' => $posts_cat,
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $count = 0;
?>
            <section class="section-posts-list">
                <div class="container">
                    <?php
                    if ($block_head = carbon_get_post_meta(get_the_ID(), 'crb_post_types_head')){
                        echo '<h2 class="title">'.$block_head.'</h2>';
                    }
                    ?>
                    <div class="swiper links-slider">
                        <div class="swiper-wrapper">

                        <?php
                    while ($query->have_posts()) {
                        $query->the_post();

                        // Открываем новый блок <div> каждые 10 постов
                        if ($count % 10 === 0) {
                            if ($count > 0) {
                                echo '</div>'; // закрываем предыдущий блок
                            }
                            echo '<div class="swiper-slide links-slider__slide">'; // открываем новый блок
                        }

                        echo '<a class="links-item" href="' . get_permalink() . '"><span>' . get_the_title() . '</span>
                        <svg width="38" height="8" viewBox="0 0 38 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 4L37 4" stroke="#1E295D" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M34.375 7.25L37.5 4.125L34.375 1" stroke="#1E295D" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                        </a>';

                        $count++;
                    }

                    echo '</div>'; // закрываем последний открытый блок
                    wp_reset_postdata();
                } else {
                    echo 'Постов не найдено.';
                }
                        ?>
                        </div>
                        <div class="slider-news-pagination"></div>
                    </div>
                </div>
            </section>






    <?php
    }
} ?>
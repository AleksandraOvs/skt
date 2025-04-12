<section class="section-links">
    <div class="container">
        <ul class="page-header-links">
            <li><a href="<?php echo site_url() ?>">Главная</a></li>
            <li><a href="<?php echo site_url() ?>">Клубы</a></li>
        </ul>
    </div>
</section>

<section class="section-clubs">
    <div class="container">
        <h2 class="title color-accent text-center"><?php the_title() ?></h2>
        <?php if ($page_desc = carbon_get_post_meta(get_the_ID(), 'crb_club_page_desc')) {
        ?>
            <div class="page-description">
                <?php echo $page_desc ?>
            </div>
        <?php
        } ?>
        <?php
        // Указываем таксономию, связанную с CPT 'clubs'
        $taxonomy = 'locate'; // замени на свою таксономию

        // Получаем все НЕ пустые термины
        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'orderby' => 'date',
            'order' => 'ASC'
            //'hide_empty' => true, // только термины, у которых есть связанные посты
        ));

        if (!empty($terms) && !is_wp_error($terms)) {
            echo '<div class="club-taxonomy-list">';
            foreach ($terms as $term) {

                $term_id = esc_attr($term->term_id);
                $term_slug = esc_attr($term->slug);
                $term_name = esc_html($term->name);
                $popup_id = 'popup-' . $term_slug;
                //$term_link = get_term_link($term);

                // Получаем записи, относящиеся к термину
                $posts = get_posts(array(
                    'post_type' => 'clubs',
                    'posts_per_page' => -1,
                    'order'   => 'ASC',
                    'orderby' => 'date',
                    'tax_query' => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field'    => 'slug',
                            'terms'    => $term_slug,
                        ),
                    ),
                ));
                //  echo '<li>';
                echo '<a data-fancybox data-src="#' . $popup_id . '" href="javascript:;">' . $term_name . '</a>';

                // Скрытый блок для Fancybox
                echo '<div style="display: none;" id="' . $popup_id . '">';
                echo '<h2>' . $term_name . '</h2>';

                $tab_svg = '<svg class="tab_svg" width="98" height="98" viewBox="0 0 98 98" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_48_2)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M48 98L48 0H52L52 98H48Z" fill="#9DE6EF"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M0 48L98 48L98 52L-1.74845e-07 52L0 48Z" fill="#9DE6EF"/>
</g>
<defs>
<clipPath id="clip0_48_2">
<rect width="98" height="98" fill="white"/>
</clipPath>
</defs>
</svg>

                ';

                if (!empty($posts)) {
                    foreach ($posts as $post) {
                        setup_postdata($post);
                        echo '<div class="accordion-item">';
                        echo '<div class="accordion-header"><span>' . esc_html(get_the_title($post)) .'</span>'. $tab_svg . '</div>';
        ?>
                        <div class="accordion-content">
                            <?php if ($club_locate = carbon_get_post_meta(get_the_ID(), 'crb_club_locate')) {
                                $club_address = carbon_get_post_meta(get_the_ID(), 'crb_club_address');
                                $club_leads = carbon_get_post_meta(get_the_ID(), 'crb_club_leads');

                            ?>
                                <!-- <div class="club-info"> -->

                                <ul class="club-info__main">
                                    <li class="club-info__main__info">
                                        <p>Место расположения:</p>
                                        <span><?php echo $club_locate ?></span>
                                    </li>
                                    <?php if (!empty($club_address)) {
                                        echo  '<li class="club-info__main__info">
        <p>Адрес:</p>
        <span>' . $club_address . '</span>
    </li>';
                                    }
                                    ?>
                                </ul>

                                <?php
                                if (!empty($club_leads)) {
                                ?>
                                    <ul class="leads-table">
                                        <li class="leads-table__row _table-head">
                                            <div class="leads-table__item">Ведущий клуба:</div>
                                            <div class="leads-table__item">Контакты: </div>
                                            <div class="leads-table__item">Регулярность встреч <span>(1 раз в неделю)</span></div>
                                        </li>
                                        <?php
                                        foreach ($club_leads as $club_lead) {
                                        ?>
                                            <li class="leads-table__row">
                                                <div class="leads-table__item"><?php echo $club_lead['crb_club_lead_name'] ?></div>
                                                <div class="leads-table__item"><?php echo $club_lead['crb_club_lead_contacts'] ?></div>
                                                <div class="leads-table__item"><?php echo $club_lead['crb_club_lead_time'] ?></div>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                <?php
                                }
                                ?>
                                <!-- </div> -->
                            <?php
                            }
                            ?>

                        </div>
        <?

                        echo '</div>';
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>Нет записей для этой категории.</p>';
                }

                echo '</div>';
                // echo '</li>';
            }

            echo '</ul>';
        } else {
            echo '<p>Нет доступных категорий.</p>';
        }
        ?>
    </div>

</section>

<section class="section-text">
    <div class="container">
        <?php
       
        if ($text_h3 = carbon_get_post_meta(get_the_ID(), 'crb_club_text_h3')) {
            echo '<h3 class="color-accent">' . $text_h3 .  '</h3>';
        }
        ?>
        <?php
        if ($text_content = carbon_get_post_meta(get_the_ID(), 'crb_club_text_content')) {
            echo '<div class="hidden-text collapsed" id="textBlock">' . $text_content . '</div>';
        }
        ?>
        <button class="clamp-text clamped" id="toggleBtn">Показать больше</button>
    </div>
</section>
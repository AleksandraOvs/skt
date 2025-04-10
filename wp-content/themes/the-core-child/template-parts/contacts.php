<section class="section-contacts">
    <div class="container">
        <div class="contacts__inner">
            <div class="contacts__inner__left">
                <h2 class="title color-main">Контакты</h2>

                <ul class="contacts__inner__left__list">
                    <?php
                    if ($address = carbon_get_theme_option('crb_address_label')) {
                    ?>
                        <li class="contacts__inner__left__list__item">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pin.png" alt="<?php echo $address ?>" class="item-icon">

                            <span><?php echo $address ?></span>
                        </li>
                    <?php
                    }
                    ?>

                    <?php
                    if ($phone_link = carbon_get_theme_option('crb_phone_link')) {
                        $phone = carbon_get_theme_option('crb_phone_label');
                    ?>
                        <li class="contacts__inner__left__list__item">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/phone.png" alt="Номер телефона" class="item-icon">
                            <a href="<?php echo $phone_link ?>"><?php echo $phone ?></a>
                        </li>
                    <?php
                    }
                    ?>

                    <?php
                    if ($email_link = carbon_get_theme_option('crb_email_link')) {
                        $email = carbon_get_theme_option('crb_email_label');
                    ?>
                        <li class="contacts__inner__left__list__item">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/mail.png" alt="E-mail" class="item-icon">
                            <a href="<?php echo $email_link ?>"><?php echo $email ?></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

                <?php
                if ($messengers = carbon_get_theme_option('messengers')) {
                ?>
                    <ul class="messengers-list">
                        <?php
                        foreach ($messengers as $messenger) {
                            $mes_img = wp_get_attachment_image_url($messenger['crb_mes_image'], 'full')
                        ?>
                            <li class="messengers-list__item">
                                <a class="link" target="_blank" href="<?php echo $messenger['crb_mes_link'] ?>" class="messengers-list__item__link"
                                    <?php
                                    if ($contact_color = $messenger['crb_contact_background']) {
                                        echo 'style="background-color:' . $contact_color . '; outline-color:' . $contact_color . '"';
                                    }
                                    ?>>
                                    <img src="<?php echo $mes_img; ?>" alt="<?php echo $messenger['crb_mes_name'] ?>">

                                </a>
                            </li>

                        <?php
                        }
                        ?>
                    </ul>
                <?php
                }
                ?>

                <?php
                if ($map_code = carbon_get_theme_option('crb_map_code')) {
                ?>
                    <div id="map" class="map">
                        <div class="map__inner">
                            <?php echo $map_code ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="contacts__inner__right">
                <?php
                if ($contactform = carbon_get_theme_option('crb_form_shortcode')) {
                    echo do_shortcode(" $contactform ");
                }
                ?>
            </div>
        </div>
    </div>
</section>
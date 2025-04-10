<?php
if ($partners = carbon_get_post_meta(get_the_ID(), 'crb_partners')) {
?>
    <section class="section section-partners" id="partners">
        <div class="container">
            <div class="inner-wrap">
                <h2 class="title color-main">Наши партнеры</h2>
                <div class="swiper partners-slider">
                    <div class="swiper-wrapper partners-slider-wrapper">
                        <?php
                        foreach ($partners as $partner) {
                            $partner_logo = wp_get_attachment_image_url($partner['crb_partner_logo'], 'full');
                            echo '<div class="swiper-slide partners-slider__slide"><a href="' . $partner['crb_partner_link'] . '" class="partners-list__item"><img src="' . $partner_logo . '" alt="' . $partner['crb_partner_name'] . '">
                        <span>' . $partner['crb_partner_name'] . '</span>
                        </a></div>';
                        }
                        ?>
                    </div>

                    <div class="slider-partners-pagination"></div>
                </div>

                <div class="slider__button-prev">
                    <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.548 20.9487L10.6818 22.8131L0.517034 12.6519C0.353183 12.4891 0.223149 12.2954 0.134415 12.0822C0.0456813 11.8689 0 11.6402 0 11.4092C0 11.1782 0.0456813 10.9495 0.134415 10.7362C0.223149 10.523 0.353183 10.3293 0.517034 10.1665L10.6818 0L12.5463 1.86445L3.0059 11.4066L12.548 20.9487Z" fill="#B5B9C6" />
                    </svg>

                </div>
                <div class="slider__button-next">
                    <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.000815392 1.8648L1.86702 0.000349045L12.0318 10.1616C12.1956 10.3244 12.3257 10.518 12.4144 10.7313C12.5031 10.9446 12.5488 11.1733 12.5488 11.4043C12.5488 11.6353 12.5031 11.864 12.4144 12.0772C12.3257 12.2905 12.1956 12.4841 12.0318 12.6469L1.86702 22.8135L0.00257397 20.949L9.54293 11.4069L0.000815392 1.8648Z" fill="#B5B9C6" />
                    </svg>
                </div>
                
            </div>
        </div>
    </section>
<?php
}
?>
<?php
if ($map_code = carbon_get_post_meta(get_the_ID(), 'crb_clubs_map_code')) {
?>
    <section class="section-map">
        <div class="container">
            <h2 class="title color-accent">Карта клубов МОД СКТ</h2>
            
                    <div class="map" id="map">
                        <?php echo $map_code ?>
                    </div>
               
        </div>
    </section>
<?php
}
?>
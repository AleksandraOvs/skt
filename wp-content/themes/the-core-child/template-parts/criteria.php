<?php

if ($criteries_items = carbon_get_post_meta(get_the_ID(), 'crb_criteria_items')){
    ?>
        <section class="section-criteria">
            <div class="container">
                <h3 class="color-accent">Критерии участников Движение в России</h3>
                <?php 
                    if ($cr_items_desc = carbon_get_post_meta(get_the_ID(), 'crb_criteria_desc')){
                        ?>
                            <div class="page-description">
                                <?php echo $cr_items_desc ?>
                            </div>
                        <?php
                    }
                ?>

                <button class="show-criteria">Читать полностью...</button>

                <ul class="criteria-list">
                    <?php
                    $i=0;
                        foreach ($criteries_items as $criteries_item){
                            $i++;
                            ?>
                                <li class="criteria-list__item">
                                    <div class="list-item-num">
                                        <span><?php echo $i ?></span>
                                    </div>
                                    <div class="list-item__content">
                                    <?php echo $criteries_item['crb_criteria_item']?>
                                    </div>
                                </li>
                            <?php
                        }
                    ?>
                </ul>

            </div>
        </section>
    <?php
}
?>
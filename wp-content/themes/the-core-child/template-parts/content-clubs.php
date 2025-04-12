<?php if ($club_locate = carbon_get_post_meta(get_the_ID(), 'crb_club_locate')){
   $club_address = carbon_get_post_meta(get_the_ID(), 'crb_club_address');
   $club_leads = carbon_get_post_meta(get_the_ID(), 'crb_club_leads');
   
   ?>
<!-- <div class="club-info"> -->

<ul class="club-info__main">
    <li class="club-info__main__info">
        <p>Место расположения:</p>
        <span><?php echo $club_locate ?></span>
    </li>
    <?php if (!empty($club_address)){
        echo  '<li class="club-info__main__info">
        <p>Адрес:</p>
        <span>' .$club_address. '</span>
    </li>';
    }
    ?>
</ul>

<?php
    if ( !empty( $club_leads)){
        ?>
        <ul class="leads-table">
        <li class="leads-table__row _table-head">
                            <div class="leads-table__item">Ведущий клуба:</div>
                            <div class="leads-table__item">Контакты: </div>
                            <div class="leads-table__item">Регулярность встреч <span>(1 раз в неделю)</span></div>
                        </li>
            <?php
                foreach($club_leads as $club_lead){
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

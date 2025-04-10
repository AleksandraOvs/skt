<?php
if ($nums = carbon_get_post_meta(get_the_ID(), 'crb_nums_list')) {
?>
    <section class="section-nums">
        <div class="container">
            <h2 class="title">О движении в цифрах</h2>
            <ul class="nums-list">
                <?php
                $i = 0;
                foreach ($nums as $num) {
                    $i++;
                ?>
                    <li class="num-item">
                        <span class="num-item__num <?php if ($i > 1) {
                                                        echo 'js-anim-numbers';
                                                    } ?>"><?php echo $num['crb_num_num'] ?></span>
                        <p class="num-item__desc"><?php echo $num['crb_num_desc'] ?></p>
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
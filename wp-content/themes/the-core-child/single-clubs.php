<?php

/**
 * The Template for displaying all single posts
 */

get_header();
?>

<div class="container">

<h3 class="club-heading"><?php the_title() ?></h3>

<?php get_template_part('template-parts/clubs-fields'); ?>

</div>


<?php get_footer(); ?>
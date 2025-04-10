<?php
global $post;
if( !isset( $extra_options ) ) $extra_options = array();
$the_core_permalink  = get_permalink();
$the_core_blog_title = the_core_get_blog_title( array( 'extra_options' => $extra_options ) );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post custom-post clearfix" ); ?>>
	<?php if( has_post_thumbnail() ) : ?>
		<div class="fw-post-thumbnail">
			<a href="<?php echo esc_url($the_core_permalink); ?>" class="post-thumbnail">
				<?php the_post_thumbnail('large'); ?>
			</a>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<<?php echo ($the_core_blog_title); ?> class="entry-title" itemprop="headline">
			<a href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a>
		</<?php echo ($the_core_blog_title); ?>>
	</header>

	<div class="entry-content clearfix" itemprop="text">
		<?php the_excerpt(); ?>
	</div>
</article>
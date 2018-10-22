<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php //foundationpress_entry_meta(); ?>

	<div class="post-info">
		<time class="post-info__time" datetime="<?php get_the_time( 'c' ) ?>"><?php echo sprintf( __( '%1$s', 'foundationpress' ), get_the_date() ) ?></time>
		<span class="post-info__category">In <?php $cat = get_the_category(); if($cat) { ?> <span><?php the_category(); ?></span> <?php } ?></span>
		<span class="post-info__author">By <?php echo get_the_author(); ?></span>
	</div>

	<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
	?>

	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<footer>
		<?php
			wp_link_pages(
				array(
					'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
					'after'  => '</p></nav>',
				)
			);
		?>
		<div class="tags-text">
		 <?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(null, ''); ?></p><?php } ?>
		</div>
	</footer>
</article>

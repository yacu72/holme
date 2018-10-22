<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php if( get_option('holme_setting_breadcrumb') ) { ?>
		<?php $sep = get_option('holme_setting_breadcrumb_separator'); ?>
		<div class="breadcrumbs_holder grid-x grid-padding-x align-middle">
		  <div class="grid-container medium-12">
		  	<a href="<?php get_home_url(); ?>">Home</a> <?php echo $sep; ?> <?php the_title(); ?>
		  </div>
		</div>

<?php } ?>

<?php //get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/featured-image' ); ?>
				<?php get_template_part( 'template-parts/content', '' ); ?>
				<?php the_post_navigation(); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();

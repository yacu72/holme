<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<?php
	if( get_option( 'home_sections_total') ) {
		$total = get_option( 'home_sections_total');
		for ($i = 1; $i <= $total; $i++) { ?>

			<?php if ( get_option('home_section_'. $i .'_type') == 'default' ) { ?>

					<section id="section-<?php echo strtolower(get_option('home_section_'. $i .'_name')) ?>" class="section">
						<div class="section-inner section-grid">
							<div class="section-content">
								<?php echo get_option('home_section_'. $i .'_text'); ?>
							</div>
							<div class="section-button">
								<a href="<?php echo get_option('home_section_'. $i .'_button_url'); ?>" class="button">
									<?php echo get_option( 'home_section_'. $i .'_button_text'); ?>
								</a>
							</div>
						</div>
					</section>

			<?php } elseif (get_option('home_section_'. $i .'_type') == 'icon_grid') { ?>

					<?php $columns = get_option( 'home_section_'. $i .'_columns' ); ?>
					<section id="section-<?php echo strtolower(get_option('home_section_'. $i .'_name')) ?>"  class="section section-icon-grid section-columns-<?php echo $columns; ?>">
						<div class="section-inner section-grid">
							<div class="section-content">

								<?php for ($c = 1; $c <= $columns; $c++) { ?>
									<div class="column column1-<?php echo $columns; ?>">

										<div class="icon_holder">
											<i class="fa <?php echo get_option( 'home_section_'. $i .'_icon_'. $c ); ?>" ></i>
										</div>

										<div class="icon_text_holder">
											<?php echo get_option( 'home_section_'. $i .'_column_'. $c ); ?>
										</div>

									</div>
								<?php } ?>

							</div>
						</div>
					</section>
			<?php } elseif (get_option('home_section_'. $i .'_type') == 'posts_grid') { ?>
				<?php
					$post_type = get_option( 'home_section_'. $i .'_post_type' );
					$items = get_option( 'home_section_'. $i .'_post_items' );
				?>

					<section id="section-<?php echo strtolower(get_option('home_section_'. $i .'_name')) ?>" class="section section-posts-grid section-columns-<?php echo $items; ?>">
						<div class="section-inner section-grid">
							<div class="section-content">

								<?php echo get_option( 'home_section_'. $i .'_text' ); ?>

									<?php
										$args = array(
											'post_type' => $post_type,
											'posts_per_page' => $items,
										);

										$posts = new WP_Query( $args );

										while($posts->have_posts() ) : $posts->the_post();
									?>

										<?php get_template_part( 'heaven/templates-part/default', get_option( 'home_section_'. $i .'_post_template' ) ); ?>


								 	<?php endwhile; wp_reset_postdata(); ?>

							</div>
						</div>
					</section>

			<?php } ?>

<?php
}/** endfor **/
	}
?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content">



		</main>
	</div>
</div>
<?php
get_footer();

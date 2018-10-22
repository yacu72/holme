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

<section class="hero parallax-section">
	<div class="main-container parallax-content">
		<div class="main-grid parallax-content-inner">

			<div class="hero-inner">

				<?php	if ( get_option( 'home_hero_text' ) ) { ?>

					<div class="hero-text">
						<?php  echo wp_kses_post( get_option( 'home_hero_text' ) );?>
					</div>

				<?php	}	?>

				<?php  if ( get_option( 'home_hero_button_text' ) ) { ?>
					<a href="<?php echo esc_url( get_option( 'home_hero_button_url' ) ); ?>" class="button"><?php echo esc_attr( get_option( 'home_hero_button_text' ) ); ?></a>
				<?php } ?>

			</div><!-- hero-inner -->

		</div><!-- main-grid -->
	</div><!-- main-container -->

</section>

<section class="section-two about">
	<div class="main-container">
		<div class="main-grid">

			<div class="section-two-inner">

				<?php	if ( get_option( 'section_two_text' ) ) { ?>

					<div class="section-two-text">
						<?php  echo wp_kses_post( get_option( 'section_two_text' ) );?>
					</div>

				<?php	}	?>

				<?php  if ( get_option( 'section_two_button_text' ) ) { ?>
					<a href="<?php echo esc_url( get_option( 'section_two_button_url' ) ); ?>" class="button"><?php echo esc_attr( get_option( 'section_two_button_text' ) ); ?></a>
				<?php } ?>

			</div><!-- hero-inner -->

		</div>
	</div>
</section>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content">



		</main>
	</div>
</div>
<?php
get_footer();

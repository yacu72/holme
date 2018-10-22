<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<header class="page_header fixed" role="banner">

		<div class="header_inner clearfix">
			<div class="header_top_bottom_holder">
				<div class="header_bottom clearfix">
					<div class="container grid-container">
						<div class="container_inner grid-x clearfix">
							<div class="header_inner_left medium-3">

								<!--<div class="mobile_menu_button">
									<span><i class="fa fa-bars"></i></span>
								</div>-->
								<div class="mobile_menu_button grid-x align-middle" <?php foundationpress_title_bar_responsive_toggle(); ?>>
									<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon cell" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
								</div>

								<div class="logo_wrapper ">
									<div class="q_logo ">
										<?php the_custom_logo(); ?>
									</div>
								</div>
							</div>
							<div class="header_inner_right"></div>

							<?php  //wp_nav_menu(  array('menu' => 'main_menu','container_class' => 'menu-main-menu-container cell auto') ); ?>
							<div class="menu-main-menu-container cell auto">
								<?php foundationpress_top_bar_r(); ?>
							</div>


							<div class="menu-mobile-wrapper">
								<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
									<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
								<?php endif; ?>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>


	</header>

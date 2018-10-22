<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer class="footer">

  <?php if( get_option( 'holme_footer_columns') != '' ) { ?>
    <?php $f_columns = get_option('holme_footer_columns'); ?>

    <div class="section section-footer">
      <div class="section-inner section-grid">
        <div class="section-content">
        <?php for ($i = 1; $i <= $f_columns; $i++) { ?>

            <?php
              // Cargo variables para pasar al template.
              $column_type = get_option('holme_footer_column_'. $i .'_type');

              if( $column_type == 'post' ){
                set_query_var( 'post_title', get_option('holme_footer_column_'.$i .'_post_title') );
                set_query_var( 'post_type', get_option('holme_footer_column_'.$i .'_post_type') );
                set_query_var( 'post_items', get_option('holme_footer_column_'.$i .'_post_items') );
                set_query_var( 'post_template', get_option('holme_footer_column_'.$i .'_post_template') );
              } elseif( $column_type == 'cat' ) {
                set_query_var( 'cat_title', get_option('holme_footer_column_'.$i .'_cat_title') );
                set_query_var( 'cat_name', get_option('holme_footer_column_'.$i .'_cat_name') );
                set_query_var( 'cat_limit', get_option('holme_footer_column_'.$i .'_cat_limit') );
                set_query_var( 'cat_counter', get_option('holme_footer_column_'.$i .'_cat_counter') );
              }
            ?>


            <div class="column1-<?php echo $f_columns; ?>">
              <?php set_query_var( 'column_id', $i ); ?>
              <?php get_template_part( 'heaven/templates-part/footer', get_option('holme_footer_column_'. $i .'_type') ); ?>
            </div>

        <?php } ?>
      </div><!-- section-content -->
    </div><!--section-inner -->
    </div><!-- section -->
  <?php } ?>

    <div class="footer-container">
        <div class="footer-grid">
            <?php dynamic_sidebar( 'footer-widgets' ); ?>
        </div>
    </div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>

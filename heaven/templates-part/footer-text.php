<?php

 ?>
<?php $column_id = get_query_var('column_id'); ?>
 <div class="footer-text">
   <?php echo wp_kses_post( get_option( 'holme_footer_column_'. $column_id .'_text' ) ); ?>
 </div>

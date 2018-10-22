<?php

 ?>

 <div class="footer-category">
   <h2><?php echo $cat_title; ?></h2>
   <?php
    $args = array(
      'taxonomy' => $cat_name,
      'title_li' => '',
      'exclude' => 1,
      'show_count' => ( $cat_counter == 'Yes') ? 1 : 0,
      'number' => ( $cat_limit != 0 ) ? $cat_limit : 0,
    );
   ?>
   <ul>
     <?php echo wp_list_categories( $args ); ?>
   </ul>

 </div>

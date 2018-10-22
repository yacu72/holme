<?php

 ?>

 <div class="footer-post">
   <h2><?php echo $post_title; ?></h2>
   <?php
    $args = array(
      'post_type'     => $post_type,
      'posts_by_page' => $post_items,
      'order'         => 'DESC',
    );

    $posts = new WP_Query( $args );

    while ( $posts->have_posts() ) : $posts->the_post();
   ?>

   <article class="post">
     <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
   </article>

  <?php endwhile; wp_reset_postdata(); ?>
 </div>

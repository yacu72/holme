
<div class="latest_post_holder">
  hola
  <div class="boxes_image">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post_grid_default' ); ?></a>
  </div>
  <div class="latest_post">
    <div class="latest_post_text">
      <span class="date_holder"><?php the_time( 'F j, Y' ); ?></span>
      <h4 class="latest_post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
      <?php the_excerpt(); ?>
    </div>
  </div>
</div>

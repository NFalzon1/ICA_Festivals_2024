<?php get_header() ?>

<style>
  .textCentre {
    text-align: center;
  }
</style>


<div class="container">
  <div class="row">
    <div class="col-8">
      <?php if (have_posts()):
        while (have_posts()):
          the_post() // The : are used instead of the curly brackets   ?>

          <?php the_content();
        endwhile;
      endif;
      ?>
    </div>

  </div>
</div>





<?php get_footer(); ?>
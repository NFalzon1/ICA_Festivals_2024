<?php
$button_bg = get_theme_mod("custom_button_bg", "#ffffff");
$button_text = get_theme_mod("custom_button_text", "#ffffff");
?>

<div class="card" style="col; margin-bottom:5%">
  <div class="card-body">
    <h5 class="card-title" style="padding-bottom:1%">
      <?php the_title(); ?>
    </h5>
    <p class="card-text">
      <?php the_excerpt(); ?>
    </p>
    <div class="card-link">
      <a href="<?php the_permalink(); ?>" class="btn btn-primary"
        style="background-color: <?php echo $button_bg ?>; color: <?php echo $button_text ?>">Read More</a>
    </div>
  </div>
</div>

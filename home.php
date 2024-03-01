<?php get_header() ?>

<div class="container">

  <div class="row">
    <?php

    $args = array('section_title' => 'Home');
    get_template_part("template-parts/loop", null, $args);

    ?>
    <div class="col-4">
      <h4>Featured articles</h4>
    </div>
  </div>
</div>

<?php get_footer() ?>
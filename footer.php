<?php

$footer_backgroundcolour = get_theme_mod("custom_footer_bg", "#171717");




$footer_layout = get_theme_mod('custom_footer_widget_count', '3');
$sidebars_active = false;
for ($i = 0; $i < $footer_layout; $i++) {
  if (is_active_sidebar('footer-sidebar-' . ($i + 1))) {
    $sidebars_active = true;
  }
}
if ($sidebars_active):
  ?>
  <footer class="footer" style='background-color:<?php echo $footer_backgroundcolour ?>;'>
    <?php
  echo "<div class='container-fluid'><div class='row footer-css' >";
  for ($i = 0; $i < $footer_layout; $i++):
    echo "<div class='col'>";
    if (is_active_sidebar('footer-sidebar-' . ($i + 1))) {
      dynamic_sidebar('footer-sidebar-' . ($i + 1));
    }
    echo "</div>";
  endfor;
  echo "</div></div></div>";
endif;
?>


<div class="container-fluid-w100 footerStyle <?php echo $footer_class . "" . $footer_text ?>" >

</div>
<div class='container-fluid' >
<?php wp_footer(); ?>
</div>


</body>

</html>
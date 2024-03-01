<?php
$footer_bg = get_theme_mod('custom_footer_bg', 'dark');
$footer_backgroundcolour = get_theme_mod("custom_theme_footer_bg", "#ffc107");
$footer_class = "bg-" . $footer_bg;

$footer_text = "text-light";
if ($footer_bg == "light") {
  $footer_text == "text-dark";
}

$footer_text = get_theme_mod("custom_theme_footer_text", "ffffff");

$footer_layout = get_theme_mod('custom_footer_widget_count', '2');
$sidebars_active = false;
for ($i = 0; $i < $footer_layout; $i++) {
  if (is_active_sidebar('footer-sidebar-' . ($i + 1))) {
    $sidebars_active = true;
  }
}
if ($sidebars_active):
  echo "<div class='container-fluid'><div class='row footer-css'>";
  for ($i = 0; $i < $footer_layout; $i++):
    echo "<div class='col'>";
    if (is_active_sidebar('footer-sidebar-' . ($i + 1))) {
      dynamic_sidebar('footer-sidebar-' . ($i + 1));
    }
    echo "</div>";
  endfor;
  echo "</div></div>";
endif;
?>


<div class="container-fluid-w100 footerStyle <?php echo $footer_class . "" . $footer_text ?>">

</div>
<div class='container-fluid' style='background-color:<?php echo $footer_backgroundcolour ?>;'>
<?php wp_footer(); ?>
</div>


</body>

</html>
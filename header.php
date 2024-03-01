<?php $logoPos = get_theme_mod('custom_logo_placement'); 
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!--States the language which is being used Function-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php bloginfo('name'); ?>
  </title> <!--Types the name of the page/blog title Function-->
  <?php wp_Head(); ?>
  <script src="https://kit.fontawesome.com/ed3821a1ee.js" crossorigin="anonymous"></script>
</head>


<body <?php body_class(); ?>> <!--Adds classes to body-->
  <div class='container-fluid' style='background-color:<?php echo $footer_bg ?>'>

    <div id="theme_header" class="navHeader">

      <div <?php if ($logoPos == "top") {
        echo "id='logo_image_top'";
      } else {
        echo "class='display_none'";
      } ?>>
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_theme_mod('diwp_logo'); ?>" /></a>
      </div>

      <header class="navbar navbar-expand-lg paddinglfrt">
        <div class="container-fluid menuButton">
          <div <?php if ($logoPos == "left") {
            echo "id='logo_image_left'";
          } else {
            echo "class='display_none'";
          } ?>>
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_theme_mod('diwp_logo'); ?>" /></a>
          </div>
          <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0 main-menu-div w-100">
              <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'main-menu',
                )
              );
              ?>
            </div>
            <?php get_search_form(); ?>
          </div>
        </div>
    </div>
    </header>
  </div>
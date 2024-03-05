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
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    // Display the WordPress navigation menu
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => 'navbar-nav ml-auto',
                    ));
                    ?>
                </div>
            </div>
        </nav>
    </header>


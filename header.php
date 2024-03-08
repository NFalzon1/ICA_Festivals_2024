<?php $logoPos = get_theme_mod('custom_logo_placement'); 
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!--States the language which is being used Function-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <!--Types the name of the page/blog title Function-->
    <?php bloginfo('name'); ?>
    </title> 
    <?php wp_Head(); ?>
    <script src="https://kit.fontawesome.com/ed3821a1ee.js" crossorigin="anonymous"></script>
</head>

<!-- Header made by Julian -->
<body <?php body_class(); ?>> <!--Adds classes to body-->
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- Name of site, clicking it takes you to home page -->
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <!-- Toggle hamburger menu in mobile view -->
                <button class="navbar-toggler navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                    // Display the WordPress navigation menu
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => 'navbar-nav ml-auto',
                        'add_li_class'   => 'nav-item',
                    ));
                    ?>
                </div>
            </div>
        </nav>
    </header>
    


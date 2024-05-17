<?php
$logoPos = get_theme_mod('custom_logo_placement');

$socials = [
    [
        'url'   => '//facebook.com/icafestival',
        'label' => 'Follow us on Facebook',
        'icon'  => 'fa-brands fa-facebook-f'
    ],
    [
        'url'   => '//instagram.com/icafestival/',
        'label' => 'Follow us on Instagram',
        'icon'  => 'fa-brands fa-instagram'
    ]
];

?>



<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!--States the language which is being used Function-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Types the name of the page/blog title Function-->
    <title>
    <?php bloginfo('name'); ?>
    </title> 
    <?php wp_Head(); ?>
    <!-- Font Awesome Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ed3821a1ee.js" crossorigin="anonymous"></script>

    <!-- Fonts set by Julian -->
    <!-- Rotunda font is used for headings -->
    <link rel="stylesheet" href="https://use.typekit.net/iwm8rfx.css">

    <!-- Sole Serif is used for paragraphs -->
    <link rel="stylesheet" href="https://use.typekit.net/gaa4itz.css">

    <!-- Add Lightbox2 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

<!-- Add Lightbox2 JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>


</head>

<!-- Header made by Julian -->
<body <?php body_class(); ?>> <!--Adds classes to body-->
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-custom-primary">
            <div class="container">
                <!-- Icon in top left of navigation bar -->
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_theme_mod('diwp_logo'); ?>" alt="" style="width: 100px;">
                </a>

                <!-- Toggle hamburger menu in mobile view -->
                <button class="navbar-toggler navbar-light " type="button" data-bs-toggle="collapse"
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
            </div>
        </nav>
    </header>
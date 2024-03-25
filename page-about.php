<?php get_header(); ?>
<?php
    # Load the page info
    $contacts = get_posts([ 'post_type' => 'contact' ]);
?>

    <!-- HEADER -->
    <header class="page-title header-with-offset">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>About</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- ABOUT SECTION -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-11">
                <div class="row">
                    <div class="col-12 col-md-7 order-1 order-md-0">
                        <p class="text-md-justify mt-3">The seventh edition of the MCAST ICA Festival celebrates the creative achievements of talented students of eleven Bachelor of Arts (Honours) courses at the MCAST Institute for the Creative Arts in Mosta. The festival offers a valuable platform for these students to exhibit their hard work and individual talents, gaining exposure among stakeholders in the creative industry and the local arts and design community.</p>
                    </div>
                    <div class="col-10 offset-1 col-md-5 offset-md-0 order-0 order-md-1 mb-5 mb-md-0">
                        <img src="<?= get_asset( '/assets/images/tagline.svg' ); ?>" alt="Dare to be Quixotic" class="d-block w-100">
                    </div>
                </div>
                
                <div class="mt-5"></div>
                <div class="row">
                    <div class="d-none d-md-block col-5 position-relative">
                        <img src="<?= get_asset( '/assets/images/manhand.png' ); ?>" alt="Decorative pointing finger" class="decoration d-block w-100 position-absolute" id="about-pointing-finger">
                    </div>
                    <div class="col-12 col-md-7">
                        <p class="text-md-justify mt-3">Inspired by the chivalrous unrealistic ideals of Don Quixote, students embody the values of creativity, authenticity, and imagination, unlocking their inner potential. To achieve innovation, it is necessary to break free from conventional thinking and establish new ideals driven by the creativity and ingenuity of a new generation better suited to meet the challenges of the modern world. Taking risks, challenging established norms, and exploring new ideas and approaches can lead to advancements that benefit society.</p>
                    </div>
                </div>
                
                <div class="mt-5"></div>
                <div class="row">
                    <div class="col-12 col-md-7">
                        <p class="text-md-justify mt-3">Join us on this journey of creativity and discovery, and celebrate the artists of tomorrow who embrace their inner Don Quixote. Let’s work together to transform the world through unique and imaginative perspectives.</p>
                    </div>
                    <div class="d-none d-md-block col-5 position-relative">
                        <img src="<?= get_asset( '/assets/images/8ball.png' ); ?>" alt="Decorative 8-ball" class="decoration d-block w-100 position-absolute" id="about-8-ball">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ABOUT SECTION -->

    <!-- ENTITY DETAILS -->
    <div class="container">

<?php $i = 0; foreach ($contacts as $post): setup_postdata( $post ); $image = wp_get_attachment_image_src( get_post_field('image'), 'full' ); ?>
        <hr class="separator separator-<?= ( $i + 1 ); ?>">
        <div class="row">
            <div class="col-12">
                <h2 class="fw-black text-ica-blue mb-md-4"><?php the_title() ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-7 order-1 order-md-0">
                <h4 class="fw-bold text-ica-black mb-3 mt-md-3 mb-md-4">Contact Details</h4>
<?php if ( !empty( get_post_field( 'phone' ) ) ): ?>
                <a href="tel:<?= get_post_field( 'phone' ) ?>" class="d-flex fw-normal mb-5 align-items-center text-ica-black">
                    <i class="fs-2 text-ica-yellow fa-solid fa-phone"></i>
                    <span class="ms-3">
                        <?= get_post_field( 'phone' ) ?>
                    </span>
                </a>
<?php endif; ?>
<?php if ( !empty( get_post_field( 'email' ) ) ): ?>
                <a href="mailto:<?= get_post_field( 'email' ) ?>" class="d-flex fw-normal mb-5 align-items-center text-ica-black">
                    <i class="fs-2 text-ica-yellow fa-solid fa-at"></i>
                    <span class="ms-3">
                        <?= get_post_field( 'email' ) ?>
                    </span>
                </a>
<?php endif; ?>
<?php if ( !empty( get_post_field( 'address' ) ) ): ?>
                <a href="<?= get_post_field( 'google_maps' ) ?>" class="d-flex fw-normal text-ica-black" target="_blank">
                    <i class="fs-2 text-ica-yellow fa-solid fa-location-dot"></i>
                    <p class="ms-3">
                        <?= nl2br( get_post_field( 'address' ) ) ?>
                    </p>
                </a>
<?php endif; ?>
            </div>
            <div class="col-12 col-md-5 order-0 order-md-1 my-3 my-md-0">
                <a href="<?= get_post_field( 'google_maps' ) ?>" class="d-block" target="_blank">
                    <div class="thumbnail rect" data-img="<?= $image[0] ?? 'default' ?>"></div>
                </a>
            </div>
        </div>
<?php wp_reset_postdata(); $i = ( $i + 1 ) % 2; endforeach; ?>

    </div>
    <!-- END ENTITY DETAILS -->
    
<?php get_footer(); ?>
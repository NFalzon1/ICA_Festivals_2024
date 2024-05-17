<?php
//Created by Nicholas & arranged by Julian
get_header();


// Start the loop
while (have_posts()):
    the_post();

    // Get ACF fields
    $course_id = get_field('select_course');
    $course_title = get_the_title($course_id);
    $student_name = get_field('students_full_name');
    $project_desc = get_field("project_description");
    $portfolio_link = get_field('portfolio_link');

    $project_image1 = get_field('project_image_1');




    // Output project details
    ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="single-project">
                <div class="container">
                    <div class="content-header">
                        <h5>Bachelor of Arts (Hons) in <?php echo esc_html($course_title); ?></h5>
                        <h2 style="font-style: italic; font-weight:bold;"> <?php echo esc_html($student_name); ?></h2>
                    </div>
                    <p style="text-align: justify; padding-bottom: 30px;"><?php echo $project_desc; ?></p>
                    <a href="<?php echo esc_url($portfolio_link) ?>">
                        <h5
                            style="text-decoration: underline; font-style: italic; font-weight: bold; padding-bottom:30px; color: white;">
                            Visit Portfolio</h5>
                    </a>
                </div>

                <div class="container">
                    <div class="row">
                        <?php
                        // Loop through each image field
                        for ($i = 1; $i <= 6; $i++) {
                            $project_image = get_field('project_image_' . $i);
                            // Check if the image field is not empty
                            if ($project_image) {
                                ?>
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <a href="<?php echo esc_url($project_image['url']); ?>" data-lightbox="project-gallery"
                                            data-title="<?php the_title_attribute(); ?>">
                                            <img src="<?php echo esc_url($project_image['url']); ?>" class="card-img-top"
                                                alt="<?php echo esc_attr($project_image['alt']); ?>">
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>


            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
    <?php
    // End the loop
endwhile;

get_footer();
?>

<style>
    .projectImages {
        padding-left: 300px;
        padding-right: 300px;
    }

    .content-header {
        color: white;
        text-align: left;
        padding: 50px 0px 20px 0px;
    }

    .card-title a {
        text-decoration: none;
        /* Remove underline */
        color: white;
        /* Make card text white */
    }

    .course-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        /* Align to start */
    }

    .course {
        width: calc(33.33% - 20px);
        /* 3 courses per row with some spacing */
        margin-bottom: 20px;
        border: none;
        /* Remove card border */
        padding: 10px;
        /* Add padding around the card */
    }

    .card {
        border: none;
        /* Remove card border */
        background-color: transparent;
        padding-bottom: 50px;
        /* Make card transparent */
    }

    .card-img-top {
        width: 100%;
        /* Set image width to 100% */
        height: 200px;
        /* Set image height (adjust as needed) */
        object-fit: cover;
        /* Maintain aspect ratio */
        padding: 10px;
        /* Add padding around the image */
    }

    .card-body {
        padding: 10px;
        text-align: center;
        /* Center align text */
        color: white;
        /* Make card text white */
    }

    .course-title {
        margin-top: 10px;
        font-weight: bold;
    }

    .course-title a {
        text-decoration: none;
        /* Remove underline */
        color: white;
        /* Make link title black */
    }

    .course-link {
        text-decoration: none;
    }

    .left-align {
        margin-right: auto;
        /* Align to left */
    }


    /* Set fixed aspect ratio for images */
    .card {
        position: relative;
        overflow: hidden;
    }

    .card-img-top {
        width: 100%;
        height: auto;
        transition: transform 0.2s ease-in-out;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
        /* Example: Increase image size on hover */
    }

    @media (max-width: 992px) {
        .course {
            width: calc(50% - 20px);
            /* 2 courses per row with some spacing */
        }
    }

    @media (max-width: 768px) {
        .course {
            width: 100%;
            /* 1 course per row */
        }

        .card {
            padding: 30px 30px;
        }
    }
</style>
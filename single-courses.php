<?php
//Created by Nicholas
get_header();

// Get the course ID from the current page
$course_id = get_queried_object_id();

// Custom query to fetch projects associated with the current course
$related_projects_query = new WP_Query(
    array(
        'post_type' => 'projects',
        'meta_query' => array(
            array(
                'key' => 'select_course',
                'value' => $course_id,
                'compare' => '='
            )
        ),
        'orderby' => array(
            'title' => 'asc'
        )
    )
);

// Check if there are related projects
if ($related_projects_query->have_posts()):
    ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="courses-list">
                <div class="container">
                    <?php
                    // Display course title
                    $course_desc = get_field("course_information");
                    $course_title = get_the_title($course_id);
                    $prospectus_link = get_field('prospectus_link');

                    if (!empty($course_title)): ?>
                        <div class="content-header">
                            <h4>Bachelor of Arts (Hons) in</h4>
                            <h2 style="font-style: italic; font-weight:bold;"><?php echo esc_html($course_title); ?></h2>
                        </div>
                        <div class="course-bio">
                            <p style="text-align: justify;"><?php echo $course_desc; ?></p>
                            <a href="<?php echo esc_url($prospectus_link) ?>">
                                <h5
                                    style="text-decoration: underline; font-style: italic; font-weight: bold; padding-bottom:30px; color: white;">
                                    Programme Specifications</h5>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="row course-container">
                        <?php $count = 0; ?>
                        <?php while ($related_projects_query->have_posts()):
                            $related_projects_query->the_post(); ?>
                            <?php
                            // Output the custom fields
                            $project_image = get_field('project_image_1');
                            $studentFN = get_field('students_full_name');
                            ?>
                            <div class="col-md-4 course <?php echo ($count % 3 == 2) ? 'left-align' : ''; ?>">
                                <a href="<?php the_permalink(); ?>" class="course-link">
                                    <div class="card">
                                        <?php if ($project_image): ?>
                                            <img src="<?php echo esc_url($project_image['url']); ?>" class="card-img-top"
                                                alt="<?php echo esc_attr($project_image['alt']); ?>">
                                        <?php endif; ?>
                                        <div class="card-body text-center course-title">
                                            <h4 class="card-title"
                                                style="text-decoration: none; font-style: italic; font-weight: bold;">
                                                <?php echo $studentFN; ?></h4>
                                            <h5 class="card-title" style="text-decoration: none;">(<?php the_title(); ?>)</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php $count++; ?>
                            <?php if ($count % 4 == 0): ?>
                            </div>
                            <div class="row">
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
    <?php
else:
    // If no related projects are found
    ?>
    <div class="container">
        <p>No projects found for the current course.</p>
    </div>
    <?php
endif;

// Restore original post data
wp_reset_postdata();

get_footer();
?>

<style>
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

        .content-header {
            padding-left: 40px;
            padding-right: 40px;
        }

        .course-bio {
            padding: 0 40px 0 40px;
        }
    }
</style>
<?php

get_header();

// Custom query to fetch course posts
$courses_query = new WP_Query(array(
    'post_type' => 'courses', // Assuming your custom post type is named 'courses_'
    'posts_per_page' => -1, // Display all courses
    'orderby' => 'title', // Order the courses by title
    'order' => 'ASC', // Order of the courses
));

// Check if there are any courses
if ($courses_query->have_posts()) :
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="courses-list">
                <div class="container">
                    <h2 style="color: white; text-align: center;">Courses</h2> <!-- Adjust header styles -->
                    <style>
                        .card-title a {
                            text-decoration: none; /* Remove underline */
                            color: white; /* Make card text white */
                        }
                        .course-container {
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: flex-start; /* Align to start */
                        }
                        .course {
                            width: calc(33.33% - 20px); /* 3 courses per row with some spacing */
                            margin-bottom: 20px;
                            border: none; /* Remove card border */
                            padding: 10px; /* Add padding around the card */
                        }
                        .card {
                            border: none; /* Remove card border */
                            background-color: transparent; /* Make card transparent */
                        }
                        .card-img-top {
                            width: 100%; /* Set image width to 100% */
                            height: 200px; /* Set image height (adjust as needed) */
                            object-fit: cover; /* Maintain aspect ratio */
                            padding: 10px; /* Add padding around the image */
                        }
                        .card-body {
                            padding: 10px;
                            text-align: center; /* Center align text */
                            color: white; /* Make card text white */
                        }
                        .course-title {
                            margin-top: 10px;
                            font-weight: bold;
                        }
                        .course-title a {
                            text-decoration: none; /* Remove underline */
                            color: white; /* Make link title black */
                        }
                        .left-align {
                            margin-right: auto; /* Align to left */
                        }
                        @media (max-width: 992px) {
                            .course {
                                width: calc(50% - 20px); /* 2 courses per row with some spacing */
                            }
                        }
                        @media (max-width: 768px) {
                            .course {
                                width: 100%; /* 1 course per row */
                            }
                        }
                    </style>
                    <div class="row course-container">
                        <?php $count = 0; ?>
                        <?php while ($courses_query->have_posts()) : $courses_query->the_post(); ?>
                            <?php
                            // Output the custom fields
                            $prospectus_link = get_field('prospectus_link');
                            $course_image = get_field('course_image');
                            $course_image_hover = get_field('course_image_hover');
                            ?>
                            <div class="col-md-4 course <?php echo ($count % 3 == 2) ? 'left-align' : ''; ?>">
                                <a href="<?php the_permalink(); ?>" class="course-link">
                                    <div class="card">
                                        <?php if ($course_image) : ?>
                                            <img src="<?php echo esc_url($course_image['url']); ?>" data-hover="<?php echo esc_url($course_image_hover['url']); ?>" class="card-img-top course-image" alt="<?php echo esc_attr($course_image['alt']); ?>">
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <div class="course-title">
                                                <h5><a href="<?php the_permalink(); ?>">Bachelor of Arts (Hons) in</a></h5>
                                                <h5 style="font-weight: bold; font-style: italic;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php $count++; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

    <script>
        // JavaScript to change image source on hover
        document.addEventListener('DOMContentLoaded', function() {
            const courseImages = document.querySelectorAll('.course-image');
            courseImages.forEach(function(image) {
                const originalSrc = image.getAttribute('src');
                const hoverSrc = image.getAttribute('data-hover');

                image.addEventListener('mouseenter', function() {
                    image.setAttribute('src', hoverSrc);
                });

                image.addEventListener('mouseleave', function() {
                    image.setAttribute('src', originalSrc);
                });
            });
        });
    </script>
<?php
else :
    // If no courses are found
?>
    <div class="container">
        <p>No courses found.</p>
    </div>
<?php
endif;

// Restore original post data
wp_reset_postdata();

get_footer();
?>

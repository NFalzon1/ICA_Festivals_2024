<?php


get_header();

// Custom query to fetch course posts
$courses_query = new WP_Query(array(
    'post_type' => 'courses', // Assuming your custom post type is named 'courses_'
    'posts_per_page' => -1, // Display all courses
    'order' => 'ASC', // Order of the courses
));

// Check if there are any courses
if ($courses_query->have_posts()) :
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="courses-list">
                <div class="container">
                    <h2>Courses</h2>
                    <style>
                        .card-title a {
                            text-decoration: none; /* Remove underline */
                        }
                    </style>
                    <div class="row">
                        <?php while ($courses_query->have_posts()) : $courses_query->the_post(); ?>
                            <?php
                            // Output the custom fields
                            $prospectus_link = get_field('prospectus_link');
                            $course_image = get_field('course_image');
                            ?>
                            <div class="col-md-3">
                                <a href="<?php the_permalink(); ?>" class="course-link">
                                    <div class="card">
                                        <?php if ($course_image) : ?>
                                            <img src="<?php echo esc_url($course_image['url']); ?>" class="card-img-top" alt="<?php echo esc_attr($course_image['alt']); ?>">
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <h5 class="card-title text-center"><a href="<?php the_permalink(); ?>">Bachelor of Arts in <?php the_title(); ?></a></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
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

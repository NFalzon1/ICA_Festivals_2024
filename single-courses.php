<?php
//Created by Nicholas
get_header();

// Get the course ID from the current page
$course_id = get_queried_object_id();

// Custom query to fetch projects associated with the current course
$related_projects_query = new WP_Query(array(
    'post_type' => 'projects',
    'meta_query' => array(
        array(
            'key' => 'select_course',
            'value' => $course_id,
            'compare' => '='
        )
    )
));

// Check if there are related projects
if ($related_projects_query->have_posts()) :
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="courses-list">
                <div class="container">
                    <?php 
                    // Display course title
                    $course_title = get_the_title($course_id);
                    if (!empty($course_title)) : ?>
                        <h2><?php echo esc_html($course_title); ?></h2>
                    <?php endif; ?>
                    <div class="row">
                        <?php $count = 0; ?>
                        <?php while ($related_projects_query->have_posts()) : $related_projects_query->the_post(); ?>
                            <?php
                            // Output the custom fields
                            $project_image = get_field('project_image');
                            ?>
                            <div class="col-md-3">
                                <a href="<?php the_permalink(); ?>" class="project-link">
                                    <div class="card mb-4">
                                        <?php if ($project_image) : ?>
                                            <img src="<?php echo esc_url($project_image['url']); ?>" class="card-img-top" alt="<?php echo esc_attr($project_image['alt']); ?>">
                                        <?php endif; ?>
                                        <div class="card-body text-center">
                                            <h5 class="card-title" style="text-decoration: none;"><?php the_title(); ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php $count++; ?>
                            <?php if ($count % 4 == 0) : ?>
                                </div><div class="row">
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
else :
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

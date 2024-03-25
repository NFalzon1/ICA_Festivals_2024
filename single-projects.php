<?php
//Created by Nicholas
get_header();

// Start the loop
while (have_posts()) : the_post();

    // Get ACF fields
    $student_name = get_field('student_name');
    $course = get_field('course');
    $project_image = get_field('project_image');
    $portfolio_link = get_field('portfolio_link');
    $project_link = get_field('project_link');

    // Output project details
    ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="single-project">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="project-details">
                                <h2 class="project-title text-center"><?php the_title(); ?></h2>
                                <?php if ($student_name) : ?>
                                    <p class="student-name text-center"><strong>Student Name:</strong> <?php echo esc_html($student_name); ?></p>
                                <?php endif; ?>
                                <?php if ($course) : ?>
                                    <p class="course text-center"><strong>Course:</strong> <?php echo esc_html($course); ?></p>
                                <?php endif; ?>
                                <?php if ($project_image) : ?>
                                    <div class="project-image text-center">
                                        <img src="<?php echo esc_url($project_image['url']); ?>" alt="<?php echo esc_attr($project_image['alt']); ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if ($portfolio_link) : ?>
                                    <p class="portfolio-link text-center"><strong>Portfolio Link:</strong> <a href="<?php echo esc_url($portfolio_link); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($portfolio_link); ?></a></p>
                                <?php endif; ?>
                                <?php if ($project_link) : ?>
                                    <p class="project-link text-center"><strong>Project Link:</strong> <a href="<?php echo esc_url($project_link); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($project_link); ?></a></p>
                                <?php endif; ?>
                            </div>
                        </div>
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

.single-project .project-details {
    margin-top: 50px;
}

.single-project .project-title {
    margin-bottom: 20px;
}

.single-project .student-name,
.single-project .course,
.single-project .portfolio-link,
.single-project .project-link {
    margin-bottom: 10px;
}

.single-project .portfolio-link a,
.single-project .project-link a {
    text-decoration: none;
    color: #333;
}

.single-project .portfolio-link a:hover,
.single-project .project-link a:hover {
    color: #007bff;
}

.single-project .project-image img {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
}


</style>
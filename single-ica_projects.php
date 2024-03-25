<?php
/**
 * Single Project Template
 * Created by Nicholas
 */


?>

<?php

if (have_posts()) :
    while (have_posts()) : the_post();
        // Get post meta data
        $project_course = get_post_meta(get_the_ID(), 'project_course', true);
        $student_name = get_post_meta(get_the_ID(), 'student_name', true);
        $student_surname = get_post_meta(get_the_ID(), 'student_surname', true);
        $project_description = get_the_content();
?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <p><strong>Course:</strong> <?php echo $project_course; ?></p>
                <p><strong>Student Name:</strong> <?php echo $student_name; ?></p>
                <p><strong>Student Surname:</strong> <?php echo $student_surname; ?></p>
                <p><strong>Description:</strong></p>
                <?php the_content(); ?>
            </div>
        </article>

<?php
    endwhile;
endif;

get_footer();
?>

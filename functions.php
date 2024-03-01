<?php

require_once("lib/enqueue-assets.php");
require_once("lib/navigation.php");
require_once("lib/sidebars.php");
require_once("lib/customize.php");


show_admin_bar(false);

function classExample_h6title($title)
{
    return "<h6>" . $title . "</h6>";
}

function classExample_excerptLength($words)
{
    return 8;
}

function classExample_themefooter()
{
    $footer_bg = get_theme_mod("custom_theme_footer_bg", "#ffc107");
    $footer_text = get_theme_mod("custom_theme_footer_text", "#fffff");


    echo "<div class='container-fluid' style='background-color:{$footer_bg};'><div class='row'><div class='col text-center'><p style='color:{$footer_text};'>Built by &copy; Nicholas Falzon</p></div></div></div>";
}

//add_filter('the_title', 'classExample_h6title');

add_filter('excerpt_length', 'classExample_excerptLength');

add_action('get_footer', 'classExample_themefooter');


function classexample_postorderasc($query)
{
    $query->set('order', 'ASC');
}

add_action('pre_get_posts', 'classexample_postorderasc');

function diwp_theme_customizer_options($wp_customize)
{

    $wp_customize->add_setting(
        'diwp_logo',
        array(
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'diwp_logo_control',
            array(
                'label' => 'Upload Website Logo',
                'priority' => 20,
                'section' => 'title_tagline',
                'settings' => 'diwp_logo',
                'button_labels' => array( // All These labels are optional
                    'select' => 'Select Logo',
                    'remove' => 'Remove Logo',
                    'change' => 'Change Logo',
                )
            )
        )
    );

}

add_action('customize_register', 'diwp_theme_customizer_options');



function add_courses_menu()
{
    add_submenu_page(
        'edit.php?post_type=courses', // Slug of the top-level menu page (Pages)
        'Add New Course',
        'Add New Course',
        'manage_options',
        'add_new_course',
        'courses_menu_page'
    );
}

// Render the content of the Courses menu page
function courses_menu_page()
{
    ?>
    <div class="wrap">
        <h1>Add a new Course</h1>

        <form method="post" action="">
            <label for="course_title">Course Title:</label>
            <input type="text" id="course_title" name="course_title" required>

            <br><br>

            <label for="course_code">Course Code:</label>
            <input type="text" id="course_code" name="course_code" required>

            <br><br>

            <label for="course_duration">Duration:</label>
            <select id="course_duration" name="course_duration">
                <option value="1 Year Full-time">1 Year Full-time</option>
                <option value="2 Years Full-time">2 Years Full-time</option>
                <option value="3 Years Full-time">3 Years Full-time</option>
                <option value="4 Years Full-time">4 Years Full-time</option>
                <option value="5 Years Full-time">5 Years Full-time</option>
            </select>

            <br><br>

            <label for="course_category">Course Category:</label>
            <?php
            // Fetch and display course categories in a dropdown
            $categories = get_terms(
                array(
                    'taxonomy' => 'course_categories',
                    'hide_empty' => false,
                )
            );

            if (!empty($categories) && !is_wp_error($categories)) {
                echo '<select id="course_category" name="course_category">';
                echo '<option value="">Select Category</option>';
                foreach ($categories as $category) {
                    echo '<option value="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</option>';
                }
                echo '</select>';
            } else {
                echo 'No categories found';
            }
            ?>

            <br><br>

            <label for="course_details">Course Details:</label> <br>
            <textarea type="text" id="course_details" name="course_details" name="course_details"
                style="width:400px; height:100px;">
                                        </textarea>

            <br><br>

            <!-- Add more fields as needed -->

            <?php wp_nonce_field('add_new_course', 'new_course_nonce'); ?>
            <input type="submit" class="button button-primary" value="Add Course">
        </form>
    </div>
    <?php
}

// Handle form submission and create a new course
function handle_new_course_submission()
{
    if (isset($_POST['course_title']) && isset($_POST['course_code']) && isset($_POST['course_duration']) && isset($_POST['course_details']) && wp_verify_nonce($_POST['new_course_nonce'], 'add_new_course')) {
        $course_title = sanitize_text_field($_POST['course_title']);
        $course_code = sanitize_text_field($_POST['course_code']);
        $course_duration = sanitize_text_field($_POST['course_duration']);
        $course_details = sanitize_text_field($_POST['course_details']);


        // Inside the WordPress loop
        $selected_category_id = sanitize_text_field($_POST['course_category']); // Adjust the field name accordingly

        // Get the category name based on the ID
        $category_name = '';

        if (!empty($selected_category_id)) {
            $category = get_term($selected_category_id, 'course_categories');

            if ($category && !is_wp_error($category)) {
                $category_name = $category->name;
            }
        }

        // Display the category name
        echo 'Selected Category: ' . esc_html($category_name);


        $taxonomy_slug = 'course_categories';

        $content .= '<p><strong>Course Code:</strong> ' . $course_code . '<br> <strong>Course Duration:</strong>' . $course_duration . '<br> ' . '<strong>Course Category: </strong>' . $category_name . '</p> <br> <strong>Course Description:</strong>' . $course_details . '</p>';

        // Create a new course post
        $course_args = array(
            'post_title' => $course_title,
            'post_content' => $content,
            'post_status' => 'publish',
            'post_type' => 'courses', // Your custom post type slug
            'tax_input' => array(
                $taxonomy_slug => array($category_name),
            ),
        );

        $course_id = wp_insert_post($course_args);

        if (!is_wp_error($course_id)) {
            // Redirect to the edit page of the new course
            wp_redirect(admin_url("post.php?post=$course_id&action=edit"));
            exit;
        } else {
            // Handle the error
        }
    }
}

function set_featured_image_for_press_releases()
{
    // Get the URL of the current logo from theme customization
    $logo_url = get_theme_mod('diwp_logo'); // Assuming 'custom_logo' is the setting ID

    // If the logo URL is found
    if ($logo_url) {
        // Get the ID of the attachment for the current logo
        $logo_attachment_id = attachment_url_to_postid($logo_url);

        // Get all press releases
        $press_releases = get_posts(array(
            'post_type' => 'prs', // Replace with your custom post type name
            'posts_per_page' => -1,
        ));

        // Loop through press releases and set the featured image
        foreach ($press_releases as $press_release) {
            set_post_thumbnail($press_release->ID, $logo_attachment_id);
        }
    }
}


// Hook this function to run once
add_action('after_setup_theme', 'set_featured_image_for_press_releases');



// Hook into WordPress admin actions
add_action('admin_menu', 'add_courses_menu');
add_action('admin_init', 'handle_new_course_submission');

function remove_add_new_submenu()
{
    remove_submenu_page('edit.php?post_type=courses', 'post-new.php?post_type=courses');
}


add_action('admin_menu', 'remove_add_new_submenu');





?>
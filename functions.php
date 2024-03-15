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



// Register custom post type: ica_projects
function register_ica_projects_post_type()
{
    $labels = array(
        'name' => _x('ICA Projects', 'post type general name', 'textdomain'),
        'singular_name' => _x('ICA Project', 'post type singular name', 'textdomain'),
        'menu_name' => _x('ICA Projects', 'admin menu', 'textdomain'),
        'name_admin_bar' => _x('ICA Project', 'add new on admin bar', 'textdomain'),
        'add_new' => _x('Add New', 'ica_project', 'textdomain'),
        'add_new_item' => __('Add New ICA Project', 'textdomain'),
        'new_item' => __('New ICA Project', 'textdomain'),
        'edit_item' => __('Edit ICA Project', 'textdomain'),
        'view_item' => __('View ICA Project', 'textdomain'),
        'all_items' => __('All ICA Projects', 'textdomain'),
        'search_items' => __('Search ICA Projects', 'textdomain'),
        'parent_item_colon' => __('Parent ICA Projects:', 'textdomain'),
        'not_found' => __('No ica projects found.', 'textdomain'),
        'not_found_in_trash' => __('No ica projects found in Trash.', 'textdomain')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'textdomain'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'ica_projects'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
    );

    register_post_type('ica_projects', $args);
}
add_action('init', 'register_ica_projects_post_type');

// Register custom taxonomy: ica_courses
function register_ica_courses_taxonomy()
{
    $labels = array(
        'name' => _x('ICA Courses', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('ICA Course', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Search ICA Courses', 'textdomain'),
        'popular_items' => __('Popular ICA Courses', 'textdomain'),
        'all_items' => __('All ICA Courses', 'textdomain'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit ICA Course', 'textdomain'),
        'update_item' => __('Update ICA Course', 'textdomain'),
        'add_new_item' => __('Add New ICA Course', 'textdomain'),
        'new_item_name' => __('New ICA Course Name', 'textdomain'),
        'separate_items_with_commas' => __('Separate ica courses with commas', 'textdomain'),
        'add_or_remove_items' => __('Add or remove ica courses', 'textdomain'),
        'choose_from_most_used' => __('Choose from the most used ica courses', 'textdomain'),
        'not_found' => __('No ica courses found.', 'textdomain'),
        'menu_name' => __('ICA Courses', 'textdomain')
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => false,
        'query_var' => true,
        'rewrite' => array('slug' => 'ica_courses'),
    );

    register_taxonomy('ica_courses', 'ica_projects', $args);
}
add_action('init', 'register_ica_courses_taxonomy');

// Render the content of the Add New Project form in the WordPress admin area
function render_add_new_project_form()
{
    ?>
    <div class="wrap">
        <h1>Add New Project</h1>

        <form id="add-new-project-form" method="post" enctype="multipart/form-data"
            action="<?php echo admin_url('admin-post.php'); ?>">
            <?php wp_nonce_field('add_new_project', 'new_project_nonce'); ?>

            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name" required>

            <br><br>

            <label for="student_surname">Student Surname:</label>
            <input type="text" id="student_surname" name="student_surname" required>

            <br><br>

            <label for="project_title">Project Title:</label>
            <input type="text" id="project_title" name="project_title" required>

            <br><br>

            <label for="project_course">Course:</label>
            <select id="project_course" name="project_course">
                <?php
                $terms = get_terms(
                    array(
                        'taxonomy' => 'ica_courses',
                        'hide_empty' => false,
                    )
                );
                foreach ($terms as $term) {
                    echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
                }
                ?>
            </select>

            <br><br>

            <label for="project_description">Project Description:</label>
            <textarea id="project_description" name="project_description" rows="4" required></textarea>

            <br><br>

            <label for="project_image">Project Image:</label>
            <input type="file" id="project_image" name="project_image" accept="image/*" required>

            <br><br>

            <input type="submit" name="submit_project" value="Submit">
            <input type="hidden" name="action" value="handle_new_project_submission">
        </form>
    </div>
    <?php
}

// Register a custom admin menu page to display the Add New Project form
function register_add_new_project_admin_menu()
{
    add_submenu_page(
        'edit.php?post_type=ica_projects', // Parent menu slug (ica_projects)
        'Add New Project',
        'Add New Project',
        'manage_options',
        'add_new_project_admin_page',
        'render_add_new_project_form'
    );
}
add_action('admin_menu', 'register_add_new_project_admin_menu');

// Handle form submission to add new project
// Handle form submission to add new project
function handle_new_project_submission() {
    if (isset($_POST['submit_project']) && wp_verify_nonce($_POST['new_project_nonce'], 'add_new_project')) {
        $student_name = sanitize_text_field($_POST['student_name']);
        $student_surname = sanitize_text_field($_POST['student_surname']);
        $project_title = sanitize_text_field($_POST['project_title']);
        $project_description = sanitize_textarea_field($_POST['project_description']);
        $project_course = sanitize_text_field($_POST['project_course']); // Added course selection

        // Handle project image upload
        $uploaded_image = $_FILES['project_image'];
        $upload_overrides = array('test_form' => false);
        $movefile = wp_handle_upload($uploaded_image, $upload_overrides);

        if ($movefile && !isset($movefile['error'])) {
            $image_url = $movefile['url'];
        } else {
            $image_url = '';
        }

        // Create new project post
        $new_project = array(
            'post_title' => $project_title,
            'post_content' => $project_description,
            'post_type' => 'ica_projects',
            'post_status' => 'publish',
        );

        $project_id = wp_insert_post($new_project);

        if (!is_wp_error($project_id)) {
            // Set project meta data
            update_post_meta($project_id, 'student_name', $student_name);
            update_post_meta($project_id, 'student_surname', $student_surname);
            update_post_meta($project_id, 'project_course', $project_course); // Save course selection
            update_post_meta($project_id, 'project_image', $image_url);

            // Redirect to the edit page of the new project
            wp_redirect(admin_url("post.php?post=$project_id&action=edit"));
            exit;
        } else {
            // Handle error
            echo 'Error adding project: ' . $project_id->get_error_message();
        }
    }
}
add_action('admin_post_handle_new_project_submission', 'handle_new_project_submission');

// Add custom column header for course

// Display course information in custom column



// Register a custom admin menu page to display the Add New Project form

function custom_project_columns($columns) {
    $columns['title'] = 'Title';
    $columns['project_course'] = 'Course';
    $columns['student_name'] = 'Student Name';
    $columns['student_surname'] = 'Student Surname';
    return $columns;
}
add_filter('manage_ica_projects_posts_columns', 'custom_project_columns');

// Display data in custom columns for the "All Projects" list table
function display_custom_project_columns($column, $post_id) {
    switch ($column) {
        case 'project_course':
            $course = get_post_meta($post_id, 'project_course', true);
            echo $course ? $course : 'N/A';
            break;
        case 'student_name':
            $name = get_post_meta($post_id, 'student_name', true);
            echo $name ? $name : 'N/A';
            break;
        case 'student_surname':
            $surname = get_post_meta($post_id, 'student_surname', true);
            echo $surname ? $surname : 'N/A';
            break;
        default:
            break;
    }
}
add_action('manage_ica_projects_posts_custom_column', 'display_custom_project_columns', 10, 2);













add_action('customize_register', 'diwp_theme_customizer_options');



?>
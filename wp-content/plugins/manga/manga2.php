<?php
/*
Plugin Name: Custom Manga Page 2
Description: Creates a custom page for manga with additional input fields.
Version: 1.0
Author: Your Name
*/

// Register the custom page
function custom_manga_page() {
    $page_title = 'Manga';
    $page_content = ''; // Leave this empty for now, you can add content later
    $page_slug = 'manga';

    $page_check = get_page_by_path($page_slug);

    // Create the page if it doesn't exist
    if (!$page_check) {
        $page = array(
            'post_type' => 'page',
            'post_title' => $page_title,
            'post_content' => $page_content,
            'post_status' => 'publish',
            'post_slug' => $page_slug
        );

        wp_insert_post($page);
    }
}
add_action('init', 'custom_manga_page');

// Add custom fields to the page
function custom_manga_page_fields() {
    add_meta_box('manga_fields', 'Manga Details', 'custom_manga_fields_callback', 'page', 'normal', 'high');
}
add_action('add_meta_boxes', 'custom_manga_page_fields');

// Custom fields callback function
function custom_manga_fields_callback($post) {
    // Retrieve current values of the custom fields, if they exist
    $manga_story = get_post_meta($post->ID, 'manga_story', true);
    $manga_other_names = get_post_meta($post->ID, 'manga_other_names', true);
    $manga_categories = get_post_meta($post->ID, 'manga_categories', true);

    // Output HTML for the custom fields
    ?>
    <label for="manga-story">Story:</label>
    <input type="text" id="manga-story" name="manga_story" value="<?php echo esc_attr($manga_story); ?>" />

    <br/>

    <label for="manga-other-names">Other Names:</label>
    <input type="text" id="manga-other-names" name="manga_other_names" value="<?php echo esc_attr($manga_other_names); ?>" />

    <br/>

    <label for="manga-categories">Categories:</label>
    <input type="text" id="manga-categories" name="manga_categories" value="<?php echo esc_attr($manga_categories); ?>" />

    <?php
}

// Save custom field values when the page is saved
function custom_manga_save_fields($post_id) {
    if (array_key_exists('manga_story', $_POST)) {
        update_post_meta($post_id, 'manga_story', sanitize_text_field($_POST['manga_story']));
    }

    if (array_key_exists('manga_other_names', $_POST)) {
        update_post_meta($post_id, 'manga_other_names', sanitize_text_field($_POST['manga_other_names']));
    }

    if (array_key_exists('manga_categories', $_POST)) {
        update_post_meta($post_id, 'manga_categories', sanitize_text_field($_POST['manga_categories']));
    }
}
add_action('save_post', 'custom_manga_save_fields');

<?php
/**
 * Plugin Name: Manga Plugin
 * Description: A plugin for managing manga and chapters.
 * Version: 1.0
 * Author: Abdellah Bouchama
 * Author URI: MangaBo
 */
// require_once plugin_dir_path( __FILE__ ) . 'mangawidget.php';
require_once 'mangawidget.php';
// require_once 'chapter.php';

// Activation Hook
register_activation_hook(__FILE__, 'manga_plugin_activate');

function manga_plugin_activate()
{
    // Perform activation tasks if needed
}

// Deactivation Hook
register_deactivation_hook(__FILE__, 'manga_plugin_deactivate');

function manga_plugin_deactivate()
{
    // Perform deactivation tasks if needed
}

// Custom Post Type: Manga
function manga_plugin_register_manga_post_type()
{

    // Custom Taxonomy: Manga Categories
    $category_labels = array(
        'name' => 'Manga Categories',
        'singular_name' => 'Manga Category',
        'search_items' => 'Search Manga Categories',
        'all_items' => 'All Manga Categories',
        'parent_item' => 'Parent Manga Category',
        'parent_item_colon' => 'Parent Manga Category:',
        'edit_item' => 'Edit Manga Category',
        'update_item' => 'Update Manga Category',
        'add_new_item' => 'Add New Manga Category',
        'new_item_name' => 'New Manga Category Name',
        'menu_name' => 'Manga Categories',
    );

    $category_args = array(
        'labels' => $category_labels,
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'manga-category'),
    );

    register_taxonomy('manga_category', 'manga', $category_args);


    $labels = array(
        'name' => 'Mangas',
        'singular_name' => 'Manga',
        'menu_name' => 'Mangas',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Manga',
        'edit_item' => 'Edit Manga',
        'new_item' => 'New Manga',
        'view_item' => 'View Manga',
        'view_items' => 'View Mangas',
        'search_items' => 'Search Mangas',
        'not_found' => 'No mangas found.',
        'not_found_in_trash' => 'No mangas found in trash.',
        'all_items' => 'All Mangas',
        'archives' => 'Manga Archives',
        'attributes' => 'Manga Attributes',
        'insert_into_item' => 'Insert into manga',
        'uploaded_to_this_item' => 'Uploaded to this manga',
        'filter_items_list' => 'Filter mangas list',
        'items_list_navigation' => 'Mangas list navigation',
        'items_list' => 'Mangas list',
        'item_published' => 'Manga published.',
        'item_published_privately' => 'Manga published privately.',
        'item_reverted_to_draft' => 'Manga reverted to draft.',
        'item_scheduled' => 'Manga scheduled.',
        'item_updated' => 'Manga updated.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'manga'),
    );
    
    register_post_type('manga', $args);
}
add_action('init', 'manga_plugin_register_manga_post_type');


// Add custom meta box
function custom_post_type_meta_box() {
    add_meta_box( 'custom_meta_box', 'Story', 'custom_meta_box_callback', 'manga', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'custom_post_type_meta_box' );

// Callback function for custom meta box
function custom_meta_box_callback( $post ) {
    // Retrieve the current value of the custom field
    $custom_field_value = get_post_meta( $post->ID, '_story', true );
    $other_names_value = get_post_meta( $post->ID, 'other_names', true );

    // Output the HTML for the custom field input
    echo '<label for="custom_field">story:</label>';
    echo '<input type="text" id="custom_field" name="custom_field" value="' . esc_attr( $custom_field_value ) . '">';

    echo '<br><label for="other_names">Other Names:</label>';
    echo '<input type="text" id="other_names" name="other_names" value="' . esc_attr( $other_names_value ) . '">';
}

// Save custom meta box data
function save_custom_meta_box_data( $post_id ) {
    if ( isset( $_POST['custom_field'] ) ) {
        $custom_field_value = sanitize_text_field( $_POST['custom_field'] );
        update_post_meta( $post_id, '_story', $custom_field_value );
    }
    if ( isset( $_POST['custom_categories'] ) ) {
        $custom_categories = array_map( 'intval', $_POST['custom_categories'] );
        update_post_meta( $post_id, '_categories', $custom_categories );
    }
    if ( isset( $_POST['other_names'] ) ) {
        $other_names_value = sanitize_text_field( $_POST['other_names'] );
        update_post_meta( $post_id, 'other_names', $other_names_value );
    }
}
add_action( 'save_post', 'save_custom_meta_box_data' );





// // chapter
// Register the Chapter custom post type
function manga_plugin_register_chapter_post_type() {
    $labels = array(
        'name' => 'Chapters',
        'singular_name' => 'Chapter',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Chapter',
        'edit_item' => 'Edit Chapter',
        'new_item' => 'New Chapter',
        'view_item' => 'View Chapter',
        'search_items' => 'Search Chapters',
        'not_found' => 'No chapters found',
        'not_found_in_trash' => 'No chapters found in Trash',
        'parent_item_colon' => 'Parent Manga:',
        'menu_name' => 'Chapters'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true, // Enable parent-child relationship
        'supports' => array('editor', 'thumbnail'),
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'manga', 'with_front' => false), // Modify the permalink structure
        'has_archive' => 'manga',
        'menu_position' => 6,
        'menu_icon' => 'dashicons-media-text',
        'register_meta_box_cb' => 'manga_plugin_add_chapter_meta_boxes', // Call custom meta box function
    );

    register_post_type('chapter', $args);
}
add_action('init', 'manga_plugin_register_chapter_post_type');

// Add custom meta boxes for selecting the Manga parent and specifying the chapter number
function manga_plugin_add_chapter_meta_boxes() {
    add_meta_box('chapter_manga_meta_box', 'Parent Manga', 'manga_plugin_render_manga_meta_box', 'chapter', 'side', 'default');
    add_meta_box('chapter_number_meta_box', 'Chapter Number', 'manga_plugin_render_chapter_number_meta_box', 'chapter', 'normal', 'default');
    add_meta_box('chapter_pdf_meta_box', 'Chapter PDF', 'manga_plugin_render_chapter_pdf_meta_box', 'chapter', 'normal', 'default');
}
add_action('add_meta_boxes', 'manga_plugin_add_chapter_meta_boxes');

// Render the Manga meta box content
function manga_plugin_render_manga_meta_box($post) {
    $manga_id = get_post_meta($post->ID, '_manga_id', true);
    $mangas = get_posts(array('post_type' => 'manga', 'numberposts' => -1));

    echo '<label for="chapter_manga">Select the Parent Manga:</label>';
    echo '<select id="chapter_manga" name="chapter_manga">';
    echo '<option value="">None</option>';

    foreach ($mangas as $manga) {
        $selected = ($manga->ID == $manga_id) ? 'selected' : '';
        echo '<option value="' . esc_attr($manga->ID) . '" ' . $selected . '>' . esc_html($manga->post_title) . '</option>';
    }

    echo '</select>';
    wp_nonce_field('manga_plugin_save_manga_meta_box', 'manga_plugin_meta_box_nonce');
}

// Render the Chapter Number meta box content
function manga_plugin_render_chapter_number_meta_box($post) {
    $chapter_number = get_post_meta($post->ID, '_chapter_number', true);

    echo '<label for="chapter_number">Chapter Number:</label>';
    echo '<input type="text" id="chapter_number" name="chapter_number" value="' . esc_attr($chapter_number) . '">';
}

// Render the Chapter PDF meta box content
function manga_plugin_render_chapter_pdf_meta_box($post) {
    $chapter_pdf = get_post_meta($post->ID, '_chapter_pdf', true);

    echo '<label for="chapter_pdf">Upload Chapter PDF:</label>';
    echo '<input type="file" id="chapter_pdf" name="chapter_pdf">';
    echo '<p class="description">Upload the PDF file for this chapter.</p>';

    if (!empty($chapter_pdf)) {
        echo '<p>Current PDF: <a href="' . esc_url($chapter_pdf) . '" target="_blank">' . esc_html(basename($chapter_pdf)) . '</a></p>';
    }
}

// Save custom meta box data for Chapter
function manga_plugin_save_chapter_meta_box_data($post_id) {
    // Verify the nonce before proceeding
    if (!isset($_POST['manga_plugin_meta_box_nonce']) || !wp_verify_nonce($_POST['manga_plugin_meta_box_nonce'], 'manga_plugin_save_manga_meta_box')) {
        return;
    }

    // Check if the user has permissions to save data
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save the Manga parent
    if (isset($_POST['chapter_manga'])) {
        $manga_id = sanitize_text_field($_POST['chapter_manga']);
        update_post_meta($post_id, '_manga_id', $manga_id);
    }

    // Save the Chapter number
    if (isset($_POST['chapter_number'])) {
        $chapter_number = sanitize_text_field($_POST['chapter_number']);
        update_post_meta($post_id, '_chapter_number', $chapter_number);
    }

    // Upload and save the Chapter PDF
    if (isset($_FILES['chapter_pdf']) && !empty($_FILES['chapter_pdf']['name'])) {
        $supported_types = array('application/pdf');
        $uploaded_file = $_FILES['chapter_pdf'];

        // Check if the uploaded file is a PDF
        if (in_array($uploaded_file['type'], $supported_types)) {
            $upload_overrides = array('test_form' => false);
            $uploaded_file = wp_handle_upload($uploaded_file, $upload_overrides);

            if ($uploaded_file && !isset($uploaded_file['error'])) {
                $chapter_pdf = $uploaded_file['url'];
                update_post_meta($post_id, '_chapter_pdf', $chapter_pdf);
            } else {
                wp_die('Error uploading the file. Please try again.');
            }
        } else {
            wp_die('Invalid file format. Only PDF files are allowed.');
        }
    }
}
add_action('save_post_chapter', 'manga_plugin_save_chapter_meta_box_data');

// Set the Chapter title as the chapter number
function manga_plugin_set_chapter_title($data, $postarr) {
    if ($data['post_type'] === 'chapter' && isset($postarr['chapter_number'])) {
        $chapter_number = sanitize_text_field($postarr['chapter_number']);
        // $parent_manga = get_post_meta($post_ID, '_manga_id', true);
        $manga_id = sanitize_text_field( $_POST['chapter_manga'] );

        // Get the manga post based on the selected ID
        $manga_post = get_post( $manga_id );
        $data['post_title'] = $chapter_number;

        // Set the post name (slug) to "manga/chapter-number"
        $data['post_name'] = str_replace(" ", "-", $manga_post->post_title) . '/' . $chapter_number;
        $data['post_type'] = 'chapter';
        $data['post_status'] = 'publish';
    }
    return $data;
}
add_filter('wp_insert_post_data', 'manga_plugin_set_chapter_title', 10, 2);


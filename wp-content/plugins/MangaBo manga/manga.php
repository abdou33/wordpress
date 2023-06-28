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
error_log(print_r($_POST, true));

// Custom Post Type: Chapter
function manga_plugin_register_chapter_post_type()
{
    $labels = array(
        'name' => 'Chapters',
        'singular_name' => 'Chapter',
        'menu_name' => 'Chapters',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Chapter',
        'edit_item' => 'Edit Chapter',
        'new_item' => 'New Chapter',
        'view_item' => 'View Chapter',
        'view_items' => 'View Chapters',
        'search_items' => 'Search Chapters',
        'not_found' => 'No chapters found.',
        'not_found_in_trash' => 'No chapters found in trash.',
        'all_items' => 'All Chapters',
        'archives' => 'Chapter Archives',
        'attributes' => 'Chapter Attributes',
        'insert_into_item' => 'Insert into chapter',
        'uploaded_to_this_item' => 'Uploaded to this chapter',
        'filter_items_list' => 'Filter chapters list',
        'items_list_navigation' => 'Chapters list navigation',
        'items_list' => 'Chapters list',
        'item_published' => 'Chapter published.',
        'item_published_privately' => 'Chapter published privately.',
        'item_reverted_to_draft' => 'Chapter reverted to draft.',
        'item_scheduled' => 'Chapter scheduled.',
        'item_updated' => 'Chapter updated.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
        'rewrite' => array(
            'slug' => 'manga',
            'with_front' => false,
        ),
    );

    register_post_type('chapter', $args);
}
add_action('init', 'manga_plugin_register_chapter_post_type');

// Modify post slug for chapter
add_filter('wp_unique_post_slug', 'manga_plugin_modify_chapter_slug', 10, 6);
function manga_plugin_modify_chapter_slug($slug, $post_ID, $post_status, $post_type, $post_parent, $original_slug)
{
    if ($post_type === 'chapter') {
        $chapter_number = get_post_meta($post_ID, '_chapter_number', true);
        $manga_id = get_post_meta($post_ID, '_manga_id', true);

        // Get the manga title from manga ID
        $manga_title = get_the_title($manga_id);

        if ($chapter_number && $manga_title) {
            $slug = $manga_title . '/' . $chapter_number;
        }
    }

    return $slug;
}





// Add Manga meta box to Chapter post type
function manga_plugin_add_meta_boxes() {
    add_meta_box('manga-meta-box', 'Manga', 'manga_meta_box_callback', 'chapter', 'side');
}
add_action('add_meta_boxes', 'manga_plugin_add_meta_boxes');

// Callback function to display the Manga meta box content
function manga_meta_box_callback($post) {
    wp_nonce_field('manga_meta_box', 'manga_meta_box_nonce');

    // Get the current chapter number if it's set
    $chapter_number = get_post_meta($post->ID, '_chapter_number', true);
    ?>
    <p>
        <label for="chapter_number">Chapter Number:</label>
        <input type="number" name="chapter_number" id="chapter_number" value="<?php echo $chapter_number; ?>" />
    </p>
    <?php

    // Get the current manga ID if it's set
    $selected_manga_id = get_post_meta($post->ID, '_manga_id', true);

    // Query the manga posts
    $manga_args = array(
        'post_type' => 'manga',
        'posts_per_page' => -1, // Get all manga posts
    );
    $manga_query = new WP_Query($manga_args);
    ?>
    <p>
        <label for="manga_select">Select Manga:</label>
        <select name="manga_select" id="manga_select">
            <option value="">None</option>
            <?php while ($manga_query->have_posts()) : $manga_query->the_post(); ?>
                <option value="<?php echo get_the_ID(); ?>" <?php selected($selected_manga_id, get_the_ID()); ?>><?php the_title(); ?></option>
            <?php endwhile; ?>
        </select>
    </p>
    <?php
    wp_reset_postdata();
}

// Save the selected manga ID when saving the chapter post
function save_manga_meta_box_data($post_id) {
    if (!isset($_POST['manga_meta_box_nonce']) || !wp_verify_nonce($_POST['manga_meta_box_nonce'], 'manga_meta_box')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['post_type']) && 'chapter' == $_POST['post_type']) {
        if (current_user_can('edit_post', $post_id)) {

            echo '<script> console.log("' . $post_id . '")</script>';
            
            if (isset($_POST['chapter_number'])) {
                update_post_meta($post_id, '_chapter_number', sanitize_text_field($_POST['chapter_number']));
                update_post_meta($post_id, 'post_title', sanitize_text_field($_POST['chapter_number']));
            }
            if (isset($_POST['manga_select'])) {
                update_post_meta($post_id, '_manga_id', sanitize_text_field($_POST['manga_select']));
            }
        }

    }
}
add_action('save_post', 'save_manga_meta_box_data');

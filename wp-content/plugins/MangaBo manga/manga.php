<?php
/**
 * Plugin Name: Manga Plugin
 * Description: A plugin for managing manga and chapters.
 * Version: 1.0
 * Author: Abdellah Bouchama
 * Author URI: MangaBo
 */

require_once 'mangawidget.php';
include plugin_dir_path(__FILE__) . 'chapter.php';

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
        'name' => 'Manga',
        'singular_name' => 'Manga',
        'menu_name' => 'Manga',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Manga',
        'edit_item' => 'Edit Manga',
        'new_item' => 'New Manga',
        'view_item' => 'View Manga',
        'view_items' => 'View Manga',
        'search_items' => 'Search Manga',
        'not_found' => 'No mangas found.',
        'not_found_in_trash' => 'No mangas found in trash.',
        'all_items' => 'All Manga',
        'archives' => 'Manga Archives',
        'attributes' => 'Manga Attributes',
        'insert_into_item' => 'Insert into manga',
        'uploaded_to_this_item' => 'Uploaded to this manga',
        'filter_items_list' => 'Filter mangas list',
        'items_list_navigation' => 'Manga list navigation',
        'items_list' => 'Manga list',
        'item_published' => 'Manga published.',
        'item_published_privately' => 'Manga published privately.',
        'item_reverted_to_draft' => 'Manga reverted to draft.',
        'item_scheduled' => 'Manga scheduled.',
        'item_updated' => 'Manga updated.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array( 'slug' => 'manga' ),
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

function custom_breadcrumb_post_type( $breadcrumb, $args ) {
    if ( is_singular( 'Manga' ) ) {
        $post_title = get_the_title();
        $breadcrumb[] = array(
            'name' => $post_title,
            'url'  => get_permalink(),
        );
    }
    return $breadcrumb;
}
add_filter( 'breadcrumb_post_type', 'custom_breadcrumb_post_type', 10, 2 );
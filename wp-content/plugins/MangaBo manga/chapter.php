<?php
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
        'supports' => array('title', 'editor', 'thumbnail'),
        'capability_type' => 'post',
        'rewrite' => array(
            'slug' => 'manga/%manga_id%',
            'with_front' => false,
        ),
        'has_archive' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-media-text',
        'register_meta_box_cb' => 'manga_plugin_add_chapter_meta_boxes', // Call custom meta box function
    );

    register_post_type('chapter', $args);

    // Add a custom rewrite rule for the chapter post type
    add_rewrite_rule(
        '^manga/([^/]+)/([^/]+)/?$',
        'index.php?post_type=chapter&_manga_id=$matches[1]&_chapter_number=$matches[2]',
        'top'
    );
}
add_action('init', 'manga_plugin_register_chapter_post_type');

// Add the 'manga_id' and 'chapter_number' query vars
function manga_plugin_add_query_vars($vars) {
    $vars[] = '_manga_id';
    $vars[] = '_chapter_number';
    return $vars;
}
add_filter('query_vars', 'manga_plugin_add_query_vars');

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
        echo '<option value="' . esc_attr($manga->post_title) . '" ' . $selected . '>' . esc_html($manga->post_title) . '</option>';
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

        // Set the parent post for the chapter
        // wp_update_post(array(
        //     'ID' => $post_id,
        //     'post_parent' => $manga_id,
        // ));
    }

    // Save the Chapter number
    if (isset($_POST['chapter_number'])) {
        $chapter_number = sanitize_text_field($_POST['chapter_number']);
        update_post_meta($post_id, '_chapter_number', $chapter_number);
    }
}
add_action('save_post_chapter', 'manga_plugin_save_chapter_meta_box_data');

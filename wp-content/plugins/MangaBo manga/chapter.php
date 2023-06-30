<?php

function manga_plugin_register_chapter_post_type() {
    $labels = array(
        // Labels for the chapter post type
    );
    
    $args = array(
        // Arguments for the chapter post type
    );
    
    register_post_type('chapter', $args);
}
add_action('init', 'manga_plugin_register_chapter_post_type');



function manga_meta_box_callback($post) {
    // Retrieve the current chapter number if it's set
    $chapter_number = get_post_meta($post->ID, '_chapter_number', true);

    // Output the HTML for the custom field input
    echo '<label for="chapter_number">Chapter Number:</label>';
    echo '<input type="number" name="chapter_number" id="chapter_number" value="' . esc_attr($chapter_number) . '" />';

    // Display the list of existing chapters
    echo '<h4>Chapters:</h4>';
    $chapters_args = array(
        'post_type' => 'chapter',
        'post_parent' => $post->ID,
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    );
    $chapters = get_posts($chapters_args);
    if ($chapters) {
        echo '<ul>';
        foreach ($chapters as $chapter) {
            echo '<li><a href="' . get_edit_post_link($chapter->ID) . '">' . get_the_title($chapter->ID) . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No chapters found.</p>';
    }
}


function manga_meta_box_callback($post) {
    // Retrieve the current chapter number if it's set
    $chapter_number = get_post_meta($post->ID, '_chapter_number', true);

    // Output the HTML for the custom field input
    echo '<label for="chapter_number">Chapter Number:</label>';
    echo '<input type="number" name="chapter_number" id="chapter_number" value="' . esc_attr($chapter_number) . '" />';

    // Display the list of existing chapters
    echo '<h4>Chapters:</h4>';
    $chapters_args = array(
        'post_type' => 'chapter',
        'post_parent' => $post->ID,
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    );
    $chapters = get_posts($chapters_args);
    if ($chapters) {
        echo '<ul>';
        foreach ($chapters as $chapter) {
            echo '<li><a href="' . get_edit_post_link($chapter->ID) . '">' . get_the_title($chapter->ID) . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No chapters found.</p>';
    }
}


function save_manga_meta_box_data($post_id) {
    // ...

    if (isset($_POST['post_type']) && 'chapter' === $_POST['post_type']) {
        if (current_user_can('edit_post', $post_id)) {
            // Get the parent manga ID from the meta box
            $parent_manga_id = isset($_POST['manga_select']) ? intval($_POST['manga_select']) : 0;

            // Set the parent ID for the chapter post
            wp_update_post(array(
                'ID' => $post_id,
                'post_parent' => $parent_manga_id,
            ));

            // Update the chapter number post meta
            if (isset($_POST['chapter_number'])) {
                update_post_meta($post_id, '_chapter_number', sanitize_text_field($_POST['chapter_number']));
                // Update the chapter title to the chapter number
                wp_update_post(array(
                    'ID' => $post_id,
                    'post_title' => sanitize_text_field($_POST['chapter_number']),
                ));
            }
        }
    }

}

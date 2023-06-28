<?php
// Define the custom block widget
class Manga_Grid_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'manga_grid_widget',
            'Manga Grid Widget',
            array('description' => 'Displays a grid of manga posts.')
        );
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $number_of_mangas = isset($instance['number_of_mangas']) ? absint($instance['number_of_mangas']) : 5;

        echo $args['before_widget'];

        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // Query the manga posts
        $args = array(
            'post_type' => 'manga',
            'posts_per_page' => $number_of_mangas,
        );
        $mangas_query = new WP_Query($args);

        if ($mangas_query->have_posts()) {
            echo '<div class="manga-grid-widget">';

            while ($mangas_query->have_posts()) {
                $mangas_query->the_post();
                $manga_thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                $manga_title = get_the_title();

                echo '<div class="manga-card">';
                echo '<a href="' . get_permalink() . '">';
                if ($manga_thumbnail) {
                    echo '<div class="manga-card-thumbnail">' . $manga_thumbnail . '</div>';
                }
                echo '<div class="manga-card-title">' . $manga_title . '</div>';
                echo '</a>';
                echo '</div>';
            }

            echo '</div>';
        } else {
            echo '<p>No manga posts found.</p>';
        }

        wp_reset_postdata();

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? esc_attr($instance['title']) : '';
        $number_of_mangas = isset($instance['number_of_mangas']) ? absint($instance['number_of_mangas']) : 5;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_mangas'); ?>">Number of Mangas to Display:</label>
            <input class="widefat" type="number" id="<?php echo $this->get_field_id('number_of_mangas'); ?>"
                   name="<?php echo $this->get_field_name('number_of_mangas'); ?>"
                   value="<?php echo $number_of_mangas; ?>" min="1">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number_of_mangas'] = isset($new_instance['number_of_mangas']) ? absint($new_instance['number_of_mangas']) : 5;

        return $instance;
    }
}

// Register the custom block widget
function register_manga_grid_widget() {
    register_widget('Manga_Grid_Widget');
}
add_action('widgets_init', 'register_manga_grid_widget');


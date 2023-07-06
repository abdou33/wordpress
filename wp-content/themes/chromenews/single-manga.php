<?php
/**
 * Template Name: Custom Manga Template
 * Template Post Type: manga
 */

// Custom template code goes here
get_header();
?>
<style>
        body{
            margin: 0;
        } */

        h6, p{
            margin: 10px;
        }

        #principal{
            margin: 0;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .manga_container{
            padding: 0 4em 0 4em;
            background-color: white;
            width: 100%;
            height: 90%;
            display: flex;
            flex-direction: row-reverse;
            justify-content: right;
            align-items: center;
            gap: 30px;
        }

        .info{
            display: flex;
            flex-direction: row-reverse;
            gap: 30px;
            overflow-wrap: break-word; /* not working wtf */
            align-items: center;
        } 

        .manga_info{
            width: 66.66%;
        }

        #mangaposter{
            width: 33.33%;
            object-fit: contain;
            flex-shrink: 0;
            width: 30%;
        }
    </style>
    <section id="principal">
        <div class="manga_container">
            <!--<img src="buildings.jpg" alt="">-->
            <?php echo the_post_thumbnail($fpid, 'id=mangaposter'); ?>
            <div class="manga_info">
                <div class="info">
                    <h5>العنوان</h5>
                    <p><?php the_title(); ?></p>
                </div>
                <div class="info">
                    <h5>مسميّات أخرى</h5>
                    <p><?php $custom_value = get_post_meta(get_the_ID(), 'other_names', true);
                    if ($custom_value) {
                        echo $custom_value;
                    } ?></p>
                </div>
                <div class="info">
                    <h5>التصنيف</h5>
                    <p><?php $terms = get_the_terms(get_the_ID(), 'manga_category'); if ($terms && !is_wp_error($terms)) { foreach ($terms as $term) { echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';}} ?></p>
                </div>
                <div class="info">
                    <h5>القصة</h5>
                    <p><?php $custom_value = get_post_meta(get_the_ID(), '_story', true);
                    if ($custom_value) {
                        echo $custom_value;
                    } ?></p>
                    <p>Permalink: <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_permalink()); ?></a></p>
                </div>
            </div>
        </div>
    </section>
    
<?php
$parent_post_id = the_ID();
// $child_posts = get_children( array('post_parent' => get_the_ID()) );
// $tmp2 = get_meta_key($parent_post_id);
// $tmp =  get_post_meta(get_the_ID(), $tmp2, true);
// echo '<script>' . $child_posts . '</script>';
// echo '<p>' . $parent_post_id . '</p>';
// echo '<p>' . $child_posts . '</p>';

// // Loop through the child posts
// foreach ($child_posts as $child_post) {
//     // Access the child post properties
//     $child_post_id = $child_post->ID;
//     $child_post_title = $child_post->post_title;

//     // Output or manipulate the child post data as needed
//     echo 'Child Post ID: ' . $child_post_id . '<br>';
//     echo 'Child Post Title: ' . $child_post_title . '<br>';
// }
$title = the_title();
$args = array(
    'post_type'      => 'Chapter', // Replace 'chapter' with the actual post type
    'meta_key'       => '_manga_id',
    'meta_value'     => $title, // Replace 'desired_value' with the value you want to match
    'posts_per_page' => -1, // Retrieve all matching posts
);

$chapters = new WP_Query($args);

if ($chapters->have_posts()) {
    echo '<ul>';
    while ($chapters->have_posts()) {
        $chapters->the_post();
        echo '<li><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></li>';
    }
    echo '</ul>';
    wp_reset_postdata();
} else {
    echo 'No chapters found with the desired value.';
}


// Check if the manga post ID is provided
$manga_post_id = isset($_GET['manga_id']) ? intval($_GET['manga_id']) : 0;

// Get the manga post
$manga_post = get_post($manga_post_id);

if ($manga_post) {
  // Retrieve the child posts (chapters) of the manga post
  $chapter_posts = new WP_Query(array(
    'post_type' => 'Chapter', // Replace 'chapter' with the actual child post type
    'post_parent' => $manga_post_id,
    'posts_per_page' => -1, // Retrieve all chapters
  ));

  if ($chapter_posts->have_posts()) {
?>
    <h1><?php echo esc_html($manga_post->post_title); ?></h1>
    <div class="chapter-posts">
      <?php while ($chapter_posts->have_posts()) : $chapter_posts->the_post(); ?>
        <div class="chapter-post-card">
          <h2><?php the_title(); ?></h2>
          <div class="chapter-post-content">
            <?php the_excerpt(); ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
<?php
    wp_reset_postdata();
  } else {
    echo '<p>No chapters found for this Manga.</p>';
  }
} else {
  echo '<p>Manga not found.</p>';
}
get_footer();

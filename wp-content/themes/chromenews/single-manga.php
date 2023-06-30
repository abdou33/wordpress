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
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();

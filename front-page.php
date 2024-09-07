<?php

/**
 * The template for displaying the home page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

<?php
// Display the content from the block editor
while ( have_posts() ) : the_post();
    the_content(); // This will output the content from the block editor
endwhile;
?>

<div class="recent-news">
    <h2>Recent News</h2>
    <div class="recent-posts-wrapper">
    <?php
    // Query to get the 3 most recent posts
    $recent_posts = new WP_Query( array(
        'posts_per_page' => 3, // Limit to 3 posts
    ) );

    if ( $recent_posts->have_posts() ) :
        while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
            <div class="recent-post-item">
                <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </div>
                    <?php endif; ?>
                    <div class="post-title">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </a>
            </div>
        <?php endwhile;
    endif;
    wp_reset_postdata();
    ?>
    </div>
    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">See All News</a>
</div>


</main><!-- #primary -->

<?php
get_footer();

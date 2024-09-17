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

while ( have_posts() ) : the_post();
    the_content();
endwhile;
?>
<section class="wrapper-news">

    <h2>Recent News</h2>
  
    <?php
    
    $recent_posts = new WP_Query( array(
        'posts_per_page' => 3,
    ) );

    if ( $recent_posts->have_posts() ) :
        while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
            
                <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
                    <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail(); ?>
                    <?php endif; ?> 
                </a>
          
        <?php endwhile;
    endif;
    wp_reset_postdata();
    ?>
  
    <p><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">See All News</a></p>

</section>

</main><!-- #primary -->

<?php
get_footer();

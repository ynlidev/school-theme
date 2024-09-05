<?php
/**
 * The template for displaying staff archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */
	

add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );
get_header();
?>

	<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>
        <div class="news-posts">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                    </header>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>

                    <footer class="entry-footer">
                        <span class="posted-on">Posted on: <?php echo get_the_date(); ?></span>
                        <span class="author">By: <?php the_author(); ?></span>
                    </footer>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php
            the_posts_pagination( array(
                'prev_text' => __( 'Previous', 'your-theme' ),
                'next_text' => __( 'Next', 'your-theme' ),
            ) );
            ?>
        </div>

	<?php
		
	else :
		get_template_part( 'template-parts/content', 'none' ); 
	endif;
	?>

	</main>

<?php
// get_sidebar();
get_footer();

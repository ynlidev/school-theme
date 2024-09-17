<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );
get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
			<?php
			/* Start the Loop */
			$speciality = 'developer';
			$args = array(
				'post_type' => 'fwd-student',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' =>'fwd-program',
						'field' => 'slug',
						'terms' => $speciality
						)
						)
					);
			$query = new WP_Query( $args );
			if ($query -> have_posts()){
				echo '<section class="student-section">';
				while ($query ->have_posts()){
					$query -> the_post();
					?>
					<article>
						<h2>
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h2>
						<?php the_post_thumbnail( 'studentImg' ); ?>
						<?php the_excerpt(); ?>
						<p>Speciality: <a href=<?php echo get_term_link($speciality, 'fwd-program'); ?>><?php echo $speciality ?></a></p>
					</article>
					<?php

				}
				wp_reset_postdata();
			} else {
				echo '<p>found nothing</p>';
			}
			//designers
			$speciality = 'designer';
			$args = array(
				'post_type' => 'fwd-student',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' =>'fwd-program',
						'field' => 'slug',
						'terms' => $speciality
						)
						)
					);
			$query = new WP_Query( $args );
			if ($query -> have_posts()){
				while ($query ->have_posts()){
					$query -> the_post();
					?>
					<article>
						<a href="<?php the_permalink(); ?>">
							<h2><?php the_title(); ?></h2>
							<?php the_post_thumbnail( 'studentImg' ); ?>
						</a>
						<?php the_excerpt(); ?>
						<p>Speciality: <a href=<?php echo get_term_link($speciality, 'fwd-program'); ?>><?php echo $speciality ?></a></p>
					</article>
					<?php

				}
				echo '</section>';
				wp_reset_postdata();
			} else {
				echo '<p>found nothing</p>';
			}

			the_posts_navigation();
			
			else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();

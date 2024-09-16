<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			$post_id = get_the_ID();
			//update the cta based on taxonomy
			$speciality = join(', ', wp_list_pluck(get_the_terms($post_id, 'fwd-program'), 'slug')); 
			echo '<h3>Meet other '. $speciality . ' students:</h3>';

			//grab all the students of matching terms

			$args = array(
							'post_type'      => 'fwd-student',
							'posts_per_page' => -1,
							'orderby' 		 => 'title',
							'order' 		 => 'ASC',
							'tax_query' 	 => array(
								array(
									'taxonomy' =>'fwd-program',
									'field' => 'slug',
									'terms' => $speciality
								)
							)
						);
			$query = new WP_Query( $args );
			if ( $query -> have_posts() ){
				while ( $query -> have_posts() ) {
					$query -> the_post();
					if(get_the_ID() != $post_id){
						echo "<p><a href='". get_the_permalink() ."'>";
						the_title();
						echo "</a></p>";
					}
						wp_reset_postdata();
				} 
			}

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

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

	<main id="primary" class="site-main site-main-staff">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<p>Our dedicated staff is here to help our students succeed. You will find the faculty and administrative staff listed below. Please contact the appropriate individual with any questions. Vestibulum pretium neque leo, nec euismod ex interdum vitae. Etiam viverra, lorem sed lobortis mattis, lectus enim eleifend nisi, non dapibus nulla purus malesuada risus. Donec consectetur neque turpis, vitae varius lectus commodo vel.</p>

			<!-- output the Administrative data: -->
            <?php
			$args=array(
				'post_type'=>'fwd-staff',
				'posts_per_page'=>-1,
				'tax_query'     => array(
					array(
						'taxonomy' => 'fwd-role',
						'field'    => 'slug',
						'terms'    => 'administrative'
					)
				),
				'orderby'   => 'title', 
				'order'     => 'ASC', 
				
			);
			$query=new WP_Query($args);
			if($query->have_posts()){
				echo '<section class="staff-section"><h2>Faculty</h2>';
				while ($query->have_posts()){
					$query->the_post();
			?>
			    
			    <div class="staff-section-article">
					<article> 
						<!-- name -->
						<h3><?php the_title();?> Admin</h3> 
						<?php
						if ( function_exists( 'get_field' )) {
							if ( get_field( 'biography') ) {
								echo '<p>';
								the_field( 'biography' );
								echo'</p>';
							}
						}
						if ( get_field( 'courses') ) {
							echo '<p>Couses: ';
							the_field( 'courses' );
							echo'</p>';
						}
						if ( get_field( 'website') ) { 
							?>
							<a href="<?php the_field( 'website' );?>">
								<h3>Instructor Website</h3> 
							</a>
							<?php
						}
						?> 
					</article>
				</div>
			<?php
				}
				wp_reset_postdata();
				echo '</section>';
			}
			?>

			<!-- output the Faculty data: -->
			<?php
			$args=array(
				'post_type'=>'fwd-staff',
				'posts_per_page'=>-1,
				'tax_query'     => array(
					array(
						'taxonomy' => 'fwd-role',
						'field'    => 'slug',
						'terms'    => 'faculty'
					)
				),
				'orderby'   => 'title', 
				'order'     => 'DESC', 
			);
			$query=new WP_Query($args);
			if($query->have_posts()){
		
				echo '<section class="staff-section"><h2>Faculty</h2>';
				while ($query->have_posts()){
					$query->the_post();
			?>
			    <div class="staff-section-article">
					<article> 
						<h3><?php the_title();?> Faculty</h3> 
						<?php
						if ( function_exists( 'get_field' )) {
							if ( get_field( 'biography') ) {
								echo '<p>';
								the_field( 'biography' );
								echo'</p>';
							}
							if ( get_field( 'courses') ) {
								echo '<p>Couses: ';
								the_field( 'courses' );
								echo'</p>';
							}
							if ( get_field( 'website') ) { 
								?>
								<a href="<?php the_field( 'website' );?>">
									<h3>Instructor Website</h3> 
								</a>
								<?php
							}
						}
						?> 
					</article>
				</div>
			<?php
				}
				wp_reset_postdata();
				echo '</section>';
			}
			?>

			<?php
			 
			else :
				get_template_part( 'template-parts/content', 'none' ); 
			endif;
			?>

	</main><!-- #primary -->

<?php
// get_sidebar();
get_footer();

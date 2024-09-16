<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );

			if (have_rows('schedule')){
				?>
				<table>
					<caption>Weekly Course Schedule</caption>
					<tr>
						<th>Date</th>
						<th>Course</th>
						<th>Instructor</th>
					</tr>

				<?php
				while( have_rows('schedule')) : the_row();
					echo '<tr>';
					$sub_value = get_sub_field('date');
					echo '<td>'. $sub_value .'</td>';
					$sub_value = get_sub_field('course');
					echo '<td>'. $sub_value .'</td>';
					$sub_value = get_sub_field('instructor');
					echo '<td>'. $sub_value->post_title .'</td>';
					echo '</tr>';
				endwhile;
				?>
					</table>
				<?php
			}


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

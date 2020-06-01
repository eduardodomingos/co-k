<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cok
 */

get_header();
?>

	<main class="main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'work' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
dynamic_sidebar( 'sidebar-2' );
get_footer();

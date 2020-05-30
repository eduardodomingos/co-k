<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cok
 */

get_header();
?>

	<main class="main">
		<?php 
		
		// Check value exists.
		if( have_rows('homepage_editor') ):

			// Loop through rows.
			while ( have_rows('homepage_editor') ) : the_row();

				// Case: Content layout.
				if( get_row_layout() == 'content' ):
					$section_title = esc_html(get_sub_field('title'));
					$content = get_sub_field('content');
					$bg_color = get_sub_field('bg_color');
					$color = get_sub_field('color');
					$cssClass=  str_replace(' ', '-', strtolower ($section_title));
					?>
					<div class="<?php echo $cssClass; ?> insulate--huge"
						<?php if(!empty($bg_color) || !empty($color)):?>
							style="<?php echo !empty($bg_color) ? 'background-color:' . $bg_color .';' : '' ?><?php !empty($color) ? ' color:'. $color .';' : '' ?>"
						<?php endif; ?>>
						<div class="wrap">
							<?php if(!empty($section_title)) : ?>
								<h2 class="screen-reader-text"><?php echo $section_title;?></h2>
							<?php endif; ?>
							<?php if(!empty($content)) : ?>
								<?php echo $content;?>
							<?php endif; ?>
						</div>
					</div>
					<?php

				// Case: Clients layout.
				elseif( get_row_layout() == 'clients' ): 
					$section_title = esc_html(get_sub_field('title'));
					?>
					<div class="insulate--large clients">
						<h2 class="wrap title"><?php echo $section_title;?></h2>
						<?php
						$query = new WP_Query(array(
							'post_type' => 'client',
							'post_status' => 'publish',
							'posts_per_page' => -1
						));
						if ( $query->have_posts() ) : ?>
						<div class="clients-grid wrap">
							<?php
							while ($query->have_posts()) {
								$query->the_post();
								get_template_part( 'template-parts/content', 'client' );
							} ?>
						</div>
						<?php
						endif;
						wp_reset_query();					
						?>
					</div>
					<?php

				// Case: Team Members layout.
				elseif( get_row_layout() == 'team_members' ): 
					$section_title = esc_html(get_sub_field('title'));
					?>
					<div class="insulate creators">
						<h2 class="wrap title"><?php echo $section_title;?></h2>
						<?php 
						$query = new WP_Query(array(
							'post_type' => 'team',
							'post_status' => 'publish',
							'posts_per_page' => -1
						));
						if ( $query->have_posts() ) : ?>
						<div class="team-grid wrap">
							<?php
							while ($query->have_posts()) {
								$query->the_post();								
								cok_get_template_part('template-parts/content', 'teaser', array(
									'css_class' => 'team-member',
									'image' => get_field('teaser_image'),
									'meta' => get_field('role'),
									'list_type' => 'team-member',
									'show_link' => false
								));
							} ?>
						</div>
						<?php
						endif;
						wp_reset_query();
						?>
					</div>
					<?php
				endif;

			// End loop.
			endwhile;

		// No value.
		else :
			// Do something...
		endif;
		
		
		?>

	</main><!-- #main -->

<?php
get_footer();

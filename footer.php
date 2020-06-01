<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cok
 */

?>

<footer class="footer insulate--mid">
	<div class="wrap">
		<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span></a>
	</div>
	<div class="wrap insulate--large">
		<div class="footer-content">
			<div class="left">
				<h2 class="title">at the end&lt;/</h2>
				<?php the_field('company_address', 'option'); ?>
			</div>
			<div class="right">
				<div>
					<p>Follow us here</p>
					<?php
					wp_nav_menu(
						array(
							'container'=> false,
							'theme_location' => 'menu-2'
						)
					);
					?>
				</div>
				<div>
					<p>More</p>
					<?php
					wp_nav_menu(
						array(
							'container'=> false,
							'theme_location' => 'menu-3'
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="legal wrap"><?php the_field('copyright_text', 'option');?></div>
</footer>




<?php wp_footer(); ?>

</body>
</html>

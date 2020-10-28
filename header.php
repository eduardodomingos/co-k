<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cok
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NMGSWB2');</script>
	<!-- End Google Tag Manager -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMGSWB2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>

	<header class="header" <?php echo has_post_thumbnail($post->ID ) ? 'style="background-image:url('. wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) .')"' : '' ?>>
		
		<?php if ( is_front_page() ) : ?>
			<?php
			$video = get_field('video_hp');
			if( $video ): ?>
			<video class="video-hp" muted autoplay loop>
				<source src="<?php echo $video['url']; ?>" type="video/mp4">
			</video>
			<?php endif; ?>
		<?php endif; ?>
	
		<div class="header-inner">
			<div class="top">
                <div class="wrap">
                    <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span></a></h1>
                    <button class="nav-toggle" aria-controls="primary-menu">
                        <i></i>
                        <i></i>
                        <i></i>
                    </button>
                </div>
			</div>
			<nav id="site-navigation" class="main-navigation">
				<?php if ( is_front_page() ) : ?>
					<?php // for homepage, since we want smooth scrooling between sections we use a specific menu ?>
					<?php
					wp_nav_menu(
						array(
							'menu_class' => 'nav',
							'container'=> false,
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				<?php else: ?>
					<?php // for other pages, since we dint want smooth scrooling between sections we use a specific menu ?>
					<?php
					wp_nav_menu(
						array(
							'menu_class' => 'nav',
							'container'=> false,
							'theme_location' => 'menu-4',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				<?php endif; ?>
			</nav><!-- #site-navigation -->
			
			<?php if ( is_front_page() ) : ?>
				<div class="header-content wrap">
					<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								the_content();
							endwhile;
						endif;
					?>
				</div>
				<button class="skip-to-content"><span class="screen-reader-text">Skip to Content</span></button>
			<?php endif; ?>
		</div>
	</header><!-- #masthead -->

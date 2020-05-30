<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cok
 */

?>
<?php $client_url = get_field( 'client_url', get_the_ID() );?>
<?php echo $client_url ? '<a href="'. $client_url .'" target="_blank">' : '<span class="client">' ?>

<?php if ( has_post_thumbnail() ) : ?>
	<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php the_title('<span class="screen-reader-text">','</span>'); ?>

<?php echo $client_url ? '</a>' : '</span>' ?>



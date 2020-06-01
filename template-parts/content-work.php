<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cok
 */

?>

<div <?php post_class('content content--work wrap wrap--content insulate--large'); ?>>
	<?php the_title( '<h1 class="title">', '</h1>' ); ?>
	<?php the_content(); ?>
</div>

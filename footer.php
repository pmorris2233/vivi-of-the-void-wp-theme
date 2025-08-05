<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vivi_of_the_Void
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			&copy; <?= date('Y', time()) ?> Vivi of the Void
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

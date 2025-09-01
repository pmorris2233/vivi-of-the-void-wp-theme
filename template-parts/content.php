<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vivi_of_the_Void
 */

$featured_img_url = get_the_post_thumbnail_url();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( $featured_img_url ) :
		?>
		<div class="votv-hero" style="background-image: url(<?= $featured_img_url ?>)">
			<header class="entry-header votv-boxed-content">
				<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
				?>
			</header><!-- .entry-header -->
		</div>
		<?php
	else:
		?>
		<header class="entry-header votv-boxed-content">
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
		<?php
	endif;
	?>

	<div class="votv-article-container votv-boxed-content">
		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'vivi-of-the-void' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vivi-of-the-void' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div><!-- .votv-article-container -->

	<footer class="entry-footer">
		<?php vivi_of_the_void_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

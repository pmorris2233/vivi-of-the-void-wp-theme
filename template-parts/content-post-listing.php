<?php
/**
 * Template part for displaying a post within a listing
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vivi_of_the_Void
 */

$featured_img_url = get_the_post_thumbnail_url();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="votv-article-container votv-boxed-content">
		<div class="votv-article-container__text">
			<header class="entry-header">
				<?php
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				?>
			</header><!-- .entry-header -->
			<?php
			?>

			<div class="entry-content">
				<?php
				the_excerpt();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vivi-of-the-void' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
		</div><!-- .votv-article-container__text -->

		<?php
		if ( $featured_img_url ) :
			?>
			<a href="<?= esc_url( get_permalink() ) ?>" class="votv-post-thumbnail-link">
				<img src="<?= $featured_img_url ?>" alt="" class="votv-post-thumbnail">
			</a>
			<?php
		endif;

		?>

	</div><!-- .votv-article-container -->

	<footer class="entry-footer">
		<?php vivi_of_the_void_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

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
 * @package Vivi_of_the_Void
 */

get_header();

$author_img = get_field( 'author_image', 37 );
$author_bio = get_field( 'bio', 37 );
?>

	<main id="primary" class="site-main">
		<?php if ( $author_bio ) : ?>
		<div class="blog-about">
			<?php if ( $author_img ) : ?>
			<img class="blog-about__image" src="<?= $author_img['url'] ?>" alt="Vivi of the Void">
			<?php endif; ?>

			<div class="blog-about__blurb">
				<h2 class="blog-about__title">About</h2>
				<?= wp_kses_post( $author_bio ) ?>
			</div>
		</div>
		<?php endif; ?>
		
		<hr>

		<?php
		if ( have_posts() ) :
			?>

			<div class="blog-posts">

			<?php

			if ( is_home() ) :
				?>
				<header class="blog-header">
					<h2 class="page-title"><?= __( 'Stories', 'vivi-of-the-void' ) ?></h2>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				if ( is_singular() ) :
					get_template_part( 'template-parts/content', get_post_type() );
				else :
					get_template_part( 'template-parts/content', 'post-listing' );
				endif;

			endwhile;
			?>

			</div>

			<?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();

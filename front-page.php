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

$author_img = get_field( 'author_image', get_the_ID() );
$author_bio = get_field( 'bio', get_the_ID() );
?>

	<main id="primary" class="site-main">

		<?php if ( $author_bio ) : ?>

		<div class="blog-about">
			<?php if ( $author_img ) : ?>

			<img class="blog-about__image" src="<?= $author_img['url'] ?>" alt="Vivi of the Void">

			<?php endif; ?>

			<div class="blog-about__blurb">
				<h2 class="blog-about__title">About</h2>
				<div class="blog-about__blurb-content">

					<?= wp_kses_post( $author_bio ) ?>

				</div>
			</div>
		</div>

		<?php endif; ?>
		
		<hr>

		<?php
		$blog_posts = new WP_Query( [ 'post_type' => 'post' ] );
		if ( $blog_posts->have_posts() ) :
			?>

			<div class="blog-posts">
				<header class="blog-header">
					<h2 class="page-title"><?= __( 'Blog', 'vivi-of-the-void' ) ?></h2>
				</header>

				<div class="blog-posts-inner">
					<?php

					/* Start the Loop */
					while ( $blog_posts->have_posts() ) :

						$blog_posts->the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'post-listing' );

					endwhile;

					?>
				</div>
			</div>

			<?php

			wp_reset_postdata();

		endif;
		?>

		<hr>

		<?php
		$fiction_query = new WP_Query( [ 'post_type' => 'fiction' ] );

		if ( $fiction_query->have_posts() ) :
			?>

			<div class="fiction-posts">

				<header class="fiction-header">
					<h2 class="page-title"><?= __( 'Fiction', 'vivi-of-the-void' ) ?></h2>
				</header>

				<?php

				while ( $fiction_query->have_posts() ) :

					$fiction_query->the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'fiction-listing' );

				endwhile;

				?>

			</div>

			<?php

			wp_reset_postdata();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();

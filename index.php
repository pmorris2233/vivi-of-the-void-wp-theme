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
?>

	<main id="primary" class="site-main">
		<div class="blog-about">
			<img class="blog-about__image" src="<?= wp_get_attachment_url( 17 ) ?>" alt="Vivi of the Void">
			<div class="blog-about__blurb">
				<h2 class="blog-about__title">About</h2>
				<p>
					<strong>Vivi Estaris</strong> (she/they) is a New Orleans-based writer with a proclivity for Making It Weird. She graduated from Louisiana State University, where she earned her bachelor of fine arts in Creative Writing and the John Ed Bradley Award for Best Fiction. They prefer writing tales of horror, science fiction, fantasy, and speculative fiction, with themes of ethnic identity, queerness, and anti-capitalist sentiment. Vivi is also a horror movie enthusiast, has too many unplayed games sitting in their Steam library, and is chock full of worms. Their work has been featured in <a href="https://ashtonspot.com/product/tales-of-horror-magazine-issue-04-june-2025/" target="_blank"><em>Tales of Horror</em></a> and will soon be appearing on <a href="https://talestoterrify.com/" target="_blank"><em>Tales to Terrify</em></a>.
				</p>
			</div>
		</div>
		
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
				get_template_part( 'template-parts/content', get_post_type() );

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

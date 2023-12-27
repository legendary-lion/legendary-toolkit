<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */
get_header(); 
$single_layout = legendary_toolkit_get_theme_option('single_layout');
?>


	<section id="primary" class="content-area <?=toolkit_get_primary_column_classes();?>">
		<div id="main" class="site-main" role="main">
		<?php
		// print_r($single_layout);
		while ( have_posts() ) : the_post();
			if ($single_layout) {
				get_template_part( 'template-parts/content', $single_layout );
			}
			else {
				get_template_part( 'template-parts/content', get_post_format() );
			}

			the_post_navigation();
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</div><!-- #main -->
	</section><!-- #primary -->
<?php
get_sidebar();
get_footer();

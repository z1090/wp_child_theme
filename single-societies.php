<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'society' );

			if (get_field('contact_email')){  ?>
				<p>If you would like more information about the <?the_field('society_name')?>, please email 
				<a href="mailto:<?the_field('contact_email')?>"><?the_field('contact_email')?></a>.</p>
			<?php }

			if (get_field('society_date')){  ?>
				<p>Our next book-burning session will be on <?the_field('society_date')?>.</p>
			<?php }

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_footer(); ?>

<?php
/**
 * Template Name: Loop Test Template
 * 
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area  template-team-page">
	<main id="main" class="site-main" role="main">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->


		<?php

		$args = array(
			'post_type' => 'post'
		);

		// The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {
			echo '<ul>';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				echo '<li>' . the_category(', ') . '</li>';
			}
			echo '</ul>';
			/* Restore original Post Data */
			wp_reset_postdata();
		} else {
			// no posts found
			?><p>No posts, matey.</p><?
		}
		?>











		<?php
		/*
		// Start the loop.
		while ( have_posts() ) : the_post();
			$query_args = array(
				'author_name' => get_the_author()
			);

			$result = new WP_Query( $query_args ); ?>
			<h3>Other posts by <?the_author();?></h3>
			<ul><?
			while ( $result->have_posts() ) : $result->the_post(); ?>
				<strong><?the_date();?></strong>
				<li><a href="<?echo"http://ian.w/?p=",get_the_ID()?>"><?php the_title(); echo " – ", get_the_date();?></a></li>
			<?php endwhile;
			wp_reset_query();
			?></ul><?
			// End of the loop.
		endwhile;
		*/
		?>


		

		<?
		/*
			while ( have_posts() ) : the_post();
				$query_args = array(
					// 'categories' => wp_list_categories(),
					'author_name' => get_the_author(),
					'categories' => the_category(',')
				);
				var_dump($posts);
				// var_dump($query_args);
				$result = new WP_Query( $query_args );
				
				wp_reset_query();
				// End of the loop.
			endwhile;
		*/
		?>




		</article><!-- #post-## -->

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php 
get_footer(); 
?>

<?php /* Template Name: single Template */ ?>
<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<article>
				<figure>
				 	<?php the_post_thumbnail(); ?>
				</figure>
			
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				<div>
					<p><?php the_terms($post->ID, 'genres', 'Genre: '); ?></p>
				</div>
				<div>
					<p><?php the_content(); ?></p>
				</div>
			
			</article>	
		</div>
	</div>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
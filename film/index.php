<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<?php
			$args = array(
			  'numberposts' => 5,
			  'post_type'   => 'movies'
			);
			$posts = get_posts($args);
			//var_dump(get_the_post_thumbnail(35));

			foreach ($posts as $post):
			?>
			<div class="col-6 spacing">
				<figure>
					<?php the_post_thumbnail(); ?>
				</figure>
				<h2><?php echo $post->post_title; ?></h2>
				<p><?php the_terms($post->ID, 'genres', 'Genre: '); ?></p>
				<a href="<?php the_permalink(); ?>">meer info</a>
			</div>
		<?php endforeach; ?>
		</div>
	</div><!-- .site-content -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>

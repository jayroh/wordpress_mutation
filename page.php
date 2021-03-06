<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post page" id="post-<?php the_ID(); ?>">
				<h3><?php the_title(); ?></h3>
				<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
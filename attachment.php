<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h1 class="entry-title">
		<?php the_title(); ?></h1>
	
	<div class="attachment">
		<a href="<?php echo wp_get_attachment_url($post->ID); ?>" title="View full size">
			<?php echo wp_get_attachment_image( $post->ID, 'large' );?></a>
		
		<a href="<?php echo wp_get_attachment_url($post->ID); ?>" title="View full size" class="view-full">View full size</a>
	</div>
	
	<div class="meta">
		<dl>
			<dt class="post-date">Uploaded on</dt>
			<dd class="post-date"><?php the_date("M n, Y"); ?> </dd>
		</dl>
	</div>
	
	<div class="comments">
		<fb:comments></fb:comments>
	</div>
<?php endwhile; ?>

<?php get_footer(); ?>
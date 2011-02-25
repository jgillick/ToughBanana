<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<ol class="posts">

<?php while ( have_posts() ) : the_post(); ?>
	
	<li class="post" id="post-<?php the_ID(); ?>">
		
		<div class="thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php if(has_post_thumbnail()): ?>
					<?php the_post_thumbnail(); ?>
				<?php else: ?>
					<img src="<?php echo banana_url('images', 'default_banana_thumb.png'); ?>" width="75" height="75" />
				<?php endif; ?>
			</a>
		</div>
		
		<h2 class="entry-title">
		  <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
		    <?php the_title(); ?></a></h2>
							
		<?php
			$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list ):
		?>
			<div class="meta">
				<dl>
					<dt class="post-tags">Tagged with</dt>
					<dd class="post-tags">
						<?php echo $tags_list ?>
					</dd>
				</dl>
			</div>
		<?php endif; ?>
		
		<div class="post-summary">
			<?php the_excerpt(); ?>
		</div>

	</li>

<?php endwhile;  ?>
</ol>

<?php /* Paginatione */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<div class="pagination">
		<div class="previous"><?php previous_posts_link( '&rarr; Previous' ); ?></div>
		<div class="next"><?php next_posts_link( 'Next &larr;' ); ?></div>
	</div>
<?php endif; ?>

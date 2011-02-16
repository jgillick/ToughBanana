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

<?php while ( have_posts() ) : the_post(); ?>
	
	<div class="post <?php echo (is_single()) ? "single-post" : "" ?>" id="post-<?php the_ID(); ?>">
	
		<?php if ( is_front_page() ): ?>
			<h2 class="entry-title">
			  <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			    <?php the_title(); ?></a></h2>
		<?php else: ?>
			<h1 class="entry-title">
			  <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	        <?php the_title(); ?></a></h1>
		<?php endif; ?>
		
		<?php if ( is_single() ): ?>

			<div class="meta">
				<dl>
					<dt class="post-date">Posted on</dt>
					<dd class="post-date"><?php the_date("M n, Y"); ?> </dd>
					
					<dt class="post-author">By</dt>
					<dd class="post-author"><?php the_author(); ?></dd>
					
					<?php
						$tags_list = get_the_tag_list( '', ', ' );
						if ( $tags_list ):
					?>
						<dt class="post-tags">Tagged with</dt>
						<dd class="post-tags">
							<?php echo $tags_list ?>
						</dd>
					<?php endif; ?>
				</dl>
				
				<?php if ( is_single() ): ?>
					<fb:share-button href="<?php the_permalink(); ?>" type="button_count"></fb:share-button>
				<?php endif; ?>
			</div>
			
		
			<div class="post-body">
				<?php the_content(); ?>
			</div>		
			<div class="comments">
				<?php comments_template( '', true ); ?>
			</div>
		<?php else: ?>
					
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
		<?php endif; ?>

	</div>

<?php endwhile;  ?>

<?php /* Paginatione */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<div class="pagination">
		<div class="previous"><?php previous_posts_link( '&rarr; Previous' ); ?></div>
		<div class="next"><?php next_posts_link( 'Next &larr;' ); ?></div>
	</div>
<?php endif; ?>

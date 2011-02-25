<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="thumbnail"><?php the_post_thumbnail(); ?></div>
		
		<h1 class="entry-title">
		  <?php the_title(); ?></h1>

		<div class="meta">
			<?php edit_post_link( 'Edit', '<p class="edit-link">', '</p>' ); ?>
			
			<p class="author-image">
				<a href="/about">
					<img src="<?php bloginfo( 'template_url' ); ?>/images/jeremy.jpg" /></a>
			</p>
			<dl>
				<dt class="post-date">Posted on</dt>
				<dd class="post-date"><?php echo get_the_date(); ?> </dd>
				
				<dt class="post-author">By</dt>
				<dd class="post-author"><?php the_author(); ?></dd>
				
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<dt class="post-tags">Tags</dt>
					<dd class="post-tags">
						<?php echo $tags_list ?>
					</dd>
				<?php endif; ?>
			</dl>
			
			<?php if ( is_single() ): ?>
				<div class="fb-share">
					<fb:share-button href="<?php the_permalink(); ?>" type="button_count"></fb:share-button>
					<!-- <fb:share-button href="<?php the_permalink(); ?>" type="box_count"></fb:share-button> -->
				</div>
			<?php endif; ?>
		</div>
		
	
		<div class="post-body">
			<?php the_content(); ?>
		</div>		
		<div class="comments">
			<hr />
			<?php comments_template( '', true ); ?>
		</div>


	</div>

<?php endwhile;  ?>

<?php get_footer(); ?>
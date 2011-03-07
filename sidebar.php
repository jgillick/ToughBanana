

<div id="primary" class="widget-area" role="complementary">
	
	<!--
<div class="short-bio">
		<img src="<?php bloginfo( 'template_url' ); ?>/images/jeremy.jpg" />
	</div>
-->
	
	<div id="search" class="widget-container widget_search">
		<?php get_search_form(); ?>
	</div>

	<div id="archives" class="widget-container">
		<h3 class="widget-title">Archives</h3>
		<ul>
			<?php wp_get_archives( 'type=monthly' ); ?>
		</ul>
	</div>
	
	<div id="subscribe" class="widget-container">
	  <h3 class="widget-title">Subscribe</h3>
	  <ul>
	    <li><a href="<?php bloginfo('rss2_url') ?>" class="rss-feed">RSS Feed</a></li>
	  </ul>
	</div>

</div>

	</div>
	<div id="sidebar">
    <?php
    	get_sidebar();
    ?>
	</div>

  </div>
</div>

<div id="footer">
	<div class="links">
		<ul>
			<li><a href="<?php bloginfo('rss2_url') ?>" class="rss-feed">RSS Feed</a></li>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
		</ul>
	</div>
	<p>
		Site and content created by <a href="http://blog.mozmonkey.com/">Jeremy Gillick</a>.
	</p>
	<p class="site-link">
	  <a href="http://toughbanana.com">ToughBanana.com</a>
	</p>
</div>

</body>
</html>
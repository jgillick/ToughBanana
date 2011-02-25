<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>
    <?php
    	$title = wp_title( '|', false, 'right' );

    	// Add the blog name.
    	$title .= " ". get_bloginfo( 'name' );

    	// Add the blog description for the home/front page.
    	$site_description = get_bloginfo( 'description', 'display' );
    	if ( $site_description && ( is_home() || is_front_page() ) ){
    		$title .= " | $site_description";
    	}

    	// Add a page number if necessary:
    	if ( $paged >= 2 || $page >= 2 ){
    		$title .= ' | ' . sprintf('Page %s', max( $paged, $page ));
    	}
	
	
		echo $title;
    ?>
	</title>
  	
  	
	<!-- Open graph protocol -->
	<meta property="og:title" content="<?php echo $title ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo get_bloginfo('url') . $_SERVER["REQUEST_URI"] . $_SERVER["QUERY_STRING'"] ?> "/>
    <meta property="og:site_name" content="<?php bloginfo( 'name' ) ?>"/>
    <meta property="fb:app_id" content="194386833923561"/>
    <meta property="fb:admins" content="194386833923561, 763639132"/>
    <meta property="og:description" content="<?php bloginfo( 'description', 'display'); ?>"/>
    
    <?php if(is_single() && has_post_thumbnail($wp_query->post->ID)): ?>
    	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );  ?>
        <meta property="og:image" content="<?php echo $thumb[0]; ?>"/>
    <?php else :?>
	    <meta property="og:image" content="<?php echo banana_url("images", "logo.png"); ?>"/>
    <?php endif; ?>
	
	<?php if(is_printable() && is_single() && is_recipe_post($wp_query->post->ID)): ?>
	  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/print-recipe.css" /> 
	<?php else: ?>  
  	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/common.css" />
	<?php endif; ?>
	
	<link rel="shortcut icon" href="/favicon.ico" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ) ?> RSS Feed" href="<?php bloginfo('rss2_url') ?>" /> 
	
	<?php /* DON'T TRACK LOGGED IN USERS */ ?>
	<?php if( !is_user_logged_in() ): ?>
		<!-- Google Analytics Start -->
		<script type="text/javascript">
	
	    var _gaq = _gaq || [];
	    _gaq.push(['_setAccount', 'UA-9048568-2']);
	    _gaq.push(['_trackPageview']);
	
	    (function() {
	      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	    })();
	
	  </script>
	  <!-- Google Analytics End -->
	<?php endif; ?>
</head>

<body class="<?php echo ((is_home() || is_front_page()) ? "" : "subpage") ?> 
			<?php echo (is_single()) ? "single-post" : ""; ?>
			<?php echo (is_attachment()) ? "attachment-page" : ""; ?>"> 

	<!-- Facebook connect API -->
	<div id="fb-root"></div>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({	appId: '194386833923561', 
	    			status: true, cookie: true,
	             	xfbml: true});
	             	
	  };
	  (function() {
	    var e = document.createElement('script'); e.async = true;
	    e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';
	    document.getElementById('fb-root').appendChild(e);
	  }());
	</script>
	
	<!-- Clouds -->
	<div id="clouds">
	  <div>
	    <div>
	      <div></div>
	    </div>
	  </div>
	</div>
	
	<div id="header">
	
	<?php $Hx = (is_home() || is_front_page()) ? 1 : 2 ?>
		<h<?php echo $Hx ?> class="blog-title">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?></a>
		</h<?php echo $Hx ?>>
	  
		<h<?php echo $Hx + 1 ?> class="blog-desc">
			<?php bloginfo( 'description' ); ?>
		</h<?php echo $Hx + 1 ?>>

		<div class="nav">
			<ul>
			  <li><a href="<?php echo home_url( '/' ); ?>">Home</a></li>
			  <li><a href="/about">About</a></li>
			</ul>
		</div>
	</div>
	<div id="main">
	  <div id="content">
	    
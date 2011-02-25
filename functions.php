<?php

/*
* Thumbnail support 
*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100, true ); 


/*
* Make excerpt 150 characters long
*/
function new_excerpt_length($length) {
	return 75;
}
add_filter('excerpt_length', 'new_excerpt_length');

function rss_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = get_the_excerpt() . '<p>' . get_the_post_thumbnail($post->ID) .'</p>';
	}
	return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');


/*
* Change elipsis for post excerpt
*/
function new_excerpt_more($more) {
	global $post;
	return '&hellip; <a href="'. get_permalink($post->ID) . '" class="read-more">Continue reading&rarr;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*
* Return directory paths. By default it returns the template directorys
*/
function banana_url($name, $append = ""){
	$tmpl = get_bloginfo( 'template_url' );
	$url =  $tmpl;
	
	switch($name){
		case "images":
			 $url = $tmpl . "/images/";
		break;
		default:
			$url = $tmpl;
	}
	
	$url .= "/". $append;
	
	return $url;
}

?>
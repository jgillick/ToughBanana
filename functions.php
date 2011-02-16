<?php

/*
* Thumbnail support 
*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50 ); 


/*
* Make excerpt 150 characters long
*/
function new_excerpt_length($length) {
	return 150;
}
add_filter('excerpt_length', 'new_excerpt_length');

/*
* Change elipsis for post excerpt
*/
function new_excerpt_more($more) {
	global $post;
	return '&hellip; <a href="'. get_permalink($post->ID) . '" class="read-more">Continue reading&rarr;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

?>